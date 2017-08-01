<div class="navbar navbar-fixed-top">
    <div class="navbar-inner2">
        <div class="name">
            <div class="alert alert-info2">
                Welcome:
                <?php
                $user_query = mysql_query("select * from tb_member where memberID='$ses_id'") or die(mysql_error());
                $row = mysql_fetch_array($user_query);
                echo $row['Firstname'] . " " . $row['Lastname'];
                ?>
            </div>
            <div class="btn-group">
                <a href = "logout.php" class = "btn"></i>Log out</a>
                
            </div>
            <div class="pull-right"> <a href="user_cart.php" class="btn btn-info">My Cart
                    <?php
                    $count_query = mysql_query("select * from order_details where memberID='$ses_id' and status='Pending'") or die(mysql_error());
                    $count = mysql_num_rows($count_query);
                    ?>
                    (<?php echo $count; ?>)      
                </a>

            </div>
          
            </br>



        </div>   
    </div>
</div>