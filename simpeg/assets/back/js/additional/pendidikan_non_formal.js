$('#datetimepicker1').datepicker();
$('#datetimepicker2').datepicker();
$('#datetimepicker3').datepicker();
$('#datetimepicker4').datepicker();
$('#datetimepicker5').datepicker();
$('#datetimepicker6').datepicker();

//update event
$('i.fa.fa-fw.fa-edit').click(function() {
	var nama_kursus_seminar = $(this).parents().parents().children().eq(1).text();
	var tgl_mulai = $(this).parents().parents().children().eq(2).text();
	var tgl_selesai = $(this).parents().parents().children().eq(3).text();
	var no_sertifikat = $(this).parents().parents().children().eq(4).text();
	var tgl_sertifikat = $(this).parents().parents().children().eq(5).text();
	var nama_pejabat = $(this).parents().parents().children().eq(6).text();
	var ins_penyelenggara = $(this).parents().parents().children().eq(7).text();
	var tempat = $(this).parents().parents().children().eq(8).text();
	var id = $(this).parents().parents().children().eq(9).children().filter('input#id_table').attr('value');
	
	$('#nama_kursus_seminar_update').val(nama_kursus_seminar);
	var arraytgl_mulai= tgl_mulai.split('-');
	$('#tgl_mulai_update').val(arraytgl_mulai[1]+'/'+arraytgl_mulai[2]+'/'+arraytgl_mulai[0]);
	var arraytgl_selesai= tgl_selesai.split('-');
	$('#tgl_selesai_update').val(arraytgl_selesai[1]+'/'+arraytgl_selesai[2]+'/'+arraytgl_selesai[0]);
	$('#no_sertifikat_update').val(no_sertifikat);
	var arraytgl_sertifikat= tgl_sertifikat.split('-');
	$('#tgl_sertifikat_update').val(arraytgl_sertifikat[1]+'/'+arraytgl_sertifikat[2]+'/'+arraytgl_sertifikat[0]);
	$('#nama_pejabat_update').val(nama_pejabat);
	$('#instansi_update').val(ins_penyelenggara);
	$('#tempat_update').val(tempat);
	$('#id_update').val(id); 
});


//delete event
$('i.fa.fa-fw.fa-trash-o').click(function() {
	/* Act on the event */
	var id = $(this).parents().parents().children().eq(9).children().filter('input#id_table').attr('value');
	//alert(id);
	$('#id_table_delete').val(id);
});

