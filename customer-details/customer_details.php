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
									<tbody>
										<?php
										$username = $_SESSION['username'];
										$query = "SELECT * FROM users WHERE username='$username'";
										$result = mysqli_query($connection, $query);
										$row = mysqli_fetch_assoc($result);
												
										?>
										<tr>
											<td>Username</td>
											<td><?php echo $row['username']; ?></td>
										</tr>
										<tr>
											<td>First Name</td>
											<td><?php echo $row['user_firstname']; ?></td>
										</tr>
										<tr>
											<td>Last Name</td>
											<td><?php echo $row['user_lastname']; ?></td>
										</tr>
										<tr>
											<td>Contact</td>
											<td><?php echo $row['user_contact']; ?></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><?php echo $row['user_email']; ?></td>
										</tr>
										<tr>
											<td>Address</td>
											<td><?php echo $row['user_address']; ?></td>
										</tr>
										<tr>
											<td>Role</td>
											<td><?php echo $row['user_role']; ?></td>
										</tr>
										<tr>
											<td>Bio</td>
											<td><?php echo $row['user_bio']; ?></td>
										</tr>
										<tr>
											<td colspan="2"><a class="btn btn-info pull-right" href="my_account.php?action=edit&username=<?php echo $_SESSION['username'] ?>" class="btn btn-info">Edit My Account</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>						