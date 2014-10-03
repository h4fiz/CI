<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Input Slider</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- begin form form -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Slider
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?=base_url();?>admin/upload_slider" method="POST" enctype="multipart/form-data" id="MyUploadForm">

                            <div class="form-group">
                                <label>File Input</label>
                                <table>
                                <?php
                                foreach ($query->result() as $row ) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 300px; height: 200px;">
                                                <img src="<?php echo base_url().$row->gambar;?>" />
                                            </div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="imgslider<?php echo $row->id_slider;?>">
                                                    <input type="hidden" name="idslider<?php echo $row->id_slider;?>" value="<?php echo $row->id_slider;?>" />
                                                </span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                <table>
                                    <tr>
                                        <td><b>Info Anda</b></td>
                                        <td> <input type="text" class="form-control" name="komen<?php echo $row->id_slider;?>" id="komen<?php echo $row->id_slider;?>" value="<?php echo $row->komen; ?>"></td>
                                    </tr>
                                </table>
                                </tr>
                                <?php } ?>
                                </table>
                            </div>

                            <div class="form-group">
                            <h4><?=$hasil_upload;?></h4>
                            </div>
                            <button class="btn btn-default" type="submit" id="btncoba">Simpan</button>
                        </form>
                        <div id="output"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end form -->