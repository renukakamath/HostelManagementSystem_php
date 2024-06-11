<?php include 'admin_header.php';
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
	<h1>View Complaints </h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Complaints </th>
				<th>Reply</th>
				<th>Date</th>
		
				
				
			</tr>
			<?php 

     $q="select * from Complaints inner join student using (student_id)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['st_fname'] ?><?php echo $row['st_lname'] ?></td>
    		<td><?php echo $row['complaints'] ?></td>
    		<td><?php echo $row['reply'] ?></td>
    		<td><?php echo $row['date'] ?></td>


    		<?php 

if ($row['reply']=="pending") {


	?>


	<td><a  class="btn btn-primary" href="admin_sendreply.php?cid=<?php echo $row['complaint_id'] ?>">Send Reply</a></td>

<?php }

    		 ?>
    		
    	
    		
    		
    		
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>