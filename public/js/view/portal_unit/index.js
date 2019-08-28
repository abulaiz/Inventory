var ids = JSON.parse($("#ids").text());
$("#ids").remove();

$(".btn-sm").click(function(){
	var id = SimpleEnc.encrypt( ids[Number( $(this).data("id") - 1 )] );
	window.location = '/unit/item/' + id;
});

$(document).ready( function () {
	$('#datatables').DataTable({"order": [[ 0, 'desc' ]]});
});  