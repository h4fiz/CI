<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Diklat => <?=$Nama?></h3>
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
                        <th>Nama Diklat</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>Jumlah Jam</th>
                        <th>Tgl STTP</th>
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
                        <td><?=$data->Nama_Diklat;?></td>
                        <td><?=$data->Tgl_Mulai;?></td>
                        <td><?=$data->Tgl_Selesai;?></td>
                        <td><?=$data->Jml_jam;?></td>
                        <td><?=$data->Tgl_STTP;?></td>
                        <td><?=$data->Jab_Penandatangan;?></td>
                        <td><?=$data->Inst_Penyelenggara;?></td>
                        <td><?=$data->Lokasi;?></td>
                        <td>
                            <input type="hidden" name="id" id="id_table" value="<?=$data->Id_Dik;?>">
                            <input type="hidden" name="kd_diklat" id="kd_diklat" value="<?=$data->Kd_Diklat;?>">
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
    <form action="<?=base_url()?>data_diklat/simpan/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Data Diklat</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right"><label>Jenis diklat</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="">
                                    <input type="radio" name="jenis_diklat" id="option1" value="01" checked> Struktural             
                                </label>
                                <label class="">
                                    <input type="radio" name="jenis_diklat" id="option2" value="02"> Fungsional
                                </label>
                                <label class="">
                                    <input type="radio" name="jenis_diklat" id="option3" value="03"> Teknis              
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Nama diklat</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nama_diklat" placeholder="Isi Nama Diklat..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tanggal</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker1'>
                                        <input type="text" class="form-control input-modals" readonly="true" name="tgl_mulai"  data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-1">
                                    S.d.
                                </div>
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker2'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_selesai" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jumlah Jam</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-2">
                                    <input type="text" name="jumlah_jam" placeholder="Isi Jam..." class="form-control input-modals">
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">Surat Tanda Tamat</label></td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tanggal</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker3'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_STT" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jabatan TTD</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-9">
                                    <input type="text" name="jabatan_TTD" placeholder="Isi Jabatan..." class="form-control input-modals">
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
                                    <input type="text" name="instansi" placeholder="Isi Instansi..." class="form-control input-modals">
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Lokasi</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-9">
                                    <input type="text" name="lokasi" placeholder="Isi Lokasi..." class="form-control input-modals">
                                </div>
                            </div>                        
                        </td>
                    </tr>
                </table>
                
            </div><!-- /.box-body -->
      <div class="modal-footer">
        <input type="hidden" name="NIP" value="<?=$NIP;?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  update-->
<div class="modal fade" id="myModalupdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>data_diklat/ubah/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Data Diklat</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right"><label>Jenis diklat</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="btn-group">
                                <label class="">
                                    <input type="radio" name="jenis_diklat" id="option1" value="01" checked> Struktural             
                                </label>
                                <label class="">
                                    <input type="radio" name="jenis_diklat" id="option2" value="02"> Fungsional
                                </label>
                                <label class="">
                                    <input type="radio" name="jenis_diklat" id="option3" value="03"> Teknis              
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Nama diklat</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nama_diklat" id="nama_diklat_update" placeholder="Isi Nama Diklat..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tanggal</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker4'>
                                        <input type="text" class="form-control input-modals" readonly="true" name="tgl_mulai" id="tgl_mulai_update" data-date-format="dd/mm/yyyy"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-1">
                                    S.d.
                                </div>
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker5'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_selesai" id="tgl_selesai_update" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jumlah Jam</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-2">
                                    <input type="text" name="jumlah_jam" id="jml_jam_update" placeholder="Isi Jam..." class="form-control input-modals">
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">Surat Tanda Tamat</label></td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tanggal</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker6'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_STT" id="tgl_STT_update" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jabatan TTD</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-9">
                                    <input type="text" name="jabatan_TTD" id="jabatan_TTD_update" placeholder="Isi Jabatan..." class="form-control input-modals">
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
                                    <input type="text" name="instansi" id="instansi_update" placeholder="Isi Instansi..." class="form-control input-modals">
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Lokasi</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-9">
                                    <input type="text" name="lokasi" id="lokasi_update" placeholder="Isi Lokasi..." class="form-control input-modals">
                                </div>
                            </div>                        
                        </td>
                    </tr>
                </table>
                
            </div><!-- /.box-body -->
      <div class="modal-footer">
        <input type="hidden" name="NIP" value="<?=$NIP;?>">
        <input type="hidden" name="id" id="id_table_udpate">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  update-->
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>data_diklat/hapus/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Data Diklat</h4>
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