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
                            case 'add_mammals':
                                include "includes/add_mammals.php";
                                break;
                            
                            case 'update_mammals':
                                include "includes/update_mammals.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>mammals_id</th>
                                        <th>mammals name</th>
                                        <th>Date Of Birth</th>
                                        <th>Gender</th>
                                        <th>Life Span</th>
                                        <th>Foods And Foraging</th>
                                        <th>Natural Habit</th>
                                        <th>Global Population</th>
                                        <th>Size And Weight</th>
                                        <th>Gestational Period</th>
                                        <th>mammals Author</th>
                                        <th>Image</th>
                                        <th>Options</th>
                                    </tr>
                                       
                                       
                                       
                                       
                                       
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  mammals";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $mammals_id = $row['mammals_id'];
                                            $mammals_name = $row['mammals_name'];
                                            $date_of_birth = $row['date_of_birth'];
                                            $gender = $row['gender'];
                                            $life_span = $row['life_span'];
                                            $foods_and_foraging = $row['foods_and_foraging'];
                                            $natural_habit = $row['natural_habit'];
                                            $global_population = $row['global_population'];
                                            $size_and_weight = $row['size_and_weight'];
                                            $gestational_period = $row['gestational_period'];
                                            $mammals_author =     $row['mammals_author'];
                                            $mammals_image = $row['mammals_image'];
                                           
                                           
                                        if ($select_posts == TRUE) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $mammals_id ?></td>
                                        <td><?php echo $mammals_name ?></td>
                                        <td><?php echo $date_of_birth ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $life_span ?></td>
                                        <td><?php echo $foods_and_foraging ?></td>
                                        <td><?php echo $natural_habit ?></td>
                                        <td><?php echo $global_population ?></td>
                                        <td><?php echo $size_and_weight ?></td>
                                        <td><?php echo $gestational_period ?></td>
                                        <td><?php echo $mammals_author ?></td>
                                        <td><img width="100" src="images/<?php echo $mammals_image ?>"></td>
                                        <?php echo "<td><a href='mammals.php?delete=$mammals_id'>Delete</a>"; ?>
                                        <?php echo "<a href='mammals.php?source=update_mammals&mammals_id=$mammals_id'>Update</a>"; ?>
                                        <?php echo "<a href='mammals.php?clone_mammals_id=$mammals_id'>Clone</a>"; ?>
                                    </tr>
                                    <?php } }?>


                                </tbody>
                                </table><?php
                                break;
                        }
                       
                        ?>


                        <?php

                        if (isset($_GET['clone_mammals_id'])) {
                            $mammals_id = $_GET['clone_mammals_id'];


                        $query = "SELECT *  FROM  mammals WHERE mammals_id=$mammals_id";
                        $select_posts = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_posts)) {
                                   $mammals_category_id = $row['mammals_category_id'];
                                   $mammals_name =       $row['mammals_name'];
                                   $mammals_given_name = $row['mammals_given_name'];
                                   $date_of_birth =      $row['date_of_birth'];
                                   $gender =             $row['gender'];
                                   $life_span  =         $row['life_span'];
                                   $foods_and_foraging =    $row['foods_and_foraging'];
                                   $natural_habit =      $row['natural_habit'];
                                   $global_population =  $row['global_population'];
                                   $arrived_on_zoo =     $row['arrived_on_zoo'];
                                   $size_and_weight =  $row['size_and_weight'];
                                   $gestational_period = $row['gestational_period'];
                                   $mammals_author =     $row['mammals_author'];
                                   $mammals_image =      $row['mammals_image'];

                            $query_new = "INSERT INTO mammals(mammals_category_id, mammals_name, mammals_given_name, date_of_birth, gender, life_span,foods_and_foraging, natural_habit, global_population, arrived_on_zoo, size_and_weight, gestational_period, mammals_author, mammals_image) VALUES({$mammals_category_id}, '{$mammals_name}', '{$mammals_given_name}', '{$date_of_birth}', '{$gender}', '{$life_span}', '{$foods_and_foraging}', '{$natural_habit}', '{$global_population}', '{$arrived_on_zoo}', '{$size_and_weight}', '{$gestational_period}', '{$mammals_author}', '{$mammals_image}')";
                            }

                            $clone_mammals = mysqli_query($connection,$query_new);

                            if (!$clone_mammals) {
                             die("Query Failed");
                }
                   header("Location: mammals.php");
        
                        }
                        ?>



                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $mammals_idd = $_GET['delete'];
                            // echo "$mammals_idd";
                            $query = "DELETE FROM mammals WHERE mammals_id = {$mammals_idd} ";

                            $delete_mammals = mysqli_query($connection,$query);
                            if(!$delete_mammals) {
                                die("Query Failed" . mysqli_error($delete_mammals));
                            }
                            header("Location: mammals.php");
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