<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <ul class="nav nav-tabs" role="tablist">
                    <li><a href="<?=base_url();?>data_profil_pegawai/detail/<?=$NIP;?>">Riwayat Pegawai</a></li>
                    <li><a href="<?=base_url();?>data_riwayat_pendidikan/detail/<?=$NIP;?>">Riwayat Pendidikan</a></li>
                    <li><a href="<?=base_url();?>data_detail/detail/<?=$NIP;?>">Data Diklat</a></li>
                    <li><a href="<?=base_url();?>data_keluarga/detail/<?=$NIP;?>">Data Keluarga</a></li>
                    <li><a href="<?=base_url();?>hukuman_displin/detail/<?=$NIP;?>"> Data Hukuman dan Disiplin</a></li>
                    <li><a href="<?=base_url();?>pengalaman_organisasi/detail/<?=$NIP;?>">Data Penglaman organisasi </a></li>
                    <li><a href="<?=base_url();?>data_jabatan/detail/<?=$NIP;?>"> Data jabatan</a></li>
                    <li><a href="<?=base_url();?>kepangkatan/detail/<?=$NIP;?>"> Kepangkatan</a></li>
                    <li><a href="<?=base_url();?>pendidikan_non_formal/detail/<?=$NIP;?>"> Data Pendidikan Non Formal</a></li>
                    <li class="active"><a href="">Riwayat DP3</a></li>                
                </ul>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Tahun</th>
                        <th>Nilai</th>
                        <th>NIP PJ Penilai</th>
                        <th>NIP Atasan Pj Penilai</th>
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
                        <td><?=$data->Tahun;?></td>
                        <td><?=$data->Nilai;?></td>   
                        <td><?=$data->NIP_Pj_Penilai;?></td>
                        <td><?=$data->NIP_At_Pj_Penilai;?></td>
                        <td>
                            <input type="hidden" name="id" id="id_table" value="<?=$data->Id_Rdp;?>">
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
    <form action="<?=base_url()?>riwayat_dp3/simpan/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Riwayat DP3</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Tahun</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-3">
                                    <select class="form-control input-modals" name="tahun" >
                                        <?php for ($i = 2014; $i >=1930 ; $i--) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Nilai</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nilai" placeholder="Isi nilai..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">SK</label></td>
                    </tr>
                     <tr>
                        <td align="right" width="20%"><label>NIP Penanggung Jawab Penilai</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="NIP_Pj_Penilai" placeholder="Isi NIP penangung Jwb Penilai..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>                  
                    <tr>
                        <td align="right" width="20%"><label>NIP Penanggung Jawab Atasan Penilai</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="NIP_At_Pj_Penilai" placeholder="Isi NIP penangung Jwb atasn Penilai..." class="form-control input-modals">
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
    <form action="<?=base_url()?>riwayat_dp3/ubah/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Riwayat DP3</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Tahun</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-3">
                                    <select class="form-control input-modals" name="tahun" id="tahun_update">
                                        <?php for ($i = 2014; $i >=1930 ; $i--) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Nilai</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nilai" id="nilai_update" placeholder="Isi nilai..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">SK</label></td>
                    </tr>
                     <tr>
                        <td align="right" width="20%"><label>NIP Penanggung Jawab Penilai</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="NIP_Pj_Penilai" id="NIP_Pj_Penilai_update" placeholder="Isi NIP penangung Jwb Penilai..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>                  
                    <tr>
                        <td align="right" width="20%"><label>NIP Penanggung Jawab Atasan Penilai</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="NIP_At_Pj_Penilai" id="NIP_At_Pj_Penilai_update" placeholder="Isi NIP penangung Jwb atasn Penilai..." class="form-control input-modals">
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
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  delete-->
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>riwayat_dp3/hapus/" enctype="multipart/form-data"  method="POST">
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