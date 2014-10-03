<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <ul class="nav nav-tabs" role="tablist">
                    <li><a href="<?=base_url();?>data_profil_pegawai/detail/<?=$NIP;?>">Riwayat Pegawai</a></li>
                    <li><a href="<?=base_url();?>data_riwayat_pendidikan/detail/<?=$NIP;?>">Riwayat Pendidikan</a></li>
                    <li><a href="<?=base_url();?>data_diklat/detail/<?=$NIP;?>">Data Diklat</a></li>
                    <li><a href="<?=base_url();?>data_keluarga/detail/<?=$NIP;?>">Data Keluarga</a></li>
                    <li><a href="<?=base_url();?>hukuman_displin/detail/<?=$NIP;?>"> Data Hukuman dan Disiplin</a></li>
                    <li><a href="<?=base_url();?>pengalaman_organisasi/detail/<?=$NIP;?>">Data Penglaman organisasi </a></li>
                    <li><a href="<?=base_url();?>riwayat_dp3/detail/<?=$NIP;?>">Riwayat DP3 </a></li>
                    <li><a href="<?=base_url();?>data_jabatan/detail/<?=$NIP;?>">Data jabatan</a></li>
                    <li><a href="<?=base_url();?>pendidikan_non_formal/detail/<?=$NIP;?>"> Data Pendidikan Non Formal</a></li>
                    <li class="active"><a href="">Kepangkatan</a></li>                
                </ul>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Golongan Ruang</th>
                        <th>Gaji Pokok</th>
                        <th>SK No</th>
                        <th>Tgl SK</th>
                        <th>Jabatan Penandatangan</th>
                        <th>TMT</th>
                        <th>Unit Kerja</th>
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
                        <td><?=$data->Kd_Gol;?></td>
                        <td align="right"><?=$data->Gaji_Pokok;?></td>   
                        <td><?=$data->SK_No;?></td>
                        <td><?=$data->SK_Tgl;?></td>
                        <td><?=$data->SK_Jbt_Penandatangan;?></td>
                        <td><?=$data->TMT;?></td>
                        <td><?=$data->Unit_Kerja;?></td>
                        <td>
                            <input type="hidden" name="Kd_Gol" id="Kd_Gol_table" value="<?=$data->Kd_Gol;?>">
                            <input type="hidden" name="Kd_Unit_Kerja" id="Kd_Unit_Kerja_table" value="<?=$data->Kd_Unit_Kerja;?>">
                            <input type="hidden" name="IdBidang" id="IdBidang_table" value="<?=$data->IdBidang;?>">
                            <input type="hidden" name="IdSeksi" id="IdSeksi_table" value="<?=$data->IdSeksi;?>">
                            <input type="hidden" name="id" id="id_table" value="<?=$data->Id_Rp;?>">
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
    <form action="<?=base_url()?>kepangkatan/simpan/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Riwayat Jabatan</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Golongan Ruang</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="gol_kepangkatan">
                                        <?php foreach($query_gol_kepangkatan->result() as $data) { ?>
                                        <option value="<?=$data->Kd_Gol;?>"><?=$data->Gol_Pangkat;?> - <?=$data->Pangkat;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Gaji Pokok</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="gaji_pokok" placeholder="Isi Gaji Pokok..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Bidang</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="bidang" id="bidang_insert">
                                        <?php foreach($query_bidang->result() as $data) { ?>
                                        <option value="<?=$data->IdBidang;?>"><?=$data->Bidang;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Seksi</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6" id="seksi_insert">
                                    <select class="form-control input-modals" name="seksi" >
                                        <?php foreach($query_seksi->result() as $data) { ?>
                                        <option value="<?=$data->IdSeksi;?>"><?=$data->Seksi;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tanggal Mulai Tugas (TMT)</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker1'>
                                        <input type="text" class="form-control " readonly="true" name="TMT" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
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
                                    <div class='input-group date input-modals' id='datetimepicker2'>
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
    <form action="<?=base_url()?>kepangkatan/ubah/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Riwayat Jabatan</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Golongan Ruang</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="gol_kepangkatan" id="gol_kepangkatan_update">
                                        <?php foreach($query_gol_kepangkatan->result() as $data) { ?>
                                        <option value="<?=$data->Kd_Gol;?>"><?=$data->Gol_Pangkat;?> - <?=$data->Pangkat;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Gaji Pokok</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="gaji_pokok" id="gaji_pokok_update" placeholder="Isi Gaji Pokok..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Bidang</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control input-modals" name="bidang" id="bidang_update">
                                        <?php foreach($query_bidang->result() as $data) { ?>
                                        <option value="<?=$data->IdBidang;?>"><?=$data->Bidang;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Seksi</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6" id="seksi_insert_update">
                                    <select class="form-control input-modals" name="seksi" id="seksi_update">
                                        <?php foreach($query_seksi->result() as $data) { ?>
                                        <option value="<?=$data->IdSeksi;?>"><?=$data->Seksi;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Tanggal Mulai Tugas (TMT)</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date input-modals' id='datetimepicker3'>
                                        <input type="text" class="form-control " readonly="true" name="TMT" id="TMT_update" data-date-format="YYYY-MM-DD"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
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
    <form action="<?=base_url()?>kepangkatan/hapus/" enctype="multipart/form-data"  method="POST">
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