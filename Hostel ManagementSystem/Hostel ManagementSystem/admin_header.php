<?php
include 'connection.php';

$type=$_SESSION['user_type'];


if($type=="staff"){
	$staff_id=$_SESSION['staff_id'];
}
else{
	$staff_id="0";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BOYS HOSTEL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@400;500;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!--  Topbar Start -->
    <div class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-3">
        <div class="">
            <div class="row">
                <div class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-3">
                
                <!--     <div class="d-inline-flex align-items-center">
                        <a class="text-white pr-3" href="">FAQs</a>
                        <span class="text-white">|</span>
                        <a class="text-white px-3" href="">Help</a>
                        <span class="text-white">|</span>
                        <a class="text-white pl-3" href="">Support</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-white pl-3" href="">
                            <i class="fab fa-youtube"></i>-->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End 


      <!-- Navbar Start -->
      <div class=" position-relative nav-bar p-0" >
        <div class=" position-relative" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-3" style="text-align:center;">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 display-5 text-white"><span class="text-primary">B</span>OYS</h1>
                    <h5 style="color: white;">BOYS HOSTEL</h5>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse" >
                    <div class="navbar-nav ml-auto py-0">
                        <a href="admin_home.php" class="nav-item nav-link">Home</a>
                        <?php 
								if($type=="admin"){ ?>
									<a href="admin_manage_staff.php" class="nav-item nav-link">Staff</a>
							<?php	}
								
							?>
                        <a href="admin_manage_category.php" class="nav-item nav-link"> Add Category</a>
                        <a href="admin_manage_subcategory.php" class="nav-item nav-link">Add SubCategory</a>
                        <a href="admin_manage_floor.php" class="nav-item nav-link">Add Floor</a>
                        <a href="admin_manage_room.php" class="nav-item nav-link">Manage Rooms</a>
                        <a href="admin_view_bookings.php" class="nav-item nav-link">View Bookings</a>
                        <a href="admin_view_students.php" class="nav-item nav-link">View Students</a>
                        <a href="salesreport.php" class="nav-item nav-link">View Report</a>
                        <a href="index.php" class="nav-item nav-link">Logout</a>
                        
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                <a href="single.html" class="dropdown-item">Blog Detail</a>
                            </div>
                        </div> -->
                   
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Under Nav Start -->
   
    <!-- Under Nav End -->


