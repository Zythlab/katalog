<?php //print_r($users);?>
<style>
.preview {
    background-color: rgba(185, 185, 185, 0.100);
    height: 52px;
    width: 300px;
    padding: 2px;
    border: solid rgba(96, 96, 96, 0.100) 1px;
}
</style>
<div class='row'>
    <div class='col-md-12'>
        <div class='box box-solid'>
            <div class="box-header">
                <div class="pull-right">
                    <button class="btn btn-flat btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Kategori</button>
                    <button class="btn btn-flat btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                </div>
            </div>
            <div class='box-body table-responsive'>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover" id="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>



<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {
   
    //datatables
    table = $('#table').DataTable({
       
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Kategori/ajax_list')?>",
            "type": "POST"
        },
        
        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
        
    });
    
    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    
});



function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Kategori'); // Set Title to Bootstrap modal title
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Kategori/edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id_kategori);
            $('[name="nama"]').val(data.nama);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Kategori'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
    
    if(save_method == 'add') {
        url = "<?php echo site_url('Kategori/add')?>";
    } else {
        url = "<?php echo site_url('Kategori/update')?>";
    }
    
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
           
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
            
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
            
        }
    });
}

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Kategori/delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
        
    }
}

</script>
<div class="modal fade" id="modal_form" tabindex="-1"
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Title</h3>
        </div>
        <div class="modal-body form">
            <table class="table table-stripped table-hover">
                <form action="#" method="post" id="form">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-group">
                        <label class="control-label col-md-3">Nama Kategori</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nama" required placeholder="Nama Kategori">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </form>                                   
            </table>
        </div>
        <div class="modal-footer" style="margin-right: 15px;">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-flat btn-primary">Save</button>
            <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</div>
</div>