<div class="row">
    <div class="col-md-12">
        <div class="box">                                
            <div class="box-header">
                <h3 class="box-title">Bordered Table</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 150px">Gambar</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Deskripsi</th>
                        <th style="width: 50px">Task</th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($query->result() as $row ) {
                    ?>
                    <tr>
                        <td><?=$i;?>.</td>
                        <td align="center">
                            <img src="<?php echo base_url().$row->gambar;?>" width="100px" height="100px" id="filegambar">
                            <input type="hidden" name="id_staff" id="id_staff" value="<?=$row->id_staff;?>" />
                        </td>
                        <td><?=$row->nama;?></td>
                        <td><?=$row->jabatan;?></td>
                        <td><?=$row->deskripsi;?></td>
                        <td>
                            <i class="fa fa-fw fa-edit" data-toggle="modal" data-target="#myModalUpdate"></i>
                            <i class="fa fa-fw fa-trash-o" data-toggle="modal" data-target="#myModalDelete"></i>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="tambah">Tambah</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal  inssert-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>about_us/simpan_staff/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Staff</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Gambar</label>
        </div>
        <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">
                    <img src="" />
                </div>
                <div>
                    <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="gambar" id="gambar">
                        <input type="hidden" name="id" value="" />
                        <input type="hidden" id="size"  />
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" placeholder="Masukkan nama staf" name="nama" id="nama" />
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" class="form-control" placeholder="Masukkan nama jabatan" name="jabatan" id="jabatan"/>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" row="5" name="deskripsi" id="deskripsi"></textarea>
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
<div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url()?>about_us/ubah_staff/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Staff</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Gambar</label>
        </div>
        <div class="form-group" id="gambarform_main">
            <div class="fileinput fileinput-new" data-provides="fileinput" id="gambarform">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">
                    <img src="" />
                </div>
                <div>
                    <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="gambar" id="gambar">
                        <input type="hidden" name="id" value="" />
                        <input type="hidden" id="size"  />
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" placeholder="Masukkan nama staf" name="nama" id="nama_update" />
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" class="form-control" placeholder="Masukkan nama jabatan" name="jabatan" id="jabatan_update"/>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" row="5" name="deskripsi" id="deskripsi_update"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id_staff" id="id_staff_update" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  delete-->
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?=base_url()?>about_us/delete_staff/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Staff</h4>
      </div>
      <div class="modal-body">
        Apakah Data ini mau di hapus
        <input type="hidden" name="link_gambar_delete" id="link_gambar_delete"/>
        <input type="hidden" name="id_staff_delete" id="id_staff_delete"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">hapus</button>
      </div>
    </div>
    </form>
  </div>
</div>