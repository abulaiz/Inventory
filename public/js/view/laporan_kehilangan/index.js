$(document).ready( function () {
	$('#datatables').DataTable( {"order": [[ 0, 'desc' ]]} );
});

$(".delete").click(function(){
	var id = SimpleEnc.encrypt( $(this.parentNode.parentNode.parentNode.children[2]).text() );
	_confirm(1, function(){
		$("#delete_item_form").append("<input type='hidden' name='item_id' value='"+ id +"'>");
		document.getElementById('delete_item_form').submit();
	}, "Data item yang dihapus tidak bisa dipulihkan.");
});

$(".cancel").click(function(){
	var id = SimpleEnc.encrypt( $(this.parentNode.parentNode.parentNode.children[2]).text() );
	_confirm(1, function(){
		$("#cancel_report_form").append("<input type='hidden' name='item_id' value='"+ id +"'>");
		document.getElementById('cancel_report_form').submit();
	}, "Laporan kehilangan dibatalkan.");
});

$(".history").click(function(){
	window.location = '/history/' + SimpleEnc.encrypt( $(this.parentNode.parentNode.parentNode.children[2]).text() );
});