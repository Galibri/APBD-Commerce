<?php 
    if(!is_user_logged_in()) {
        header("Location: ./index.php");
        exit;
    }
?>
					<div class="header">
						<h2>Welcome <?php echo strtoupper($_SESSION['username']); ?></h2>
						<hr class="line">
						<span>Here is your account details.</span>
					</div>
					<div class="padding-area">
						<div class="row box-item">
							<div class="col-1-1 text-center">
								<a href="my_account.php" class="btn btn-info">My Account</a>
								<a href="my_account.php?action=my-orders" class="btn btn-info">My Orders</a>
							</div>
							<div class="col-1-1">
								<table class="table table-bordered">
									<thead>
										<tr>
											<td>Invoice Number</td>
											<td>Invoice Date</td>
											<td>Order Status</td>
											<td>View Details</td>
										</tr>
									</thead>
									<tbody>
										<?php
										$username = $_SESSION['username'];
										$query = "SELECT id FROM users WHERE username='$username'";
										$result = mysqli_query($connection, $query);
										$row = mysqli_fetch_assoc($result);
										$user_id = $row['id'];

										$query_order = "SELECT id, purchase_date, order_status FROM orders WHERE customer_id=$user_id";
										$result_order = mysqli_query($connection, $query_order);
										while($orders = mysqli_fetch_assoc($result_order)) {
											$invoice_id = $orders['id'];
											$order_status = $orders['order_status'];
											$purchase_date = $orders['purchase_date'];
											$invoice_full_id = "#" . str_pad($invoice_id, 8, '0', STR_PAD_LEFT);

											echo "<tr>";
											echo "<td>$invoice_full_id</td>";
											echo "<td>$purchase_date</td>";
											echo "<td>$order_status</td>";
											echo "<td><a class='btn btn-success' href='my_account.php?action=order-details&invoice_id=$invoice_id'>View Details</a></td>";
											echo "</tr>";
										}
												
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>