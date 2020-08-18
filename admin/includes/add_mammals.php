<?php 

    if (isset($_POST['insert-mammals'])) {
        
        $category =           $_POST['category'];
        $mammals_name =       $_POST['mammals_name'];
        $mammals_given_name = $_POST['mammals_given_name'];
        $date_of_birth =      $_POST['date_of_birth'];
        $gender =             $_POST['gender'];
        $life_span  =         $_POST['life_span'];
        $foods_and_foraging =    $_POST['foods_and_foraging'];
        $natural_habit =      $_POST['natural_habit'];
        $global_population =  $_POST['global_population'];
        $arrived_on_zoo =     $_POST['arrived_on_zoo'];
        $size_and_weight =  $_POST['size_and_weight'];
        $gestational_period = $_POST['gestational_period'];
        $mammals_author =     $_POST['mammals_author'];


        $mammals_image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_image, "images/$mammals_image");

        if ($category=="" || $mammals_name==""|| $mammals_given_name=="" || $date_of_birth=="" || $gender=="" || $life_span=="" || $foods_and_foraging=="" || $natural_habit=="" || $global_population=="" || $arrived_on_zoo=="" || $size_and_weight=="" || $gestational_period=="" || $mammals_author=="") {
            echo "**All Fields Mandatory";
        }
        else {
            $query = "INSERT INTO mammals(mammals_category_id, mammals_name,  mammals_given_name, date_of_birth, gender, life_span, foods_and_foraging, natural_habit, global_population, arrived_on_zoo, size_and_weight, gestational_period, mammals_author, mammals_image) VALUES({$category}, '{$mammals_name}', '{$mammals_given_name}', '{$date_of_birth}', '{$gender}', '{$life_span}', '{$foods_and_foraging}', '{$natural_habit}', '{$global_population}', '{$arrived_on_zoo}', '{$size_and_weight}', '{$gestational_period}', '{$mammals_author}' , '{$mammals_image}')";

            $species_entry = mysqli_query($connection,$query);

            if (!$species_entry) {
                die("Query Failed");
            }
            header("Location: mammals.php");
        }
    }

?>
     <center><h2>Add Mammals</h2></center> 

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="mammals_author">Admin</label>
        <input type="text" class="form-control" name="mammals_author">
    </div>

    <div class="form-group">
         <label for="category">Select Category</label> 
        <select name="category">
            
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
        <label for="mammals_name">Mammals Name</label>
        <input type="text" class="form-control" name="mammals_name">
    </div>

    <div class="form-group">
        <label for="mammals_given_name">Mammals Given Name</label>
        <input type="text" class="form-control" name="mammals_given_name">
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
        <label for="mammals_image">Mammals Image</label>
        <input type="file" name="image" >
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="insert-mammals" value="Add Mammals">
    </div>
</form>





