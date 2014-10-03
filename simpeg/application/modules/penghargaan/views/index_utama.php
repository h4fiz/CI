<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Penhargaan => <?=$Nama?></h3>
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
                        <th>Nama_Penghargaan</th>
                        <th>SK No</th>
                        <th>Tgl SK</th>
                        <th>Jabatan Penandatangan</th>
                        <th>Instansi Penyelenggara</th>
                        <th>Lokasi</th>
                        <th>Detail</th>
                    </tr>
                    <?php
                    $i = 1;
                    if ($jml_row==0){

                    } else {
                        foreach($results as $data) {
                    ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?=$data->Nama_Penghargaan;?></td>
                        <td><?=$data->SK_No;?></td>
                        <td><?=$data->SK_Tgl;?></td>
                        <td><?=$data->SK_Jbt_Penandatangan;?></td>
                        <td><?=$data->Instansi_Penyelenggara;?></td>
                        <td><?=$data->Lokasi;?></td>
                        <td>
                            <input type="hidden" name="id" id="id_table" value="<?=$data->Id_Rph;?>">
                            <i class="fa fa-fw fa-edit" data-toggle="modal" data-target="#myModalupdate"></i>
                            <i class="fa fa-fw fa-trash-o" data-toggle="modal" data-target="#myModalDelete"></i>
                        </td>
                    </tr>
                    <?php $i++; }
                    } 
                    ?>                    
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="tambah">Tambah</button>
                <?=$links;?>
            </div>
        </div><!-- /.box -->
    </div>
</div>

<!-- Modal  insert-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>penghargaan/simpan/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Riwayat Jabatan</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Nama Penghargaan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nama_penghargaan" placeholder="Isi Nama Penghargaan..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">Surat Keterangan</label></td>
                    </tr>
                     <tr>
                        <td align="right" width="20%"><label>Nomor</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nomor" placeholder="Isi No SK..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tanggal Sk </label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker1'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_SK" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>                        
                        </td>
                    </tr>                   
                    <tr>
                        <td align="right" width="20%"><label>Jabatan Penandatangan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="jabatan_ttd" placeholder="Isi jabatan penanda tangan..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">Instansi Penyelenggara</label></td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Instansi</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="instansi" placeholder="Isi nama instansi..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Lokasi</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="lokasi" placeholder="Isi lokasi instasi..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                
            </div><!-- /.box-body -->
      <div class="modal-footer">
        <input type="hidden" name="NIP" value="<?=$NIP;?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  update-->
<div class="modal fade" id="myModalupdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>penghargaan/ubah/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Penghargaan</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Nama Penghargaan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nama_penghargaan" id="nama_penghargaan_update" placeholder="Isi Nama Penghargaan..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">Surat Keterangan</label></td>
                    </tr>
                     <tr>
                        <td align="right" width="20%"><label>Nomor</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nomor" id="nomor_update" placeholder="Isi No SK..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tanggal Sk </label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker2'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_SK" id="tgl_SK_update" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>                        
                        </td>
                    </tr>                   
                    <tr>
                        <td align="right" width="20%"><label>Jabatan Penandatangan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="jabatan_ttd" id="jabatan_ttd_update" placeholder="Isi jabatan penanda tangan..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">Instansi Penyelenggara</label></td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Instansi</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="instansi" id="instansi_update" placeholder="Isi nama instansi..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Lokasi</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="lokasi" id="lokasi_update" placeholder="Isi lokasi instasi..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                
            </div><!-- /.box-body -->
      <div class="modal-footer">
        <input type="hidden" name="NIP" value="<?=$NIP;?>">
        <input type="hidden" name="id" id="id_update">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  delete-->
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>penghargaan/hapus/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form data jabatan</h4>
      </div>
        <div class="modal-body">

            Apakah Data Mau di hapus ...?
        </div><!-- /.box-body -->
      <div class="modal-footer">
        <input type="hidden" name="NIP" value="<?=$NIP;?>">
        <input type="hidden" name="id" id="id_table_delete">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
    </div>
    </form>
  </div>
</div>