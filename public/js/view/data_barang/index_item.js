var category_id = $("#category_id").text();
$(".element-parser").remove();

var selectizes = $('.selectizes').selectize();
selectizes[0].selectize.on('change', function(){
	if(this.items[0] == 2){
		$("#units").show();
	} else {
		$("#units").hide();
		selectizes[1].selectize.clear();
	}
});

var current_id;

$("#form_add_stok").submit(function(){
	$("#form_add_stok").append("<input type='hidden' name='category_id' value='"+ SimpleEnc.encrypt(category_id) +"'>");
});

$("#form_edit_stok").submit(function(){
	$("#form_edit_stok").append("<input type='hidden' name='id' value='"+ SimpleEnc.encrypt(current_id) +"'>");
});

$("#form_update_position").submit(function(){
	$("#form_update_position").append("<input type='hidden' name='id' value='"+ current_id +"'>");
	if(selectizes[0].selectize.items.length > 0)
		$("#form_update_position").append("<input type='hidden' name='posisi_tujuan' value='"+ selectizes[0].selectize.items[0] +"'>");
	if(selectizes[1].selectize.items.length > 0)
		$("#form_update_position").append("<input type='hidden' name='unit_id' value='"+ selectizes[1].selectize.items[0] +"'>");
});

$(document).ready( function () {
	$('#datatables').DataTable();
});

$(".delete").click(function(){
	var id = SimpleEnc.encrypt( $(this.parentNode.parentNode.parentNode.children[0]).text() );
	_confirm(0, function(){
		$("#delete_item_form").append("<input type='hidden' name='item_id' value='"+ id +"'>");
		document.getElementById('delete_item_form').submit();
	}, "Data item yang dihapus tidak bisa dipulihkan.");
});

$(".edit").click(function(){
	current_id = $(this.parentNode.parentNode.parentNode.children[0]).text();
	$("[name=deskripsi]").val( $(this.parentNode.parentNode.parentNode.children[1]).text() );
	$("#edit_title").text( current_id );
});

$(".update").click(function(){
	current_id = $(this.parentNode.parentNode.parentNode.children[0]).text();
	$("#update_position_title").text( current_id );	
});