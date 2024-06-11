<?php include 'admin_header.php';


if (isset($_POST['category'])) {
	extract($_POST);
	
    $po="select * from subcat where cat_id='$caid' and subcat_name='$cname'";
	$pi=select($po);
	if(sizeof($pi)>0)
	{
		alert("subcategory already added....");
		return redirect('admin_manage_subcategory.php');

	} else{


   $q1="insert into subcat values(null,'$caid','$cname') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_manage_subcategory.php');
 }
}
  if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from subcat inner join category using(cat_id) where subcat_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update subcat set cat_id='$caid',subcat_name='$cname'  where subcat_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_manage_subcategory.php');

 }




 ?>


<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="800px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">



 
<h1 style="color:white" >Manage Subcategory</h1>
<form method="post">
	<?php   if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
    <tr>
        <th>Category Name</th>
        <td><select name="caid" id="" class="form-control">
            <option value="<?php echo $res[0]['cat_id'] ?>"><?php echo $res[0]['cat_name'] ?></option>
            <?php 
            $qr="select * from category";
            $temp=select($qr);
            foreach($temp as $keyy)
            {
                ?>
                <option value="<?php echo $keyy['cat_id'] ?>"><?php echo $keyy['cat_name'] ?></option>
                <?php
            }  ?>
        </select></td>
    </tr>
		<tr>
			<th> SubCategory Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['subcat_name'] ?>" name="cname"></td>
		</tr>
		
		
		
		
		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
    <th>Category Name</th>
      <td>  <select name="caid" id="" class="form-control">
            <option>select</option>
            <?php 
            $qr="select * from category";
            $temp=select($qr);
            foreach($temp as $keyy)
            {
                ?>
                <option value="<?php echo $keyy['cat_id'] ?>"><?php echo $keyy['cat_name'] ?></option>
                <?php
            }  ?>
        </select></td>
    </tr>
		<tr>
		<tr>
			<th>SubCategory Name</th>
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
	<h1>View Subcategory</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>No</th>
                <th>Category Name</th>
				<th>Subcategory Name</th>
		
				
				
			</tr>
			<?php 

     $q="select * from subcat inner join category using(cat_id)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>

    		<td><?php echo $row['cat_name'] ?></td>
    		<td><?php echo $row['subcat_name'] ?></td>
            
    		
    	
    		
    		
    		<td><a class="btn btn-success" href="?uid=<?php echo $row['subcat_id'] ?>">update</a></td>
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>