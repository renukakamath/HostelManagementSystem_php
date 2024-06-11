<?php include 'student_header.php';
extract($_GET);

$q="SELECT * FROM payment INNER JOIN booking USING(booking_id) INNER JOIN student USING(student_id) INNER JOIN room USING(room_id) WHERE student_id='$stuid'";
$res=select($q);

?>

<script> 
		function printDiv() { 
			var divContents = document.getElementById("div_print").innerHTML; 
			var a = window.open('', '', 'height=500, width=500'); 
			a.document.write(divContents); 
			a.document.close(); 
			a.print(); 
		} 
	</script> 

<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="300px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                   
                    
                    </div>
                </div>

            </div></div></div>
            <div style="padding: 20px;box-shadow: 0px 0px 12px 12px lightgrey;">
            <div id="div_print" >
<h1 style="text-shadow: red 2px 0px ,
cyan -2px 0px ;" align="center"> Hotel</h1>
<h6 class="text-dark ml-5">Bill No : <?php echo $res[0]['student_id']?></h6>
<div style="display: flex;flex-direction: column;justify-content: center;align-items: center;width: 290px;margin-left: 10px;height: 100px;">
    <h3 class="text-black">Name <?php echo $res[0]['st_fname'] ?><?php echo $res[0]['st_lname'] ?></h3>
    <h5 class="text-black">Phone <?php echo $res[0]['st_phno'] ?></h5>
    <h6 class="text-black">Email <?php echo $res[0]['user_name'] ?></h6>

</div>
<center>
<table class="table m-5" align="center" style="width: 1000px;"> 
 
<?php 
foreach($res as $key)
{
?>
    <tr>
    <th>Room No</th>
    <td>Room<?php echo $key['room_no'] ?></td>
    </tr>
    <tr> 
    <th>Payment Date</th> <td><?php echo $key['payment_date'] ?></td>
    </tr>
    <tr>
    <th>Rent</th> <td><?php echo $key['rent'] ?></td>
    </tr>
    <tr>
    <th>Joined Date </th> <td><?php echo $key['checkin_date'] ?></td>
    </tr>
    <tr>
    <th>Vacating Date</th> <td><?php echo $key['checkout_date'] ?></td>
    </tr>
       <tr >
        <td colspan="2" align="right" style="color: red;">Total Amount Paid:&nbsp; ₹<?php echo $key['rent']?> /- only</td>
       </tr>
      
      
  
    <?php
    }
    ?>
</table>
</center>
</div>

            </div>
<div style="width: 100%;height: 40px;">
    <a class="btn btn-warning text-white" style="float: right;margin-right: 100px;margin-top: 10px;" href="" onclick="printDiv()">Print Details</a>
</div>
</div>   
<br><br>    <br><br>
<?php include 'footer.php'?>