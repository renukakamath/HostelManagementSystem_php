<?php include 'admin_header.php';


if (isset($_POST['category'])) {
	extract($_POST);
	
	$po="select * from category where cat_name='$cname'";
	$pi=select($po);
	if(sizeof($pi)>0)
	{
		alert("category already added....");
		return redirect('admin_manage_category.php');

	} else{


		
	$q1="insert into category values(null,'$cname','$ctype') ";
	insert($q1);
	alert('sucessfully added');
	return redirect('admin_manage_category.php');
 }
}

  if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from category where cat_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update category set cat_name='$cname',cat_type='$ctype' where cat_id='$uid'";
 	update($q);
 	 alert('sucessfully added');
   return redirect('admin_manage_category.php');

 }




 ?>


<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="800px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">



 
<h1 style="color:white" >Manage Category</h1>
<form method="post">
	<?php   if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th> Category Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['cat_name'] ?>" name="cname"></td>
		</tr>
		<tr>
			<th>No of students</th>
			<td><input type="number" required="" class="form-control" name="ctype" value="<?php echo $res[0]['cat_type'] ?>"></td>
		</tr>
		
		
		
		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Category Name</th>
			<td><input type="text" required="" class="form-control" name="cname"></td>
		</tr>
		<tr>
			<th>No of students</th>
			<td><input type="number" required="" class="form-control" name="ctype"></td>
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
	<h1>View Category</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>No</th>
				<th>Category Name</th>
				<th>No of students</th>
				<th>Total Rooms</th>
				<th>Available Rooms	</th>
		
				
				
			</tr>
			<?php 

      $q="select * from category";

     $res=select($q);
     $sino=1;

    foreach ($res as $row) {
		 $cat_id=$row['cat_id'];
		  $qd="SELECT COUNT(room_id) as rc FROM room INNER JOIN subcat USING(subcat_id) INNER JOIN category USING(cat_id) WHERE cat_id='$cat_id'";
		$rrmm=select($qd);
		$rcc="";
		foreach($rrmm as $rm){
			 $rcc=$rm['rc'];
		}

		 $qa="select count(room_id) as avroom from room inner join subcat using(subcat_id) inner join category using(cat_id) where cat_id='$cat_id' and `room_status`='available'";
		$qas=select($qa);
		$av="";
		foreach($qas as $qass){
			 $av=$qass['avroom'];
	   }


		?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['cat_name'] ?></td>
    		<td><?php echo $row['cat_type'] ?></td>
			<td><?php echo $rcc; ?></td>
			<td><?php echo $av; ?></td>
    		
    	
    		
    		
    		<td><a class="btn btn-success" href="?uid=<?php echo $row['cat_id'] ?>">update</a></td>
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>