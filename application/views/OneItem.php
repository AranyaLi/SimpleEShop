<div class="span3 product">
<?$itempage='homepageController/item/'.$ProductID?>
<a href="<?echo $itempage;?>">
<figure >

<figcaption>
<h5><? echo $ProductName?><br>
<span><? echo $ProductPrice ?></span>
<?
if($Discount<0.99){
$sale_price=$ProductPrice*$Discount;
echo '<div style="color:red">NOW:'.$sale_price.'</div>';
}
?>
</h5>
</figcaption>
<? $imagepath=base_url().'application/'.$ProductImage;?>
<img src="<?echo $imagepath; ?>"></figure>
</a>
</div>
	

