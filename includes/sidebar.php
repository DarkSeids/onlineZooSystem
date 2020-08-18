            <div class="col-md-4" style="padding-top: 10%;">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Opening Time</h4>
                    <p>Monday To Saturday</p>
                    <p>9am - 5pm</p>
                   <button> <h4><a href="booking.php">Book Your Ticket</a></h4></button>
                   
                </div>


                <!-- Login -->
                <?php

                    if (!isset($_SESSION['s_username'])) {
                        ?>
                            <div class="well">
                                <h4>Login</h4>
                                <form action="includes/login.php" method="post">

                                    
                                        <input name="username" type="text" class="form-control" placeholder="Username">
                                        <input name="password" type="password" class="form-control" placeholder="Password" style="margin-top: 10px;">

                                        <button class="btn btn-primary" name="login" style="margin-left: 130px; margin-top: 10px;">Login</button>
                                    
                                </form>
                                <!-- /.input-group -->
                            </div>
                        
                <?php } ?>

                



                <!-- Blog Categories Well -->
                <div class="well">


                    <?php 

                        $query = "SELECT *  FROM  animals_categories";
                        $select_categories_sidebar = mysqli_query($connection,$query);

                     ?>




                    <h4>Show Some Love</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">

                               <li>
                   <button class=""> <a href="sponsor.php">Sponsor Animal</a></button> 
                    </li>  

                                
                            </ul>
                        </div>

                    </div>
                
                </div>


               

            </div>