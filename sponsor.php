<?php 
include "includes/db.php";
include "includes/header.php";
?>

<?php 


// navigation //
include "includes/navigation.php";

if (isset($_POST['sponsor'])) {
    $clint_or_company_name = $_POST['clint_or_company_name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $address  = $_POST['address'];
    $existing_customer   = $_POST['existing_customer'];
   $animal_to_be_sponsor = $_POST['animal_to_be_sponsor'];
    $total_price    =  $_POST['total_price'];
    $period_of_agreement = $_POST['period_of_agreement'];

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_image, "images/$image");
    if ($image == "") {
      $image = "user_default.jpg";
    }

if ($clint_or_company_name=="" || $email=="" || $phone_no=="" || $address=="" || $existing_customer=="" || $animal_to_be_sponsor=="" || $total_price=="" || $period_of_agreement=="" || $image=="") {
  # code...
  echo "**ALL FIELDS MANDATORY";
}


else {

$query = "INSERT INTO sponsors(clint_or_company_name, email, phone_no, address, existing_customer, animal_to_be_sponsor,  total_price, period_of_agreement, image) VALUES('$clint_or_company_name', '$email', '$phone_no', '$address', '$existing_customer', '$animal_to_be_sponsor',  '$total_price', '$period_of_agreement', '$image') ";

$sponsor_animal = mysqli_query($connection, $query);

if(!$sponsor_animal) {
    die("Query Failed" . mysqli_error($connection));
}

header("Location: index.php"); 

}

}

?>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="images/claybrook.jpg" style="margin-top: 30%;">
            </div>
            <div class="col-lg-6">
                
              
              <h2 style="margin-left: 40%;">Sponsorship</h2>
              <form action="" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="clint_or_company_name" style="margin-top: 10%;">Clint/Company Name:</label>
                  <input type="text" class="form-control" id="clint_or_company_name" placeholder="Name/Company Name" name="clint_or_company_name">
                </div>

                 <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>

                 <div class="form-group">
                  <label for="phone_no">Phone No:</label>
                  <input type="text" class="form-control" id="phone_no" name="phone_no">
                </div>


                <div class="form-group">
                  <label for="address">Full Address:</label>
                  <input type="text" class="form-control" id="address" name="address">
                </div>

                <div class="form-group">
                  <label for="existing_customer">Existing Customer:</label>
                  <input type="text" class="form-control" id="existing_customer" placeholder="Yes/No" name="existing_customer">
                </div>

                <div class="form-group">
                  <label for="animal_to_be_sponsor">Animal(s) To Be Sponsor:</label>
                  <input type="text" class="form-control" id="animal_to_be_sponsor" placeholder="Enter animal name" name="animal_to_be_sponsor">
                </div>

                 <div class="form-group">
                  <label for="total_price">Total Price:</label>
                  <input type="text" class="form-control" id="total_price" name="total_price">
                </div>

                 <div class="form-group">
                  <label for="period_of_agreement">Period Of Agreement:</label>
                  <input type="text" class="form-control" id="period_of_agreement" placeholder="Month/Year" name="period_of_agreement">
                </div>

                 
               <div class="form-group">
                    <label for="image">UserImage</label>
                    <input type="file" name="image" >
                </div>
        
                <button type="submit" class="btn btn-primary" name="sponsor" style="margin-left: 45%; margin-top: 20px;">sponsor</button>
              </form>
            

            </div>
        </div>

    </div>
        <hr>

<?php include "includes/footer.php"; ?>

