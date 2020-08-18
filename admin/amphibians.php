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
                            case 'add_amphibians':
                                include "includes/add_amphibians.php";
                                break;
                            
                            case 'update_amphibians':
                                include "includes/update_amphibians.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>amphibian_id</th>
                                        <th>amphibian name</th>
                                        <th>Date Of Birth</th>
                                        <th>Gender</th>
                                        <th>Life Span</th>
                                        <th>Foods And Foraging</th>
                                        <th>Natural Habit</th>
                                        <th>Global Population</th>
                                        <th>Size And Weight</th>
                                        <th>Gestational Period</th>
                                        <th>amphibian Author</th>
                                        <th>Image</th>
                                        <th>Options</th>
                                    </tr>
                                       
                                       
                                       
                                       
                                       
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  amphibians";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $amphibian_id = $row['amphibian_id'];
                                            $amphibian_name = $row['amphibian_name'];
                                            $date_of_birth = $row['date_of_birth'];
                                            $gender = $row['gender'];
                                            $life_span = $row['life_span'];
                                            $foods_and_foraging = $row['foods_and_foraging'];
                                            $natural_habit = $row['natural_habit'];
                                            $global_population = $row['global_population'];
                                            $size_and_weight = $row['size_and_weight'];
                                            $gestational_period = $row['gestational_period'];
                                            $amphibian_author =     $row['amphibian_author'];
                                            $amphibian_image = $row['amphibian_image'];
                                           
                                           
                                        if ($select_posts == TRUE) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $amphibian_id ?></td>
                                        <td><?php echo $amphibian_name ?></td>
                                        <td><?php echo $date_of_birth ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $life_span ?></td>
                                        <td><?php echo $foods_and_foraging ?></td>
                                        <td><?php echo $natural_habit ?></td>
                                        <td><?php echo $global_population ?></td>
                                        <td><?php echo $size_and_weight ?></td>
                                        <td><?php echo $gestational_period ?></td>
                                        <td><?php echo $amphibian_author ?></td>
                                        <td><img width="100" src="images/<?php echo $amphibian_image ?>"></td>
                                        <?php echo "<td><a href='amphibians.php?delete=$amphibian_id'>Delete</a>"; ?>
                                        <?php echo "<a href='amphibians.php?source=update_amphibians&amphibian_id=$amphibian_id'>Update</a>"; ?>
                                        <?php echo "<a href='amphibians.php?clone_amphibian_id=$amphibian_id'>Clone</a>"; ?>
                                    </tr>
                                    <?php } }?>


                                </tbody>
                                </table><?php
                                break;
                        }
                       
                        ?>


                        <?php

                        if (isset($_GET['clone_amphibian_id'])) {
                            $amphibian_id = $_GET['clone_amphibian_id'];


                        $query = "SELECT *  FROM  amphibians WHERE amphibian_id=$amphibian_id";
                        $select_posts = mysqli_query($connection,$query);

                         while($row = mysqli_fetch_assoc($select_posts)) {
                                   $amphibian_category_id = $row['amphibian_category_id'];
                                   $amphibian_name =       $row['amphibian_name'];
                                   $amphibian_given_name = $row['amphibian_given_name'];
                                   $date_of_birth =      $row['date_of_birth'];
                                   $gender =             $row['gender'];
                                   $life_span  =         $row['life_span'];
                                   $foods_and_foraging =    $row['foods_and_foraging'];
                                   $natural_habit =      $row['natural_habit'];
                                   $global_population =  $row['global_population'];
                                   $arrived_on_zoo =     $row['arrived_on_zoo'];
                                   $size_and_weight =  $row['size_and_weight'];
                                   $gestational_period = $row['gestational_period'];
                                   $amphibian_author =     $row['amphibian_author'];
                                   $amphibian_image =      $row['amphibian_image'];
                                   $reproduction_type =     $row['reproduction_type'];
                                   $average_number_of_offspring   =     $row['average_number_of_offspring'];
                                   $average_clutch_size =  $row['average_clutch_size'];

                            $query_new = "INSERT INTO amphibians(amphibian_category_id, amphibian_name, amphibian_given_name, date_of_birth, gender, life_span, foods_and_foraging, natural_habit, global_population, arrived_on_zoo, size_and_weight, gestational_period, amphibian_author, amphibian_image, reproduction_type, average_number_of_offspring, average_clutch_size) VALUES({$amphibian_category_id}, '{$amphibian_name}', '{$amphibian_given_name}', '{$date_of_birth}', '{$gender}', '{$life_span}', '{$foods_and_foraging}', '{$natural_habit}', '{$global_population}', '{$arrived_on_zoo}', '{$size_and_weight}', '{$gestational_period}', '{$amphibian_author}', '{$amphibian_image}', '{$reproduction_type}', '{$average_number_of_offspring}', '{$average_clutch_size}')";
                            }

                            $clone_amphibian = mysqli_query($connection,$query_new);

                            if (!$clone_amphibian) {
                             die("Query Failed");
                }
                   header("Location: amphibians.php");
        
                        }
                        ?>



                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $amphibian_idd = $_GET['delete'];
                            // echo "$amphibian_idd";
                            $query = "DELETE FROM amphibians WHERE amphibian_id = {$amphibian_idd} ";

                            $delete_amphibian = mysqli_query($connection,$query);
                            if(!$delete_amphibian) {
                                die("Query Failed" . mysqli_error($delete_amphibian));
                            }
                            header("Location: amphibians.php");
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