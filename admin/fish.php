 <?php 
include "../includes/db.php";
include"includes/admin_header.php"; ?>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?> 

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcone To Admin
                            <small>Author</small>
                        </h1>


                        <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'add_fish':
                                include "includes/add_fish.php";
                                break;
                            
                            case 'update_fish':
                                include "includes/update_fish.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>fish_id</th>
                                        <th>fish name</th>
                                        <th>Date Of Birth</th>
                                        <th>Gender</th>
                                        <th>Life Span</th>
                                        <th>Foods And Foraging</th>
                                        <th>Natural Habit</th>
                                        <th>Global Population</th>
                                        <th>Size And Weight</th>
                                        <th>Gestational Period</th>
                                        <th>fish Author</th>
                                        <th>Image</th>
                                        <th>Options</th>
                                    </tr>
                                       
                                       
                                       
                                       
                                       
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  fish";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $fish_id = $row['fish_id'];
                                            $fish_name = $row['fish_name'];
                                            $date_of_birth = $row['date_of_birth'];
                                            $gender = $row['gender'];
                                            $life_span = $row['life_span'];
                                            $foods_and_foraging = $row['foods_and_foraging'];
                                            $natural_habit = $row['natural_habit'];
                                            $global_population = $row['global_population'];
                                            $size_and_weight = $row['size_and_weight'];
                                            $gestational_period = $row['gestational_period'];
                                            $fish_author =     $row['fish_author'];
                                            $fish_image = $row['fish_image'];
                                           
                                           
                                        if ($select_posts == TRUE) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $fish_id ?></td>
                                        <td><?php echo $fish_name ?></td>
                                        <td><?php echo $date_of_birth ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $life_span ?></td>
                                        <td><?php echo $foods_and_foraging ?></td>
                                        <td><?php echo $natural_habit ?></td>
                                        <td><?php echo $global_population ?></td>
                                        <td><?php echo $size_and_weight ?></td>
                                        <td><?php echo $gestational_period ?></td>
                                        <td><?php echo $fish_author ?></td>
                                        <td><img width="100" src="images/<?php echo $fish_image ?>"></td>
                                        <?php echo "<td><a href='fish.php?delete=$fish_id'>Delete</a>"; ?>
                                       <?php echo "<a href='fish.php?source=update_fish&fish_id=$fish_id'>Update</a>"; ?>
                                        <?php echo "<a href='fish.php?clone_fish_id=$fish_id'>Clone</a>"; ?>
                                    </tr>
                                    <?php } }?>


                                </tbody>
                                </table><?php
                                break;
                        }
                       
                        ?>


                        <?php

                        if (isset($_GET['clone_fish_id'])) {
                            $fish_id = $_GET['clone_fish_id'];


                        $query = "SELECT *  FROM  fish WHERE fish_id=$fish_id";
                        $select_posts = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_posts)) {
                                   $fish_category_id = $row['fish_category_id'];
                                   $fish_name =       $row['fish_name'];
                                   $fish_given_name = $row['fish_given_name'];
                                   $date_of_birth =      $row['date_of_birth'];
                                   $gender =             $row['gender'];
                                   $life_span  =         $row['life_span'];
                                   $foods_and_foraging =    $row['foods_and_foraging'];
                                   $natural_habit =      $row['natural_habit'];
                                   $global_population =  $row['global_population'];
                                   $arrived_on_zoo =     $row['arrived_on_zoo'];
                                   $size_and_weight =  $row['size_and_weight'];
                                   $gestational_period = $row['gestational_period'];
                                   $fish_author =     $row['fish_author'];
                                   $fish_image =      $row['fish_image'];
                                   $average_body_temperature =     $row['average_body_temperature'];
                                   $water_type   =     $row['water_type'];

                            $query_new = "INSERT INTO fish(fish_category_id, fish_name, fish_given_name, date_of_birth, gender, life_span,  foods_and_foraging, natural_habit, global_population, arrived_on_zoo, size_and_weight, gestational_period, fish_author, fish_image, average_body_temperature, water_type) VALUES({$fish_category_id}, '{$fish_name}', '{$fish_given_name}', '{$date_of_birth}', '{$gender}', '{$life_span}', '{$foods_and_foraging}', '{$natural_habit}', '{$global_population}', '{$arrived_on_zoo}', '{$size_and_weight}', '{$gestational_period}', '{$fish_author}', '{$fish_image}', '{$average_body_temperature}', '{$water_type}')";
                            }

                            $clone_fish = mysqli_query($connection,$query_new);

                            if (!$clone_fish) {
                             die("Query Failed");
                }
                   header("Location: fish.php");
        
                        }
                        ?>

                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $fish_idd = $_GET['delete'];
                            $query = "DELETE FROM fish WHERE fish_id = {$fish_idd} ";

                            $delete_fish = mysqli_query($connection,$query);
                            if(!$delete_fish) {
                                die("Query Failed" . mysqli_error($delete_fish));
                            }
                            header("Location: fish.php");
                        }

                        ?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>