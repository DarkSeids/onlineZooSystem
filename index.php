 <?php include "includes/db.php"; ?>
 <?php include "includes/header.php"; ?>

 <!-- Navigation -->
 <?php include "includes/navigation.php"; ?>

 <div class="container">

   <div class="row">

     <!-- Blog Entries Column -->
     <div class="col-md-8">

       <div class="container" style="width: 40%;">

         <h2 style="margin-left: 37%;">Welcome To</h2>

         <img src="images/claybrook.jpg" width="300" style="margin-left: 13%;" class="img-circle" alt="Profile"> <br> <br> <br>

       </div>
       <div style="col-md-4">
         <h4 style="color: #910606">See Our Catalog</h4>


         <li>
           <p>Birds</p>
           <img width="200" height="200;" style="margin-right: 10%;" src="gallery/birds.jpg" alt="">
           <br> <br>
           <p>Fish</p>
           <img width="200" height="200;" style="margin-right: 10%;" src="gallery/fishes.jpg" alt="">
           <br> <br>
           <p>Reptiles</p>
           <img width="200" height="200;" style="margin-right: 10%;" src="gallery/reptiles.jpg" alt="">
           <br> <br>
           <p>Amphibian</p>
           <img width="200" height="200;" style="margin-right: 10%;" src="gallery/amphibian.jpg" alt="">

         </li>

       </div>

     </div>


     <!-- Blog Sidebar Widgets Column -->
     <?php include "includes/sidebar.php"; ?>

   </div>
   <!-- /.row -->




   <?php include "includes/footer.php"; ?>