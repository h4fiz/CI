<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form isi diklat</h3>
            </div><!-- /.box-header -->
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
                        <td align="right"><label>Nama diklat</label></td>
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
                        <td align="right"><label>Tanggal</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type="text" class="form-control" readonly="true" name="tgl_mulai"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-1">
                                    S.d.
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="nama_instansi" placeholder="Isi NIP baru..." class="form-control input-modals">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><label>Jumlah Jam</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="jumlah_jam" placeholder="Isi Nama Diklat..." class="form-control input-modals">
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">Surat Tanda Tamat</label></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Tanggal</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" name="jumlah_jam" placeholder="Isi Nama Diklat..." class="form-control input-modals">
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><label>Jabatan TTD</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-9">
                                    <input type="text" name="jabatan_TTD" placeholder="Isi Nama Diklat..." class="form-control input-modals">
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><label style="color:red;">Instansi Penyelenggara</label></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Instansi</label></td>
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
                        <td align="right"><label>Lokasi</label></td>
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
            <div class="box-footer clearfix">
                <form action="<?=base_url()?>data_diklat/form_isi/" enctype="multipart/form-data"  method="POST">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                </form>

            </div>
        </div><!-- /.box -->
    </div>
</div>