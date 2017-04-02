
        
function calculateTotal()
{
	var selectedPrice = $('input[name=selectedprice]:checked').val();
	var brVraboteniPrice = $('#vraboteni_br option:selected').val();
	
	var platenPromet = $('#platenpromet');
	var obrasci = $('#obrasci');
	var kreditF = $('#kredit-f');
	var kreditL = $('#kredit-l');
	
	if (typeof selectedPrice === 'undefined') {
			
		selectedPrice = 0;
	}
	
	if (platenPromet.is(':checked')) {
		var platenPrometPrice = platenPromet.val(); 
	} else {
		var platenPrometPrice = 0;
	}
	
	if (obrasci.is(':checked')) {
		var obrasciPrice = obrasci.val(); 
	} else {
		var obrasciPrice = 0;
	}
	
	if (kreditF.is(':checked')) {
		var kreditFPrice = kreditF.val(); 
	} else {
		var kreditFPrice = 0;
	}
	
	if (kreditL.is(':checked')) {
		var kreditLPrice = kreditL.val(); 
	} else {
		var kreditLPrice = 0;
	}
	
	var totalPrice = parseInt(selectedPrice, 10) + parseInt(brVraboteniPrice, 10) + parseInt(platenPrometPrice, 10) + parseInt(obrasciPrice, 10) + parseInt(kreditFPrice, 10) + parseInt(kreditLPrice, 10);
	
	var totalPriceDiv = $('#totalPrice');
	totalPriceDiv.text('Вкупно: ' + totalPrice + 'ден.');

}
