<?php include 'admin_header.php';
    extract($_GET);



    if (isset($_GET['id'])) 
    {
        extract($_GET);
        $a="update room set room_status='available',npa=npa-'1' where room_id='$id'";
        update($a);
        $e="delete from booking where room_id='$id' and student_id='$stid'";
        delete($e);
        alert("Room Vecated.......");
        return redirect("admin_view_students.php");
    }



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

            <form action="" method="post">
                <center>
                    <h1>View Student Details</h1>
                    <table class="table" style="width: 1000px">
			<tr>
				<th>No</th>
                <th>Room No</th>
                <th>Student name</th>
				<th>Date Of Birth</th>
                <th>Gender</th>
                <th>House Name</th>
                <th>District</th>
                <th>Pincode</th>
                <th>Phone Number</th>
                <th>Photo</th>
                <th>Id Proof</th>
                
               
		
				
				
			</tr>
			<?php 


     $q="SELECT * FROM student INNER JOIN booking USING(student_id) INNER JOIN room USING(room_id) where bstatus='paid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
            <td><?php echo $row['room_no']?></td>
            <td><?php echo $row['st_fname']?> <?php echo $row['st_lname']?></td>
    		<td><?php echo $row['st_dob'] ?></td>
    		<td><?php echo $row['st_gender'] ?></td>
    		<td><?php echo $row['st_hname'] ?></td>
    		<td><?php echo $row['st_dist'] ?></td>
    		<td><?php echo $row['st_pin'] ?></td>
    		<td><?php echo $row['st_phno'] ?></td>
    		<td><img src="<?php echo $row['st_photo'] ?>" alt="" width="100px" height="100px"></td>
    		<td><img src="<?php echo $row['st_identity'] ?>" alt="" width="100px" height="100px"></td>
            
    	
    		
    		
    	</tr>
    <?php }
			 ?>

		</table>
                </center>
            </form>