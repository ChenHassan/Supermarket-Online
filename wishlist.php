  <?php include 'inc/header.php'; ?>
  <?php
	$login =  Session::get("cuslogin");
	if ($login == false) {
		header("Location:login.php");
	}

	?>


  <?php
	if (isset($_GET['delwlistid'])) {
		$productId = $_GET['delwlistid'];
		$delWlist = $pd->delWlistData($cmrId, $productId);
	}

	if (isset($_GET['p'])) {

		foreach ($_GET['p'] as $p) {
			$ct->addToCart(1, $p);
			$ct->clearWishList($cmrId, $p);
		}
	}

	?>


  <div class="main">
  	<div class="content">
  		<div class="cartoption">
  			<div class="cartpage">
  				<h2>WishList </h2>
  				<form>
  					<table class="tblone">
  						<tr>
  							<th width="5%">checklist</th>
  							<th width="5%">Sl</th>
  							<th width="30%">Product Name</th>
  							<th width="10%">Image</th>
  							<th width="15%">Price</th>

  							<th width="20%">Action</th>
  						</tr>
  						<?php
							$getPd = $pd->checkWlistData($cmrId);

							if (count($getPd) > 0 && is_array($getPd[0])) {

								$i = 0;
								foreach ($getPd as $result) {



							?>
  								<tr>
  									<td><input type="checkbox" id="Product" name="p[]" value="<?php echo $result['productId'];  ?>"></td>
  									<td><?php echo $i;  ?></td>
  									<td><?php echo $result['productName'];  ?></td>
  									<td><img src="images/<?php echo $result['image']; ?>" alt="" /></td>
  									<td> &#8362; <?php echo $result['price'];  ?></td>


  									<td><a href="preview.php?proid=<?php echo $result['productId']; ?>"> View </a>
  										|| <a href="?delwlistid=<?php echo $result['productId']; ?>"> Remove </a>

  									</td>


  								</tr>


  							<?php $i++;
								}
							} elseif (is_array($getPd) && count($getPd) > 1) {

								?>



  							<tr>
  								<td><input type="checkbox" id="Product" name="p[]" value="<?php echo $getPd['productId'];  ?>"></td>


  								<td><?php echo '1';  ?></td>
  								<td><?php echo $getPd['productName'];  ?></td>
  								<td><img src="images/<?php echo $getPd['image']; ?>" alt="" /></td>
  								<td> &#8362; <?php echo $getPd['price'];  ?></td>


  								<td><a href="preview.php?proid=<?php echo $getPd['productId']; ?>"> View </a>
  									|| <a href="?delwlistid=<?php echo $getPd['productId']; ?>"> Remove </a>

  								</td>


  							</tr>


  						<?php

							}
							?>




  					</table>
  					<button type="submit">Click Me!</button>
  				</form>

  			</div>
  			<div class="shopping">
  				<div class="shopleft">
  					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
  				</div>

  			</div>
  		</div>
  		<div class="clear"></div>
  	</div>
  </div>
  </div>

  <?php include 'inc/footer.php'; ?>