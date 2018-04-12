<?php require_once(dirname(dirname(__FILE__)) . "/includes/db.php"); ?>
<?php

/*******************
@ global functions
********************/
function is_admin() {
	if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
		return true;
	} else {
		return false;
	}
}
function is_employee() {
	if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'employee') {
		return true;
	} else {
		return false;
	}
}
function is_customer() {
	if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'customer') {
		return true;
	} else {
		return false;
	}
}
function confirmQuery( $result ) {
	global $connection;
	if($result) {
		return true;
	} else {
		die("Query failed" . mysqli_error($connection));
	}
}

function cleanData( $data ) {
	global $connection;
	$data = mysqli_real_escape_string($connection, $data);
	return $data;
}

/****************
@ User Admin data
****************/
function totalUser() {
	global $connection;
	$query = "SELECT id FROM users";
	$result = mysqli_query($connection, $query);
	$total_users = mysqli_num_rows($result);

	return $total_users;
}

function totalAdmin() {
	global $connection;
	$query = "SELECT id FROM users WHERE user_role='admin'";
	$result = mysqli_query($connection, $query);
	$total_users = mysqli_num_rows($result);

	return $total_users;
}

function totalCustomer() {
	global $connection;
	$query = "SELECT id FROM users WHERE user_role='customer'";
	$result = mysqli_query($connection, $query);
	$total_users = mysqli_num_rows($result);

	return $total_users;
}

function totalEmployee() {
	global $connection;
	$query = "SELECT id FROM users WHERE user_role='employee'";
	$result = mysqli_query($connection, $query);
	$total_users = mysqli_num_rows($result);

	return $total_users;
}

function totalProducts() {
	global $connection;
	$query = "SELECT id FROM product";
	$result = mysqli_query($connection, $query);
	$total_products = mysqli_num_rows($result);

	return $total_products;
}

function totalCategory() {
	global $connection;
	$query = "SELECT id FROM category";
	$result = mysqli_query($connection, $query);
	$total_category = mysqli_num_rows($result);

	return $total_category;
}

/****************
@ User data
****************/
function showUserData() {
	global $connection;
	$user = [];
	if(isset($_SESSION['username'])) {
		$username = $_SESSION['username'];

		$query = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($connection, $query);

		$row = mysqli_fetch_assoc($result);

		$user['username'] 			= $row['username'];
		$user['user_firstname'] 	= $row['user_firstname'];
		$user['user_lastname'] 		= $row['user_lastname'];
		$user['user_email'] 		= $row['user_email'];
		$user['registered_date'] 	= $row['registered_date'];
		$user['user_role'] 			= $row['user_role'];
	}
	return $user;
}

function showUsers() {
	global $connection;
	$user = [];

	$query = "SELECT * FROM users";
	$result = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($result)){

		$user_id			= $row['id'];
		$username			= $row['username'];
		$user_firstname 	= $row['user_firstname'];
		$user_lastname		= $row['user_lastname'];
		$user_role 			= $row['user_role'];
		$user_bio 			= $row['user_bio'];
		$user_contact 		= $row['user_contact'];
		$user_email 		= $row['user_email'];
		$user_address 		= $row['user_address'];

		echo "<tr>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_role</td>";
        echo "<td>$user_bio</td>";
        echo "<td>$user_contact</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_address</td>";
        echo "<td><a href='users.php?action=edit&user_id={$user_id}' class='btn btn-info'>Edit</a></td>";
        echo "<td><a href='users.php?action=delete&user_id={$user_id}' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
	}
}

function showAdmin() {
	global $connection;
	$user = [];

	$query = "SELECT * FROM users WHERE user_role = 'admin'";
	$result = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($result)){

		$user_id			= $row['id'];
		$username			= $row['username'];
		$user_firstname 	= $row['user_firstname'];
		$user_lastname		= $row['user_lastname'];
		$user_role 			= $row['user_role'];
		$user_bio 			= $row['user_bio'];
		$user_contact 		= $row['user_contact'];
		$user_email 		= $row['user_email'];
		$user_address 		= $row['user_address'];

		echo "<tr>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_role</td>";
        echo "<td>$user_bio</td>";
        echo "<td>$user_contact</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_address</td>";
        echo "<td><a href='users.php?action=edit&user_id={$user_id}' class='btn btn-info'>Edit</a></td>";
        echo "<td><a href='users.php?action=delete&user_id={$user_id}' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
	}
}

