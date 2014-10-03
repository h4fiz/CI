$('i.fa.fa-fw.fa-edit').click(function() {
	var nama_org = $(this).parents().parents().children().eq(1).text();
	var lokasi = $(this).parents().parents().children().eq(2).text();
	var jabatan = $(this).parents().parents().children().eq(3).text();
	var thn_awal = $(this).parents().parents().children().eq(4).text();
	var thn_akhir = $(this).parents().parents().children().eq(5).text();
	var keterangan = $(this).parents().parents().children().eq(6).children().filter('input#Keterangan_table').attr('value');
	var id = $(this).parents().parents().children().eq(6).children().filter('input#id_table').attr('value');
	
	$('#nama_org_update').val(nama_org);
	$('#thn_periode_awal_update').val(thn_awal);
	$('#thn_periode_akhir_update').val(thn_akhir);
	$('#lokasi_update').val(lokasi);
	$('#jabatan_update').val(jabatan);
	$('#keterangan_update').val(keterangan);
	$('#id_update').val(id); 

});

$('i.fa.fa-fw.fa-trash-o').click(function() {
	/* Act on the event */
	var id = $(this).parents().parents().children().eq(6).children().filter('input#id_table').attr('value');
	//alert(id);
	$('#id_table_delete').val(id);
});