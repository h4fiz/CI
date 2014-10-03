//updata data staff
$('i.fa.fa-fw.fa-edit').click(function() {
	var nama = $(this).parents().children().eq(4).text();
	var jabatan = $(this).parents().children().eq(5).text();
	var deskripsi = $(this).parents().children().eq(6).text();
	var gambar_1 =  $(this).parents().children().eq(3).children().filter('img#filegambar').attr('src');
    var id_staff =  $(this).parents().children().eq(3).children().filter('input#id_staff').attr('value');


	var input_file1 =   '<div class="fileinput fileinput-new" data-provides="fileinput" id="gambarform">'+
                        '<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">'+
                            '<img id="gambar_1form" src="'+gambar_1+'" />'+
                        '</div>'+
                        '<div>'+
                            '<span class="btn btn-default btn-file">'+
                                '<span class="fileinput-new">Select image</span>'+
                                '<span class="fileinput-exists">Change</span>'+
                                '<input type="file" name="gambar">'+
                                '<input type="hidden" name="input_hidden_gambar1" value="'+gambar_1+'" />'+
                            '</span>'+
                            '<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>'+
                        '</div>'+
                    '</div>';

    $('div#gambarform').remove();
    $('#gambarform_main').append(input_file1);
	$('#nama_update').val(nama);
	$('#jabatan_update').val(jabatan);
	$('#deskripsi_update').text(deskripsi);
    $('#id_staff_update').val(id_staff);
	//var inputfile = $(this).parents().children().children().eq(3);
	//alert(nama);
});

$('i.fa.fa-fw.fa-trash-o').click(function() {
    var gambar_1 =  $(this).parents().children().eq(3).children().filter('img#filegambar').attr('src');
    var id_staff =  $(this).parents().children().eq(3).children().filter('input#id_staff').attr('value');
    $('#link_gambar_delete').val(gambar_1);
    $('#id_staff_delete').val(id_staff);
});
// //insert data staff
// $('#tambah').click(function() {
//     var input_file1 =   '<div class="fileinput fileinput-new" data-provides="fileinput" id="gambarform">'+
//                         '<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">'+
//                             '<img id="gambar_1form" src="" />'+
//                         '</div>'+
//                         '<div>'+
//                             '<span class="btn btn-default btn-file">'+
//                                 '<span class="fileinput-new">Select image</span>'+
//                                 '<span class="fileinput-exists">Change</span>'+
//                                 '<input type="file" name="gambar">'+
//                                 '<input type="hidden" name="input_hidden_gambar1" value="" />'+
//                             '</span>'+
//                             '<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>'+
//                         '</div>'+
//                     '</div>';

//     $('div#gambarform').remove();
//     $('#gambarform_main').append(input_file1);
//     $('#nama').val('');
//     $('#jabatan').val('');
//     $('#deskripsi').val('');
// });

