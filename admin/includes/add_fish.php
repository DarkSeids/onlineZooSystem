<?php

if (isset($_POST['insert-fish'])) {
    
    $fish_category_id =     $_POST['fish_category_id']; 
    $fish_name     =     $_POST['fish_name'];
    $fish_given_name =    $_POST['fish_given_name'];
    $date_of_birth   =    $_POST['date_of_birth'];
    $gender          =    $_POST['gender'];
    $life_span       =    $_POST['life_span'];
    $foods_and_foraging =    $_POST['foods_and_foraging'];
    $natural_habit     =    $_POST['natural_habit'];
    $global_population =  $_POST['global_population'];
    $arrived_on_zoo    =  $_POST['arrived_on_zoo'];
    $size_and_weight    =  $_POST['size_and_weight'];
    $gestational_period = $_POST['gestational_period'];
    $fish_author        = $_POST['fish_author'];
    $average_body_temperature        = $_POST['average_body_temperature'];
    $water_type          = $_POST['water_type'];


        $fish_image    = $_FILES['image']['name'];
        $tmp_image    =  $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_image, "images/$fish_image");

        if ($fish_category_id =="" || $fish_name =="" || $fish_given_name =="" || $date_of_birth =="" || $gender =="" || $life_span == "" || $foods_and_foraging =="" || $natural_habit =="" || $global_population =="" || $arrived_on_zoo =="" || $size_and_weight =="" || $gestational_period =="" || $fish_author =="" || $average_body_temperature =="" || $water_type =="") 
        {
                
                echo "** All Fields Mandatory";

              }  

              else {
                $query = "INSERT INTO fish (fish_category_id, fish_name,fish_given_name, date_of_birth, gender, life_span, foods_and_foraging, natural_habit, global_population, arrived_on_zoo, size_and_weight, gestational_period, fish_author, fish_image, average_body_temperature, water_type) VALUES ({$fish_category_id}, '{$fish_name}', '{$fish_given_name}', '{$date_of_birth}', '{$gender}','{$life_span}', '{$foods_and_foraging}', '{$natural_habit}', '{$global_population}', '{$arrived_on_zoo}', '{$size_and_weight}', '{$gestational_period}', '{$fish_author}', '{$fish_image}', '{$average_body_temperature}', '{$water_type}') " ;

                $fish_entry = mysqli_query($connection, $query);

                if (!$fish_entry) {
                    die("Query failed");
                }
                header("location:fish.php");
              }    


  }

  ?>

     <center><h2>Add fish</h2></center> 

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="fish_author">Admin</label>
        <input type="text" class="form-control" name="fish_author">
    </div>

    <div class="form-group">
         <label for="fish_category_id">Select Category</label>
        <select name="fish_category_id">
            
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
        <label for="fish_name">fish Name</label>
        <input type="text" class="form-control" name="fish_name">
    </div>

    <div class="form-group">
        <label for="fish_given_name">fish Given Name</label>
        <input type="text" class="form-control" name="fish_given_name">
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
        <label for="fish_image">fish Image</label>
        <input type="file" name="image" >
    </div>

    <div class="form-group">
        <label for="average_body_temperature">Average Body Temperature</label>
        <input type="text" class="form-control" name="average_body_temperature">
    </div>

    <div class="form-group">
        <label for="water_type">Water Type</label>
        <input type="text" class="form-control" name="water_type" placeholder="Salt / Fresh" >
    </div>


    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="insert-fish" value="Add fish">
    </div>
</form>





