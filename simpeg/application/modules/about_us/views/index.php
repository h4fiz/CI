<div class='row'>
    <div class='col-md-12'>
        <?php
        foreach ($query_about_us->result() as $row ) {
        ?>
        <form action="<?=base_url();?>about_us/simpan_about_us" method="POST"  enctype="multipart/form-data" id="MyUploadForm">
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'><?=$row->judul?></h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <form>
                        <textarea name="isi_text" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$row->teks?></textarea>
                    </form>
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>
