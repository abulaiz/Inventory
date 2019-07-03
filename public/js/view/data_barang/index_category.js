var ids = JSON.parse( $("#ids").text() );
$("#ids").remove();

function getId(e){
	var elemen = $(e.parentNode.parentNode.parentNode.children[0]).text();
	return ids[Number(elemen) - 1];
}

$(document).ready( function () {
	$('#datatables').DataTable();
});

$(".more").click(function(){
	// alert(getId(this));
	window.location = '/item/' + SimpleEnc.encrypt(getId(this));
});

$(".delete").click(function(){
	var id = SimpleEnc.encrypt(getId(this));
	_confirm(0, function(){
		$("#delete_category_form").append("<input type='hidden' name='category_id' value='"+ id +"'>");
		document.getElementById('delete_category_form').submit();
	}, "Semua data item pada kategori barang akan dihapus.");
});