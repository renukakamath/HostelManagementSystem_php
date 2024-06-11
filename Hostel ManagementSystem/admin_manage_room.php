<?php include 'admin_header.php';
extract($_GET);

if (isset($_POST['add'])) {
    extract($_POST);
    $e="select * from  room where room_no='$rno'";
    $r=select($e);
    if(sizeof($r)>0)
    {
        alert("room alreday added...");
        return redirect('admin_manage_room.php');
    } else{

    $dir = "image/";
	$file = basename($_FILES['img']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("images_").".".$file_type;
	
	if ($file_type == "jpg" OR $file_type=="JPG" OR $file_type == "png" OR $file_type=="PNG" ) {



		if(move_uploaded_file($_FILES['img']['tmp_name'], $target))
		{

        
                $q1="insert into room values(null,'$caid',$staff_id,'$floor','$rno','$rdesc','$target','$price','0','available')";
                 insert($q1);

    
                alert('Room Added  sucessfully');
                 return redirect('admin_manage_room.php');
            }
    

}
 else
       {
            "file uploading error occured";
       }

    }

}



  if (isset($_GET['uid'])) {
 	extract($_GET);

 	$q="select * from subcat inner join room using(subcat_id) inner join category using(cat_id) inner join floor using(floor_id)  where room_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'],$target))
	{
	

   
    $q1="update room set subcat_id='$caid',floor_id='$floor',room_no='$rno',room_desc='$rdesc',image='$target',price='$price' where room_id='$uid'";
    update($q1);

    
     alert('Room updated  sucessfully');
  return redirect('admin_manage_room.php');

}
 else
       {
            "file uploading error occured";
       }

    }





 ?>


<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="800px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">



 
<h1 style="color:white" >Manage Room</h1>

<?php   if (isset($_GET['uid'])) { ?>
    <form method="post" enctype="multipart/form-data">
	<table class="table" style="width:500px;color: white">
    <tr>
        <th>Room Number</th>
        <td><input type="text" name="rno" value="<?php echo $res[0]['room_no']?>" class="form-control"></td>
    </tr>
    <tr>
        <th>Room Name</th>
        <td><select name="caid" id="" class="form-control">
            <option value="<?php echo $res[0]['subcat_id'] ?>"><?php echo $res[0]['cat_name']?>/<?php echo $res[0]['subcat_name'] ?></option>
            <?php 
            $qr="select * from subcat inner join category using(cat_id) ";
            $temp=select($qr);
            foreach($temp as $keyy)
            {
                ?>
                <option value="<?php echo $keyy['subcat_id'] ?>"><?php echo $keyy['cat_name']?>/<?php echo $keyy['subcat_name'] ?></option>
                <?php
            }  ?>
        </select></td>
    </tr>
    <tr>
        <th>Floor</th>
        <td><select name="floor" id="" class="form-control" style="text-align:center">
            <option value="<?php echo $res[0]['subcat_id'] ?>"><?php echo $res[0]['floor']?></option>
            <?php 
            $re="select * from floor";
            $ty=select($re);
            foreach($ty as $keyy){
                ?>
                <option value="<?php echo $keyy['floor_id']?>"><?php echo $keyy['floor']?></option>
                <?php
            }  ?>
        </select></td>
    </tr>
		<tr>
			<th>price</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['price'] ?>" name="price"></td>
		</tr>
		
		<tr>
			<th>Room Description</th>
			<td><input type="text" required="" class="form-control"  name="rdesc" value="<?php echo $res[0]['room_desc']?>"></td>
		</tr>
		 
        <tr>
            <th>Room Image</th>
            <td><input type="file" name="imgg" class="form-control" value="<?php echo $res[0]['image'] ?>"></td>
        </tr>
		
		<td align="center" colspan="2"><input type="submit" name="update" value="Update" class="btn btn-success"></td>
	</table>

</form>
<?php }else{ ?>
    <form method="post" enctype="multipart/form-data">
	<table class="table" style="width:500px;color: white">

    <tr>
        <th>Floor</th>
        <td><select name="floor" id="" class="form-control" style="text-align:center">
            <option value="">......select floor......</option>
            <?php 
            $re="select * from floor";
            $ty=select($re);
            foreach($ty as $keye){
                ?>
                <option value="<?php echo $keye['floor_id']?>"><?php echo $keye['floor']?></option>
                <?php
            }  ?>
        </select></td>
    </tr>

    <tr>

    <th>Room Name</th>
      <td>  <select name="caid" id="" class="form-control" style="text-align:center" required>
            <option>select</option>
            <?php 
            $qr="select * from subcat inner join category using(cat_id)";
            $temp=select($qr);
            foreach($temp as $keyy)
            {
                ?>
                <option value="<?php echo $keyy['subcat_id'] ?>"><?php echo $keyy['cat_name'] ?>/<?php echo $keyy['subcat_name'] ?></option>
                <?php
            }  ?>
        </select></td>
    </tr>
		<tr>
			<th>Room No</th>
			<td><input type="text" required="" class="form-control"  name="rno"></td>
		</tr>
		<tr>
			<th>Room Description</th>
			<td><input type="text" required="" class="form-control"  name="rdesc"></td>
		</tr>
		<tr>
            <th>Room Image</th>
            <td><input type="file" name="img" required class="form-control"></td>
        </tr>
        <tr>
			<th>Room Price</th>
			<td><input type="text" required="" class="form-control"  name="price"></td>
		</tr>
	
		
		
		<td align="center" colspan="2"><input type="submit" name="add" value="submit" class="btn btn-success"></td>
	</table>
    </form>
<?php } ?>

</center>


</div>
                </div>

            </div></div></div>

<center>
	<h1>View Rooms</h1>
	<form>
		<table class="table" style="width: 1000px">
			<tr>
				<th>No</th>
                
				<th>Room Name</th>
                <th>Floor</th>
                <th>Room No</th>
                <th>Room Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>No of Person Alocated</th>
                <th>Room Status</th>
		
				
				
			</tr>
			<?php 

     $q="select * from subcat inner join room using(subcat_id) inner join floor using(floor_id) inner join category using(cat_id)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>

    		<td><?php echo $row['cat_name'] ?><br><?php echo $row['subcat_name'] ?></td>
    		<td><?php echo $row['floor'] ?></td>
            <td><?php echo $row['room_no'] ?></td>
    		<td><?php echo $row['cat_name'] ?> </td>
    		<td><?php echo $row['room_desc'] ?></td>
    		<td><img src="<?php echo $row['image'] ?>" alt="" width="100px" height="100px"></td>
    		<td><?php echo $row['price'] ?></td>
    		<td><?php echo $row['npa'] ?></td>
    		<td><?php echo $row['room_status'] ?></td>
    		
    	
    		
    		
    		<td><a href="?uid=<?php echo $row['room_id'] ?>"class="btn btn-success">update</a></td>
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>