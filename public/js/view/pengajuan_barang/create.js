var selectizes = $('.selectizes').selectize();

selectizes[0].selectize.on('change', function(){
	$(".cat1").hide();
	$(".cat2").hide();
	if(this.items[0] == 1){
		$(".cat1").show();
	} else {
		$(".cat2").show();
	}
});