<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Keluarga => <?=$Nama?></h3>
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
                        <th>Hub_Keluarga</th>
                        <th>Nama_Lengkap</th>
                        <th>Jenis_Kelamin</th>
                        <th>Tmpt_Lahir</th>
                        <th>Tgl_Lahir</th>
                        <th>Jenjang_Pend</th>
                        <th>Nm_Pekerjaan</th>
                        <th>Status_Perkawinan</th>
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
                        <td><?=$data->Hub_Keluarga;?></td>
                        <td><?=$data->Nama_Lengkap;?></td>
                        <?php if($data->Jenis_Kelamin=="L") { ?>
                            <td>Laki-laki</td>
                        <?php } else { ?>
                            <td>Perempuan</td>
                        <?php } ?>    
                        <td><?=$data->Tmpt_Lahir;?></td>
                        <td><?=$data->Tgl_Lahir;?></td>
                        <td><?=$data->Jenjang_Pend;?></td>
                        <td><?=$data->Nm_Pekerjaan;?></td>
                        <td><?=$data->Status_Perkawinan;?></td>
                        <td>
                            <input type="hidden" name="Keterangan" id="Keterangan_table" value="<?=$data->Keterangan;?>">
                            <input type="hidden" name="Tgl_Nikah" id="Tgl_Nikah_table" value="<?=$data->Tgl_Nikah;?>">
                           <input type="hidden" name="Jenis_Kelamin" id="Jenis_Kelamin_table" value="<?=$data->Jenis_Kelamin;?>">
                           <input type="hidden" name="Kd_St_Kawin" id="Kd_St_Kawin_table" value="<?=$data->Kd_St_Kawin;?>">
                            <input type="hidden" name="Kd_Pekerjaan" id="Kd_Pekerjaan_table" value="<?=$data->Kd_Pekerjaan;?>">
                            <input type="hidden" name="Kd_Pend" id="Kd_Pend_table" value="<?=$data->Kd_Pend;?>">
                            <input type="hidden" name="kd_hubkel" id="kd_hubkel_table" value="<?=$data->Kd_HubKel;?>">
                            <input type="hidden" name="id" id="id_table" value="<?=$data->Id_Kel;?>">
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
    <form action="<?=base_url()?>data_keluarga/simpan/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Data Keluarga</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Nama Lengkap</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nama" placeholder="Isi Nama keluarga anda..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Hubungan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="hub_keluarga">
                                        <?php foreach($query_hub_keluarga->result() as $data) { ?>
                                        <option value="<?=$data->Kd_Kel;?>"><?=$data->Hub_Keluarga;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Status</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="status_nikah">
                                        <?php foreach($query_status_nikah->result() as $data) { ?>
                                        <option value="<?=$data->Kd_St_kawin;?>"><?=$data->Status_Perkawinan;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jenis Kelamin</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="jenis_kelamin">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Permpuan</option>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">Data lahir</label></td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tempat dan Tanggal Lahir</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" name="tmpt_lahir" placeholder="Isi tempat lahir..." class="form-control input-modals">
                                </div>
                                <div class="col-xs-1">
                                    dan
                                </div>
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker1'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_lahir" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tanggal Nikah </label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker2'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_nikah" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Pendidikan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="pendidikan">
                                        <?php foreach($query_pendidikan->result() as $data) { ?>
                                        <option value="<?=$data->Kd_Pend;?>"><?=$data->Jenjang_Pend;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Pekerjaan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="pekerjaan">
                                        <?php foreach($query_pekerjaan->result() as $data) { ?>
                                        <option value="<?=$data->Kd_Pekerjaan;?>"><?=$data->Nm_Pekerjaan;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Keterangan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <textarea rows="3" class="form_control" name="keterangan"></textarea>
                                    </div>
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

<!-- Modal  Update-->
<div class="modal fade" id="myModalupdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>data_keluarga/ubah/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Data Keluarga</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Nama Lengkap</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nama" id="nama_update" placeholder="Isi Nama keluarga anda..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Hubungan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="hub_keluarga" id="hub_keluarga_update">
                                        <?php foreach($query_hub_keluarga->result() as $data) { ?>
                                        <option value="<?=$data->Kd_Kel;?>"><?=$data->Hub_Keluarga;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Status</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="status_nikah" id="status_nikah_update">
                                        <?php foreach($query_status_nikah->result() as $data) { ?>
                                        <option value="<?=$data->Kd_St_kawin;?>"><?=$data->Status_Perkawinan;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jenis Kelamin</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="jenis_kelamin" id="jenis_kelamin_update">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Permpuan</option>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">Data lahir</label></td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tempat dan Tanggal Lahir</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" name="tmpt_lahir" id="tmpt_lahir_update" placeholder="Isi tempat lahir..." class="form-control input-modals">
                                </div>
                                <div class="col-xs-1">
                                    dan
                                </div>
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker3'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_lahir" id="tgl_lahir_update" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tanggal Nikah </label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker4'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_nikah" id="tgl_nikah_update" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Pendidikan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="pendidikan" id="pendidikan_update">
                                        <?php foreach($query_pendidikan->result() as $data) { ?>
                                        <option value="<?=$data->Kd_Pend;?>"><?=$data->Jenjang_Pend;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Pekerjaan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="pekerjaan" id="pekerjaan_update">
                                        <?php foreach($query_pekerjaan->result() as $data) { ?>
                                        <option value="<?=$data->Kd_Pekerjaan;?>"><?=$data->Nm_Pekerjaan;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Keterangan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <textarea rows="3" class="form_control" name="keterangan" id="keterangan_update"></textarea>
                                    </div>
                                </div>
                            </div>                        
                        </td>
                    </tr>
                </table>
                
            </div><!-- /.box-body -->
      <div class="modal-footer">
        <input type="hidden" name="NIP" value="<?=$NIP;?>">
        <input type="hidden" name="id" id="id_update" value="<?=$NIP;?>">
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
    <form action="<?=base_url()?>data_keluarga/hapus/" enctype="multipart/form-data"  method="POST">
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