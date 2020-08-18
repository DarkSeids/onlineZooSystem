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
                            case 'add_animal_info':
                                include "includes/add_animal_info.php";
                                break;
                            
                            case 'update_animal_info':
                                include "includes/update_animal_info.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                       
                                        <th>animal name</th>
                                        <th>natural habitat</th>
                                        <th>size and weight</th>
                                        <th>foods and foraging</th>
                                        <th>sponsorship by</th>
                                        <th>image</th>
                                        
                                    </tr>
                                       
                                       
                                       
                                       
                                       
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  animals_info";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $animal_id  = $row['animal_id'];
                                            $animal_name = $row['animal_name'];
                                            $natural_habitat = $row['natural_habitat'];
                                            $size_and_weight = $row['size_and_weight'];
                                            $foods_and_foraging = $row['foods_and_foraging'];
                                            $sponsorship_by = $row['sponsorship_by'];
                                            $animal_image = $row['animal_image'];
                                           
                                           
                                        if ($select_posts == TRUE) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $animal_name ?></td>
                                        <td><?php echo $natural_habitat ?></td>
                                        <td><?php echo $size_and_weight ?></td>
                                        <td><?php echo $foods_and_foraging ?></td>
                                        <td><?php echo $sponsorship_by ?></td>
                                         <td><img width="100" src="images/<?php echo $animal_image ?>"></td>
                                        <?php echo "<td><a href='animal_info.php?delete=$animal_id'>Delete</a>"; ?>
                                        <?php echo "<a href='animal_info.php?source=update_animal_info&animal_id=$animal_id'>Update</a>"; ?>
                                        <?php echo "<a href='animal_info.php?clone_animal_id=$animal_id'>Clone</a>"; ?>
                                    </tr>
                                    <?php } }?>


                                </tbody>
                                </table><?php
                                break;
                        }
                       
                        ?>


                        <?php

                        if (isset($_GET['clone_animal_id'])) {
                            $animal_id = $_GET['clone_animal_id'];


                        $query = "SELECT *  FROM  animals_info WHERE animal_id=$animal_id";
                        $select_posts = mysqli_query($connection,$query);

                         while($row = mysqli_fetch_assoc($select_posts)) {
                                   $animal_category_id = $row['animal_category_id'];
                                   $animal_name =       $row['animal_name'];
                                   $natural_habitat =      $row['natural_habitat'];
                                   $size_and_weight =             $row['size_and_weight'];
                                   $foods_and_foraging  =         $row['foods_and_foraging'];
                                   $sponsorship_by =    $row['sponsorship_by'];
                                   $animal_image =      $row['animal_image'];
                                 

                            $query_new = "INSERT INTO animals_info(animal_category_id, animal_name, natural_habitat, size_and_weight, foods_and_foraging, sponsorship_by, animal_image) VALUES({$animal_category_id}, '{$animal_name}', '{$natural_habitat}', '{$size_and_weight}', '{$foods_and_foraging}', '{$sponsorship_by}', '{$animal_image}')";
                            }

                            $clone_animal_info = mysqli_query($connection,$query_new);

                            if (!$clone_animal_info) {
                             die("Query Failed");
                }
                   header("Location: animal_info.php");
        
                        }
                        ?>



                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $animal_idd = $_GET['delete'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM animals_info WHERE animal_id = {$animal_idd} ";

                            $delete_animal = mysqli_query($connection,$query);
                            if(!$delete_animal) {
                                die("Query Failed" . mysqli_error($delete_bus));
                            }
                            header("Location: animal_info.php");
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