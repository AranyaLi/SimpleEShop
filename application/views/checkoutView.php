<?
$this->load->view("header");
$this->load->view("navigation");
$this->load->view("footprint");

//print_r($user); 
?>

<section id="checkout" class="main-content">
	<div class="container">
		<div class="row-fluid noborder">
<form method="post" class="form-horizontal" action="<?echo base_url()?>index.php/myorderController">


		<fieldset id="billing_details">
	<div class="span6">
		<div class="control-group ">
			<label class="control-label" for="billing_name">Name<span>*</span></label>
			<div class="controls">
				<input value="<?echo $user['FirstName'].' '.$user['LastName']?>"id="billing_name" name="billing_name" type="text" readonly> 
			</div>
		</div>

		<div class="control-group ">
			<label class="control-label" for="billing_address1">Address<span>*</span></label>
			<div class="controls">
				<input value="<?echo $user['Address']?>" id="billing_address1" name="billing_address1" type="text" readonly>
			</div>
		</div>

				</div><!--/.half -->
		<div class="span6">
		<div class="control-group ">
			<label class="control-label" for="billing_country">Select Paying Method</label>
			<div class="controls">
				<div class="styled-select"><select id="pay_method" name="billing_country"><option value="YE">Credit Card</option>
<option value="ZM">Paypal</option>
<option value="ZW">Others</option></select></div>
				
			</div>
		</div>
		</div><!--/.half -->
	</fieldset>
	<fieldset>

		<div id="shipping-details-check" class="control-group">
			<div class="controls">
				<label for="shipping_same_as_billing" class="checkbox">
					<input name="shipping_same_as_billing" value="0" type="hidden"><input id="shipping_same_as_billing" name="shipping_same_as_billing" value="1" checked="checked" type="checkbox"> Shipping details the Same as Billing Details
				</label>
			</div>
		</div>
			</fieldset>
	<div class="form-actions">
		<a href="<?echo base_url()?>index.php/cartController" class="btn btn-checkout">Back to Cart</a>
		<input name="makeorder" value="Order" class="btn btn-primary" type="submit">
	</div>
</form>
		</div><!--/.row-fluid -->
	</div><!--/.container -->
</section><!--/.main-content -->
</div>

<?
$this->load->view("footer");

?>


