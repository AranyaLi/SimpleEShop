<?
$this->load->view("header");
$this->load->view("navigation");
$this->load->view("footprint");

?>

<section id="checkout" class="main-content">
	<div class="container">
		<div class="row-fluid noborder">

<form name="form_cart" method="post" action="getorder.php" class="form-horizontal">
<input type="hidden" name="showorderid">
 	<table class="table">
		<thead>
			<tr>
				<th style="width:25%">Order#</th>
				<th style="width:25%">ProductID</th>
				<th style="width:5%">ProductQty</th>
				<th style="width:25%;text-align:right">ProductPrice</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($products as $row){                          
                                
             			echo'	<tr>
					<td>
						<h5><a href="">'.$row['OrderID'].'</a></h5>

					</td>
					<td>'.$row['ProductID'].'</td>
					<td>'.$row['ProductQty'].'</td>

					<td style="text-align:right">'.$row['ProductPrice'].' </td>
				</tr>';	}	 

				echo'	</tbody>
				</table>';	

			?>
<a href="<?echo base_url()?>index.php/myorderController"
class="btn btn-checkout">Back to My Order</a>
	
        </form>
	</div><!--/.row-fluid -->
	</div><!--/.container -->
</section><!--/.main-content -->

