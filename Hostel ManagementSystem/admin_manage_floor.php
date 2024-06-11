<?php include 'admin_header.php';


if (isset($_POST['category'])) {
	extract($_POST);
	
	$ri="select * from floor where floor='$cname'";
	$iu=select($ri);
	if (sizeof($iu)>0)
	{
			alert("floor already added......");
			return redirect('admin_manage_floor.php');
	}else
	{


    
  $q1="insert into floor values(null,'$cname') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_manage_floor.php');
 }
}
  if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from floor where floor_id ='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update floor set floor='$cname'  where floor_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_manage_floor.php');

 }




 ?>


<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="800px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">



 
<h1 style="color:white" >Manage Floor</h1>
<form method="post">
	<?php   if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th> Floor Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['floor'] ?>" name="cname"></td>
		</tr>
		
		
		
		
		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Floor Name</th>
			<td><input type="text" required="" class="form-control" name="cname"></td>
		</tr>
		
		
	
		
		
		<td align="center" colspan="2"><input type="submit" name="category" value="submit" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>


</div>
                </div>

            </div></div></div>

<center>
	<h1>View Floor Details</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>No</th>
				<th>Floor Name</th>
		
				
				
			</tr>
			<?php 

     $q="select * from floor";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['floor'] ?></td>
    		
    	
    		
    		
    		<td><a class="btn btn-success" href="?uid=<?php echo $row['floor_id'] ?>">update</a></td>
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>