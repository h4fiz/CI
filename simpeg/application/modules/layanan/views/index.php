<div class='row'>
    <div class='col-md-12'>
        <?php
        foreach ($query_perancangan->result() as $row ) {
        ?>
        <form action="<?=base_url();?>layanan/simpan_perancangan" method="POST"  enctype="multipart/form-data" id="MyUploadForm">
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
                    <textarea class="form-control" name="isi_text"><?=$row->teks?></textarea>
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
        <?php } ?>
        
        <?php
        foreach ($query_strategi->result() as $row ) {
        ?>
        <form action="<?=base_url();?>layanan/simpan_strategi" method="POST"  enctype="multipart/form-data" id="MyUploadForm">
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
                    <textarea class="form-control" name="isi_text"><?=$row->teks?></textarea>
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
        <?php } ?>

        <?php
        foreach ($query_konsultasi->result() as $row ) {
        ?>
        <form action="<?=base_url();?>layanan/simpan_konsultasi" method="POST"  enctype="multipart/form-data" id="MyUploadForm">
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
                    <textarea class="form-control" name="isi_text"><?=$row->teks?></textarea>
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>