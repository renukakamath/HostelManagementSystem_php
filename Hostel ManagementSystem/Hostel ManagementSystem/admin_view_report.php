<?php include 'admin_header.php';


if (isset($_POST['btn'])) 
{
    extract($_POST);
    $q="SELECT * FROM `booking` INNER JOIN student USING(student_id) INNER JOIN room USING(room_id) inner join subcat using(subcat_id) inner join payment using(booking_id) inner join category using (cat_id)where payment_date between '$fdate' and '$tdate'";
    $res=select($q);
}
else{
    $q="SELECT * FROM `booking` INNER JOIN student USING(student_id) INNER JOIN room USING(room_id) inner join subcat using(subcat_id) inner join payment using(booking_id)inner join category using (cat_id) where bstatus='paid'";
    $res=select($q);
}

    
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

                        <h1 style="color: white;">search by date</h1>
                        <table class="table" style="width:700px;color:aliceblue;" >
                            <tr>
                                <th>From Date</th>
                                <td><input type="date" name="fdate" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>To Date</th>
                                <td><input type="date" name="tdate" class="form-control"></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit"  name="btn" class="btn btn-success"></td>
                            </tr>
                        </table>

                    </div>
                </div>

            </div></div></div>
            <form>
            <div id="div_print" >
<center>
<h1 align="center" ">View Report</h1>
	
		<table class="table" style="width: 1000px">
			<tr>
				<th>No</th>
                <th>Student name</th>
				<th>Room Name</th>
                <th>Room No</th>
                <th>Price</th>
                <th>Payment Date</th>
                
               
		
				
				
			</tr>
			<?php 


     
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
            <td><?php echo $row['st_fname']?><?php echo $row['st_lname']?></td>
    		<td><?php echo $row['cat_name'] ?> <?php echo $row['subcat_name'] ?></td>
    		<td>Room-<?php echo $row['room_no'] ?></td>

    		<td><?php echo $row['rent'] ?></td>
    		<td><?php echo $row['payment_date'] ?></td>
    	
    		
    		
    		
    	</tr>
    <?php }




			 ?>
        </table>
     
</center>
   </div>
   <table>
<tr>
    <td colspan="6" align="right" style="padding-left:1300px ;"><input type="submit" name="btn2" onclick="printDiv()" value="print" class="btn btn-success"></td>
</tr>
		</table>
        </form>

<?php include 'footer.php'?>