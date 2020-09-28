<?php
	include 'inc/header.php';
?>
<?php
 if(isset($_GET['cartid']))
 {
	 $cartid = $_GET['cartid'];
	 $delcart = $ct->del_product_cart($cartid);
 }
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
  {
	  $cartId = $_POST['cartId'];
	  $quantity = $_POST['quantity'];
	  $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
	  if($quantity <= 0)
	  {
		$delcart = $ct->del_product_cart($cartId);
	  }
  }
  ?>
  <?php
		if(!isset($_GET['id'])){
			echo "<meta http-equiv='refresh' content='0;URL=?id=live'";
		}
  ?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
					<?php
					if(isset($update_quantity_cart)){
						echo $update_quantity_cart;
					}
					?>
					<?php
					if(isset($delcart)){
						echo $delcart;
					}
					?>
						<table class="tblone">
							<tr>
								
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Sub total</th>
								<th width="10%">Action</th>
							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart();
							
							if($get_product_cart){
								$subtotal = 0;
								$total = 0;
								$qty = 0;
								
								while($result = $get_product_cart->fetch_assoc()){
									$subtotal = $result['price']*$result['quantity'];
									$total +=$subtotal;
									
							?>
							<tr>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price'])." "."VNĐ"?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId']?>"/>
										<input type="number" name="quantity" min ="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
								
								 echo $fm->format_currency($subtotal)." "."VNĐ";
								
								 ?></td>
								<td><a onclick = "return confirm('Are you want to delete')" href="?cartid=<?php echo $result['cartId']?>">Xóa</a></td>
								
							</tr>
							<?php
								$qty = $qty + $result['quantity'];
								}
							}
							?>
						</table>
						<?php
							$check_cart= $ct->check_cart();
								if($check_cart){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Total: </th>
								<td><?php
								echo $fm->format_currency($total)." "."VNĐ";
								Session::set('sum', $total);
								Session::set('qty', $qty);

								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%(<?php echo $fm->format_currency($total*0.1)." VNĐ"?>)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
								$vat = $total * 0.1;
								$gtotal = $total + $vat;
								echo $fm->format_currency($gtotal)." "."VNĐ";
								?></td>
							</tr>
					   </table>
						<?php
						}else{
							echo 'Your Cart is Empty ! Please Shopping Now';
						}
						
						?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
?>


