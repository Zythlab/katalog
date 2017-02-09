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
            <div class='box-body'>
                <?php echo form_open('website/save');?>
                    <?php foreach ($website as $website){ ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website Admin</label>
                                <input name="website1" type="text" class="form-control" value="<?= $website->website1 ?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website 1</label>
                                <input name="website2" type="text" class="form-control" value="<?= $website->website2 ?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website 2</label>
                                <input name="website3" type="text" class="form-control" value="<?= $website->website3 ?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website 3</label>
                                <input name="website4" type="text" class="form-control" value="<?= $website->website4 ?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website 4</label>
                                <input name="website5" type="text" class="form-control" value="<?= $website->website5 ?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website 5</label>
                                <input name="website6" type="text" class="form-control" value="<?= $website->website6 ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website 6</label>
                                <input name="website7" type="text" class="form-control" value="<?= $website->website7 ?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website 7</label>
                                <input name="website8" type="text" class="form-control" value="<?= $website->website8 ?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website 8</label>
                                <input name="website9" type="text" class="form-control" value="<?= $website->website9 ?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website 9</label>
                                <input name="website10" type="text" class="form-control" value="<?= $website->website10 ?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="label-photo">Website 10</label>
                                <input name="website11" type="text" class="form-control" value="<?= $website->website11 ?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary btn-flat" value="Simpan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>