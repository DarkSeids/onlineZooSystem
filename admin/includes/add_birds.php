<?php

if (isset($_POST['insert-bird'])) {
    
    $bird_category_id =     $_POST['bird_category_id']; 
    $bird_name     =     $_POST['bird_name'];
    $bird_given_name =    $_POST['bird_given_name'];
    $date_of_birth   =    $_POST['date_of_birth'];
    $gender          =    $_POST['gender'];
    $life_span       =    $_POST['life_span'];
    $foods_and_foraging =    $_POST['foods_and_foraging'];
    $natural_habit     =    $_POST['natural_habit'];
    $global_population =  $_POST['global_population'];
    $arrived_on_zoo    =  $_POST['arrived_on_zoo'];
    $size_and_weight    =  $_POST['size_and_weight'];
    $gestational_period = $_POST['gestational_period'];
    $bird_author        = $_POST['bird_author'];
    $clutch_size        = $_POST['clutch_size'];
    $wing_span          = $_POST['wing_span'];
    $ability_to_fly     = $_POST['ability_to_fly'];


        $bird_image    = $_FILES['image']['name'];
        $tmp_image    =  $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_image, "images/$bird_image");

        if ($bird_category_id =="" || $bird_name =="" || $bird_given_name =="" || $date_of_birth =="" || $gender =="" || $life_span == "" || $foods_and_foraging =="" || $natural_habit =="" || $global_population =="" || $arrived_on_zoo =="" || $size_and_weight =="" || $gestational_period =="" || $bird_author =="" || $clutch_size =="" || $wing_span =="" || $ability_to_fly =="") 
        {
                
                echo "** All Fields Mandatory";

              }  

              else {
                $query = "INSERT INTO birds (bird_category_id, bird_name,bird_given_name, date_of_birth, gender, life_span, foods_and_foraging, natural_habit, global_population, arrived_on_zoo, size_and_weight, gestational_period, bird_author, bird_image, clutch_size, wing_span, ability_to_fly ) VALUES ({$bird_category_id}, '{$bird_name}', '{$bird_given_name}', '{$date_of_birth}', '{$gender}','{$life_span}', '{$foods_and_foraging}', '{$natural_habit}', '{$global_population}', '{$arrived_on_zoo}', '{$size_and_weight}', '{$gestational_period}', '{$bird_author}', '{$bird_image}', '{$clutch_size}', '{$wing_span}', '{$ability_to_fly}'  ) " ;

                $bird_entry = mysqli_query($connection, $query);

                if (!$bird_entry) {
                    die("Query failed");
                }
                header("location:birds.php");
              }    


  }

  ?>

     <center><h2>Add Bird</h2></center> 

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="bird_author">Admin</label>
        <input type="text" class="form-control" name="bird_author">
    </div>

    <div class="form-group">
         <label for="bird_category_id">Select Category</label>
        <select name="bird_category_id">
            
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
        <label for="bird_name">Bird Name</label>
        <input type="text" class="form-control" name="bird_name">
    </div>

    <div class="form-group">
        <label for="bird_given_name">Bird Given Name</label>
        <input type="text" class="form-control" name="bird_given_name">
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
        <label for="bird_image">Bird Image</label>
        <input type="file" name="image" >
    </div>

    <div class="form-group">
        <label for="clutch_size">Bird Clutch Size</label>
        <input type="text" class="form-control" name="clutch_size" >
    </div>

    <div class="form-group">
        <label for="wing_span">Bird Wing Span</label>
        <input type="text" class="form-control" name="wing_span" >
    </div>

    <div class="form-group">
        <label for="ability_to_fly">Ability To Fly</label>
        <input type="text" class="form-control" name="ability_to_fly" placeholder="Yes/No" >
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="insert-bird" value="Add bird">
    </div>
</form>





