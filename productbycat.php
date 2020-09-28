<?php
	include 'inc/header.php';
?>
<?php
   if(!isset($_GET['catid']) || $_GET['catid']==NULL)
   {
      echo "<script>window.location='404.php'</script>";
   }
   else
   {
       $id = $_GET['catid'];
   }
//    if ($_SERVER['REQUEST_METHOD'] === 'POST')
// 	{
// 		$catName = $_POST['catName'];
// 		$upateCat = $cat->update_category($catName, $id);
// 	}
?>
 <div class="main">
    <div class="content">
		<?php
		$name_cat = $cat->get_name_by_cat($id);
		if($name_cat){
			while($result_name = $name_cat->fetch_assoc()){
		?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Category:<?php echo $result_name['catName']?></h3>
    		</div>
    		<div class="clear"></div>
			
    	</div>
		<?php
		}}
		?>
	      <div class="section group">
		  <?php
		  $productbycat = $cat->get_product_by_cat($id);
		  if($productbycat){
			  while($result = $productbycat->fetch_assoc()){
		  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image']?>" width = "200px" alt="" /></a>
					 <h2><?php echo $result['productName']?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50); ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price']).' VND'?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']?>" class="details">Details</a></span></div>
				</div>
				<?php
				}
			}else{
				echo 'Category Not Available';
			}
				?>
			</div>

	
	
    </div>
 </div>
<?php
	include 'inc/footer.php';
?>

