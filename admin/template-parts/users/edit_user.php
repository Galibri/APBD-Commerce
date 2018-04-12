<?php 
    if(!is_admin()) {
        header("Location: ./index.php");
        exit;
    }
?>
<?php 
    $showError = editUserById();
    $user_info = showUserDataById();
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
        <label for="user_role">User Role:</label>
        <?php $db_role = $user_info['user_role']; ?>
        <select class="form-control" name="user_role" id="user_role">
            <option value="admin" <?php echo $db_role == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="employee" <?php echo $db_role == 'employee' ? 'selected' : '' ?>>Employee</option>
            <option value="customer" <?php echo $db_role == 'customer' ? 'selected' : '' ?>>Customer</option>
        </select>
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