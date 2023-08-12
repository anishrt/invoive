jQuery(document).ready(function($){
    var count = $(".itemRow").length;
   	$(document).on('click', '#addRows', function() {
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>';                   
		htmlRows += '<td><input type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"></td>';	
		htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';   		
		htmlRows += '<td><input type="number" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"></td>';
        htmlRows += '<td><select name="taxrate[]" id="taxrate_'+count+'" class="form-control tax"><option value="0">0%</option><option value="1">1%</option><option value="5">5%</option><option value="10">10%</option></select></td>';	
		htmlRows += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';          
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
	});
    $(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
		});
	});
    $(document).on('blur', "[id^=quantity_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price_]", function(){
		calculateTotal();
	});
    $(document).on('change', "[id^=taxrate_]", function(){
		calculateTotal();
	});
     $(document).on('blur', "[id=discount]", function(){
        //alert($(this).val());
        var taxTot = $('#totalAftertax').val();
        var disc = $(this).val();
        var dec = (disc/100).toFixed(2); //its convert 10 into 0.10
        var mult = taxTot * dec; // gives the value for subtract from main value
        var finalprice = taxTot - mult;
        $('#totPrice').html(finalprice.toFixed(2));
        $('#totalAmountAfterDis').val(finalprice.toFixed(2));
	});
    
});

function calculateTotal(){
	var totalAmount = 0;
    var taxamount = 0;
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
        var tax = $('#taxrate_'+id).val();
        //alert(tax);
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total_'+id).val(parseFloat(total));
        //if(tax){
            calcPrice = (total / 100) * tax;
            discountPrice = calcPrice.toFixed(2);
        //}
        taxamount += (parseFloat(discountPrice) + parseInt(total));
		totalAmount += total;			
	});
	$('#subTotal').val(parseFloat(totalAmount));
    $('#totalAftertax').val(parseFloat(taxamount));
    $('#totPrice').html(totalAmount);
    $('#totalAmountAfterDis').val(totalAmount);
    
}
$(document).on('click', '#checkAll', function() {          	
	$(".itemRow").prop("checked", this.checked);
});