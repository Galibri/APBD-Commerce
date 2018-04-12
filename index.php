<?php require_once('includes/header.php'); ?>
	
	<div class="zerogrid">
		<div class="callbacks_container">
			<ul class="rslides" id="slider4">
				<li>
					<img src="images/banner1.jpg" alt="">
					<div class="caption">
						<h2>We've got the best spareribs in town.</h2></br>
						<p>Nulla eget mauris quis elit mollis ornare vitae ut odio. Cras tincidunt, augue vitae sollicitudin commodo,quam elit varius est, et ornare ante massa quis tellus. Mauris nec lacinia nisl. </p>
					</div>
				</li>
				<li>
					<img src="images/banner2.jpg" alt="">
					<div class="caption">
						<h2>If food is an experience, then you'll find it at the restaurant.</h2></br>
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
					</div>
				</li>
				<li>
					<img src="images/banner3.jpg" alt="">
					<div class="caption">
						<h2>Enjoy our take-away menu.</h2></br>
						<p>At vero eos et accusam et justo duo dolores et ea rebum. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
					</div>
				</li>
			</ul>
		</div>
	</div>
	
<!--////////////////////////////////////Container-->
<section id="container" class="index-page">
	<div class="wrap-container zerogrid">
		<!-----------------content-box-1-------------------->
		<section class="content-box box-1">
			<div class="zerogrid">
				<div class="row box-item"><!--Start Box-->
					<h2>“Your awesome company slogan goes here, we have the best food around”</h2>
					<span>Unc elementum lacus in gravida pellentesque urna dolor eleifend felis eleifend</span>
				</div>
			</div>
		</section>
		<!-----------------content-box-2-------------------->
		<section class="content-box box-2 min-height-img">
			<div class="zerogrid">
				<div class="row wrap-box"><!--Start Box-->
					<div class="header">
						<h2>Welcome</h2>
						<hr class="line">
						<span>Our Menu</span>
					</div>
					<div class="row">
						<?php showProducts(); ?>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>

<?php require_once('includes/footer.php'); ?>