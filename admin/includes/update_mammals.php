
<?php

if (isset($_GET['mammals_id'])) {
	$edit_mammals_id = $_GET['mammals_id'];
}

$query = "SELECT *  FROM  mammals WHERE mammals_id=$edit_mammals_id";
$select_posts = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts)) {
        $mammals_category_id = $row['mammals_category_id'];
        $mammals_name =       $row['mammals_name'];
        $mammals_given_name = $row['mammals_given_name'];
        $date_of_birth =      $row['date_of_birth'];
        $gender =             $row['gender'];
        $life_span  =         $row['life_span'];
        $foods_and_foraging =    $row['foods_and_foraging'];
        $natural_habit =      $row['natural_habit'];
        $global_population =  $row['global_population'];
        $arrived_on_zoo =     $row['arrived_on_zoo'];
        $size_and_weight =  $row['size_and_weight'];
        $gestational_period = $row['gestational_period'];
        $mammals_author =     $row['mammals_author'];
        $mammals_image =      $row['mammals_image'];

if (isset($_POST['update-mammals'])) {
	
	$mammals_author =     $_POST['mammals_author'];
	$mammals_category_id = $_POST['mammals_category_id'];
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

	

	$query = "UPDATE mammals SET mammals_category_id='{$mammals_category_id}', mammals_name='{$mammals_name}', mammals_given_name='{$mammals_given_name}', date_of_birth='{$date_of_birth}', gender='{$gender}', life_span='{$life_span}', foods_and_foraging='{$foods_and_foraging}', natural_habit='{$natural_habit}', global_population='{$global_population}', arrived_on_zoo='{$arrived_on_zoo}', size_and_weight='{$size_and_weight}', gestational_period='{$gestational_period}', mammals_author='{$mammals_author}' WHERE mammals_id=$edit_mammals_id ";
	
	//echo $title . " " . $admin;
	
	$update_bus = mysqli_query($connection,$query);

	if (!$update_bus) {
		die("Query Failed" . mysqli_error($connection));
	}

	 header("Location: mammals.php");

}
}

?>
    <center><h2>Update Mammals</h2></center> 
<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="mammals_author">Admin</label>
		<input value="<?php echo $mammals_author; ?>" type="text" class="form-control" name="mammals_author">
	</div>

	<div class="form-group">
				<label for="mammals_author">Please Select Category</label>

		<select name="mammals_category_id">
			
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
		<input value="<?php echo $mammals_name; ?>" type="text" class="form-control" name="mammals_name">
	</div>

	<div class="form-group">
		<label for="mammals_given_name">Mammals Given Name</label>
		<input value="<?php echo $mammals_given_name; ?>" type="text" class="form-control" name="mammals_given_name">
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
         <textarea value="<?php echo $natural_habit?>" class="form-control" name="natural_habit" cols="30" rows="10"><?php echo $natural_habit; ?></textarea>
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
		<img width="100" src="images/<?php echo $mammals_image ?>">
	</div>

	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="update-mammals" value="Update">
	</div>
</form>
