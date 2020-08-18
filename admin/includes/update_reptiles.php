
<?php

if (isset($_GET['reptile_id'])) {
	$edit_reptile_id = $_GET['reptile_id']; 
}

$query = "SELECT *  FROM  reptiles WHERE reptile_id=$edit_reptile_id";
$select_posts = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts)) {
        $reptile_category_id = $row['reptile_category_id'];
        $reptile_name =       $row['reptile_name'];
        $reptile_given_name = $row['reptile_given_name'];
        $date_of_birth =      $row['date_of_birth'];
        $gender =             $row['gender'];
        $life_span  =         $row['life_span'];
        $foods_and_foraging =    $row['foods_and_foraging'];
        $natural_habit =      $row['natural_habit'];
        $global_population =  $row['global_population'];
        $arrived_on_zoo =     $row['arrived_on_zoo'];
        $size_and_weight =  $row['size_and_weight'];
        $gestational_period = $row['gestational_period'];
        $reptile_author =     $row['reptile_author'];
        $reptile_image =      $row['reptile_image'];
        $reproduction_type        = $row['reproduction_type'];
        $average_number_of_offspring          = $row['average_number_of_offspring'];
        $average_clutch_size     = $row['average_clutch_size'];

if (isset($_POST['update-reptile'])) {
	
	$reptile_author =     $_POST['reptile_author'];
	$reptile_category_id = $_POST['reptile_category_id'];
	$reptile_name =       $_POST['reptile_name'];
	$reptile_given_name = $_POST['reptile_given_name'];
	$date_of_birth =      $_POST['date_of_birth'];
    $gender =             $_POST['gender'];
    $life_span  =         $_POST['life_span'];
    $foods_and_foraging =    $_POST['foods_and_foraging'];
    $natural_habit =      $_POST['natural_habit'];
    $global_population =  $_POST['global_population'];
    $arrived_on_zoo =     $_POST['arrived_on_zoo'];
    $size_and_weight =  $_POST['size_and_weight'];
    $gestational_period = $_POST['gestational_period'];
    $reptile_author =     $_POST['reptile_author'];
    $reproduction_type        = $_POST['reproduction_type'];
    $average_number_of_offspring          = $_POST['average_number_of_offspring'];
    $average_clutch_size     = $_POST['average_clutch_size'];

	

	$query = "UPDATE reptiles SET reptile_category_id='{$reptile_category_id}', reptile_name='{$reptile_name}', reptile_given_name='{$reptile_given_name}', date_of_birth='{$date_of_birth}', gender='{$gender}', life_span='{$life_span}', foods_and_foraging='{$foods_and_foraging}', natural_habit='{$natural_habit}', global_population='{$global_population}', arrived_on_zoo='{$arrived_on_zoo}', size_and_weight='{$size_and_weight}', gestational_period='{$gestational_period}', reptile_author='{$reptile_author}', reproduction_type='{$reproduction_type}', average_number_of_offspring='{$average_number_of_offspring}', average_clutch_size='{$average_clutch_size}' WHERE reptile_id=$edit_reptile_id ";
	
	//echo $title . " " . $admin;
	
	$update_reptile = mysqli_query($connection,$query);

	if (!$update_reptile) {
		die("Query Failed" . mysqli_error($connection));
	}

	 header("Location: reptiles.php");

}
}

?>
   <center><h2>Update reptile</h2></center> 
<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="reptile_author">Admin</label>
		<input value="<?php echo $reptile_author; ?>" type="text" class="form-control" name="reptile_author">
	</div>

	

	<div class="form-group">
		<label for="reptile_category_id">Please Select Category</label>

		<select name="reptile_category_id">
			
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
		<label for="reptile_name">reptile Name</label>
		<input value="<?php echo $reptile_name; ?>" type="text" class="form-control" name="reptile_name">
	</div>

	<div class="form-group">
		<label for="reptile_given_name">reptile Given Name</label>
		<input value="<?php echo $reptile_given_name; ?>" type="text" class="form-control" name="reptile_given_name">
	</div>

	 <div class="form-group">
        <label for="date_of_birth">Date Of Birth</label>
        <input value="<?php echo $date_of_birth ?>" type="date" style="margin-top: 10px; "name="date_of_birth" class="form-control" id="date" placeholder="dd/mm/yyyy" >
    </div>

	<div class="form-group">
        <label for="gender">Gender</label>
        <input value="<?php echo $gender ?>" type="text" class="form-control" name="gender">
    </div>

    <div class="form-group">
        <label for="life_span">Life Span</label>
        <input value="<?php echo $life_span ?>" type="text" class="form-control" name="life_span">
    </div>
    
    <div class="form-group">
        <label for="foods_and_foraging">Foods And Foraging</label>
        <textarea value="<?php echo $foods_and_foraging ?>" class="form-control" name="foods_and_foraging" cols="30" rows="10"><?php echo $foods_and_foraging; ?></textarea>
    </div>

    <div class="form-group">
        <label for="natural_habit">Natural Habit</label>
        <textarea value="<?php echo $natural_habit ?>" class="form-control" name="natural_habit" cols="30" rows="10"><?php echo $natural_habit; ?></textarea>
    </div>

    <div class="form-group">
        <label for="global_population">Global Population</label>
        <input value="<?php echo $global_population ?>" type="text" class="form-control" name="global_population" >
    </div>

     <div class="form-group">
        <label for="arrived_on_zoo">Arrived On Zoo</label>
        <input value="<?php echo $arrived_on_zoo ?>" type="date" style="margin-top: 10px;"  name="arrived_on_zoo" class="form-control" id="date" placeholder="dd/mm/yyyy" >
    </div>

    <div class="form-group">
        <label for="size_and_weight">Size And Weight</label>
       <textarea value="<?php echo $size_and_weight ?>" class="form-control" name="size_and_weight" cols="30" rows="10"><?php echo $size_and_weight; ?></textarea>
    </div>

    <div class="form-group">
        <label for="gestational_period">Gestational Period</label>
        <input value="<?php echo $gestational_period ?> " type="text" class="form-control" name="gestational_period" >
    </div>

    <div class="form-group">
		<img width="100" src="images/<?php echo $reptile_image ?>">
	</div>


    <div class="form-group">
        <label for="reproduction_type">Reproduction type</label>
        <input value="<?php echo $reproduction_type ?>" type="text" class="form-control" name="reproduction_type" >
    </div>

    <div class="form-group">
        <label for="average_number_of_offspring">Average Number of offspring</label>
        <input value="<?php echo $average_number_of_offspring ?> " type="text" class="form-control" name="average_number_of_offspring" >
    </div>

     <div class="form-group">
        <label for="average_clutch_size">Average Clutch Size</label>
        <input value="<?php echo $average_clutch_size ?> " type="text" class="form-control" name="average_clutch_size" >
    </div>


    <div class="form-group">
		<input type="submit" class="btn btn-primary" name="update-reptile" value="Update">
	</div>
</form>
