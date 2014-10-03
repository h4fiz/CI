$('i.fa.fa-fw.fa-eye').click(function() {
	var NIP_baru = $(this).parents().parents().children().eq(1).text();
	var NIP_lama = $(this).parents().parents().children().eq(2).text();
	var Nama = $(this).parents().parents().children().eq(3).text();
	var TTL = $(this).parents().parents().children().eq(4).text();
	var jenis_kelamin =  $(this).parents().parents().children().eq(8).children().filter('input#Jenis_Kelamin').attr('value');
	var gol_darah = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Gol_Darah').attr('value');
	var no_telp = $(this).parents().parents().children().eq(8).children().filter('input#No_Telp').attr('value');
	var no_hp = $(this).parents().parents().children().eq(5).text();
	var email = $(this).parents().parents().children().eq(8).children().filter('input#Email').attr('value');
	var kelurahan = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Kelurahan').attr('value');
	var kecamatan = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Kecamatan').attr('value');
	var agama = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Agama').attr('value');
	var status = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Status_Kawin').attr('value');
	var status_PNS = $(this).parents().parents().children().eq(8).children().filter('input#Status_PNS').attr('value');
	var TMT_CPNS = $(this).parents().parents().children().eq(6).text();
	var TMT_PNS = $(this).parents().parents().children().eq(7).text();
	var jenis_tenaga = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Jenis_Tenaga').attr('value');
	var alamat = $(this).parents().parents().children().eq(8).children().filter('input#alamat').attr('value');

	//isi form
	$('td#NIP').text(NIP_baru);
	$('td#NIP_lama').text(NIP_lama);
	$('td#Nama').text(Nama);TTL
	$('td#TTL').text(TTL);
	$('td#jenis_kelamin').text(jenis_kelamin);
	$('td#gol_darah').text(gol_darah);
	$('td#no_telp').text(no_telp);
	$('td#no_hp').text(no_hp);
	$('td#email').text(email);
	$('td#kelurahan').text(kelurahan);
	$('td#kecamatan').text(kecamatan);
	$('td#Agama').text(agama);
	$('td#status').text(status);
	$('td#status_PNS').text(status_PNS);
	$('td#TMT_CPNS').text(TMT_CPNS);
	$('td#TMT_PNS').text(TMT_PNS);
	$('td#jenis_tenaga').text(jenis_tenaga);

});
$('i.fa.fa-fw.fa-edit').click(function() {
	var NIP_baru = $(this).parents().parents().children().eq(1).text();
	var NIP_lama = $(this).parents().parents().children().eq(2).text();
	var Nama = $(this).parents().parents().children().eq(3).text();
	var TTL = $(this).parents().parents().children().eq(4).text();
	var jenis_kelamin =  $(this).parents().parents().children().eq(8).children().filter('input#Jenis_Kelamin').attr('value');
	var gol_darah = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Gol_Darah').attr('value');
	var no_telp = $(this).parents().parents().children().eq(8).children().filter('input#No_Telp').attr('value');
	var no_hp = $(this).parents().parents().children().eq(5).text();
	var email = $(this).parents().parents().children().eq(8).children().filter('input#Email').attr('value');
	var kelurahan = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Kelurahan').attr('value');
	var kecamatan = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Kecamatan').attr('value');
	var agama = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Agama').attr('value');
	var status = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Status_Kawin').attr('value');
	var status_PNS = $(this).parents().parents().children().eq(8).children().filter('input#Status_PNS').attr('value');
	var TMT_CPNS = $(this).parents().parents().children().eq(6).text();
	var TMT_PNS = $(this).parents().parents().children().eq(7).text();
	var jenis_tenaga = $(this).parents().parents().children().eq(8).children().filter('input#Kd_Jenis_Tenaga').attr('value');
	var tgl_lahir = $(this).parents().parents().children().eq(8).children().filter('input#Tgl_Lahir').attr('value');
	var tempat_lahir = $(this).parents().parents().children().eq(8).children().filter('input#Tmpt_lahir').attr('value');
	var alamat = $(this).parents().parents().children().eq(8).children().filter('input#alamat').attr('value');
	var gambar_1 = $(this).parents().parents().children().eq(8).children().filter('input#Pas_Photo').attr('value');
	
	var input_file1 =   '<div class="fileinput fileinput-new" data-provides="fileinput" id="gambarform">'+
                    '<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">'+
                        '<img id="gambar_1form" src="'+gambar_1+'" />'+
                    '</div>'+
                    '<div>'+
                        '<span class="btn btn-default btn-file">'+
                            '<span class="fileinput-new">Select image</span>'+
                            '<span class="fileinput-exists">Change</span>'+
                            '<input type="file" name="pas_photo" id="pas_photo">'+
                            '<input type="hidden" name="input_hidden_gambar1" value="'+gambar_1+'" />'+
                        '</span>'+
                        '<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>'+
                    '</div>'+
                '</div>';

    $('div#gambarform').remove();
    $('#konteks').append(input_file1);
	$('#NIP_baru_org_update').val(NIP_baru);
	$('#NIP_baru_update').val(NIP_baru);
	$('#NIP_lama_update').val(NIP_lama);
	$('#nama_baru_update').val(Nama);
	$('#tempat_lahir_update').val(tempat_lahir);
	var arrayTgl_lahir = tgl_lahir.split('-');
	$('#tahun_update').val(arrayTgl_lahir[0]);
	$('#bln_update').val(arrayTgl_lahir[1]);
	$('#tgl_update').val(arrayTgl_lahir[2]);
	$('#gol_dar_update').val(gol_darah);
	$('#agama_update').val(agama);
	$('#Jenis_kelamin_update').val(jenis_kelamin);
	$('#status_kawin_update').val(status);
	$('#kecamatan_update').val(kecamatan);	
	$('#kelurahan_update').val(kelurahan);
	$('#email_update').val(email);	
	$('#alamat_update').val(alamat);
	$('#no_telp_update').val(no_telp);
	$('#no_hp_update').val(no_hp);

});

//delete
$('i.fa.fa-fw.fa-trash-o').click(function() {
	var NIP_baru = $(this).parents().parents().children().eq(1).text();
	$('#NIP_baru_delete').val(NIP_baru);
});