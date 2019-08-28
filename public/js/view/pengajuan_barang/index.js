var ids = JSON.parse( $("#ids").text() );
$("#ids").remove();
var current_id;

function getId(e){
	var idd = $(e.parentNode).data("id");
	return ids[idd-1];
}

$(document).ready( function () {
	$('#datatables').DataTable();
});

function deleted(id){
	$("#delete_submission_form").append("<input type='hidden' name='submission_id' value='"+ id +"'>");
	document.getElementById('delete_submission_form').submit();
}

$(".reject").click(function(){
	var id = SimpleEnc.encrypt( getId(this) );
	_confirm(0, function(){
		$("#reject_submission_form").append("<input type='hidden' name='submission_id' value='"+ id +"'>");
		document.getElementById('reject_submission_form').submit();
	}, "Menolak pengajuan pengadaan barang");	
});

$(".cancel").click(function(){
	var id = SimpleEnc.encrypt( getId(this) );
	_confirm(0, function(){
		deleted(id);
	}, "Membatalkan pengajuan barang");	
});

$(".understood").click(function(){
	var id = SimpleEnc.encrypt( getId(this) );
	deleted(id);
});

$(".confirm").click(function(){
	current_id = SimpleEnc.encrypt( getId(this) );
	$('.cat1').hide();
	$('.cat2').hide();
	if( $(this.parentNode.parentNode.parentNode.children[1]).text() == 'Kategori Baru' ){
		$('.cat2').show();
	} else {
		$("[name=jumlah]").val( $(this.parentNode.parentNode.parentNode.children[3]).text() );
		$('.cat1').show();
	}	
});

$("#form_confirm_submission").submit(function(){
	$("#form_confirm_submission").append("<input type='hidden' name='submission_id' value='"+ current_id +"'>");
});