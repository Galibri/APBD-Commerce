<?php require_once("template-parts/header.php"); ?>
<div class="row">  
    <div class="col-lg-3 col-sm-6">
	    <div class="circle-tile">
	        <a href="users.php">
	            <div class="circle-tile-heading dark-blue">
	                <i class="fa fa-users fa-fw fa-3x"></i>
	            </div>
	        </a>
	        <div class="circle-tile-content dark-blue">
	            <div class="circle-tile-description text-faded">
	                All Users
	            </div>
	            <div class="circle-tile-number text-faded">
	                <?php echo totalUser(); ?>
	                <span id="sparklineA"></span>
	            </div>
	            <a href="users.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
	        </div>
	    </div>
	</div>
    <div class="col-lg-3 col-sm-6">
	    <div class="circle-tile">
	        <a href="users.php?view=admin">
	            <div class="circle-tile-heading green">
	                <i class="fa fa-users fa-fw fa-3x"></i>
	            </div>
	        </a>
	        <div class="circle-tile-content green">
	            <div class="circle-tile-description text-faded">
	                Admin
	            </div>
	            <div class="circle-tile-number text-faded">
	                <?php echo totalAdmin(); ?>
	                <span id="sparklineA"></span>
	            </div>
	            <a href="users.php?view=admin" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
	        </div>
	    </div>
	</div>
    <div class="col-lg-3 col-sm-6">
	    <div class="circle-tile">
	        <a href="users.php?view=employee">
	            <div class="circle-tile-heading orange">
	                <i class="fa fa-users fa-fw fa-3x"></i>
	            </div>
	        </a>
	        <div class="circle-tile-content orange">
	            <div class="circle-tile-description text-faded">
	                Employee
	            </div>
	            <div class="circle-tile-number text-faded">
	                <?php echo totalEmployee(); ?>
	                <span id="sparklineA"></span>
	            </div>
	            <a href="users.php?view=employee" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
	        </div>
	    </div>
	</div>
    <div class="col-lg-3 col-sm-6">
	    <div class="circle-tile">
	        <a href="users.php?view=customer">
	            <div class="circle-tile-heading blue">
	                <i class="fa fa-users fa-fw fa-3x"></i>
	            </div>
	        </a>
	        <div class="circle-tile-content blue">
	            <div class="circle-tile-description text-faded">
	                Customers
	            </div>
	            <div class="circle-tile-number text-faded">
	                <?php echo totalCustomer(); ?>
	                <span id="sparklineA"></span>
	            </div>
	            <a href="users.php?view=customer" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
	        </div>
	    </div>
	</div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-6 col-lg-offset-3">
	    <div class="circle-tile">
	        <a href="products.php">
	            <div class="circle-tile-heading gray">
	                <i class="fa fa-shopping-cart fa-fw fa-3x"></i>
	            </div>
	        </a>
	        <div class="circle-tile-content gray">
	            <div class="circle-tile-description text-faded">
	                Products
	            </div>
	            <div class="circle-tile-number text-faded">
	                <?php echo totalProducts(); ?>
	                <span id="sparklineA"></span>
	            </div>
	            <a href="products.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
	        </div>
	    </div>
	</div>
    <div class="col-lg-3 col-sm-6">
	    <div class="circle-tile">
	        <a href="category.php">
	            <div class="circle-tile-heading red">
	                <i class="fa fa-edit fa-fw fa-3x"></i>
	            </div>
	        </a>
	        <div class="circle-tile-content red">
	            <div class="circle-tile-description text-faded">
	                Category
	            </div>
	            <div class="circle-tile-number text-faded">
	                <?php echo totalCategory(); ?>
	                <span id="sparklineA"></span>
	            </div>
	            <a href="category.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
	        </div>
	    </div>
	</div>
</div>
<?php require_once("template-parts/footer.php"); ?>
