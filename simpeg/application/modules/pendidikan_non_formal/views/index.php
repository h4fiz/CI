<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=$title?></h3>
                <div class="box-tools">
                    <div class="input-group">
                        <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>NIP Baru</th>
                        <th>Nama Lengkap</th>
                        <th>Detail</th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach($results as $data) {
                    ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?=$data->NIP;?></td>
                        <td><?=$data->Nama_Pegawai;?></td>
                        <td>  
                            <form action="<?=base_url()?>pendidikan_non_formal/daftar_utama" enctype="multipart/form-data"  method="POST">
                                <input type="hidden" name="NIP" value="<?=$data->NIP;?>" >
                                <input type="hidden" name="Nama" value="<?=$data->Nama_Pegawai;?>" >
                                <button class="btn btn-primary" type="submit" id="tambah">Detail Pendidikan Non Formal</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; } ?>                    
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <?=$links;?>
            </div>
        </div><!-- /.box -->
    </div>
</div>