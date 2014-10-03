$('button#btncoba.btn.btn-default').click(function(event) {
	var values = $(this).parents().parents().children().children().eq(0);
	alert(values.val());
});

$('img.thmb-img').each(function(i) {
	//var values = $(this).parents().parents().parents().children().eq(1).children().eq(0);
	var srcImg = $(this).attr('src'); 
	
	if (srcImg != ''){
		var values = $(this).parents().parents().parents().children().eq(1).children().eq(0);
		//alert(i + ' ' + srcImg);
		//values.find('input#imgslider').text(i);
	}

	 /* iterate through array or object */
});

$('a.btn.btn-default.fileinput-exists').click(function() {
	var i = $(this).parents().children().children().eq(4).val();
	var inputfile = $(this).parents().children().children().eq(3);
	var imgfile = '<input type="file" name="imgslider'+ i +'" />';
	$(this).parents().children('span.btn.btn-default.btn-file').append(imgfile);
	//inputfile.removeAttr('name');
	inputfile.remove();
	alert(i);
});

$('input#uploadBtn1').change(function(index) {
	var value = $(this).val();
	var textfile = $(this).parents().parents().children();
	
	textfile.filter('input#uploadFile').val(value);
	//$('img#tmbnail-1').removeAttr( "src" );
	//$('img#tmbnail-1').attr( "src" ,value);
	data = new FormData($(this).parents('form#MyUploadForm').val());
	$.ajax({
		type: 'POST',
  		url: './admin/upload_slider/',
  		cache: false,
  		data: {imgslider : data }
	})
  	.done(function( html ) {
    	$( '#baris-1' ).append( html );
  	});
});

$("#imgslider1").change(function ()
{
	var iSize = ($("#imgslider1")[0].files[0].size / 1024);
	iSize = (Math.round((iSize / 1024) * 100) / 100);
  	$('#size1').val(iSize);
});

$("#imgslider2").change(function ()
{
	var iSize = ($("#imgslider2")[0].files[0].size / 1024);
	iSize = (Math.round((iSize / 1024) * 100) / 100);
  	$('#size2').val(iSize);
});

$("#imgslider3").change(function ()
{
	var iSize = ($("#imgslider3")[0].files[0].size / 1024);
	iSize = (Math.round((iSize / 1024) * 100) / 100);
  	$('#size3').val(iSize);
});

$('button.btn.btn-primary.btn-edit1').click(function() {
	var size1 = $('#size1').val();
	var size2 = $('#size2').val();
	var size3 = $('#size3').val();

	if(size1>2) {
		alert('data image ke 1 melebihi 2Mb');
		return false;
	}

	if(size2>2) {
		alert('data image ke 2 melebihi 2Mb');
		return false;
	}

	if(size3>2) {
		alert('data image ke 3 melebihi 2Mb');
		return false;
	}
});