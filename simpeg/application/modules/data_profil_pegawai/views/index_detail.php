<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header clearfix">
                <h3 class="box-title"></h3>
                <ul class="nav nav-tabs" role="tablist">
                    <li><a href="<?=base_url();?>data_riwayat_pendidikan/detail/<?=$NIP;?>" role="tab">Riwayat Pendidikan</a></li>
                    <li><a href="<?=base_url();?>data_diklat/detail/<?=$NIP;?>"> Data Diklat</a></li>
                    <li><a href="<?=base_url();?>data_keluarga/detail/<?=$NIP;?>"> Data Keluarga</a></li>
                    <li><a href="<?=base_url();?>hukuman_disiplin/detail/<?=$NIP;?>"> Data Hukuman dan Disiplin</a></li>
                    <li><a href="<?=base_url();?>pengalaman_organisasi/detail/<?=$NIP;?>"> Data Penglaman organisasi</a></li>
                    <li><a href="<?=base_url();?>riwayat_dp3/detail/<?=$NIP;?>"> Riwayat DP3</a></li>
                    <li><a href="<?=base_url();?>data_jabatan/detail/<?=$NIP;?>"> Data jabatan</a></li>
                    <li><a href="<?=base_url();?>kepangkatan/detail/<?=$NIP;?>"> Kepangkatan</a></li>
                    <li><a href="<?=base_url();?>pendidikan_non_formal/detail/<?=$NIP;?>"> Data Pendidikan Non Formal</a></li>
                    <li class="active"><a href="#" role="tab" data-toggle="tab">Riwayat Pegawai</a></li>
                </ul>

            </div><!-- /.box-header -->
            <hr>
            <div class="box-body table-responsive   ">
                 <table width="100%">
                    <tr>
                        <td align="right" width="20%"><label>NIP </label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$NIP;?>
                        </td>

                        <td align="right" width="20%"><label>NIP lama </label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$NIP_Lama;?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Nama_Pegawai</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$Nama_Pegawai;?>
                        </td>

                        <td align="right" width="20%"><label>TTL </label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$Tmpt_lahir;?> , <?=$Tgl_Lahir;?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Gol Darah</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$Kd_Gol_Darah;?>
                        </td>

                        <td align="right" width="20%"><label>Agama</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$Kd_Agama;?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Jenis Kelamin</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$Jenis_Kelamin;?>
                        </td>

                        <td align="right" width="20%"><label>Status</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$Kd_Status_Kawin;?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Kelurahan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$Kd_Kecamatan;?>
                        </td>

                        <td align="right" width="20%"><label>Kecamatan</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$Kd_Kelurahan;?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Alamat</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$alamat;?>
                        </td>

                        <td align="right" width="20%"><label></label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                           
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="20%"><label>Email</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                            <?=$Email;?>
                        </td>

                        <td align="right" width="20%"><label>Kontak</label></td>
                        <td width="5%" align="center">:</td>
                        <td>
                           HP : <?=$No_HP;?> / Telp : <?=$No_Telp;?>
                        </td>
                    </tr>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
            </div>
        </div><!-- /.box -->
    </div>
</div>