$('i.fa.fa-fw.fa-edit').click(function() {
	var tahun = $(this).parents().parents().children().eq(1).text();
	var nilai = $(this).parents().parents().children().eq(2).text();
	alert(tahun);
	var NIP_Pj_Penilai = $(this).parents().parents().children().eq(3).text();
	var NIP_At_Pj_Penilai = $(this).parents().parents().children().eq(4).text();
	var id = $(this).parents().parents().children().eq(5).children().filter('input#id_table').attr('value');
	
	$('#tahun_update').val(tahun);
	$('#nilai_update').val(nilai);
	$('#NIP_Pj_Penilai_update').val(NIP_Pj_Penilai);
	$('#NIP_At_Pj_Penilai_update').val(NIP_At_Pj_Penilai);
	$('#id_update').val(id); 

});

$('i.fa.fa-fw.fa-trash-o').click(function() {
	/* Act on the event */
	var id = $(this).parents().parents().children().eq(5).children().filter('input#id_table').attr('value');
	//alert(id);
	$('#id_table_delete').val(id);
});