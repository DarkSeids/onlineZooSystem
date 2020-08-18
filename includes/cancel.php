<?php include "db.php"; ?>
<?php include "header.php"; ?>
    
    <!-- Navigation -->
    
<?php include"db.php" ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #182c39;" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Claybrook Zoo</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php 
                    if(isset($_SESSION['s_username'])) {
                        if ($_SESSION['s_role']=='admin') {
                            ?>
                            <li>
                                <a href="../admin/index.php"><i class="fa fa-fw fa-child"></i>Admin</a>
                            </li>
                    }
                    <?php } } ?> 

                    <li>
                        <a href="../registration.php"><i class="fa fa-fw fa-desktop"></i>Signup Here!</a>
                    </li>

<!--                     <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->

                    <?php 
                        if (isset($_SESSION['s_username'])) {
                            # code...
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 

                                if(isset($_SESSION['s_username']))
                                echo ucfirst($_SESSION['s_username']); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="../profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            
                    <?php    }
                    ?>
                    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; bbooking_-radius: 15px"> -->

    <?php

    	if (isset($_GET['booking_id'])) {
    		$booking_id_cancel = $_GET['booking_id'];
           

    		$query = "DELETE FROM bookings WHERE booking_id=$booking_id_cancel";

    		$cancel_booking_ = mysqli_query($connection,$query);

    		if (!$cancel_booking_) {
    			die("Query Failed".mysqli_error($connection));
    		}
    	}


    ?>

    <div class="container" style="width: 50%; padding-top: 10%;">
        
    	<p><h3>Your ticket stands Cancelled as per your Request</h3></p>
    	<br>
    	<p><h3>Hope To See You Soon!!</h3></p>

    </div>
        <hr>


<?php include "footer.php"; ?> 