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

                         <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>sponsor_id</th>
                                        <th>Clint/Company name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Address</th>
                                        <th>Existing Customer</th>
                                        <th>Sponsored Animal</th>
                                        <th>Price Of Animal</th>
                                        <th>Period Of Agreement</th>
                                        <th>Image</th>
                                        <th>Options</th>
                                    </tr>

                                      </thead>

                                     <tbody>
                                         <?php 

                                        $query = "SELECT *  FROM  sponsors";
                                        $select_animals = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($select_animals)) {
                                            $sponsor_id = $row['sponsor_id'];
                                            $clint_or_company_name = $row['clint_or_company_name'];
                                            $email = $row['email'];
                                            $phone_no = $row['phone_no'];
                                            $address = $row['address'];
                                            $existing_customer = $row['existing_customer'];
                                            $animal_to_be_sponsor = $row['animal_to_be_sponsor'];
                                            $total_price = $row['total_price'];
                                            $period_of_agreement = $row['period_of_agreement'];
                                            $image = $row['image'];

                                             if ($select_animals == TRUE) {
                                            # code...
                                        ?>
                                    
                                    <tr>
                                        <td><?php echo $sponsor_id?></td>
                                        <td><?php echo $clint_or_company_name ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $phone_no ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $existing_customer ?></td>
                                        <td><?php echo $animal_to_be_sponsor ?></td>
                                        <td><?php echo $total_price ?></td>
                                        <td><?php echo $period_of_agreement ?></td>
                                         <td><img width="100" src="../images/<?php echo $image ?>"></td>
                                     <?php echo "<td><a href='sponsor_info.php?delete=$sponsor_id'>Delete</a>"; ?>

                                     </tr>
                                     <?php 
                                        }
                                      ?>  </tbody>
                                      </table> <?php 
                                    }

                                       ?>

                                
                              <?php 

                        if (isset($_GET['delete'])) {
                            
                            $sponsor_idd = $_GET['delete'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM sponsors WHERE sponsor_id = {$sponsor_idd} ";

                            $delete_animal = mysqli_query($connection,$query);
                            if(!$delete_animal) {
                                die("Query Failed" . mysqli_error($delete_animal));
                            }
                            header("Location: sponsor_info.php");
                        }

                        ?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>               

                                    







 <?php include"includes/admin_footer.php"; ?>