<?php include 'public_header.php';

if (isset($_POST['add'])) {//store values in add button
    extract($_POST);//extract that values
    $q="select * from login where user_name='$uname'";
    $res=select($q);
    if(sizeof($res)>0){
    alert('Username already exist');//to avoid same username
}else{

    $dir = "img/";//image storing
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		
        $file = basename($_FILES['imgg1']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target1 = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg1']['tmp_name'], $target1))
	{
    
    
    $q="insert into login values('$uname','$pass','customer','1')";
    insert($q);
    $q1="insert into student values(null,'$uname','$fname','$lname','$dob','$gen','$hname','$dist','$pin','$phone','$target1','$target')";
    insert($q1);

    
     alert('Sucessfully Registered!');
  return redirect('login.php');//to go to next page after login and show success
}
}
 else
       {
            "file uploading error occured";
       }



}

}

?>
<div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image" height="1000px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 800px;">
                            <h4 class="text-primary text-uppercase font-weight-normal mb-md-3"></h4>
                            <h3 class="display-3 text-white mb-md-4"></h3>
                   
<form action="" method="post"  enctype="multipart/form-data">
    <center>
        <h1 style="color:aliceblue">Customer Registration</h1>
        <table class="table" style="width: 500px;color:white;">
            <tr>
                <th>First Name</th>
                <td><input type="text" name="fname" class="form-control" required value="<?php if(isset($_GET['id1'])){ ?> <?php echo $tt[0]['s_fname']?> <?php } ?>"></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input type="text" name="lname" class="form-control" required value="<?php if(isset($_GET['id1'])){ ?> <?php echo $tt[0]['s_lname']?> <?php } ?>"></td>
            </tr>
            
            <tr>
                <th>Date Of Birth</th>
                <td><input type="date" name="dob" class="form-control" required value="<?php if(isset($_GET['id1'])){ ?> <?php echo $tt[0]['s_dob']?> <?php } ?>"></td>
            </tr>
            <tr>
                <th>House Name</th>
                <td><input type="text" name="hname" class="form-control" required value="<?php if(isset($_GET['id1'])){ ?> <?php echo $tt[0]['s_hname']?> <?php } ?>"></td>
            </tr>
            
            <tr>
                <th>District</th>
                <td><input type="text" name="dist" class="form-control" required value="<?php if(isset($_GET['id1'])){ ?> <?php echo $tt[0]['s_dist']?> <?php } ?>"></td>
            </tr>
            <tr>
                <th>Pincode</th>
                <td><input type="text" name="pin" pattern="[0-9]{6}" class="form-control" required value="<?php if(isset($_GET['id1'])){ ?><?php echo $tt[0]['s_pin']?><?php } ?>"></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><input type="radio" name="gen" required="" value="male" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gen" required="" value="female">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" required="" name="gen" value="oters">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;others&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><input type="text" name="phone" pattern="[0-9]{10}" required="" class="form-control" value="<?php if(isset($_GET['id1'])){ ?><?php echo $tt[0]['s_phno']?><?php } ?>"></td>
            </tr>
            <?php 
            if (isset($_GET['id1'])) {

                ?>
                <?php
            } else{

                ?>
            <tr>
                <th>Proof</th>
                <td><input type="file" required="" class="form-control" name="imgg"></td>
            </tr>
            <tr>
                <th>Photo</th>
                <td><input type="file" required="" class="form-control" name="imgg1"></td>
            </tr>
            <tr>
                <th>UserName</th>
                <td><input type="email" name="uname" required class="form-control" placeholder="must use a valid email" ></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="pass" class="form-control" required></td>
            </tr>
            <?php 
            }
            ?>
            <tr>
                <td align="center" colspan="2"><input type="submit"  class="btn btn-success" <?php if (isset($_GET['id1'])) { ?>
                    name="edit" value="Update"
                    <?php
                } else{
                    ?>
                    name="add" value="Register"
                    <?php
                } ?> ></td>
            </tr>
        </table>
    </center>
</form>
</div>
                    </div>
                </div>
            </div>

         
<?php include 'footer.php'?>

<style>
    th{

        padding-top: 15px !important;
    }
    td{
        padding-top: 15px;
    }
</style>