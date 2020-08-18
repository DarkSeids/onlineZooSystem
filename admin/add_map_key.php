<?php
include "../includes/db.php";
include "includes/admin_header.php";

?>

<?php 
include "includes/admin_navigation.php";
?>

<div id="page-wrapper" style="padding-left: 40%;">

            <div class="container-fluid"> 

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-8">
                        

                        <?php 
   if (isset($_POST['add_map_key'])) {
$map_key = $_POST['map_key'];
$type_of_area_or_building = $_POST['type_of_area_or_building'];
$description = $_POST['description'];

if ($map_key =="" || $type_of_area_or_building =="" || $description =="") {
	 echo "** All Fields Mandatory"; 
}

else {
	$query = "INSERT INTO map_key (map_key, type_of_area_or_building, description) VALUES ({$masp_key}, '{$type_of_area_or_building}', '{$description}')";

	$map_key_entry = mysqli_query($connection, $query);
	if (!map_key_entry) {
		die("Query Faild");
	}
	header("location: add_map_key.php");
}

}
?>

 <center><h2>Add Map Information</h2></center> 

 <form action="" method="post">
    
    <div class="form-group">
        <label for="map_key">KEY</label>
        <input type="text" class="form-control" name="map_key">
    </div>

    <div class="form-group">
        <label for="type_of_area_or_building">Type Of Area/Building</label>
        <input type="text" class="form-control" name="type_of_area_or_building">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description">
    </div>

     <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_map_key" value="Add">
    </div>
</form>

</div>
</div>
</div>
</div>



