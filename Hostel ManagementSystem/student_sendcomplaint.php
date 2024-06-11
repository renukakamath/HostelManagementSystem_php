<?php include 'student_header.php';
  $stuid=$_SESSION['stud_id'];
  extract($_GET);


if (isset($_POST['category'])) {
	extract($_POST);
	
	


    
  $q1="insert into complaints values(null,'$stuid','$cname','pending',curdate()) ";
   insert($q1);
   alert('sucessfully');
   return redirect('student_sendcomplaint.php');
 }






 ?>


<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="800px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">



 
<h1 style="color:white" >Send Complaints</h1>
<form method="post">

	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Complaints </th>
			<td><textarea name="cname"></textarea></td>
		</tr>
		
		
	
		
		
		<td align="center" colspan="2"><input type="submit" name="category" value="submit" class="btn btn-success"></td>
	</table>

</form>
</center>


</div>
                </div>

            </div></div></div>

<center>
	<h1>View Complaints </h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>No</th>
				<th>Complaints </th>
				<th>Reply</th>
				<th>Date</th>
		
				
				
			</tr>
			<?php 

     $q="select * from Complaints";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['complaints'] ?></td>
    		<td><?php echo $row['reply'] ?></td>
    		<td><?php echo $row['date'] ?></td>
    		
    	
    		
    		
    		
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>