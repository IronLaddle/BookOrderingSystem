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
                 <div id="site_content">
      <div id="content" style="width: 974px; border: 3px solid #d0d0d0; border-radius: 4px; padding:5px; margin-top: 70px; margin-right: 5px;">
<form method="post">
<?php
include ('admin/connect.php');
if (isset($_SESSION['cart']))
	{	
	echo "<table cellpadding='5' cellspacing='5' style='width:100%;'>";
	
		echo "<tr style='color:#ff0000;'>";
		echo "<td align='center'>Image</td>";
		echo "<td align='center'>Product Name</td>";
		echo "<td align='center'>Brand</td>";
		echo "<td align='center'>Quantity</td>";
		echo "<td align='center'>Subtotal</td>";
		echo "</tr>";
	$total=0;
	foreach($_SESSION['cart'] as $product_id => $x)
	{
	$result=mysql_query("Select * from order_details where productID=$product_id");
	$myrow=mysql_fetch_array($result);
	$name=$myrow['name'];
	$name=substr($name,0,40);
	$price=$myrow['price'];
	$image=$myrow['location'];
	$line_cost=$price*$x;
	$total=$total+$line_cost;
	
	
		echo "<tr style='color:black'>";
		echo "<td align='center'><br /><img style ='border-radius:500px ;'height='75px' width='75px' src='".'admin/'.$myrow['location']."'></td>";
		echo "<td align='center'>$name</td>";
		echo "<td align='center'>$x</td>";
		echo "<td align='center'>= RM $line_cost.00";
		echo "</tr>";
		}
		echo "<tr style='color:#ff0000;'>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td align='center'>Total</td>";
		echo "<td align='center'><b>= RM $total.00</b></td>";
		echo "</tr>";
		
		echo "<td></td>";
		echo "<td align='center'></td>";
		echo "<td align='center'><br /><input type='submit' name='save' value='Check Out' style='width:100px; font-size:18px; border-radius:8px; color:#fff; background-color:#000; border:1px solid #000;' /></td>";
		echo "</tr>";
		echo "</table>";
	}
 	else
		echo "<font color='#000000'><h3><b>Cart is empty</b></h3><br /><a href='hc12.php'><input type='button' class='link1' value='Back' style='width:70px; height:35px; font-size:15px;'></a></font>";

				?>
  

				<?php
				if (isset($_POST['save']))
				{
				$member_id=$_SESSION['is']['memberID'];
				$result=mysql_query("Select * from order_details where memberID='$ses_id'");
				$myrow=mysql_fetch_array($result);	
				foreach($_SESSION['cart'] as $product_id => $x)
				{
				$result=mysql_query("Select * from tb_products where productID=$product_id");
				$myrow=mysql_fetch_array($result);
				$product_id=$myrow['productID'];
				$name=$myrow['name'];
				$name=substr($name,0,40);
				$price=$myrow['price'];
				$image=$myrow['location'];
				$line_cost=$price*$x;
				$date = date ("M d, y");
				$member_id="hafizul@yahoo.com";
	        
				mysql_query("insert into order_details (memberID,productID,quantity,date,total, status) values('$member_id','$product_id','$x','$date','$line_cost', 'pending') ")or die(mysql_error());
				echo "<script>alert('Your order has been processed!'); window.location='payment.php'</script>";	
				unset($_SESSION['cart'][$product_id]);
				unset($_SESSION['is'][$member_id]);
				}
		
				}
				?>


</form>
	  
	  </div>
    </div>
				 
				 
				 
				 

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