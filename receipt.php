<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->

    <div class="container" style="width: 50%;">
                
      <h2>Account Deatils:</h2>
      <table class="table table-striped" style="width: 100%">
              <tbody>
                <tr>
                  <td><b>Photo:</b> </td>
                  <td><img src="admin/images/<?php echo $_SESSION['s_image']; ?>" width=50></td>
                </tr>
                <tr>
                  <td><b>UserID:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_id']); ?></td>
                </tr>
                <tr>
                  <td><b>Account Holder's Name:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_username']); ?></td>
                </tr>
                <tr>
                  <td><b>FirstName:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_firstname']); ?></td>
                </tr>
                <tr>
                  <td><b>LastName:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_lastname']); ?></td>
                </tr>

                <br>
              </tbody>
            </table>
<br>

      <?php
        if (isset($_GET['booking_id'])) {
          $input_booking_id = $_GET['booking_id'];
          //echo $input_order_id;
        }

        $query = "SELECT * FROM bookings WHERE booking_id=$input_booking_id";

        $select_booking = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($select_booking)) {
            $username = $row['username'];
            $age = $row['age'];
            $dob = $row['date'];
            $cost = $row['cost'];
            $booking_id = $row['booking_id'];
            $user_id = $row['user_id'];

            ?>

            <h2>Ticket Details:-</h2>

            <table class="table table-striped" style="width: 100%">
              <tbody>
                <tr>
                  <td><b>Visitor Name:</b> </td>
                  <td><?php echo $username; ?></td>
                </tr>
                <tr>
                  <td><b>Visitor Age:</b> </td>
                  <td><?php echo $age; ?></td>
                </tr>
                <tr>
                  
                <tr>
                  <td><b>Date Of Booking: </b></td>
                  <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                  <td><b>Cost: </b></td>
                  <td><?php echo $cost; ?></td>
                </tr>
                <br>
              </tbody>
            </table>

          <?php } ?>


         
    </div>
        <hr>


    <script>
    function openCity(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

<?php include "includes/footer.php"; ?> 