<?php require_once('includes/header.php'); ?>
<?php
	if(!is_user_logged_in()) {
		header("Location: index.php");
	}
?>

<section id="container" class="index-page">
	<div class="wrap-container zerogrid">
		<section class="content-box box-2">
			<div class="zerogrid">
				<div class="row wrap-box"><!--Start Box-->
					<?php
						if(isset($_GET['action'])) {
							$action = $_GET['action'];
						} else {
							$action = '';
						}
						switch ($action) {
							case 'edit':
								require_once("customer-details/account_edit.php");
								break;

							case 'my-orders':
								require_once("customer-details/my_orders.php");
								break;

							case 'order-details':
								require_once("customer-details/order_details.php");
								break;
							
							default:
								require_once("customer-details/customer_details.php");
								break;
						}
					?>
				</div>
			</div>
		</section>
	</div>
</section>

<?php require_once('includes/footer.php'); ?>