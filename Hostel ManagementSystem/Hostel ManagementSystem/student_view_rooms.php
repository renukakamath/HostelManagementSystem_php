<?php include 'student_header.php';
extract($_GET);
// if (isset($_GET['uid']))

// {
//    extract($_GET);
//    $ui="select * from booking where student_id='$stuid'";
//    $oi=select($ui);
//    if(sizeof($oi)>0)
//    {
//      alert("your already own a room.....");
//      return redirect("student_view_bookings.php");
//    }else{
//    $q="insert into booking values(null,'$stuid','$uid')";
//    insert($q);
//    alert("booking successfull visit bookings to make payment...........");
//    return redirect("student_home.php");
// }
// }
?>


<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="300px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      
                    <form method="post">
                    <h1 align="center" style="color:white">search</h1>
                    <form action="" method="post">
                    <table class="table" style="width:500px;color:aliceblue">
                        <tr>
                            <th>search</th>
                            <td><input type="text" name="nm" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2" ><input type="submit" name="search" value="Search" class="btn btn-success"></td>
                        </tr>
                    </table>
                    </form> 
                    
                    </div>
                </div>

            </div></div></div>
<center>
<h1 align="center" ">View Rooms</h1>
	<form>
		<table class="table" style="width: 900px">
			<tr>
				<th>sino</th>
                
				<th>Subcat Name</th>
                <th>room name</th>
                <th>price</th>
                <th>Room status</th>
                <th>Avialablity</th>
				
				
			</tr>
			<?php 

if (isset($_POST['search'])) {
    extract($_POST);
     $q="SELECT * FROM room INNER JOIN subcat USING(subcat_id) INNER JOIN category USING (cat_id) where (Subcat_Name like '%$nm%' or Cat_Name like '%$nm%')";
    $res=select($q);

}else{
     $q="select * from subcat inner join room using(subcat_id) inner join category using(cat_id) where room_status='available'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>

    		<td><?php echo $row['subcat_name'] ?>/<?php echo $row['cat_name'] ?></td>
    		<td>Room-<?php echo $row['room_id'] ?></td>

    		<td><?php echo $row['price'] ?></td>
    		<td><?php echo $row['room_status'] ?></td>
    		
    	
    		<?php if ($row['cat_name']=='SINGLE') 
            {
                ?>
                <td>0/1</td>
            <?php
            }?>
            <?php if ($row['cat_name']=='DOUBLE') 
            {
                ?>
                <td>2</td>
            <?php
            }?>   
    		
    	</tr>
    <?php }




			 ?>
             <?php
}
?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>