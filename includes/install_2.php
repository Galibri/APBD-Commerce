<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Install Listing Directory</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>
<?php
if(!file_exists('db.php')) {
	header("Location: install.php");
} else {
	require_once('db.php');
	require_once('../functions.php');
	createTablesInDatabase();
}
if(thereIsUser()) {
	header("Location: ../login.php");
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Configure Your Login Information</h3>
			<?php $showError = registerAdmin(); ?>
			<form action="" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" value="<?php echo empty($_POST['username']) ? '' : $_POST['username'] ?>">
                    <strong><span class="text-danger"><?php echo !empty($showError['username']) ? $showError['username'] : ''; ?></span></strong>
                </div>
                <div class="form-group">
                    <label for="user_firstname">First Name:</label>
                    <input type="text" class="form-control" name="user_firstname" value="<?php echo empty($_POST['user_firstname']) ? '' : $_POST['user_firstname'] ?>">
                    <strong><span class="text-danger"><?php echo !empty($showError['user_firstname']) ? $showError['user_firstname'] : ''; ?></span></strong>
                </div>
                <div class="form-group">
                    <label for="user_lastname">Last Name:</label>
                    <input type="text" class="form-control" name="user_lastname" value="<?php echo empty($_POST['user_lastname']) ? '' : $_POST['user_lastname'] ?>">
                    <strong><span class="text-danger"><?php echo !empty($showError['user_lastname']) ? $showError['user_lastname'] : ''; ?></span></strong>
                </div>
                <div class="form-group">
                    <label for="user_email">Email:</label>
                    <input type="email" class="form-control" name="user_email" value="<?php echo empty($_POST['user_email']) ? '' : $_POST['user_email'] ?>">
                    <strong><span class="text-danger"><?php echo !empty($showError['user_email']) ? $showError['user_email'] : ''; ?></span></strong>
                </div>
                <div class="form-group">
                    <label for="user_password">Password:</label>
                    <input type="password" class="form-control" name="user_password" value="<?php echo empty($_POST['user_password']) ? '' : $_POST['user_password'] ?>">
                    <strong><span class="text-danger"><?php echo !empty($showError['user_password']) ? $showError['user_password'] : ''; ?></span></strong>
                </div>
                <div class="form-group">
                    <label for="user_email">Biodata:</label>
                    <textarea name="user_bio" class="form-control" cols="30" rows="10" placeholder="User Biodata"></textarea>
                </div>
                <div class="form-group">
                    <label for="user_email">Contact:</label>
                    <input type="text" name="user_contact" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user_email">Address:</label>
                    <textarea name="user_address" class="form-control" cols="30" rows="10" placeholder="User Address"></textarea>
                    <strong><span class="text-danger"><?php echo !empty($showError['user_address']) ? $showError['user_address'] : ''; ?></span></strong>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" name="registration_submit" value="Register Now!">
                </div>
            </form>
		</div>
	</div>
</div>

</body>
</html>