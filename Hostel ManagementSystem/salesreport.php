<?php 
include 'admin_header.php';

 
extract($_GET);



 ?>



<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="800px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">




      <h3 class="agileits-title two">Search  </h3>

<center>
  <h1></h1>
  <form method="post">
    <table border="10" style="color: black;width: 100px">

  
       <td style="color: "><input type="date" name="daily" > daily </td>
        <td  style="color: "> <input type="month" name="monthly"> monthly</td>

           <td  style="color: "> <input type="text" placeholder="enter customer name" name="customer"> Customer</td>

     <tr>
       <td align="center" colspan="2"><input type="submit" name="sale" class="btn btn-success" value="submit"></td>
      </tr>
    

      </tr>
    </table>
  </form>
</center>


</div>
                </div>

            </div></div></div>



<center>
	<h1 style="color: white">View Sales</h1>
  <h2><a class="btn btn-success" href="sale.php">print</a></h2>
	<table class="table" style="width: 500px;color: black">
		<tr>
		
                <th>Customer name</th>
        <th>Room Name</th>
                <th>Room No</th>
                <th>Price</th>
                <th>Payment Date</th>
                
               
    
        
		</tr>
		<?php 
         if (isset($_POST['sale'])) {
           extract($_POST);
           // echo $monthly;
           if ($daily!="") {
             // "hi";
         $q="SELECT * FROM `booking` INNER JOIN student USING(student_id) INNER JOIN room USING(room_id) inner join subcat using(subcat_id) inner join payment using(booking_id) inner join category using (cat_id) where payment_date='$daily' and `bstatus`='paid' ";
           }
            else if ($monthly!="") {

            
           $q="SELECT * FROM `booking` INNER JOIN student USING(student_id) INNER JOIN room USING(room_id) inner join subcat using(subcat_id) inner join payment using(booking_id) inner join category using (cat_id) where payment_date like '$monthly%' and `bstatus`='paid' ";

             }

              else if ($customer!="") {

            
             $q="SELECT * FROM `booking` INNER JOIN student USING(student_id) INNER JOIN room USING(room_id) inner join subcat using(subcat_id) inner join payment using(booking_id) inner join category using (cat_id) where st_fname like '$customer%' and `bstatus`='paid' ";

             }
           }
             else{
            $q="SELECT * FROM `booking` INNER JOIN student USING(student_id) INNER JOIN room USING(room_id) inner join subcat using(subcat_id) inner join payment using(booking_id) inner join category using (cat_id) where `bstatus`='paid' ";
            }

                $res=select($q);
                $_SESSION['res']=$res;
                $r=$_SESSION['res'];

       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
   
            <td><?php echo $row['st_fname']?><?php echo $row['st_lname']?></td>
        <td><?php echo $row['cat_name'] ?> <?php echo $row['subcat_name'] ?></td>
        <td>Room-<?php echo $row['room_no'] ?></td>

        <td><?php echo $row['rent'] ?></td>
        <td><?php echo $row['payment_date'] ?></td>
    </tr>
  
     <?php
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>