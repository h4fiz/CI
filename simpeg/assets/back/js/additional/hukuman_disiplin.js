$('#datetimepicker1').datepicker();
$('#datetimepicker2').datepicker();
$('#datetimepicker3').datepicker();
$('#datetimepicker4').datepicker();
$('#datetimepicker5').datepicker();
$('#datetimepicker6').datepicker();


$('i.fa.fa-fw.fa-edit').click(function() {
	var jenis_hukuman = $(this).parents().parents().children().eq(1).text();
	var tingkat_hukuman = $(this).parents().parents().children().eq(2).text();
	var tgl_mulai = $(this).parents().parents().children().eq(3).text();
	var tgl_selesai = $(this).parents().parents().children().eq(4).text();
	var sk_no = $(this).parents().parents().children().eq(5).text();
	var sk_tgl = $(this).parents().parents().children().eq(6).text();
	var jabtan_ttd = $(this).parents().parents().children().eq(7).text();
	var id = $(this).parents().parents().children().eq(8).children().filter('input#id_table').attr('value');
	
	$('#tingkat_hukuman_update').val(tingkat_hukuman);
	$('#jenis_hukuman_update').val(jenis_hukuman);
	$('#nomor_update').val(sk_no);
	var arraysk_tgl = sk_tgl.split('-');
	$('#tgl_SK_update').val(arraysk_tgl[1]+'/'+arraysk_tgl[2]+'/'+arraysk_tgl[0]);
	$('#jabatan_ttd_update').val(jabtan_ttd);
	var arraytgl_mulai = tgl_mulai.split('-');
	$('#tgl_awal_hukuman_update').val(arraytgl_mulai[1]+'/'+arraytgl_mulai[2]+'/'+arraytgl_mulai[0]);
	var arraytgl_selesai = tgl_selesai.split('-');
	$('#tgl_selesai_hukuman_update').val(arraytgl_selesai[1]+'/'+arraytgl_selesai[2]+'/'+arraytgl_selesai[0]);
	$('#id_update').val(id); 

});

$('i.fa.fa-fw.fa-trash-o').click(function() {
	/* Act on the event */
	var id = $(this).parents().parents().children().eq(8).children().filter('input#id_table').attr('value');
	//alert(id);
	$('#id_table_delete').val(id);
});
