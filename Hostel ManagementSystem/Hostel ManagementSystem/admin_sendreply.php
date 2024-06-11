  <?php include 'admin_header.php';

  extract($_GET);
  


if (isset($_POST['category'])) {
	extract($_POST);
	
	


    
  $q1="update complaints set reply='$cname' where complaint_id='$cid'";
   update($q1);
   alert('sucessfully');
   return redirect('admin_viewcomplaints.php');
 }






 ?>


<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="800px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">



 
<h1 style="color:white" >Send Reply</h1>
<form method="post">

	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Reply </th>
			<td><textarea name="cname"></textarea></td>
		</tr>
		
		
	
		
		
		<td align="center" colspan="2"><input type="submit" name="category" value="submit" class="btn btn-success"></td>
	</table>

</form>
</center>


</div>
                </div>

            </div></div></div>


  <?php include 'footer.php' ?>