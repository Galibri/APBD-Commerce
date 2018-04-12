<?php 
    if(!is_admin()) {
        header("Location: ./index.php");
        exit;
    }
?>
<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <td>Username</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Role</td>
            <td>Bio</td>
            <td>Contact</td>
            <td>Email</td>
            <td>Address</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['view'])) {
                $user_type = $_GET['view'];
            } else {
                $user_type = '';
            }
            switch ($user_type) {
                case 'admin':
                    showAdmin();
                    break;
                
                case 'employee':
                    showEmployee();
                    break;
                
                case 'customer':
                    showCustomer();
                    break;
                
                default:
                    showUsers();
                    break;
            }
        ?>
    </tbody>
</table>