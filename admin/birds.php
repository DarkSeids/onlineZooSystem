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
                            case 'add_birds':
                                include "includes/add_birds.php";
                                break;
                            
                            case 'update_birds':
                                include "includes/update_birds.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>bird_id</th>
                                        <th>bird name</th>
                                        <th>Date Of Birth</th>
                                        <th>Gender</th>
                                        <th>Life Span</th>
                                        <th>Foods And Foraging</th>
                                        <th>Natural Habit</th>
                                        <th>Global Population</th>
                                        <th>Size And Weight</th>
                                        <th>Gestational Period</th>
                                        <th>bird Author</th>
                                        <th>Image</th>
                                        <th>Options</th>
                                    </tr>
                                       
                                       
                                       
                                       
                                       
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  birds";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $bird_id = $row['bird_id'];
                                            $bird_name = $row['bird_name'];
                                            $date_of_birth = $row['date_of_birth'];
                                            $gender = $row['gender'];
                                            $life_span = $row['life_span'];
                                            $foods_and_foraging = $row['foods_and_foraging'];
                                            $natural_habit = $row['natural_habit'];
                                            $global_population = $row['global_population'];
                                            $size_and_weight = $row['size_and_weight'];
                                            $gestational_period = $row['gestational_period'];
                                            $bird_author =     $row['bird_author'];
                                            $bird_image = $row['bird_image'];
                                           
                                           
                                        if ($select_posts == TRUE) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $bird_id ?></td>
                                        <td><?php echo $bird_name ?></td>
                                        <td><?php echo $date_of_birth ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $life_span ?></td>
                                        <td><?php echo $foods_and_foraging ?></td>
                                        <td><?php echo $natural_habit ?></td>
                                        <td><?php echo $global_population ?></td>
                                        <td><?php echo $size_and_weight ?></td>
                                        <td><?php echo $gestational_period ?></td>
                                        <td><?php echo $bird_author ?></td>
                                        <td><img width="100" src="images/<?php echo $bird_image ?>"></td>
                                        <?php echo "<td><a href='birds.php?delete=$bird_id'>Delete</a>"; ?>
                                        <?php echo "<a href='birds.php?source=update_birds&bird_id=$bird_id'>Update</a>"; ?>
                                        <?php echo "<a href='birds.php?clone_bird_id=$bird_id'>Clone</a>"; ?>
                                    </tr>
                                    <?php } }?>


                                </tbody>
                                </table><?php
                                break;
                        }
                       
                        ?>


                        <?php

                        if (isset($_GET['clone_bird_id'])) {
                            $bird_id = $_GET['clone_bird_id'];


                        $query = "SELECT *  FROM  birds WHERE bird_id=$bird_id";
                        $select_posts = mysqli_query($connection,$query);

                         while($row = mysqli_fetch_assoc($select_posts)) {
                                   $bird_category_id = $row['bird_category_id'];
                                   $bird_name =       $row['bird_name'];
                                   $bird_given_name = $row['bird_given_name'];
                                   $date_of_birth =      $row['date_of_birth'];
                                   $gender =             $row['gender'];
                                   $life_span  =         $row['life_span'];
                                   $foods_and_foraging =    $row['foods_and_foraging'];
                                   $natural_habit =      $row['natural_habit'];
                                   $global_population =  $row['global_population'];
                                   $arrived_on_zoo =     $row['arrived_on_zoo'];
                                   $size_and_weight =  $row['size_and_weight'];
                                   $gestational_period = $row['gestational_period'];
                                   $bird_author =     $row['bird_author'];
                                   $bird_image =      $row['bird_image'];
                                   $clutch_size =     $row['clutch_size'];
                                   $wing_span   =     $row['wing_span'];
                                   $ability_to_fly =  $row['ability_to_fly'];

                            $query_new = "INSERT INTO birds(bird_category_id, bird_name, bird_given_name, date_of_birth, gender, life_span, foods_and_foraging, natural_habit, global_population, arrived_on_zoo, size_and_weight, gestational_period, bird_author, bird_image, clutch_size, wing_span, ability_to_fly) VALUES({$bird_category_id}, '{$bird_name}', '{$bird_given_name}', '{$date_of_birth}', '{$gender}', '{$life_span}', '{$foods_and_foraging}', '{$natural_habit}', '{$global_population}', '{$arrived_on_zoo}', '{$size_and_weight}', '{$gestational_period}', '{$bird_author}', '{$bird_image}', '{$clutch_size}', '{$wing_span}', '{$ability_to_fly}')";
                            }

                            $clone_bird = mysqli_query($connection,$query_new);

                            if (!$clone_bird) {
                             die("Query Failed");
                }
                   header("Location: birds.php");
        
                        }
                        ?>



                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $bird_idd = $_GET['delete'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM birds WHERE bird_id = {$bird_idd} ";

                            $delete_bird = mysqli_query($connection,$query);
                            if(!$delete_bird) {
                                die("Query Failed" . mysqli_error($delete_bird));
                            }
                            header("Location: birds.php");
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