function showEmployee() {
	global $connection;
	$user = [];

	$query = "SELECT * FROM users WHERE user_role = 'employee'";
	$result = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($result)){

		$user_id			= $row['id'];
		$username			= $row['username'];
		$user_firstname 	= $row['user_firstname'];
		$user_lastname		= $row['user_lastname'];
		$user_role 			= $row['user_role'];
		$user_bio 			= $row['user_bio'];
		$user_contact 		= $row['user_contact'];
		$user_email 		= $row['user_email'];
		$user_address 		= $row['user_address'];

		echo "<tr>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_role</td>";
        echo "<td>$user_bio</td>";
        echo "<td>$user_contact</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_address</td>";
        echo "<td><a href='users.php?action=edit&user_id={$user_id}' class='btn btn-info'>Edit</a></td>";
        echo "<td><a href='users.php?action=delete&user_id={$user_id}' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
	}
}

function showCustomer() {
	global $connection;
	$user = [];

	$query = "SELECT * FROM users WHERE user_role = 'customer'";
	$result = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($result)){

		$user_id			= $row['id'];
		$username			= $row['username'];
		$user_firstname 	= $row['user_firstname'];
		$user_lastname		= $row['user_lastname'];
		$user_role 			= $row['user_role'];
		$user_bio 			= $row['user_bio'];
		$user_contact 		= $row['user_contact'];
		$user_email 		= $row['user_email'];
		$user_address 		= $row['user_address'];

		echo "<tr>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_role</td>";
        echo "<td>$user_bio</td>";
        echo "<td>$user_contact</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_address</td>";
        echo "<td><a href='users.php?action=edit&user_id={$user_id}' class='btn btn-info'>Edit</a></td>";
        echo "<td><a href='users.php?action=delete&user_id={$user_id}' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
	}
}

function deleteUserById() {
	global $connection;
	if(is_admin()) {
		if(!firstAdmin()) {
			if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['user_id'])) {
				$user_id = $_GET['user_id'];

				$query = "DELETE FROM users WHERE id = '$user_id'";
				$result = mysqli_query($connection, $query);
				header("Location: users.php");
			}
		} else {
			header("Location: users.php");
		}
	} else {
		header("Location: ../index.php");
	}
}

function firstAdmin() {
	global $connection;
	$query = "SELECT id FROM users WHERE user_role = 'admin'";
	$result = mysqli_query($connection, $query);
	$first_admin = mysqli_num_rows($result);

	if($first_admin == 1) {
		return true;
	} else {
		return false;
	}
}


function registerUser() {
	global $connection;
	$error = [];
	if(isset($_POST['registration_submit'])) {
		$username 		= cleanData($_POST['username']);
		$user_firstname = cleanData($_POST['user_firstname']);
		$user_lastname 	= cleanData($_POST['user_lastname']);
		$user_email 	= cleanData($_POST['user_email']);
		$user_password 	= cleanData($_POST['user_password']);
		$user_role 		= cleanData($_POST['user_role']);
		$user_bio 		= cleanData($_POST['user_bio']);
		$user_contact 	= cleanData($_POST['user_contact']);
		$user_address 	= cleanData($_POST['user_address']);

		if(empty($username) || $username == '') {
			$error['username'] = "Username can't be empty";
		} elseif(username_exists($username)) {
			$error['username'] = "Username already exists. Try different one.";
		}
		if(empty($user_firstname) || $user_firstname == '') {
			$error['user_firstname'] = "First Name can't be empty";
		}
		if(empty($user_lastname) || $user_lastname == '') {
			$error['user_lastname'] = "Last Name can't be empty";
		}
		if(empty($user_email) || $user_email == '') {
			$error['user_email'] = "Email can't be empty";
		} elseif (email_exists($user_email)) {
			$error['user_email'] = "This email already signed up. Try another one.";
		}
		if(empty($user_password) || $user_password == '') {
			$error['user_password'] = "Password can't be empty";
		}
		if(empty($error)) {
			$query  = "INSERT INTO users (username, user_firstname, user_lastname, user_email, user_role, password, user_bio, user_contact, user_address) VALUES ('$username', '$user_firstname', '$user_lastname', '$user_email', '$user_role', '$user_password', '$user_bio', '$user_contact', '$user_address' )";
			$result = mysqli_query($connection, $query);
			confirmQuery($result, "<h3 class='text-success'>Registration Successful</h3>");
		} else {
			return $error;
		}
	}
}

