<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pengalaman Organisasi => <?=$Nama?></h3>
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
                        <th>Nama Organisasi</th>
                        <th>Lokasi</th>
                        <th>Jabatan</th>
                        <th>Thn_Awal</th>
                        <th>Thn_Akhir</th>
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
                        <td><?=$data->Nama_Org;?></td>
                        <td><?=$data->Lokasi;?></td>   
                        <td><?=$data->Jabatan;?></td>
                        <td><?=$data->Thn_Awal;?></td>
                        <td><?=$data->Thn_Akhir;?></td>
                        <td>
                            <input type="hidden" name="Keterangan" id="Keterangan_table" value="<?=$data->Keterangan;?>">
                            <input type="hidden" name="id" id="id_table" value="<?=$data->Id_Org;?>">
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
    <form action="<?=base_url()?>pengalaman_organisasi/simpan/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Pengalaman Organisasi</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Nama Organisasi</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nama_org" placeholder="Isi Nama Org..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Periode</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-3">
                                    <select class="form-control input-modals" name="thn_periode_awal">
                                        <option>Tahun</option>
                                        <?php for ($i = 2014; $i >=1930 ; $i--) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-xs-1">S.d.</div>
                                <div class="col-xs-3">
                                    <select class="form-control input-modals" name="thn_periode_akhir">
                                        <option>Tahun</option>
                                        <?php for ($i = 2014; $i >=1930 ; $i--) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php } ?>
                                    </select>
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
                                    <input type="text" name="lokasi" placeholder="Isi lokasi..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jabatan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="jabatan" placeholder="Isi jabatan anda..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Keterangan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <textarea name="keterangan" class="form-control input-modals"></textarea>
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
    <form action="<?=base_url()?>pengalaman_organisasi/ubah/" enctype="multipart/form-data"  method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Pengisian Pengalaman Organisasi</h4>
      </div>
            <div class="box-body table-responsive">
                <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>Nama Organisasi</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="nama_org" id="nama_org_update" placeholder="Isi Nama Org..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Periode</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-3">
                                    <select class="form-control input-modals" name="thn_periode_awal" id="thn_periode_awal_update">
                                        <option>Tahun</option>
                                        <?php for ($i = 2014; $i >=1930 ; $i--) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-xs-1">S.d.</div>
                                <div class="col-xs-3">
                                    <select class="form-control input-modals" name="thn_periode_akhir" id="thn_periode_akhir_update">
                                        <option>Tahun</option>
                                        <?php for ($i = 2014; $i >=1930 ; $i--) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php } ?>
                                    </select>
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
                                    <input type="text" name="lokasi" id="lokasi_update" placeholder="Isi lokasi..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jabatan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="jabatan" id="jabatan_update" placeholder="Isi jabatan anda..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Keterangan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <textarea name="keterangan" id="keterangan_update" class="form-control input-modals"></textarea>
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
    <form action="<?=base_url()?>pengalaman_organisasi/hapus/" enctype="multipart/form-data"  method="POST">
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