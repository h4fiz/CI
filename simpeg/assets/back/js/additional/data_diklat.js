$('#datetimepicker1').datepicker({
	pickTime: false
});
$('#datetimepicker2').datepicker({
	pickTime: false
});
$('#datetimepicker3').datepicker({
	pickTime: false
});
$('#datetimepicker4').datepicker({
	pickTime: false
});
$('#datetimepicker5').datepicker({
	pickTime: false
});
$('#datetimepicker6').datepicker({
	pickTime: false
});

$('i.fa.fa-fw.fa-edit').click(function() {
	var nama_diklat = $(this).parents().parents().children().eq(1).text();
	var tgl_mulai = $(this).parents().parents().children().eq(2).text();
	var tgl_selesai = $(this).parents().parents().children().eq(3).text();
	var jumlah_jam = $(this).parents().parents().children().eq(4).text();
	var tgl_sttp = $(this).parents().parents().children().eq(5).text();
	var Jab_TTD = $(this).parents().parents().children().eq(6).text();
	var instansi = $(this).parents().parents().children().eq(7).text();
	var lokasi = $(this).parents().parents().children().eq(8).text();
	var kd_diklat =  $(this).parents().parents().children().eq(9).children().filter('input#kd_diklat').attr('value');
	var id = $(this).parents().parents().children().eq(9).children().filter('input#id_table').attr('value');

	
	$('#nama_diklat_update').val(nama_diklat);
	var arraytgl_mulai = tgl_mulai.split('-');
	$('#tgl_mulai_update').val(arraytgl_mulai[1]+'/'+arraytgl_mulai[2]+'/'+arraytgl_mulai[0]);
	var arraytgl_selesai = tgl_selesai.split('-');
	$('#tgl_selesai_update').val(arraytgl_selesai[1]+'/'+arraytgl_selesai[2]+'/'+arraytgl_selesai[0]);
	$('#jml_jam_update').val(jumlah_jam);
	var arraytgl_sttp = tgl_sttp.split('-');
	$('#tgl_STT_update').val(arraytgl_sttp[1]+'/'+arraytgl_sttp[2]+'/'+arraytgl_sttp[0]);
	$('#jabatan_TTD_update').val(Jab_TTD);
	$('#instansi_update').val(instansi);
	$('#lokasi_update').val(lokasi);
	$('#id_table_udpate').val(id);
});

$('i.fa.fa-fw.fa-trash-o').click(function() {
	/* Act on the event */
	var id = $(this).parents().parents().children().eq(9).children().filter('input#id_table').attr('value');
	alert(id);
	$('#id_table_delete').val(id);
});