function editUserById() {
	global $connection;
	$error = [];
	if(isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['user_id'])) {
		$user_id = $_GET['user_id'];
		if(isset($_POST['edit_user_submit'])) {
			$user_firstname = cleanData($_POST['user_firstname']);
			$user_lastname 	= cleanData($_POST['user_lastname']);
			$user_role 		= cleanData($_POST['user_role']);
			$user_password 	= cleanData($_POST['user_password']);
			$user_bio 		= cleanData($_POST['user_bio']);
			$user_contact 	= cleanData($_POST['user_contact']);
			$user_address 	= cleanData($_POST['user_address']);

			if(empty($user_firstname) || $user_firstname == '') {
				$error['user_firstname'] = "First Name can't be empty";
			}
			if(empty($user_lastname) || $user_lastname == '') {
				$error['user_lastname'] = "Last Name can't be empty";
			}
			if(!empty($user_password) || $user_password != '') {
				$query = "UPDATE users SET password = '$user_password' WHERE id = $user_id";
				$result = mysqli_query($connection, $query);
			}
			if(empty($error)) {
				$query  = "UPDATE users SET ";
				$query .= "user_firstname = '$user_firstname', ";
				$query .= "user_lastname = '$user_lastname', ";
				$query .= "user_bio = '$user_bio', ";
				$query .= "user_contact = '$user_contact', ";
				$query .= "user_address = '$user_address', ";
				$query .= "user_role = '$user_role' ";
				$query .= "WHERE id = $user_id";
				$result = mysqli_query($connection, $query);
				confirmQuery($result, "<h3 class='text-success'>User Updated</h3>");
			} else {
				return $error;
			}
		}
	}
}

function editMyProfile() {
	global $connection;
	$error = [];
	if(isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		if(isset($_POST['edit_user_submit'])) {
			$user_firstname = cleanData($_POST['user_firstname']);
			$user_lastname 	= cleanData($_POST['user_lastname']);
			$user_role 		= cleanData($_POST['user_role']);
			$user_password 	= cleanData($_POST['user_password']);

			if(empty($user_firstname) || $user_firstname == '') {
				$error['user_firstname'] = "First Name can't be empty";
			}
			if(empty($user_lastname) || $user_lastname == '') {
				$error['user_lastname'] = "Last Name can't be empty";
			}
			if(!empty($user_password) || $user_password != '') {
				$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12) );
				$query = "UPDATE users SET user_password = '$user_password' WHERE username = '$username'";
				$result = mysqli_query($connection, $query);
			}
			if(empty($error)) {
				$query  = "UPDATE users SET ";
				$query .= "user_firstname = '$user_firstname', ";
				$query .= "user_lastname = '$user_lastname', ";
				$query .= "user_role = '$user_role' ";
				$query .= "WHERE username = '$username'";
				$result = mysqli_query($connection, $query);
				confirmQuery($result, "<h3 class='text-success'>Profile Updated</h3>");
			} else {
				return $error;
			}
		}
	}
}

function username_exists($username) {
	global $connection;
	$query = "SELECT username FROM users WHERE username = '$username'";
	$result = mysqli_query($connection, $query);
	$exist_username = mysqli_num_rows($result);
	if($exist_username > 0) {
		return true;
	}
}

function email_exists($user_email) {
	global $connection;
	$query = "SELECT user_email FROM users WHERE user_email = '$user_email'";
	$result = mysqli_query($connection, $query);
	$exist_email = mysqli_num_rows($result);
	if($exist_email > 0) {
		return true;
	}
}


function showUserDataById() {
	global $connection;
	$user = [];
	if(isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['user_id'])) {
		$user_id = $_GET['user_id'];

		$query = "SELECT * FROM users WHERE id = '$user_id'";
		$result = mysqli_query($connection, $query);

		$row = mysqli_fetch_assoc($result);

		$user['username'] 			= $row['username'];
		$user['user_firstname'] 	= $row['user_firstname'];
		$user['user_lastname'] 		= $row['user_lastname'];
		$user['user_email'] 		= $row['user_email'];
		$user['user_role'] 			= $row['user_role'];
		$user['user_bio'] 			= $row['user_bio'];
		$user['user_address'] 		= $row['user_address'];
		$user['user_contact'] 		= $row['user_contact'];
	}
	return $user;
}

