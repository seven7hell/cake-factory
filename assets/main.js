$('input:radio').change(function(){
	var cost = $('input:radio[name=cost]:checked').val();
	var weight = $('input:radio[name=weight]:checked').val();
	if(cost != undefined && weight != undefined){
		$('#total').val(cost*weight);
		$(':input[type="submit"]').prop('disabled', false);
	}
});