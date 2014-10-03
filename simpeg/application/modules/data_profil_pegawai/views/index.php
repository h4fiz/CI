<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=$title?> - <?=$NIP_cari;?></h3>
                <div class="box-tools">
                    <form action="<?=base_url()?>data_profil_pegawai/daftar" enctype="multipart/form-data"  method="POST">
                    <div class="input-group">
                        <input type="text" name="NIP_nomer" class="form-control input-sm pull-right" style="width: 150px;" placeholder="No NIP"/>
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>NIP Lama</th>
                        <th>NIP Baru</th>
                        <th>Nama Lengkap</th>
                        <th>TTL</th>
                        <th>No. Telp</th>
                        <th>Tamat CPNS</th>
                        <th>Tamat PNS</th>
                        <th>Detail</th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach($results as $data) {
                    ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?=$data->NIP;?></td>
                        <td><?=$data->NIP_Lama?></td>
                        <td><?=$data->Nama_Pegawai;?></td>
                        <td><?=$data->Tmpt_lahir;?> - <?=$data->Tgl_Lahir;?></td>
                        <td><?=$data->No_HP;?></td>
                        <td><?=$data->TMT_CPNS;?></td>
                        <td><?=$data->TMT_PNS;?></td>
                        <td>  
                            <input type="hidden" id="Jenis_Kelamin" value="<?=$data->Jenis_Kelamin;?>">
                            <input type="hidden" id="Kd_Gol_Darah" value="<?=$data->Kd_Gol_Darah;?>">
                            <input type="hidden" id="No_Telp" value="<?=$data->No_Telp;?>">
                            <input type="hidden" id="Email" value="<?=$data->Email;?>">
                            <input type="hidden" id="Kd_Kelurahan" value="<?=$data->Kd_Kelurahan;?>">
                            <input type="hidden" id="Kd_Kecamatan" value="<?=$data->Kd_Kecamatan;?>">
                            <input type="hidden" id="Kd_Agama" value="<?=$data->Kd_Agama;?>">
                            <input type="hidden" id="Kd_Status_Kawin" value="<?=$data->Kd_Status_Kawin;?>">
                            <input type="hidden" id="Status_PNS" value="<?=$data->Status_PNS;?>">
                            <input type="hidden" id="Kd_Jenis_Tenaga" value="<?=$data->Kd_Jenis_Tenaga;?>">
                            <input type="hidden" id="Tmpt_lahir" value="<?=$data->Tmpt_lahir;?>">
                            <input type="hidden" id="Tgl_Lahir" value="<?=$data->Tgl_Lahir;?>">
                            <input type="hidden" id="alamat" value="<?=$data->alamat;?>">
                            <input type="hidden" id="Pas_Photo" value="<?php echo base_url().$data->Pas_Photo; ?>">
                            
                            <a href="<?php echo base_url().'data_profil_pegawai/detail/'.$data->NIP;?>"><i class="fa fa-fw fa-eye"></i></a>
                            <i class="fa fa-fw fa-edit" data-toggle="modal" data-target="#myModalupdate"></i>
                            <i class="fa fa-fw fa-trash-o" data-toggle="modal" data-target="#myModalDelete"></i>
                        </td>
                    </tr>
                    <?php $i++; } ?>                    
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="tambah">Tambah</button>
                <?=$links;?>
            </div>
        </div><!-- /.box -->
    </div>
</div>

