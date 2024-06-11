<?php include 'student_header.php';
extract($_GET);

?>


<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="300px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      
                    <form method="post">
                    <h1 align="center" style="color:white">Categories</h1>
             
                    </div>
                </div>


            </div>
        </div>
    </div>


    <center>
	
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
            
				<th>Cat Name</th>
		
				
				
			</tr>
			<?php 

     $q="select * from subcat inner join category using(cat_id)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>

    
    		<td><?php echo $row['cat_name'] ?>/<?php echo $row['subcat_name'] ?></td>
    		
    	
    		
    		
    		<td><a class="btn btn-success" href="student_view_room.php?type=<?php echo $row['subcat_id'] ?>">View Rooms</a></td>
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>