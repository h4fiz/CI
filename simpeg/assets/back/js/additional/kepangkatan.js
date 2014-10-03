$('#datetimepicker1').datepicker();
$('#datetimepicker2').datepicker();
$('#datetimepicker3').datepicker();
$('#datetimepicker4').datepicker();

//update event
$('i.fa.fa-fw.fa-edit').click(function() {
	var kd_gol = $(this).parents().parents().children().eq(1).text();
	var gaji_pokok = $(this).parents().parents().children().eq(2).text();
	var SK_no = $(this).parents().parents().children().eq(3).text();
	var tgl_sk = $(this).parents().parents().children().eq(4).text();
	var ttd_jabatan = $(this).parents().parents().children().eq(5).text();
	var TMT = $(this).parents().parents().children().eq(6).text();
	var unit_kerja = $(this).parents().parents().children().eq(7).text();
	var id_bidang = $(this).parents().parents().children().eq(8).children().filter('input#IdBidang_table').attr('value');
	var id_seksi = $(this).parents().parents().children().eq(8).children().filter('input#IdSeksi_table').attr('value');
	var id = $(this).parents().parents().children().eq(8).children().filter('input#id_table').attr('value');
	
	$('#gol_kepangkatan_update').val(kd_gol);
	$('#gaji_pokok_update').val(gaji_pokok);
	var arraytTMT = TMT.split('-');
	$('#TMT_update').val(arraytTMT[1]+'/'+arraytTMT[2]+'/'+arraytTMT[0]);bidang_update
	//$('#unit_kerja_update').val(unit_kerja);
	$('#nomor_update').val(SK_no);
	$('#bidang_update').val(id_bidang);
	
	var arraytgl_SK= tgl_sk.split('-');
	$('#tgl_SK_update').val(arraytgl_SK[1]+'/'+arraytgl_SK[2]+'/'+arraytgl_SK[0]);
	$('#jabatan_ttd_update').val(ttd_jabatan);
	$('#id_update').val(id); 

   	$.post("http://localhost/simpeg/kepangkatan/show_unit_seksi_update",{id_bidang : id_bidang, id_seksi : id_seksi},function(result){
    	$("#seksi_insert_update").html(result);
  	});

  	$('#seksi_update').val(id_seksi);
});


//delete event
$('i.fa.fa-fw.fa-trash-o').click(function() {
	/* Act on the event */
	var id = $(this).parents().parents().children().eq(8).children().filter('input#id_table').attr('value');
	//alert(id);
	$('#id_table_delete').val(id);
});

$('#bidang_insert').on('change', function() {
   var idbidang = this.value ;

   	$.post("http://localhost/simpeg/kepangkatan/show_unit_seksi",{id_bidang : idbidang},function(result){
    	$("#seksi_insert").html(result);
  	});
});

$('#bidang_update').on('change', function() {
   var idbidang = this.value ;

   	$.post("http://localhost/simpeg/kepangkatan/show_unit_seksi_update",{id_bidang : idbidang,id_seksi : '00'},function(result){
    	$("#seksi_insert_update").html(result);
  	});
});
