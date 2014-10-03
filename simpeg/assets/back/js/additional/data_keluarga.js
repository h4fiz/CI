$('#datetimepicker1').datepicker();
$('#datetimepicker2').datepicker();
$('#datetimepicker3').datepicker();
$('#datetimepicker4').datepicker();


$('i.fa.fa-fw.fa-edit').click(function() {
	var nama_lengkap = $(this).parents().parents().children().eq(2).text();
	var hubungan = $(this).parents().parents().children().eq(9).children().filter('input#kd_hubkel_table').attr('value');
	var status_nikah = $(this).parents().parents().children().eq(9).children().filter('input#Kd_St_Kawin_table').attr('value');
	var jenis_kelamin = $(this).parents().parents().children().eq(9).children().filter('input#Jenis_Kelamin_table').attr('value');
	var tmpt_lahir = $(this).parents().parents().children().eq(4).text();
	var tgl_lahir = $(this).parents().parents().children().eq(5).text();
	var tgl_nikah = $(this).parents().parents().children().eq(9).children().filter('input#Tgl_Nikah_table').attr('value');
	var pendidikan = $(this).parents().parents().children().eq(9).children().filter('input#Kd_Pend_table').attr('value');
	var pekerjaan = $(this).parents().parents().children().eq(9).children().filter('input#Kd_Pekerjaan_table').attr('value');
	var keterangan = $(this).parents().parents().children().eq(9).children().filter('input#Keterangan_table').attr('value');
	var id = $(this).parents().parents().children().eq(9).children().filter('input#id_table').attr('value');
	
	$('#nama_update').val(nama_lengkap);
	$('#hub_keluarga_update').val(hubungan);
	$('#status_nikah_update').val(status_nikah);
	$('#jenis_kelamin_update').val(jenis_kelamin);
	$('#tmpt_lahir_update').val(tmpt_lahir);
	var arraytgl_lahir = tgl_lahir.split('-');
	$('#tgl_lahir_update').val(arraytgl_lahir[1]+'/'+arraytgl_lahir[2]+'/'+arraytgl_lahir[0]);
	var arraytgl_nikah = tgl_nikah.split('-');
	$('#tgl_nikah_update').val(arraytgl_nikah[1]+'/'+arraytgl_nikah[2]+'/'+arraytgl_nikah[0]);
	$('#pendidikan_update').val(pendidikan);
	$('#pekerjaan_update').val(pekerjaan);
	$('#keterangan_update').val(keterangan);
	$('#id_update').val(id); 

});

$('i.fa.fa-fw.fa-trash-o').click(function() {
	/* Act on the event */
	var id = $(this).parents().parents().children().eq(9).children().filter('input#id_table').attr('value');
	//alert(id);
	$('#id_table_delete').val(id);
});