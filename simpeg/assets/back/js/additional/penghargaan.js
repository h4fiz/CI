$('#datetimepicker1').datepicker();
$('#datetimepicker2').datepicker();
$('#datetimepicker3').datepicker();
$('#datetimepicker4').datepicker();

//update event
$('i.fa.fa-fw.fa-edit').click(function() {
	var nama_penghargaan = $(this).parents().parents().children().eq(1).text();
	var SK_no = $(this).parents().parents().children().eq(2).text();
	var tgl_sk = $(this).parents().parents().children().eq(3).text();
	var ttd_jabatan = $(this).parents().parents().children().eq(4).text();
	var ins_penyelenggara = $(this).parents().parents().children().eq(5).text();
	var lokasi = $(this).parents().parents().children().eq(6).text();
	var id = $(this).parents().parents().children().eq(7).children().filter('input#id_table').attr('value');
	
	$('#nama_penghargaan_update').val(nama_penghargaan);
	$('#nomor_update').val(SK_no);
	var arraytgl_SK= tgl_sk.split('-');
	$('#tgl_SK_update').val(arraytgl_SK[1]+'/'+arraytgl_SK[2]+'/'+arraytgl_SK[0]);
	$('#jabatan_ttd_update').val(ttd_jabatan);
	$('#instansi_update').val(ins_penyelenggara);
	$('#lokasi_update').val(lokasi);
	$('#id_update').val(id); 
});


//delete event
$('i.fa.fa-fw.fa-trash-o').click(function() {
	/* Act on the event */
	var id = $(this).parents().parents().children().eq(7).children().filter('input#id_table').attr('value');
	//alert(id);
	$('#id_table_delete').val(id);
});

