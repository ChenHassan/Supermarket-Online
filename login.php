  <?php include 'inc/header.php'; ?>

  <?php
	$login =  Session::get("cuslogin");
	if ($login == true) {
		header("Location:order.php");
	}

	?>


  <?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

		$customLogin = $cmr->customerLogin($_POST);
	}

	?>




  <div class="main">
  	<div class="content">
  		<div class="login_panel">


  			<?php
				if (isset($customLogin)) {
					echo $customLogin;
				}

				?>

  			<h3>Existing Customers</h3>
  			<p>Sign in with the form below.</p>

  			<form action=" " method="post">
  				<input name="email" placeholder="Email" type="text">
  				<input name="pass" placeholder="Password" type="password">
  				<div class="buttons">
  					<div><button class="grey" name="login">Sign In</button></div>
  				</div>
  		</div>

  		</form>



  		<?php

			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

				$customerReg = $cmr->customerRegistration($_POST);
			}

			?>


  		<?php
			if (isset($customerReg)) {
				echo $customerReg;
			}

			?>


  		<div class="register_account">
  			<h3>Register New Account</h3>
  			<form action="login.php" method="post">
  				<table>
  					<tbody>
  						<tr>
  							<td>
  								<div>
  									<input type="text" name="name" placeholder="Name" value="nancy" />
  								</div>

  								<div>
  									<input type="text" name="city" placeholder="city" value="city" />
  								</div>

  								<div>
  									<input type="text" name="zip" placeholder="Zip" value="12321" />
  								</div>
  								<div>
  									<input type="text" name="email" placeholder="Email" value="email@gmailk.com" />
  								</div>
  							</td>
  							<td>
  								<div>
  									<input type="text" name="address" placeholder="Address" value="iblen" />
  								</div>
  								<div>
  									<input type="text" name="country" placeholder="Country" value="israel" />
  								</div>

  								<div>
  									<input type="text" name="phone" placeholder="Phone" value="053454" />
  								</div>

  								<div>
  									<input type="text" name="pass" placeholder="password" value="1234" />
  								</div>
  							</td>
  						</tr>
  					</tbody>
  				</table>
  				<div class="search">
  					<div><button class="grey" name="register">Create Account</button></div>
  				</div>
  				<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
  				<div class="clear"></div>
  			</form>
  		</div>
  		<div class="clear"></div>
  	</div>
  </div>
  </div>
  <?php include 'inc/footer.php'; ?>