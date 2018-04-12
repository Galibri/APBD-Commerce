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
						?>
						<h2>Welcome</h2>
						<hr class="line">
						<span>Your Chosen Products</span>
					</div>
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
									<td>Image</td>
									<td>Price</td>
									<td>Quantity</td>
									<td>Action</td>
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
											echo "<td><img src='images/$image' alt='$image' width='60px'></td>";
											echo "<td>$price</td>";
											echo "<td>$session_product_count</td>";
											echo "<td><a href='cart.php?remove=$id'>Remove item</a></td>";
											echo "<td>$subtotal</td>";
											echo "</tr>";
										}
									}
								}
							?>
								<tr>
									<td colspan='6'  class='text-right'>Total Price</td>
									<td><?php echo $total_price; ?></td>
								</tr>
								<tr>
									<td colspan='7'><a href='index.php' class='pull-left btn btn-info'>Continue Shopping</a><a href='checkout.php' class='pull-right btn btn-info'>Checkout Now</a></td>
								</tr>
							</tbody>
						</table>
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