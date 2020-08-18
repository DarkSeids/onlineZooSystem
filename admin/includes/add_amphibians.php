<?php

if (isset($_POST['insert-amphibian'])) {
    
    $amphibian_category_id =     $_POST['amphibian_category_id']; 
    $amphibian_name     =     $_POST['amphibian_name'];
    $amphibian_given_name =    $_POST['amphibian_given_name'];
    $date_of_birth   =    $_POST['date_of_birth'];
    $gender          =    $_POST['gender'];
    $life_span       =    $_POST['life_span'];
    $foods_and_foraging =    $_POST['foods_and_foraging'];
    $natural_habit     =    $_POST['natural_habit'];
    $global_population =  $_POST['global_population'];
    $arrived_on_zoo    =  $_POST['arrived_on_zoo'];
    $size_and_weight    =  $_POST['size_and_weight'];
    $gestational_period = $_POST['gestational_period'];
    $amphibian_author        = $_POST['amphibian_author'];
    $reproduction_type        = $_POST['reproduction_type'];
    $average_number_of_offspring          = $_POST['average_number_of_offspring'];
    $average_clutch_size     = $_POST['average_clutch_size'];


        $amphibian_image    = $_FILES['image']['name'];
        $tmp_image    =  $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_image, "images/$amphibian_image");

        if ($amphibian_category_id =="" || $amphibian_name =="" || $amphibian_given_name =="" || $date_of_birth =="" || $gender =="" || $life_span == "" || $foods_and_foraging =="" || $natural_habit =="" || $global_population =="" || $arrived_on_zoo =="" || $size_and_weight =="" || $gestational_period =="" || $amphibian_author =="" || $reproduction_type =="" || $average_number_of_offspring =="" || $average_clutch_size =="") 
        {
                
                echo "** All Fields Mandatory";

              }  

              else {
                $query = "INSERT INTO amphibians (amphibian_category_id, amphibian_name,amphibian_given_name, date_of_birth, gender, life_span, foods_and_foraging, natural_habit, global_population, arrived_on_zoo, size_and_weight, gestational_period, amphibian_author, amphibian_image, reproduction_type, average_number_of_offspring, average_clutch_size ) VALUES ({$amphibian_category_id}, '{$amphibian_name}', '{$amphibian_given_name}', '{$date_of_birth}', '{$gender}','{$life_span}', '{$foods_and_foraging}', '{$natural_habit}', '{$global_population}', '{$arrived_on_zoo}', '{$size_and_weight}', '{$gestational_period}', '{$amphibian_author}', '{$amphibian_image}', '{$reproduction_type}', '{$average_number_of_offspring}', '{$average_clutch_size}'  ) " ;

                $amphibian_entry = mysqli_query($connection, $query);

                if (!$amphibian_entry) {
                    die("Query failed");
                }
                header("location:amphibians.php");
              }    


  }

  ?>

     <center><h2>Add amphibian</h2></center> 

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="amphibian_author">Admin</label>
        <input type="text" class="form-control" name="amphibian_author">
    </div>

    <div class="form-group">
         <label for="amphibian_category_id">Select Category</label>
        <select name="amphibian_category_id">
            
            <?php 

            $query = "SELECT * FROM animals_categories";
            $select_category = mysqli_query($connection,$query);

            if (!$select_category) {
                die("Query Failed" . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($select_category)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            
                echo "<option value='$cat_id'>$cat_title</option>";
            }

            ?>

        </select>
    </div>
     <div class="form-group">
        <label for="amphibian_name">amphibian Name</label>
        <input type="text" class="form-control" name="amphibian_name">
    </div>

    <div class="form-group">
        <label for="amphibian_given_name">amphibian Given Name</label>
        <input type="text" class="form-control" name="amphibian_given_name">
    </div>

    <div class="form-group">
        <label for="date_of_birth">Date Of Birth</label>
        <input type="date" style="margin-top: 10px; "name="date_of_birth" class="form-control" id="date" placeholder="dd/mm/yyyy" >
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" class="form-control" name="gender">
    </div>

    <div class="form-group">
        <label for="life_span">Life Span</label>
        <input type="text" class="form-control" name="life_span">
    </div>
    
    <div class="form-group">
        <label for="foods_and_foraging">Foods And Foraging</label>
        <textarea class="form-control" name="foods_and_foraging" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="natural_habit">Natural Habit</label>
        <textarea class="form-control" name="natural_habit" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="global_population">Global Population</label>
        <input type="text" class="form-control" name="global_population" >
    </div>

     <div class="form-group">
        <label for="arrived_on_zoo">Arrived On Zoo</label>
        <input type="date" style="margin-top: 10px;"  name="arrived_on_zoo" class="form-control" id="date" placeholder="dd/mm/yyyy" >
    </div>


    <div class="form-group">
        <label for="size_and_weight">Size And Weight</label>
        <textarea class="form-control" name="size_and_weight" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="gestational_period">Gestational Period</label>
        <input type="text" class="form-control" name="gestational_period" >
    </div>

     <div class="form-group">
        <label for="amphibian_image">amphibian Image</label>
        <input type="file" name="image" >
    </div>

    <div class="form-group">
        <label for="reproduction_type">Reproduction type</label>
        <input type="text" class="form-control" name="reproduction_type" placeholder="Egg layer / Live bearer" >
    </div>

    <div class="form-group">
        <label for="average_number_of_offspring">Average Number of offspring</label>
        <input type="text" class="form-control" name="average_number_of_offspring" placeholder="If Livebearer" >
    </div>

    <div class="form-group">
        <label for="average_clutch_size">Average Clutch Size</label>
        <input type="text" class="form-control" name="average_clutch_size" placeholder="If Egg layer" >
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="insert-amphibian" value="Add amphibian">
    </div>
</form>





