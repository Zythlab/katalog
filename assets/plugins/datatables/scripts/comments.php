<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'comments';

// Table's primary key
$primaryKey = 'comment_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => "`n`.`title`",
        'dt' => 0, 'field' => 'title', 'as'=>'title'),
    array( 'db' => '`n`.`content`',
        'dt' => 1, 'field' => 'content'),
    array( 'db' => '`u`.`username`',
        'dt' => 2, 'field' => 'username'),
    array( 'db' => "CONCAT_WS(',',`n`.`modified`,`n`.`created`)",
        'dt' => 3, 'field' => 'date', 'as'=>'date'),
    array( 'db' => "`np`.`title`",
        'dt' => 4, 'field' => 'title', 'as'=>'post_title'),
    array( 'db' => "`np`.`uri`",
        'dt' => 5, 'field' => 'uri', 'as'=>'post_uri'),
    array( 'db' => "`n`.`status`",
        'dt' => 6, 'field' => 'status'),
    array( 'db' => "`u`.`uri`",
        'dt' => 7, 'field' => 'uri'),
);

$sql_details = array(
    'user' => 'root',
    'pass' => 'Singosari123',
    'db'   => 'emif_framework',
    'host' => 'localhost'
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

// require( 'ssp.class.php' );
require('ssp.customized.class.php' );

$joinQuery = 'FROM `comments` AS `c` JOIN `nodes` AS `n` ON (`c`.`comment_id` = `n`.`node_id`) JOIN `nodes` AS `np` ON (`c`.`post_id` = `np`.`node_id`) JOIN `users` AS `u` ON (`u`.`user_id` = `n`.`user_id`)';
$extraWhere = "`n`.`module` = 'comment'";

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere )
);