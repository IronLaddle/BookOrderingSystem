<?php include('header.php'); 
ob_start();
 include('nav_menubar2.php'); 
 include('session.php'); 
 include 'admin/connect.php'; ?>
<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
        <?php
        include ('navbarfixed.php');
        ?>

        <div id="page">
            <?php include ('nav_sidebar2.php');?>
            <div id="content">
                <div class="hero-unit-table">
                    <div id="header">
                      

                    </div>
                    <div id="body">
                        <h3>Cart</h3>
                        <div class="hero-unit-table">

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Book Title</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cart_table = mysql_query("select  * from order_details where memberID='$ses_id' and status='Pending'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['orderid'];
                                        $product_id = $cart_row['productID'];
                                        $product_query = mysql_query("select * from tb_products where productID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
                                        ?>

                                        <tr>
                                            <td><?php echo $product_row['name']; ?></td>
                                            <td><?php echo $cart_row['price']; ?></td>
                                            <td><?php echo $cart_row['qty']; ?></td>
                                            <td><?php echo $cart_row['total']; ?></td>
                                            <td width="100"><a href="#orderdel<?php echo $order_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"></i>Remove</a></td>
                                        </tr>
                                        <!-- product delete modal -->
                                    <div id="orderdel<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to Remove this item?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="romove_item.php<?php echo '?id=' . $order_id; ?>" >Yes</a>
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
										
                                        </div>
                                    </div>
                                    <!-- end delete modal -->

                                <?php } ?>
		
                                </tbody>
                            </table>

                        </div>

                        <?php
                        if ($cart_count != 0) {
                            $result = mysql_query("SELECT sum(total) FROM order_details WHERE memberID='$ses_id' and status = 'Pending'") or die(mysql_error());
                            while ($rows = mysql_fetch_array($result)) {
                                ?>
                                <center> <a href="#order" role="button"  data-toggle="modal"class="btn btn-success"></i>Checkout</a></center>
								<center> <a href="user_hc12.php" role="button" >Back</a></center>
                                <div class="pull-right">
                                    <div class="span"><div class="alert alert-success"></i>Total RM:<?php echo $rows['sum(total)']; ?></div></div>
                                </div>
                            <?php }
                            ?>
                            <?php
                        }
                        ?>
                    
                        <!-- product order modal -->
                        <div id="order" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
							<div class="alert alert-info">Payment</div>
							 <div class="alert alert-danger">By Clicking Yes button, you Agree to the <strong> PAYPAL </strong></div>
							 </div>
							<div class="modal-footer">
							<a class="btn" href="pay.php<?php echo '?id='.$ses_id; ?>">Yes</a>	                          
                             <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>

                            </div>
                        </div>
                        <!-- end delete modal -->

                    </div>
                    <div id="footer">
<?php include('footer_user.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer_bottom.php'); ?>
</body>
</html>