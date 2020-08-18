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
                            <small><?php echo ucfirst($_SESSION['s_username']);   ?></small>
                        </h1>

                        <div class="col-xs-6">

                            <?php

                                if (isset($_GET['delete'])) {
                                    $cost_del_id = $_GET['delete'];

                                    $query = "DELETE FROM cost WHERE cost_id=$cost_del_id";

                                    $delete_cat = mysqli_query($connection,$query);

                                }

                            ?>



                             <?php 
                            if(isset($_POST['submit'])) {

                                $cost = $_POST['cost'];
                                if(cost==""); {
                                    echo " This Field Must Not be Empty";
                                }

                                $query = "INSERT INTO cost(cost) VALUE ('$cost')";
                                $create_cost = mysqli_query($connection,$query);

                                if(!$create_cost) {
                                    die("Query Failed");
                                }
                            }
                            ?>



                             <form action="" method="post">
                                <div class="form-group">
                                    <label for="cost">Add Cost</label>
                                    <input class="form-control" type="text" name="cost">
                                </div>
                                
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Cost">
                                </div> 
                            </form>
                        </div>


                        <div class="col-xs-6">

                            <?php 
                            $query = "SELECT *  FROM  cost";
                            $select_categories = mysqli_query($connection,$query);
                            ?>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cost</th>
                                         
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php  
                                        while($row = mysqli_fetch_assoc($select_categories)) {
                                        $cost_id = $row['cost_id'];
                                        $cost = $row['cost'];

                                        echo "<tr>";
                                        echo "<td> {$cost_id} </td>";
                                        echo "<td> {$cost} </td>";
                                        echo "<td><a href='add_cost.php?delete=$cost_id'>Delete</a></td>";
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                <!-- /.row -->

                </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>



