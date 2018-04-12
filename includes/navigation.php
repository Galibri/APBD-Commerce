    <!--//////////////////////////////////////Menu-->
    <a href="#" class="nav-toggle">Toggle Navigation</a>
    <nav class="cmn-tile-nav">
		<ul class="clearfix">
			<li class="colour-1"><a href="index.php">Home</a></li>
			<li class="colour-2"><a href="menu.php">Menu</a></li>
			<li class="colour-3"><a href="location.php">Location</a></li>
			<li class="colour-4"><a href="blog.html">Blog</a></li>
			<li class="colour-5"><a href="reservation.php">Reservation</a></li>
			<li class="colour-6"><a href="staff.php">Our Staff</a></li>
			<li class="colour-8"><a href="gallery.html">Gallery</a></li>
			<?php
			if(is_admin()) {
				echo '<li class="colour-8"><a href="my_account.php">My Account</a></li>';
			} elseif(is_customer()) {
				echo '<li class="colour-8"><a href="my_account.php">My Account</a></li>';
			} elseif(is_employee()) {
				echo '<li class="colour-8"><a href="my_account.php">My Account</a></li>';
			} else {
				echo '<li class="colour-8"><a href="login.php">Login</a></li>';
			}

			?>
			
		</ul>
    </nav>