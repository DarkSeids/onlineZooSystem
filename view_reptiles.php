<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <?php  

if (!isset($_SESSION['s_role'])) {
    header("Location: includes/login.php");

}

?>

 <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            	  <?php
                    $animal_per_page = 3;

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'] ;  
                    }
                    else {
                        $page = "";
                    }

                    if ($page == "" || $page == 1) {
                        $page_1 = 0;
                    }
                    else {
                        $page_1 = ($page * $animal_per_page) - $animal_per_page;
                    } 

            	

                                        $query = "SELECT *  FROM  reptiles";
                                        $select_reptile = mysqli_query($connection,$query);
                                        $count = mysqli_num_rows($select_reptile);
                                        $count = ceil($count / $animal_per_page) ;

                                         $query = "SELECT * FROM reptiles LIMIT $page_1,$animal_per_page";
                                         $select_all_reptile_query = mysqli_query($connection,$query);




                                        while ($row = mysqli_fetch_assoc($select_all_reptile_query)) {
                                        	 $reptile_id = $row['reptile_id'];
                                            $reptile_name = $row['reptile_name'];
                                            $date_of_birth = $row['date_of_birth'];
                                            $gender = $row['gender'];
                                            $life_span = $row['life_span'];
                                            $foods_and_foraging = $row['foods_and_foraging'];
                                            $natural_habit = $row['natural_habit'];
                                            $global_population = $row['global_population'];
                                            $arrived_on_zoo    =  $row['arrived_on_zoo'];
                                            $size_and_weight = $row['size_and_weight'];
                                            $gestational_period = $row['gestational_period'];
                                            $reptile_author =     $row['reptile_author'];
                                            $reptile_image = $row['reptile_image'];
                                             $reproduction_type = $row['reproduction_type'];
                                            $average_number_of_offspring = $row['average_number_of_offspring'];
                                            $average_clutch_size = $row['average_clutch_size'];

                                            if ($select_all_reptile_query == TRUE) {
                                            	
                                           ?>  
                                           
             <h4>Name : <?php echo $reptile_name; ?></h4>
             <h4>Gender : <?php echo $gender; ?></h4>
             <h5> Date Of Birth : <span class="glyphicon glyphicon-time"></span><?php echo $date_of_birth; ?></h5>
             <h4>Life Span : <?php echo $life_span; ?></h4>
             <h4>Added By : <?php echo $reptile_author; ?></h4>
             <img class="img-responsive" src="admin/images/<?php echo $reptile_image; ?>" alt="">
             <h4>Foods And Foraging : <?php echo $foods_and_foraging; ?></h4>
             <h4>Gestational Period : <?php echo $gestational_period; ?></h4>
             <h4>Size And Weight : <?php echo $size_and_weight; ?></h4>
             <h4>Global Population : <?php echo $global_population; ?></h4>
              <h4>Reproduction Type : <?php echo $reproduction_type; ?></h4>
            <h4>Average Offspring Numbers: <?php echo $average_number_of_offspring; ?></h4>
            <h4>Average Clutch Size : <?php echo $average_clutch_size; ?></h4>
              <h5> Arrived On Zoo :<span class="glyphicon glyphicon-time"></span><?php echo $arrived_on_zoo; ?></h5>



             <br> <br>




                                            <?php
                                            }
                                        }


            	?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

         <hr>


        <ul class="pager">
            <?php
                for ($i=1; $i <= $count; $i++) { 
                    if($i !== $page) {
                        echo "<li class='active'><a href='index.php?page=$i'>$i</a></li>";
                    }
                    else {
                        echo "<li><a href='index.php?page=$i'>$i</a></li>";
                    }
                    //echo $page;
                }

            ?>
        </ul>


<?php include "includes/footer.php"; ?>


                                      

                                       
                                      

                                           
                                           
                              
                                      