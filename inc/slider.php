
<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getLastestDell = $product->getLastestDell();
				if($getLastestDell):
				while($resultdell = $getLastestDell->fetch_assoc()):
					console.log($resultdell);	
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="admin/uploads/<?php echo $resultdell['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>DELL</h2>
						<p><?php echo $resultdell['productName']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultdell['producId']?>">Add to cart</a></span></div>
				   </div>
			   </div>
			 
			   <?php
					endwhile;
			   ?>
			   <?php
			   		endif;
			   ?>
			   <?php
				$getLastestSamSung = $product->getLastestSamSung();
				if($getLastestSamSung){
				while($resultSamsung = $getLastestSamSung->fetch_assoc()){
				?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="admin/uploads/<?php echo $resultSamsung['image']?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $resultSamsung['productName']?></p>
						  <div class="button"><span><a href="preview.html">Add to cart</a></span></div>
					</div>
				</div>
				<?php
				}}
			   ?>	
			</div>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="images/pic3.jpg" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						<div class="button"><span><a href="preview.html">Add to cart</a></span></div>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="images/pic1.png" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Canon</h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="preview.html">Add to cart</a></span></div>
					</div>
				</div>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					<?php
					$get_slider = $product->show_slider();
					if($get_slider){
						while($result_slider = $get_slider->fetch_assoc()){
					?>
					<li><img src="admin/uploads/<?php echo $result_slider['slider_image']?>" alt="<?php echo $result_slider['sliderName']?>"/></li>
					<?php
						}
					}
					?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>
