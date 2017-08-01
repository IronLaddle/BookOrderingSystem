<?php include('header.php'); ?>
<?php include('admin/connect.php'); ?>
<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
        <div id="page">
            <?php include ('nav_sidebar.php');?>
            <div id="content">
                <div class="hero-unit-table"> 
                    <div id="header">
                        <img src="images/mountains.jpg" width="938" halt="" class="img-rounded">

                    </div>
                    <div id="body">


                        <h3>List of All Books</h3>
                        <p>
                        <div class="hero-unit-table">
							
							<a href = "user_hc12.php" name = "" class = "btn btn-success">HC12</a> 
							<a href = "user_hc13.php" name = "" class = "btn btn-primary">HC13</a> 			
							<a href = "user_he19.php" name = "" class = "btn btn-info">HE19</a> 
							<a href = "user_he20.php" name = "" class = "btn btn-success">HE20</a> 			
							<a href = "user_he21.php" name = "" class = "btn btn-info">HE21</a> 
							<a href = "user_he22.php" name = "" class = "btn btn-success">HE22</a> 			
							<a href = "user_he23.php" name = "" class = "btn btn-primary">HE23</a> 
							<a href = "user_general.php" name = "" class = "btn btn-success">GENERAL</a> 
						
						
						</div>
                        </p>

                        <ul class="thumbnails">
                            <?php
                            $query = mysql_query("select * from tb_products") or die(mysql_error());
                            while ($row = mysql_fetch_array($query)) {
                                $id = $row['productID'];
                                ?>

                                <li class="span3">
                                    <div class="thumbnail">
                                        <img data-src="holder.js/300x200" alt="">
                                        <div class="alert alert-info"><div class="font1"><?php echo $row['name']; ?></div></div>
                                        <hr>


                                        <a  href="#<?php echo $id; ?>"   data-toggle="modal"><img src="admin/<?php echo $row['location'] ?>" class="img-rounded" alt="" width="160" height="200"></a>


                                        <p>
                                            <p> Price: <?php echo $row['price']; ?></p>
                                        </p>




                                    </div>
                                </li>

                                <!-- picture modal -->
                                <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">

                                        <div class="span2">

                                            <img src="admin/<?php echo $row['location']; ?>" width="200" height="200" class="img-rounded">      
                                        </div>
                                        <div class="span3">
											<p>Name</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;<?php echo $row['name'] ?></div>
											<p>Description</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;<?php echo $row['description'] ?></div>
											<p>Publisher</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;<?php echo $row['originated'] ?> </div>
											<p>Price</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['price'] ?></div>
                                            
                                        </div>





                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
                                    </div>
                                </div>
                                <!-- end modal -->


                            <?php } ?>

                        </ul>






                    </div>
                    <div id="footer">
                        <?php include('footer.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('footer_bottom.php');
    ?>
</body>



</html>