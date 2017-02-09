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
$table = 'posts';

// Table's primary key
$primaryKey = 'post_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => "CONCAT_WS('~,~s',`nodes`.`title`,`nodes`.`status`)", 
			'dt' => 0, 'field' => 'title'),
	array( 'db' => '`nodes`.`preview`',  
			'dt' => 1, 'field' => 'preview'),
	array( 'db' => '`users`.`name`',   
			'dt' => 2, 'field' => 'name'),
	array( 'db' => "GROUP_CONCAT(`tags`.`tag` SEPARATOR ', ') as tag", 
			'dt' => 3, 'field' => 'tag'),
	array( 'db' => 'COUNT(`comments`.`node_id`) as comment',     
			'dt' => 4, 'field' => 'comment' ),
	array( 'db' => "CONCAT(`nodes`.`created`, CONCAT_WS(' ',`nodes`.`modified`,`nodes`.`status`) AS date", 
			'dt' => 6, 'field' => 'date', 
			'formatter' => function( $d, $row ) {
								return date( 'jS M y');
							}),
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

$joinQuery = "FROM `posts` AS `p` JOIN `post_types` AS `pt` ON (`p`.`post_type_id` = `pt`.`post_type_id`) JOIN `nodes` AS `n` ON (`p`.`node_id` = `n`.`node_id`) JOIN `users` AS `u` ON (`u`.`user_id` = `n`.`user_id`) JOIN `tags` AS `t` ON (`p`.`node_id` = `t`.`post_id`) JOIN `comments` AS `c` ON (`c`.`post_id` = `p`.`node_id`)";
$extraWhere = "`pt`.`post_name` = ".$_GET['post'];        
echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere )
);