
$('i.fa.fa-fw.fa-edit').click(function() {
	var nama_instansi = $(this).parents().parents().children().eq(1).text();
	var falkultas = $(this).parents().parents().children().eq(2).text();
	var Jurusan = $(this).parents().parents().children().eq(3).text();
	var tingkat_pendidikan = $(this).parents().parents().children().eq(4).text();
	var tahun_lulus = $(this).parents().parents().children().eq(5).text();
	var id = $(this).parents().parents().children().eq(6).children().filter('input#id_table').attr('value');

	$("#nama_instansi_update").val(nama_instansi);
	$("#falkultas_update").val(falkultas);
	$("#jurusan_update").val(Jurusan);
	$("#pendidikan_update").val(tingkat_pendidikan);
	$("#tahun_update").val(tahun_lulus);
	$("#tahun_org").val(tahun_lulus);
	$("#id_update").val(id);
});

$('i.fa.fa-fw.fa-trash-o').click(function() {
	var id = $(this).parents().parents().children().eq(6).children().filter('input#id_table').attr('value');
	$("#id_delete").val(id);
});