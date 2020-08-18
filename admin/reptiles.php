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
                            case 'add_reptiles':
                                include "includes/add_reptiles.php";
                                break;
                            
                            case 'update_reptiles':
                                include "includes/update_reptiles.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>reptile_id</th>
                                        <th>reptile name</th>
                                        <th>Date Of Birth</th>
                                        <th>Gender</th>
                                        <th>Life Span</th>
                                        <th>Foods And Foraging</th>
                                        <th>Natural Habit</th>
                                        <th>Global Population</th>
                                        <th>Size And Weight</th>
                                        <th>Gestational Period</th>
                                        <th>reptile Author</th>
                                        <th>Image</th>
                                        <th>Options</th>
                                    </tr>
                                       
                                       
                                       
                                       
                                       
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  reptiles";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $reptile_id = $row['reptile_id'];
                                            $reptile_name = $row['reptile_name'];
                                            $date_of_birth = $row['date_of_birth'];
                                            $gender = $row['gender'];
                                            $life_span = $row['life_span'];
                                            $foods_and_foraging = $row['foods_and_foraging'];
                                            $natural_habit = $row['natural_habit'];
                                            $global_population = $row['global_population'];
                                            $size_and_weight = $row['size_and_weight'];
                                            $gestational_period = $row['gestational_period'];
                                            $reptile_author =     $row['reptile_author'];
                                            $reptile_image = $row['reptile_image'];
                                           
                                           
                                        if ($select_posts == TRUE) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $reptile_id ?></td>
                                        <td><?php echo $reptile_name ?></td>
                                        <td><?php echo $date_of_birth ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $life_span ?></td>
                                        <td><?php echo $foods_and_foraging ?></td>
                                        <td><?php echo $natural_habit ?></td>
                                        <td><?php echo $global_population ?></td>
                                        <td><?php echo $size_and_weight ?></td>
                                        <td><?php echo $gestational_period ?></td>
                                        <td><?php echo $reptile_author ?></td>
                                        <td><img width="100" src="images/<?php echo $reptile_image ?>"></td>
                                        <?php echo "<td><a href='reptiles.php?delete=$reptile_id'>Delete</a>"; ?>
                                        <?php echo "<a href='reptiles.php?source=update_reptiles&reptile_id=$reptile_id'>Update</a>"; ?>
                                        <?php echo "<a href='reptiles.php?clone_reptile_id=$reptile_id'>Clone</a>"; ?>
                                    </tr>
                                    <?php } }?>


                                </tbody>
                                </table><?php
                                break;
                        }
                       
                        ?>


                        <?php

                        if (isset($_GET['clone_reptile_id'])) {
                            $reptile_id = $_GET['clone_reptile_id'];


                        $query = "SELECT *  FROM  reptiles WHERE reptile_id=$reptile_id";
                        $select_posts = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_posts)) {
                                   $reptile_category_id = $row['reptile_category_id'];
                                   $reptile_name =       $row['reptile_name'];
                                   $reptile_given_name = $row['reptile_given_name'];
                                   $date_of_birth =      $row['date_of_birth'];
                                   $gender =             $row['gender'];
                                   $life_span  =         $row['life_span'];
                                   $foods_and_foraging =    $row['foods_and_foraging'];
                                   $natural_habit =      $row['natural_habit'];
                                   $global_population =  $row['global_population'];
                                   $arrived_on_zoo =     $row['arrived_on_zoo'];
                                   $size_and_weight =  $row['size_and_weight'];
                                   $gestational_period = $row['gestational_period'];
                                   $reptile_author =     $row['reptile_author'];
                                   $reptile_image =      $row['reptile_image'];
                                   $reproduction_type =     $row['reproduction_type'];
                                   $average_number_of_offspring   =     $row['average_number_of_offspring'];
                                   $average_clutch_size =  $row['average_clutch_size'];

                            $query_new = "INSERT INTO reptiles(reptile_category_id, reptile_name, reptile_given_name, date_of_birth, gender, life_span, foods_and_foraging, natural_habit, global_population, arrived_on_zoo, size_and_weight, gestational_period, reptile_author, reptile_image, reproduction_type, average_number_of_offspring, average_clutch_size) VALUES({$reptile_category_id}, '{$reptile_name}', '{$reptile_given_name}', '{$date_of_birth}', '{$gender}', '{$life_span}', '{$foods_and_foraging}', '{$natural_habit}', '{$global_population}', '{$arrived_on_zoo}', '{$size_and_weight}', '{$gestational_period}', '{$reptile_author}', '{$reptile_image}', '{$reproduction_type}', '{$average_number_of_offspring}', '{$average_clutch_size}')";
                            }

                            $clone_reptile = mysqli_query($connection,$query_new);

                            if (!$clone_reptile) {
                             die("Query Failed");
                }
                   header("Location: reptiles.php");
        
                        }
                        ?>


                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $reptile_idd = $_GET['delete'];
                            // echo "$reptile_idd";
                            $query = "DELETE FROM reptiles WHERE reptile_id = {$reptile_idd} ";

                            $delete_reptile = mysqli_query($connection,$query);
                            if(!$delete_reptile) {
                                die("Query Failed" . mysqli_error($delete_reptile));
                            }
                            header("Location: reptiles.php");
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