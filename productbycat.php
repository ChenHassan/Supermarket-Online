 <?php include 'inc/header.php'; ?>

 <?php
	if (!isset($_GET['catId'])  || $_GET['catId'] == NULL) {
		echo "<script>window.location = '404.php';  </script>";
	} else {
		$id = $_GET['catId'];
	}

	?>




 <div class="main">
 	<div class="content">
 		<div class="content_top">
 			<div class="heading">

 				<?php
					$result = $pd->productByOnlyCat($id);
					//   if ($productbycat) {
					// 	while ($result = $productbycat->fetch(PDO::FETCH_ASSOC)) {              	 


					?>

 				<h3>Latest from <?php echo $result['catName']; ?> </h3>



 			</div>
 			<div class="clear"></div>
 		</div>
 		<div class="section group">

 			<?php
				$result = $pd->productByCat($id);



				if (count($result) >  0 && is_array($result[0])) {
					foreach ($result as $r) {
				?>
 					<div class="grid_1_of_4 images_1_of_4">
 						<a href="preview.php?proid=<?php echo $r['productId']; ?>">
 							<img src="images/<?php echo $r['image']; ?>" alt="" /></a>
 						<h2><?php echo $r['productName']; ?> </h2>
 						<p><?php echo $fm->textShorten($r['body'], 60); ?></p>
 						<p><span class="price">&#8362;<?php echo $r['price']; ?></span></p>
 						<div class="button"><span><a href="preview.php?proid=<?php echo $r['productId']; ?>" class="details">Details</a></span></div>
 					</div>
 				<?php

					}
				} elseif (count($result) >  0 && !is_array($result[0])) {

					?>

 				<div class="grid_1_of_4 images_1_of_4">
 					<a href="preview.php?proid=<?php echo $result['productId']; ?>">
 						<img src="images/<?php echo $result['image']; ?>" alt="" /></a>
 					<h2><?php echo $result['productName']; ?> </h2>
 					<p><?php echo $fm->textShorten($result['body'], 60); ?></p>
 					<p><span class="price">&#8362;<?php echo $result['price']; ?></span></p>
 					<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
 				</div>
 			<?php

				} else {
					header("Location:404.php");
					// echo "Products of this category are not available";

				}  ?>

 		</div>
 	</div>



 </div>
 </div>
 </div>
 <?php include 'inc/footer.php'; ?>