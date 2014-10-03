<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Hukuman dan Disiplin => <?=$Nama?></h3>
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
                        <th>Jenis Hukuman</th>
                        <th>Tingkat Hukuman</th>
                        <th>tgl mulai</th>
                        <th>tgl selesai</th>
                        <th>SK No</th>
                        <th>tgl SK</th>
                        <th>SK jabatan Penandatangan</th>
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
                        <td><?=$data->Hkm_Displ_Jenis;?></td>
                        <td><?=$data->Kd_Hkm_Displ_Tkt;?></td>   
                        <td><?=$data->Tgl_Mulai_Hkm;?></td>
                        <td><?=$data->Tgl_Selesai_Hkm;?></td>
                        <td><?=$data->SK_No;?></td>
                        <td><?=$data->SK_Tgl;?></td>
                        <td><?=$data->SK_Jbt_Penandatangan;?></td>
                        <td>
                            <input type="hidden" name="Kd_Hkm_Displ_Tkt" id="Kd_Hkm_Displ_Tkt_table" value="<?=$data->Kd_Hkm_Displ_Tkt;?>">
                            <input type="hidden" name="id" id="id_table" value="<?=$data->Id_Rhk;?>">
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
    <form action="<?=base_url()?>hukuman_disiplin/simpan/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Data Keluarga</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Tingkat Hukuman</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="tingkat_hukuman">
                                        <?php foreach($query_tingkat_hukuman->result() as $data) { ?>
                                        <option value="<?=$data->Kd_TkHkm;?>"><?=$data->Tingkat_Hukuman;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jenis Hukuman</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="jenis_hukuman" placeholder="Isi Jenis Hukuman..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">SK</label></td>
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
                        <td align="right" width="20%"><label>Tanggal Hukuman</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker2'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_awal_hukuman" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-xs-1">
                                    S.d.
                                </div>
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker3'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_selesai_hukuman" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
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
    <form action="<?=base_url()?>hukuman_disiplin/ubah/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Data Keluarga</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Tingkat Hukuman</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="tingkat_hukuman" id="tingkat_hukuman_update">
                                        <?php foreach($query_tingkat_hukuman->result() as $data) { ?>
                                        <option value="<?=$data->Kd_TkHkm;?>"><?=$data->Tingkat_Hukuman;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jenis Hukuman</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="jenis_hukuman" id="jenis_hukuman_update" placeholder="Isi Jenis Hukuman..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">SK</label></td>
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
                                    <div class='input-group date input-modals' id='datetimepicker4'>
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
                        <td align="right" width="20%"><label>Tanggal Hukuman</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker5'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_awal_hukuman" id="tgl_awal_hukuman_update" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-xs-1">
                                    S.d.
                                </div>
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker6'>
                                        <input type="text" class="form-control " readonly="true" name="tgl_selesai_hukuman" id="tgl_selesai_hukuman_update" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                
            </div><!-- /.box-body -->
      <div class="modal-footer">
        <input type="hidden" name="NIP" value="<?=$NIP;?>">
        <input type="hidden" name="id" id="id_update" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  delete-->
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>hukuman_disiplin/hapus/" enctype="multipart/form-data"  method="POST">
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