function showMyProfile() {
	global $connection;
	$user = [];
	if(isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_SESSION['username'])) {
		$username = $_SESSION['username'];

		$query = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($connection, $query);

		$row = mysqli_fetch_assoc($result);

		$user['username'] 			= $row['username'];
		$user['user_firstname'] 	= $row['user_firstname'];
		$user['user_lastname'] 		= $row['user_lastname'];
		$user['user_email'] 		= $row['user_email'];
		$user['registered_date'] 	= $row['registered_date'];
		$user['user_role'] 			= $row['user_role'];
	}
	return $user;
}

function userIdByUsername() {
	global $connection;
	if(isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$query = "SELECT id FROM users WHERE username = '$username'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);
		$user_id = $row['id'];

		return $user_id;
	}
}


/**************************************
@ Categories function
**************************************/
function showAllCategories() {
	global $connection;
	$query = "SELECT * FROM category";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $cat_id = $row['id'];
        $cat_title = $row['category_name'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='category.php?delete={$cat_id}' class='btn btn-danger'>Delete</a></td>";
        echo "<td><a href='category.php?edit={$cat_id}' class='btn btn-info'>Edit</a></td>";
        echo "</td>";
    }
}

function add_categories() {
	global $connection;
	if(isset($_POST['submit'])) {
        $cat_title = cleanData($_POST['cat_title']);
        if($cat_title == "" || empty($cat_title)) {
            echo "<strong class='text-danger'>This field should not be empty!</strong>";
        } else {
            $query  = "INSERT INTO category (category_name) ";
            $query .= "VALUE ('{$cat_title}') ";
            $result = mysqli_query($connection, $query);
            if(!$result) {
                die("Query Failed!" . mysqli_error($connection));
            }
        }
    }
}

function update_categories(){
	global $edit_cat, $connection;
	if(isset($_POST['update'])) {
	    $updated_cat_title = cleanData($_POST['cat_title']);
	    if($updated_cat_title == "" || empty($updated_cat_title)) {
	        echo "This field can't be empty";
	    } else {
	        $query  = "UPDATE category ";
	        $query .= "SET category_name = '{$updated_cat_title}' ";
	        $query .= "WHERE id = {$edit_cat} ";

	        $update_result = mysqli_query($connection, $query);
	        if(!$update_result) {
	            die("Query Failed!" . mysqli_error($connection));
	        }
	        header("Location: category.php");
	    }
	}
}

function delete_categories() {
	global $connection;
	if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        $query  = "DELETE FROM category ";
        $query .= "WHERE id = {$delete_id}";
        $result = mysqli_query($connection, $query);
        header("Location: category.php");
    }
}

/********************************
@ Products query
********************************/

function showProducts() {
	global $connection;
	$query = "SELECT * FROM product";
	$result = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$p_id = $row['id'];
		$p_title = $row['name'];
		$p_cat = $row['category'];
		$p_price = $row['price'];
		$p_image = $row['image'];
		$p_description = $row['description'];

		echo "<tr>";
        echo "<td>$p_title</td>";
        echo "<td>$p_cat</td>";
        echo "<td>$p_price</td>";
        echo "<td>$p_description</td>";
        echo "<td>$p_image</td>";
        echo "<td><a href='products.php?action=edit_product&p_id={$p_id}' class='btn btn-info'>Edit</a></td>";
        echo "<td><a href='products.php?action=delete_product&p_id={$p_id}' class='btn btn-danger'>Delete</a></td>";
        echo "</td>";
        echo "</tr>";
	}
}

function addNewProduct() {
	global $connection;
	if(isset($_POST['create_product'])) {
		$p_title = cleanData($_POST['product_title']);
		$p_desc = cleanData($_POST['product_details']);
		$p_cat = cleanData($_POST['product_category_id']);
		$p_price = cleanData($_POST['product_price']);

		$p_image         = $_FILES['product_image']['name'];
        $p_image_temp    = $_FILES['product_image']['tmp_name'];
        $image_path      = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . $p_image;

        move_uploaded_file($p_image_temp, $image_path);

        $query  = "INSERT INTO product (name, price, image, description, category) VALUES ('$p_title', '$p_price', '$p_image', '$p_desc', '$p_cat')";
        $result = mysqli_query($connection, $query);
        if($result) {
        	header("Location: products.php");
        }

	}
}