<!-- Modal  View-->
<div class="modal fade" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>about_us/delete_staff/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Profil Kepegawaian</h4>
      </div>
      <div class="modal-body">
        <table width="100%">
            <tr id="baris1">
                <td width="15%">NIP :</td>
                <td width="35%"id="NIP">Asep Sumantri</td>
                <td width="15%">Kd_Agama :</td>
                <td width="35%" id="Agama">Asep Sumantri</td>
            </tr>
            <tr id="baris2">
                <td width="15%">NIP_Lama :</td>
                <td width="35%" id="NIP_lama">Asep Sumantri</td>
                <td width="15%">Kd_Status_Kawin :</td>
                <td width="35%" id="status">Asep Sumantri</td>
            </tr>
            <tr id="baris3">
                <td width="15%" >Nama_Pegawai :</td>
                <td width="35%" id="Nama">Asep Sumantri</td>
                <td width="15%">Status_PNS :</td>
                <td width="35%" id="status_PNS">Asep Sumantri</td>
            </tr>
            <tr id="baris4">
                <td width="15%">Tmpt_lahir Tgl_Lahir :</td>
                <td width="35%" id="TTL">Asep Sumantri</td>
                <td width="15%">TMT_CPNS :</td>
                <td width="35%" id="TMT_CPNS">Asep Sumantri</td>
            </tr>  
            <tr id="baris5">
                <td width="15%">Jenis_Kelamin :</td>
                <td width="35%" id="jenis_kelamin">Asep Sumantri</td>
                <td width="15%">TMT_PNS :</td>
                <td width="35%" id="TMT_PNS">Asep Sumantri</td>
            </tr>
            <tr id="baris6">
                <td width="15%">Kd_Gol_Darah :</td>
                <td width="35%" id="gol_darah">Asep Sumantri</td>
                <td width="15%">Kd_Jenis_Tenaga :</td>
                <td width="35%" id="jenis_tenaga">Asep Sumantri</td>
            </tr>
            <tr id="baris6">
                <td width="15%">No_Telp :</td>
                <td width="35%" id="no_telp">Asep Sumantri</td>
                <td width="15%"></td>
                <td width="35%"></td>
            </tr>  
            <tr id="baris7">
                <td width="15%">No_HP :</td>
                <td width="35%" id="no_hp">Asep Sumantri</td>
                <td width="15%"></td>
                <td width="35%"></td>
            </tr>
            <tr id="baris8">
                <td width="15%">Email :</td>
                <td width="35%" id ="email">Asep Sumantri</td>
                <td width="15%"></td>
                <td width="35%"></td>
            </tr>         
            <tr id="baris9">
                <td width="15%">Kd_Kelurahan :</td>
                <td width="35%" id="kelurahan">Asep Sumantri</td>
                <td width="15%">Kd_Kecamatan :</td>
                <td width="35%" id="kecamatan">Asep Sumantri</td>
            </tr>            
        </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  inssert-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?=base_url()?>data_profil_pegawai/simpan/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=$title_header;?></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">
                    <img src="" />
                </div>
                <div>
                    <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="pas_photo" id="pas_photo">
                        <input type="hidden" name="id" value="" />
                        <input type="hidden" id="size"  />
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>NIP Baru</label>
            <input type="text" name="NIP_baru" placeholder="Isi NIP baru..." class="form-control">
        </div>
        <div class="form-group">
            <label>NIP Lama</label>
            <input type="text" name="NIP_lama" placeholder="Isi NIP lama..." class="form-control">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="Nama" placeholder="Isi nama..." class="form-control">
        </div>
        <div class="form-group">
            <label>Tempat dan Tanggal Lahir</label>
            <input type="text" name="tempat_lahir" placeholder="Isi tempat lahir..." class="form-control">
        </div>
        <div class="row">
            <div class="col-xs-3">
                <select class="form-control" name="tahun">
                    <option>Tahun</option>
                    <?php for ($i = 2014; $i >=1930 ; $i--) { ?>
                    <option value="<?=$i;?>"><?=$i;?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-xs-2">
                <select class="form-control" name="bln">
                    <option>Bln</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="col-xs-2">
                <select class="form-control" name="tgl">
                    <option>Tgl</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Golongan Darah</label>
            <div class="row">
                <div class="col-xs-4">
                    <select class="form-control" name="gol_darah">
                        <?php foreach($query_gol_dar->result() as $data) { ?>
                        <option value="<?=$data->Kd_Gol;?>"><?=$data->Gol_Darah;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <div class="row">
                <div class="col-xs-4">
                    <select class="form-control" name="Agama">
                        <?php foreach($query_agama->result() as $data) { ?>
                        <option value="<?=$data->Kd_Agama;?>"><?=$data->Nm_Agama;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label> <br>
            <div class="btn-group" data-toggle="buttons">
                <label class="">
                    <input type="radio" name="jenis_kelamin" id="option1" value="L" checked> Laki-laki              
                </label>
              <label class="">
                <input type="radio" name="jenis_kelamin" id="option2" value="P"> Perempuan
              </label>
            </div>
        </div>
        <div class="form-group">
            <label>Status</label> <br>
            <div class="btn-group" data-toggle="buttons">
                <label class="">
                    <input type="radio" name="status_kawin" id="option1" value="01" checked> Lajang             
                </label>
                <label class="">
                    <input type="radio" name="status_kawin" id="option2" value="02"> Kawin
                </label>
                <label class="">
                    <input type="radio" name="status_kawin" id="option3" value="03"> duda              
                </label>
                <label class="">
                    <input type="radio" name="status_kawin" id="option4" value="04"> Janda
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Kecamatan dan kelurahan</label>
            <div class="row">
                <div class="col-xs-5">
                    <select class="form-control" name="kecamatan">
                        <?php foreach($query_kecamatan->result() as $data) { ?>
                        <option value="<?=$data->Kd_Kecamatan;?>"><?=$data->NM_Kecamatan;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-xs-5">
                    <select class="form-control" name="kelurahan">
                        <?php foreach($query_kelurahan->result() as $data) { ?>
                        <option value="<?=$data->Kd_Kelurahan;?>"><?=$data->Nm_Kelurahan;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="text" name="email" placeholder="Isi email..." class="form-control">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" ></textarea>
        </div>
        <div class="form-group">
            <label>No telp dan Handphone</label>
            <div class="row">
                <div class="col-xs-4">
                    <input type="text" name="no_telp" placeholder="Isi no telp..." class="form-control">
                </div>
                <div class="col-xs-5">
                    <input type="text" name="no_hp" placeholder="Isi no handpone..." class="form-control">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  update-->
<div class="modal fade" id="myModalupdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?=base_url()?>data_profil_pegawai/ubah_data/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=$title_header;?></h4>
      </div>

    <div class="modal-body">
        <div class="form-group">
            <div id="konteks">
            <div class="fileinput fileinput-new" data-provides="fileinput" id="gambarform">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">
                    <img src="" />
                </div>
                <div>
                    <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="pas_photo" id="pas_photo">
                        <input type="hidden" name="id" value="" />
                        <input type="hidden" id="size"  />
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label>NIP Baru</label>
            <input type="text" name="NIP_baru" placeholder="Isi NIP baru..." class="form-control" id="NIP_baru_update">
        </div>
        <div class="form-group">
            <label>NIP Lama</label>
            <input type="text" name="NIP_lama" placeholder="Isi NIP lama..." class="form-control" id="NIP_lama_update">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="Nama" placeholder="Isi nama..." class="form-control" id="nama_baru_update">
        </div>
        <div class="form-group">
            <label>Tempat dan Tanggal Lahir</label>
            <input type="text" name="tempat_lahir" placeholder="Isi tempat lahir..." class="form-control" id="tempat_lahir_update">
        </div>
        <div class="row">
            <div class="col-xs-3">
                <select class="form-control" name="tahun" id="tahun_update">
                    <option>Tahun</option>
                    <?php for ($i = 2014; $i >=1930 ; $i--) { ?>
                    <option value="<?=$i;?>"><?=$i;?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-xs-2">
                <select class="form-control" name="bln" id="bln_update">
                    <option>Bln</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="col-xs-2">
                <select class="form-control" name="tgl" id="tgl_update">
                    <option>Tgl</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Golongan Darah</label>
            <div class="row">
                <div class="col-xs-4">
                    <select class="form-control" name="gol_darah" id="gol_dar_update">
                        <?php foreach($query_gol_dar->result() as $data) { ?>
                        <option value="<?=$data->Kd_Gol;?>"><?=$data->Gol_Darah;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <div class="row">
                <div class="col-xs-4">
                    <select class="form-control" name="Agama" id="agama_update">
                        <?php foreach($query_agama->result() as $data) { ?>
                        <option value="<?=$data->Kd_Agama;?>"><?=$data->Nm_Agama;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label> <br>
            <div class="row">
                <div class="col-xs-5">
                    <select class="form-control" name="jenis_kelamin" id="Jenis_kelamin_update">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Status</label> <br>
            <div class="row">
                <div class="col-xs-5">
                    <select class="form-control" name="status_kawin" id="status_kawin_update">
                        <option value="01">Lajang</option>
                        <option value="02">Kawin</option>
                        <option value="03">Duda</option>
                        <option value="04">Janda</option>                    
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Kecamatan dan kelurahan</label>
            <div class="row">
                <div class="col-xs-5">
                    <select class="form-control" name="kecamatan" id="kecamatan_update">
                        <?php foreach($query_kecamatan->result() as $data) { ?>
                        <option value="<?=$data->Kd_Kecamatan;?>"><?=$data->NM_Kecamatan;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-xs-5">
                    <select class="form-control" name="kelurahan" id="kelurahan_update">
                        <?php foreach($query_kelurahan->result() as $data) { ?>
                        <option value="<?=$data->Kd_Kelurahan;?>"><?=$data->Nm_Kelurahan;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="text" name="email" placeholder="Isi email..." class="form-control" id="email_update">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" id="alamat_update"></textarea>
        </div>
        <div class="form-group">
            <label>No telp dan Handphone</label>
            <div class="row">
                <div class="col-xs-4">
                    <input type="text" name="no_telp" placeholder="Isi no telp..." class="form-control" id="no_telp_update">
                </div>
                <div class="col-xs-5">
                    <input type="text" name="no_hp" placeholder="Isi no handpone..." class="form-control" id="no_hp_update">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="NIP_baru_org" placeholder="Isi NIP baru..." class="form-control" id="NIP_baru_org_update">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  delete-->
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?=base_url()?>data_profil_pegawai/hapus/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Staff</h4>
      </div>
      <div class="modal-body">
        Apakah Data Profil Pegawai akan dihapus
        <input type="hidden" name="NIP_baru" id="NIP_baru_delete"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">hapus</button>
      </div>
    </div>
    </form>
  </div>
</div>