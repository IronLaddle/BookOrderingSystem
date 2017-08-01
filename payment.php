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
                        
						
<div class="sidebar"></div>				
						<div id="site_content">
      <p>
      
      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
	
	<?php
		include ('admin/connect.php');
		
		
		$sql="select c.*, p.* from cart c, products p where c.productID = p.productID AND  memberID = 'abd@gmail.com' AND status ='pending'";
		$qry=mysql_query($sql);
		$serialNo=1;
		while($row=mysql_fetch_array($qry))
		{ 
		
		?>
			<input type="hidden" name="item_name_<?php echo $serialNo; ?>" 	value="<?php echo $row['product_name']; ?>"	 />
			<input type="hidden" name="amount_<?php echo $serialNo; ?>" value="<?php echo $row['product_price']; ?>" />
            <input type="hidden" name="quantity_<?php echo $serialNo; ?>" value="<?php echo $row['quantity']; ?>" />
	<?php
		$serialNo++;		
		}
	?>
<input type="hidden" name="row['.$quantity.']" value="'.$row["quantity"].'" />
<input type="hidden" name="business" value="sendukbesi0@gmail.com">
    <input type="hidden" name="currency_code" value="MYR">
    <input type="hidden" name="cancel_return" value="http://localhost/bos/paypal_cancel.php">
    <input type="hidden" name="return" value="http://localhost/bos/paypal_success.php">
    <input type="image" src="paypal_button.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="margin-left: 280px;" class="img-rounded" />
</form>


						
						
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