<?php include 'admin_header.php';
?>

            <?php

if(isset($_GET['id']))
    {
        extract($_GET);
        ?>

<div class="container-fluid p-0 mb-5">
<div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="300px">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

            </div>
        </div>

    </div></div></div>

        <center>
            <form action="" method="post">
                <h1>View Payment Details</h1>
                <table class="table" style="width:1000px">
                    <tr><th>Si no</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Card Holder Name</th>
                        <th>Card Number</th>
                        <th>Exp Date</th>
                        <th>Payment Status</th>
                    </tr>
                    <?php
                    $e="	SELECT * FROM payment INNER JOIN booking USING(booking_id) INNER JOIN student USING(student_id) INNER JOIN card USING (student_id) INNER JOIN room USING(room_id) where student_id='$id'";
                    $reel=select($e);
                    $si=1;
                    foreach($reel as $keyy)
                    {
                        ?>
                        <tr>
                        <td><?php echo $si++ ?></td>
                        <td><?php echo $keyy['rent']?></td>
                        <td><?php echo $keyy['payment_date']?></td>
                        <td><?php echo $keyy['card_name']?></td>
                        <td><?php echo $keyy['card_no']?></td>
                        <td><?php echo $keyy['exp_date']?></td>
                        <td><?php echo $keyy['payment_status']?></td>
                        </tr>
                        <?php
                    } ?>
                </table>
            </form>
        </center>


    <?php
} else {

 ?>

<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="300px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                    </div>
                </div>

            </div></div></div>
<center>
<h1 align="center" ">View Bookings</h1>
	<form>
		<table class="table" style="width: 1000px">
			<tr>
				<th>No</th>
                <th>customer name</th>
				<th>Room Name</th>
                <th>Room No</th>
                <th>Price</th>
               
		
				
				
			</tr>
			<?php 


     $q="SELECT * FROM `booking` INNER JOIN student USING(student_id) INNER JOIN room USING(room_id) inner join subcat using(subcat_id) inner join category using (cat_id) where bstatus='paid' ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
            <td><?php echo $row['st_fname']?><?php echo $row['st_lname']?></td>
    		<td>  <?php echo $row['cat_name'] ?>  <?php echo $row['subcat_name'] ?></td>
    		<td>Room-<?php echo $row['room_no'] ?></td>

    		<td><?php echo $row['rent'] ?></td>
    		
    		
    	
            

        
            <td><a href="?id=<?php echo $row['student_id'] ?>" class="btn btn-danger">View Payment Details</a></td>



            <td><a  class="btn btn-success" href="admin_viewcomplaints.php">View complaints</a></td>
         
    		
    		
    		
    	</tr>
    <?php }




			 ?>

		</table>
	</form>
</center>
<?php
}
?>
<?php include 'footer.php'?>