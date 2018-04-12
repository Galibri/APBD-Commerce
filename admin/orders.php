<?php require_once("template-parts/header.php"); ?>
<div class="row">  
    <div class="col-md-12">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <td>Order ID</td>
                    <td>Order Date</td>
                    <td>Order Status</td>
                    <td>Action</td>
                    <td>Cancel Order</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    manageProducts();
                    updateOrderStatus()
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once("template-parts/footer.php"); ?>
