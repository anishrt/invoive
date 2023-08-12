<?php
require_once './config/config.php';

include BASE_PATH.'/includes/header.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $data_to_store = array_filter($_POST);
    generatePDf($data_to_store);
}
?>
<div class="col-md-12">
  <div class="invoice-form">
    <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
		<div class="load-animate animated fadeInUp">
			<div class="row mt-5 mb-5">
				<div class="col-md-12 col-lg-12 text-center">
					<h2 class="title">POLUS Invoice System</h2>
				</div>		    		
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<th width="25%">Item Name</th>
							<th width="15%">Quantity</th>
							<th width="15%">Price</th>
              <th width="15%">Tax</th>
							<th width="15%">Total</th>
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox"></td>
							<td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>			
							<td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
							<td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
              <td>
                <select name="taxrate[]" class="form-control" id="taxrate_1">
                  <option value="0">0%</option>
                  <option value="1">1%</option>
                  <option value="5">5%</option>
                  <option value="10">10%</option>
                </select>
              </td>
							<td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
						</tr>						
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<button class="btn btn-danger delete" id="removeRows" type="button">Delete</button>
					<button class="btn btn-success" id="addRows" type="button">Add More</button>
				</div>
			</div>
			<div class="row mt-4">	
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<div class="form-group">
						<input type="hidden" value="" class="form-control" name="userId">
						<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">						
					</div>
					
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<span class="form-inline">
						<div class="form-group">
							<label>Subtotal without tax: &nbsp;</label>
							<div class="input-group">
								<span class="input-group-addon currency">$&nbsp;&nbsp;</span>
								<input value="" type="text" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
							</div>
						</div>
            <div class="form-group">
							<label>Discount %</label>
							<div class="input-group">
								<div class="input-group-addon currency">$&nbsp;&nbsp;</div>
								<input value="" type="text" class="form-control" name="discount" id="discount" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label>Subtotal with tax: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$&nbsp;&nbsp;</div>
								<input value="" type="text" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						</div>
            <div class="total-price"><p>Total price:$&nbsp;&nbsp;<span id="totPrice">0</span></p></div>
            <input type="hidden" name="totalAmountAfterDis" id="totalAmountAfterDis" value="">
					</span>
				</div>
			</div>
			<div class="clearfix"></div>		      	
		</div>
	</form>	
  </div>
</div>
<?php include BASE_PATH.'/includes/footer.php'; ?>