function getProductCategories() {
    global $connection;

    if(isset($_GET['p_id'])) {
        $edit_post_id = $_GET['p_id'];

        $query = "SELECT * FROM product WHERE id = $edit_post_id";
        $post_result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($post_result)) {
            $post_related_cat = $row['category'];
        }
    } else {
        $post_related_cat = '';
    }

    $query = "SELECT * FROM category";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $cat_id = $row['id'];
        $cat_title = $row['category_name'];
        $selected = $post_related_cat == $cat_id ? 'selected=selected' : '';
        echo "<option value='{$cat_id}' $selected>{$cat_title}</option>";
    }
}

function editProductById() {
	global $connection;
	$error = [];
	if(isset($_GET['action']) && $_GET['action'] === 'edit_product' && isset($_GET['p_id'])) {
		$p_id = $_GET['p_id'];
		if(isset($_POST['edit_product_submit'])) {
			$p_title = cleanData($_POST['product_title']);
			$p_desc = cleanData($_POST['product_details']);
			$p_cat = cleanData($_POST['product_category_id']);
			$p_price = cleanData($_POST['product_price']);

			$p_image         = $_FILES['product_image']['name'];
	        $p_image_temp    = $_FILES['product_image']['tmp_name'];
	        $image_path      = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . $p_image;

			move_uploaded_file($p_image_temp, $image_path);

	        if(empty($p_image)) {
	            $query = "SELECT * FROM product WHERE id = $p_id";
	            $image_result = mysqli_query($connection, $query);
	            while($row = mysqli_fetch_assoc($image_result)) {
	                $p_image = $row['image'];
	            }
	        }

			$query  = "UPDATE product SET ";
			$query .= "name = '$p_title', ";
			$query .= "description = '$p_desc', ";
			$query .= "category = '$p_cat', ";
			$query .= "image = '$p_image', ";
			$query .= "price = '$p_price' ";
			$query .= "WHERE id = $p_id";
			$result = mysqli_query($connection, $query);
			confirmQuery($result);
			header("Location: products.php?action=edit_product&p_id=$p_id&status=updated");
		}
	}
}

function showProductById() {
	global $connection;
	$product = [];
	if(isset($_GET['action']) && $_GET['action'] === 'edit_product' && isset($_GET['p_id'])) {
		$p_id = $_GET['p_id'];

		$query = "SELECT * FROM product WHERE id = '$p_id'";
		$result = mysqli_query($connection, $query);

		$row = mysqli_fetch_assoc($result);

		$product['name'] 		= $row['name'];
		$product['price'] 		= $row['price'];
		$product['description'] = $row['description'];
		$product['image'] 		= $row['image'];
	}
	return $product;
}

function deleteProductById() {
	global $connection;
	if(is_admin()) {
		if(isset($_GET['action']) && $_GET['action'] == 'delete_product' && isset($_GET['p_id'])) {
			$p_id = $_GET['p_id'];

			$query = "DELETE FROM product WHERE id = '$p_id'";
			$result = mysqli_query($connection, $query);
			header("Location: products.php");
		}
	} else {
		header("Location: ../index.php");
	}
}

/*********************
@ manage orders
*********************/
function manageProducts() {
	global $connection;
	$query = "SELECT * FROM orders";
	$result = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($result)) {
		$order_id = $row['id'];
		$order_date = $row['purchase_date'];
		$porducts_id = $row['product_id_array'];
		$order_status = $row['order_status'];

		if($order_status == 'complete') {
			$disabled = 'disabled';
		} else {
			$disabled = '';
		}

		echo "<tr>";
		echo "<td>$order_id</td>";
		echo "<td>$order_date</td>";
		echo "<td>$order_status</td>";
		echo "<td><a href='orders.php?action=complete&order_id=$order_id' class='btn btn-danger' $disabled>Complete Order</a></td>";
		echo "<td><a href='orders.php?action=cancel&order_id=$order_id' class='btn btn-danger' >Cancel Order</a></td>";
		echo "</tr>";
	}
}

function updateOrderStatus() {
	global $connection;
	if(isset($_GET['action']) && isset($_GET['order_id'])) {
		$order_id = $_GET['order_id'];
		$order_action = $_GET['action'];

		if($order_action == 'complete') {
			$query = "UPDATE orders SET order_status = 'complete' WHERE id=$order_id";
		} elseif($order_action == 'cancel') {
			$query = "UPDATE orders SET order_status = 'cancel' WHERE id=$order_id";
		}

		$result = mysqli_query($connection, $query);
		if($result) {
			header("Location: orders.php");
		} else {
			die(mysqli_error($connection));
		}
	}

}