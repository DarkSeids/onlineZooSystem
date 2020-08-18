<?php 
include "includes/db.php";
include "includes/header.php";
?>

 <?php include "includes/navigation.php"; ?>

  <?php  

if (!isset($_SESSION['s_role'])) {
    header("Location: includes/login.php");

}

?> 


 <div class="jumbotron jumb">
  <center><h2>Claybrook Zoo</h2></center> <br>
                            <h3 style="padding-left: 3%"><b>Price Details :</b></h3>
                            <h4 style="padding-left: 5%">Adults:    $5</h4>
                            <h4 style="padding-left: 5%">Childeren: $2  </h4>


                            <h2><b>Zoo Details:</b></h2>
                            <table class="table table-striped" style="width: 100%; margin-top:-20px;">
                              <thead>
                                  <th><u>Day</u></th>
                                  <th><u>Time</u> </th>
                              </thead>
                              <tbody>
                               
                                        <tr>
                                          <td>Monday - Saturday</td>
                                          <td>10am - 5pm</td>
                                   
                                <br>
                              </tbody>
                            </table>
                        </div>

                         <div class="jumbotron">
                            <div class="container-fluid">
                                <h2>Enter Details:</h2>

                                  <?php

                        if (isset($_SESSION['s_id'])) {
                            # code...

                    

                        ?>
                                 <form action="" method="post" class="form-horizontal">

                                 <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email" placeholder="Name" name="username">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Age:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email" placeholder="Age" name="age">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Email:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email" placeholder="Age" name="email">
                                              </div>
                                            </div>

                                             <div class="form-group">
                                          <label class="control-label col-sm-2" for="email">Date</label>
                                            <div class="col-sm-10">
   <input type="date" min=<?php echo date('Y-m-d');?> max=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));?> name="date" class="form-control" id="email" placeholder="dd/mm/yyyy" >
                                      </div>
                                    </div>


                                               <div class="form-group">
                                       <label class="control-label col-sm-2" for="email">Select Price:</label>
                                       <div class="col-sm-10">
                                      <select class="form-control" name="cost">
                                       <option value="" style="">Select</option>
                                         <?php 

                                           $query = "SELECT * FROM cost ";
                                          $select_team = mysqli_query($connection,$query);
                            
                                          if (!$select_team) {
                                            die("Query Failed" . mysqli_error($connection));
                                        }

                                        while ($row = mysqli_fetch_assoc($select_team)) {
                                            $cost = $row['cost'];
            
                                            echo "<option value='$cost'>$cost</option>";

                                        }

                                         ?> 

                                     </select>
                                   </div>
                                 </div>



                             <button class="btn btn-primary" name="book" style="margin-left: 40%; margin-top: 15px;">Book Tickets</button>

                                </form>

                             <?php } ?>
                                            </div>
                                        </div>
                                      </div>

                                      <?php 

              if (isset($_POST['book'])) {
        
        $username =           $_POST['username'];
        $age =           $_POST['age'];
        $email     =    $_POST['email'];
        $date =               $_POST['date'];
        $cost =               $_POST['cost'];

        $user_id = $_SESSION['s_id'];

        if ($username =="" || $age =="" || $email =="" || $date =="" || $cost =="") {
          echo "**All Feilds Mandatory **";
        }

        else {
            $query = "INSERT INTO bookings(user_id, username, age, email,  date, cost) VALUES('{$user_id}', '{$username}', '{$age}', '{$email}', '{$date}', '{$cost}')";

            $booking_entry = mysqli_query($connection,$query);

            if (!$booking_entry) {
                die("Query Failed"  . mysqli_error($connection));
            }
            header("Location: profile.php");
        }



      }
       

 

                                       ?>
	






<?php include "includes/footer.php"; ?>


