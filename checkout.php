<?php require_once('includes/header.php'); ?>

<section id="container" class="index-page">
	<div class="wrap-container zerogrid">
		<section class="content-box box-2">
			<div class="zerogrid">
				<div class="row wrap-box"><!--Start Box-->
					<div class="header">
						<?php
							$total_products = array_count_values($_SESSION['cart']);
							$total_price = 0;

							$hidden_purchased_items = implode(", ", $_SESSION['cart']);

							if(isset($_POST['confirm_order'])) {
								$purchased_items = $_POST['hidden_purchased_items'];
								$hidden_id = $_POST['hidden_customer_id'];

								$select_user = "SELECT id FROM users WHERE username='$hidden_id'";
								$user_result = mysqli_query($connection, $select_user);
								$row = mysqli_fetch_assoc($user_result);
								$insert_user_id = $row['id'];

								$query = "INSERT INTO orders (customer_id, product_id_array, purchase_date) VALUES('$insert_user_id', '$purchased_items', now())";
								$result = mysqli_query($connection, $query);
								if($result) {
									unset($_SESSION['cart']);
									header("Location: my_account.php?action=my-orders");
								}
							}
						?>
						<h2>Checkout</h2>
						<hr class="line">
						<span>Confirm your order now.</span>
					</div>
					<?php if(!is_user_logged_in()) { ?>
					<div class="row flex bg-info padding-box">
						<div class="col-2-6">
							<div class="padding-area text-center">
								<h3>You must login to confirm your order. Login to your account</h3>
							</div>
						</div>
						<div class="col-2-6">
							<div class="padding-area">
								<?php $showError = loginCustomer(); ?>
								<form action="" method="post">
									<div class="form-group">
										<label for="inputUsernameEmail">Username or email</label>
										<input type="text" name="username_email" value="<?php if(isset($_POST['username_email'])) { echo $_POST['username_email'];} ?>" class="form-control" id="inputUsernameEmail">
										<p><strong><?php echo empty($showError['username_email']) ? '' : $showError['username_email']; ?></strong></p>
									</div>
									<div class="form-group">
										<label for="inputPassword">Password</label>
										<input type="password" name="password" class="form-control" id="inputPassword">
										<p><strong><?php echo empty($showError['user_password']) ? '' : $showError['user_password']; ?></strong></p>
									</div>
									<div class="checkbox pull-right">
									<label><a href="register.php">Register Now</a></label>
									</div>
									<input type="submit" class="btn btn-primary" name="login_submit" value="Log In">
								</form>
							</div>
						</div>
						<div class="col-2-6">
							<h3>Don't have an account?</h3>
							<a href="register.php" class="btn btn-info">Register for a new account here</a>
						</div>
					</div>
					<?php } ?>
					<div class="row box-item">
						<div class="col-1-6">
							.
						</div>
						<div class="col-4-6">
						<?php if(!empty($showCart)) { ?>
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>Id</td>
									<td>Name</td>
									<td>Quantity</td>
									<td>Sub Total</td>
								</tr>
							</thead>
							<tbody>
							<?php
								foreach ($total_products as $session_p_id => $session_product_count) {
									$query = "SELECT * FROM product WHERE id=$session_p_id";
									$result = mysqli_query($connection, $query);
									if(mysqli_num_rows($result) > 0) {
										while ($row = mysqli_fetch_assoc($result)) {
											$id = $row['id'];
											$name = $row['name'];
											$price = $row['price'];
											$image = $row['image'];
											$subtotal = floatval($price) * intval($session_product_count);
											$total_price += $subtotal;
											echo "<tr>";
											echo "<td>$id</td>";
											echo "<td>$name</td>";
											echo "<td>$session_product_count</td>";
											echo "<td>$subtotal</td>";
											echo "</tr>";
										}
									}
								}
							?>
								<tr>
									<td colspan='3' class='text-right'>Total Price</td>
									<td><?php echo $total_price; ?></td>
								</tr>
								<tr>
									<td colspan='7'>
										<form action="" method="post">
											<input type="hidden" name="hidden_purchased_items" value="<?php echo $hidden_purchased_items; ?>">
											<input type="hidden" name="hidden_customer_id" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
											<input type="submit" class="btn btn-danger pull-right" name="confirm_order" value="Confirm Order" <?php echo is_user_logged_in() ? '' : 'disabled'; ?>>
										</form>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="padding-area text-center">
							<h2>We accept COD (Cash on Delivery). Please pay your cash when you get your products</h2>
						</div>
						<?php } else {
							echo "Your cart is empty. <a href='index.php' class='btn btn-info'>Shop Now</a>";
						} ?>
						</div>
						<div class="col-1-6">
							
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>

<?php require_once('includes/footer.php'); ?>