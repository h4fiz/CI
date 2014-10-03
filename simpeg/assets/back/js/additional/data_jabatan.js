$('#datetimepicker1').datepicker();
$('#datetimepicker2').datepicker();
$('#datetimepicker3').datepicker();
$('#datetimepicker4').datepicker();


$('i.fa.fa-fw.fa-edit').click(function() {
	var nama_jabatan = $(this).parents().parents().children().eq(1).text();
	var eselon = $(this).parents().parents().children().eq(2).text();
	var SK_no = $(this).parents().parents().children().eq(3).text();
	var tgl_sk = $(this).parents().parents().children().eq(4).text();
	var ttd_jabatan = $(this).parents().parents().children().eq(5).text();
	var TMT = $(this).parents().parents().children().eq(6).text();
	var unit_kerja = $(this).parents().parents().children().eq(7).text();
	var id = $(this).parents().parents().children().eq(8).children().filter('input#id_table').attr('value');
	
	$('#nama_jabatan_update').val(nama_jabatan);
	$('#gol_eselon_update').val(eselon);
	var arraytTMT = TMT.split('-');
	$('#TMT_update').val(arraytTMT[1]+'/'+arraytTMT[2]+'/'+arraytTMT[0]);
	$('#unit_kerja_update').val(unit_kerja);
	$('#nomor_update').val(SK_no);
	var arraytgl_SK= tgl_sk.split('-');
	$('#tgl_SK_update').val(arraytgl_SK[1]+'/'+arraytgl_SK[2]+'/'+arraytgl_SK[0]);
	$('#jabatan_ttd_update').val(ttd_jabatan);
	$('#id_update').val(id); 

});

$('i.fa.fa-fw.fa-trash-o').click(function() {
	/* Act on the event */
	var id = $(this).parents().parents().children().eq(8).children().filter('input#id_table').attr('value');
	//alert(id);
	$('#id_table_delete').val(id);
});