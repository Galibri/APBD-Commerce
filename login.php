<?php require_once('includes/header.php'); ?>
<?php 
    if(is_user_logged_in()) {
        header("Location: ./index.php");
        exit;
    }
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="main_panel">
				<?php $showError = loginUser(); ?>
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
	</div>
</div>

<?php require_once('includes/footer.php'); ?>