<?php 
    if(!is_user_logged_in()) {
        header("Location: ./index.php");
        exit;
    }
?>
					<div class="header">
						<h2>Welcome <?php echo strtoupper($_SESSION['username']); ?></h2>
						<hr class="line">
						<span>Update your account.</span>
					</div>
					<div class="padding-area">
						<div class="row box-item">
							<div class="col-1-1 text-center">
								<a href="my_account.php" class="btn btn-info">My Account</a>
								<a href="my_account.php?action=my-orders" class="btn btn-info">My Orders</a>
							</div>
							<div class="col-1-1">
							<?php
								$showError = editCustomerById();
								$user_info = showCustomerDataById();
							?>
							<form action="" method="post">
							    <div class="form-group">
							        <label for="username">Username:</label>
							        <input type="text" class="form-control" name="username" value="<?php echo !empty($user_info['username']) ? $user_info['username'] : ''; ?>" readonly>
							    </div>
							    <div class="form-group">
							        <label for="user_firstname">First Name:</label>
							        <input type="text" class="form-control" name="user_firstname" value="<?php echo !empty($user_info['user_firstname']) ? $user_info['user_firstname'] : ''; ?>">
							        <strong><span class="text-danger"><?php echo !empty($showError['user_firstname']) ? $showError['user_firstname'] : ''; ?></span></strong>
							    </div>
							    <div class="form-group">
							        <label for="user_lastname">Last Name:</label>
							        <input type="text" class="form-control" name="user_lastname" value="<?php echo !empty($user_info['user_lastname']) ? $user_info['user_lastname'] : ''; ?>">
							        <strong><span class="text-danger"><?php echo !empty($showError['user_lastname']) ? $showError['user_lastname'] : ''; ?></span></strong>
							    </div>
							    <div class="form-group">
							        <label for="user_email">Email:</label>
							        <input type="email" class="form-control" name="user_email" value="<?php echo !empty($user_info['user_email']) ? $user_info['user_email'] : ''; ?>" readonly>
							    </div>
							    <div class="form-group">
							        <label for="user_password">Password:</label>
							        <input type="password" class="form-control" name="user_password">
							        <strong><span class="text-danger"><?php echo !empty($showError['user_password']) ? $showError['user_password'] : ''; ?></span></strong>
							    </div>
							    <div class="form-group">
							        <label for="user_email">Biodata:</label>
							        <textarea name="user_bio" class="form-control" cols="30" rows="10" placeholder="User Biodata"><?php echo !empty($user_info['user_bio']) ? $user_info['user_bio'] : ''; ?></textarea>
							    </div>
							    <div class="form-group">
							        <label for="user_email">Contact:</label>
							        <input type="text" name="user_contact" class="form-control" value="<?php echo !empty($user_info['user_contact']) ? $user_info['user_contact'] : ''; ?>">
							    </div>
							    <div class="form-group">
							        <label for="user_email">Address:</label>
							        <textarea name="user_address" class="form-control" cols="30" rows="10" placeholder="User Address"><?php echo !empty($user_info['user_address']) ? $user_info['user_address'] : ''; ?></textarea>
							    </div>
							    <div class="form-group">
							        <input type="submit" class="btn btn-info" name="edit_user_submit" value="Update User!">
							    </div>
							</form>
							</div>
						</div>
					</div>