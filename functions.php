<?php
require_once('./includes/db.php');

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
function is_user_logged_in() {
	if(isset($_SESSION['user_role'])) {
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


/*******************
@ Products Managment
********************/

function showProducts() {
	global $connection;
	$query = "SELECT * FROM product ORDER BY id DESC LIMIT 0, 3";
	$result = mysqli_query($connection, $query);
	confirmQuery($result);

	while($row = mysqli_fetch_assoc($result)){
		$p_id = $row['id'];
		$p_title = $row['name'];
		$p_cat = $row['category'];
		$p_price = $row['price'];
		$p_image = $row['image'];
		$p_description = $row['description'];

		echo '<div class="col-1-3">';
		echo '<div class="wrap-col">';
		echo '<div class="box-item">';
		echo '<span class="ribbon">'. getCatNameById($p_cat) .'<b></b></span>';
		echo '<img src="images/'. $p_image .'" alt="">';
		echo '<h3>'. $p_title .'</h3>';
		echo '<p>'. $p_description .'</p>';
		echo '<span class="btn btn-primary"> BDT '. $p_price .'</span>';
		echo '<a href="index.php?action=add_to_cart&p_id='. $p_id .'" class="btn btn-danger pull-right">Add To Cart</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';

	}
}

function getCatNameById($id) {
	global $connection;
	$query = "SELECT * FROM category WHERE id = $id";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Error" . mysqli_error($connection));
	}

	$row = mysqli_fetch_assoc($result);
	$cat_name = $row['category_name'];

	return $cat_name;
}



/**********************
@ login panel
**********************/
function registerCustomer() {
	global $connection;
	$error = [];
	if(isset($_POST['registration_submit'])) {
		$username 		= cleanData($_POST['username']);
		$user_firstname = cleanData($_POST['user_firstname']);
		$user_lastname 	= cleanData($_POST['user_lastname']);
		$user_email 	= cleanData($_POST['user_email']);
		$user_password 	= cleanData($_POST['user_password']);
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
		if(empty($user_address) || $user_address == '') {
			$error['user_address'] = "Address can't be empty";
		}
		if(empty($error)) {
			$query  = "INSERT INTO users (username, user_firstname, user_lastname, user_email, user_role, password, user_bio, user_contact, user_address) VALUES ('$username', '$user_firstname', '$user_lastname', '$user_email', 'customer', '$user_password', '$user_bio', '$user_contact', '$user_address' )";
			$result = mysqli_query($connection, $query);
			confirmQuery($result);
		} else {
			return $error;
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


function loginUser(){
	global $connection;
	if(isset($_SESSION['user_role']) && is_admin()) {
		header("Location: admin");
	}
	$error = [];
	if(isset($_POST['login_submit'])) {
		$username_email = cleanData($_POST['username_email']);
		$user_password 	= cleanData($_POST['password']);
		if(empty($username_email) || $username_email == '') {
			$error['username_email'] = "Please enter your username or email";
		}
		if(empty($user_password) || $user_password == '') {
			$error['user_password'] = "Please enter your password";
		}
		if(empty($error)) {
			$query = "SELECT * FROM users WHERE username = '$username_email' OR user_email = '$username_email'";
			$result = mysqli_query($connection, $query);
			$user_exists = mysqli_num_rows($result);
			if($user_exists > 0) {

				$row = mysqli_fetch_assoc($result);
				$db_username = $row['username'];
				$db_password = $row['password'];
				$user_email  = $row['user_email'];
				$user_role   = $row['user_role'];

				if($db_password == $user_password) {
						$_SESSION['user_role'] = $user_role;
						$_SESSION['username'] = $db_username;
						$_SESSION['user_email'] = $user_email;
						if($user_role == 'admin') {
							header("Location: admin");
						} elseif($user_role == 'customer') {
							header("Location: my_account.php");
						} elseif($user_role == 'employee') {
							header("Location: my_account.php");
						}
				} else {
					$error['user_password'] = "Incorrect Password";
				}
			} else {
				$error['username_email'] = "Please enter your correct username or email.";
			}
		}
	}
	return $error;
}


function loginCustomer(){
	global $connection;
	if(isset($_SESSION['user_role']) && is_admin()) {
		header("Location: admin");
	}
	$error = [];
	if(isset($_POST['login_submit'])) {
		$username_email = cleanData($_POST['username_email']);
		$user_password 	= cleanData($_POST['password']);
		if(empty($username_email) || $username_email == '') {
			$error['username_email'] = "Please enter your username or email";
		}
		if(empty($user_password) || $user_password == '') {
			$error['user_password'] = "Please enter your password";
		}
		if(empty($error)) {
			$query = "SELECT * FROM users WHERE username = '$username_email' OR user_email = '$username_email'";
			$result = mysqli_query($connection, $query);
			$user_exists = mysqli_num_rows($result);
			if($user_exists > 0) {

				$row = mysqli_fetch_assoc($result);
				$db_username = $row['username'];
				$db_password = $row['password'];
				$user_email  = $row['user_email'];
				$user_role   = $row['user_role'];

				if($db_password == $user_password) {
						$_SESSION['user_role'] = $user_role;
						$_SESSION['username'] = $db_username;
						$_SESSION['user_email'] = $user_email;
						if($user_role == 'admin') {
							header("Location: checkout.php");
						} elseif($user_role == 'customer') {
							header("Location: checkout.php");
						} elseif($user_role == 'employee') {
							header("Location: checkout.php");
						}
				} else {
					$error['user_password'] = "Incorrect Password";
				}
			} else {
				$error['username_email'] = "Please enter your correct username or email.";
			}
		}
	}
	return $error;
}

function showCustomerDataById() {
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
		$user['user_role'] 			= $row['user_role'];
		$user['user_bio'] 			= $row['user_bio'];
		$user['user_address'] 		= $row['user_address'];
		$user['user_contact'] 		= $row['user_contact'];
	}
	return $user;
}

function editCustomerById() {
	global $connection;
	$error = [];
	if(isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		if(isset($_POST['edit_user_submit'])) {
			$user_firstname = cleanData($_POST['user_firstname']);
			$user_lastname 	= cleanData($_POST['user_lastname']);
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
				$query = "UPDATE users SET password = '$user_password' WHERE username = '$username'";
				$result = mysqli_query($connection, $query);
			}
			if(empty($error)) {
				$query  = "UPDATE users SET ";
				$query .= "user_firstname = '$user_firstname', ";
				$query .= "user_lastname = '$user_lastname', ";
				$query .= "user_bio = '$user_bio', ";
				$query .= "user_contact = '$user_contact', ";
				$query .= "user_address = '$user_address' ";
				$query .= "WHERE username = '$username'";
				$result = mysqli_query($connection, $query);
				confirmQuery($result, "<h3 class='text-success'>User Updated</h3>");
			} else {
				return $error;
			}
		}
	}
}

/********************************
@ Global sessions
********************************/

function add_to_cart() {
	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	if(isset($_GET['action']) && $_GET['action'] == 'add_to_cart' && isset($_GET['p_id'])) {

		$p_id = $_GET['p_id'];
		array_push($_SESSION['cart'], $p_id);

	} elseif(isset($_GET['remove'])) {
		$p_id = $_GET['remove'];

		$_SESSION['cart'] = array_merge(array_diff($_SESSION['cart'], array($p_id)));
	}

	$added_result = implode(", ", $_SESSION['cart']);
	return $added_result;
}

function thereIsUser() {
	global $connection;
	$query = "SELECT username FROM users";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}
}


function registerAdmin() {
	global $connection;
	$error = [];
	if(isset($_POST['registration_submit'])) {
		$username 		= cleanData($_POST['username']);
		$user_firstname = cleanData($_POST['user_firstname']);
		$user_lastname 	= cleanData($_POST['user_lastname']);
		$user_email 	= cleanData($_POST['user_email']);
		$user_password 	= cleanData($_POST['user_password']);
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
		if(empty($user_address) || $user_address == '') {
			$error['user_address'] = "Address can't be empty";
		}
		if(empty($error)) {
			$query  = "INSERT INTO users (username, user_firstname, user_lastname, user_email, user_role, password, user_bio, user_contact, user_address) VALUES ('$username', '$user_firstname', '$user_lastname', '$user_email', 'admin', '$user_password', '$user_bio', '$user_contact', '$user_address' )";
			$result = mysqli_query($connection, $query);
			if($result) {
				header("Location: ../login.php");
			}
		} else {
			return $error;
		}
	}
}

function createTablesInDatabase() {
	global $connection;

	/***********************
	@ Create Category Table
	************************/
	$query = "CREATE TABLE IF NOT EXISTS category (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	category_name VARCHAR(255) NULL
	)";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Can't create table category." . mysqli_error($connection));
	}

	/***********************
	@ Create Orders Table
	************************/
	$query = "CREATE TABLE IF NOT EXISTS orders (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	customer_id int(11) NOT NULL,
	product_id_array varchar(255) NOT NULL,
	purchase_date date NOT NULL,
	order_status varchar(255) NOT NULL DEFAULT 'processing',
	payment varchar(25) DEFAULT NULL 
	)";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Can't create table orders." . mysqli_error($connection));
	}

	/***********************
	@ Create Products Table
	************************/
	$query = "CREATE TABLE IF NOT EXISTS product (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name varchar(100) NOT NULL,
	price int(11) DEFAULT NULL,
	image varchar(110) DEFAULT NULL,
	description text CHARACTER SET utf8,
	category varchar(255) DEFAULT NULL 
	)";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Can't create table product." . mysqli_error($connection));
	}

	/***********************
	@ Create Users Table
	************************/
	$query = "CREATE TABLE IF NOT EXISTS users (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	user_role varchar(255) NOT NULL,
	user_bio text,
	user_contact varchar(255) DEFAULT NULL,
	user_email varchar(255) NOT NULL,
	user_address varchar(255) DEFAULT NULL,
	user_firstname varchar(255) DEFAULT NULL,
	user_lastname varchar(255) DEFAULT NULL
	)";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Can't create table users." . mysqli_error($connection));
	}
}