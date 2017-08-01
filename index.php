<?php
include('header.php');
include('nav_menubar.php');
?>

<body>
    <?php
    include('navtop.php');
    ?>

    <div id="background">

        <div id="page">

            <?php include ('nav_sidebar.php');?>

            <div id="content">
			
                <div class="hero-unit-table">                        <!-- image slider -->
                    <div class="slider-wrapper theme-default">
                        <div id="slider" class="nivoSlider">
                            <img src="admin/images/banner1.jpg" alt="" />
                            <img src="admin/images/ums.jpg" data-thumb="images/toystory.jpg" alt="" />
                            <img src="admin/images/eco.jpg" data-thumb="images/wineries.jpg" alt="" />
                            <img src="admin/images/clearance.jpg" alt="" data-transition="slideInLeft" />
                        </div>
                    </div>
                    <!-- end slider -->
			<hr/>
			<center><h3 class = "center alert alert-success" style = "width:500px; font-weight:Bolder;">Latest Books</h3></center>
                    <div id="body">

                        <div class="body">
                            <ul>
                                <li>
								
                                    <a class="figure" href="#pic2" data-toggle = "modal" ><img class = "image-rounded"src="pics/latest/1.jpg" width='180' height='180' alt=""></a>
                                </li>
                                <li>
                                    <a class="figure" href="#pic2" data-toggle = "modal" ><img class = "image-rounded"src="pics/latest/2.jpg" width='180' height='180' alt=""></a>

                                </li>
                                <li>
                                    <a class="figure" href="#pic3" data-toggle = "modal" ><img class = "image-rounded" src="pics/latest/3.jpg" width='180' height='180' alt=""></a>

                                </li>
                                <li>
                                    <a class="figure"  href="#pic4" data-toggle = "modal" ><img class="image-rounded" src="pics/latest/4.jpg" width='180' height='180' alt=""></a>         
                                </li>

                            </ul>

                          <?php include ('modal_latest.php');?>
                        </div>

                    </div>
                    <div id="footer">
                        <?php include('footer.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer_bottom.php') ?>
</body>
</html>