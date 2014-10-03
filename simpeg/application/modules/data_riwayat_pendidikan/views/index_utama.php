<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Riwayat Pendidikan Formal - <?=$Nama?>h3>
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
                        <td>Nama Sekolah</td>
                        <td>Fakultas</td>
                        <td>Jurusan</td>
                        <td>Program</td>
                        <td>Thn Lulus</td>
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
                        <td><?=$data->Nama_Sekolah;?></td>
                        <td><?=$data->Fakultas;?></td>
                        <td><?=$data->Jurusan;?></td>
                        <td><?=$data->Program;?></td>
                        <td><?=$data->Thn_Lulus;?></td>
                        <td>
                            <input type="hidden" name="id" id="id_table" value="<?=$data->id;?>">
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

<!-- Modal  inssert-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?=base_url()?>data_riwayat_pendidikan/simpan/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=$title_header;?></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Instansi</label>
            <input type="text" name="nama_instansi" placeholder="Isi NIP baru..." class="form-control">
        </div>
        <div class="form-group">
            <label>NIP Lama</label>
            <input type="text" name="falkultas" placeholder="Isi NIP lama..." class="form-control">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="jurusan" placeholder="Isi nama..." class="form-control">
        </div>
        <div class="form-group">
            <label>Pendidikan</label>
            <div class="row">
                <div class="col-xs-4">
                    <select class="form-control" name="pendidikan">
                        <?php foreach($query_pendidikan->result() as $data) { ?>
                        <option value="<?=$data->Jenjang_Pend;?>"><?=$data->Jenjang_Pend;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <select class="form-control" name="tahun">
                    <option>Tahun</option>
                    <?php for ($i = 2020; $i >=1930 ; $i--) { ?>
                    <option value="<?=$i;?>"><?=$i;?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="NIP" value="<?=$NIP?>">
        <input type="hidden" name="nama" value="<?=$Nama?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  inssert-->
<div class="modal fade" id="myModalupdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?=base_url()?>data_riwayat_pendidikan/ubah/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=$title_header;?></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Instansi</label>
            <input type="text" name="nama_instansi" id="nama_instansi_update" placeholder="Isi NIP baru..." class="form-control">
        </div>
        <div class="form-group">
            <label>NIP Lama</label>
            <input type="text" name="falkultas" id="falkultas_update" placeholder="Isi NIP lama..." class="form-control">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="jurusan" id="jurusan_update" placeholder="Isi nama..." class="form-control">
        </div>
        <div class="form-group">
            <label>Pendidikan</label>
            <div class="row">
                <div class="col-xs-4">
                    <select class="form-control" name="pendidikan" id="pendidikan_update">
                        <?php foreach($query_pendidikan->result() as $data) { ?>
                        <option value="<?=$data->Jenjang_Pend;?>"><?=$data->Jenjang_Pend;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <select class="form-control" name="tahun" id="tahun_update">
                    <option>Tahun</option>
                    <?php for ($i = 2020; $i >=1930 ; $i--) { ?>
                    <option value="<?=$i;?>"><?=$i;?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="NIP" value="<?=$NIP;?>">
        <input type="hidden" name="nama" value="<?=$Nama;?>">
        <input type="hidden" name="id" id="id_update">
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
    <form action="<?=base_url()?>data_riwayat_pendidikan/hapus/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Staff</h4>
      </div>
      <div class="modal-body">
        Apakah Data Profil Pegawai akan dihapus
        <input type="hidden" name="nama" value="<?=$Nama?>">
        <input type="hidden" name="id" id="id_delete">
        <input type="hidden" name="NIP" value="<?=$NIP;?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">hapus</button>
      </div>
    </div>
    </form>
  </div>
</div>