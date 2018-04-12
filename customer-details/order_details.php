<?php 
    if(!is_user_logged_in()) {
        header("Location: ./index.php");
        exit;
    }
?>
					<div class="header">
						<?php
							if(isset($_GET['action']) && $_GET['action']= 'order-details') {
								$get_invoice_id = $_GET['invoice_id'];
							} else {
								header("Location: customer_dtails.php");
							}
							$query = "SELECT * FROM orders WHERE id=$get_invoice_id";
							$result = mysqli_query($connection, $query);
							$row = mysqli_fetch_assoc($result);

							$product_string = $row['product_id_array'];

							$product_array = explode(", ", $product_string);

							$total_products = array_count_values($product_array);
							$total_price = 0;
						?>
						<h2>Your invoice Details</h2>
						<hr class="line">
						<span>Invoice ID: <?php echo "#" . str_pad($get_invoice_id, 8, '0', STR_PAD_LEFT); ?></span>
					</div>
					<div class="row box-item">
						<div class="col-1-1 text-center">
								<a href="my_account.php" class="btn btn-info">My Account</a>
								<a href="my_account.php?action=my-orders" class="btn btn-info">My Orders</a>
						</div>
						<div class="col-1-6">
							.
						</div>
						<div class="col-4-6">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>Id</td>
									<td>Name</td>
									<td>Image</td>
									<td>Price</td>
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
											echo "<td><img src='images/$image' alt='$image' width='60px'></td>";
											echo "<td>$price</td>";
											echo "<td>$session_product_count</td>";
											echo "<td>$subtotal</td>";
											echo "</tr>";
										}
									}
								}
							?>
								<tr>
									<td colspan='5'  class='text-right'>Total Price</td>
									<td><?php echo $total_price; ?></td>
								</tr>
							</tbody>
						</table>
						</div>
						<div class="col-1-6">
							
						</div>
					</div>