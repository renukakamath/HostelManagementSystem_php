<?php include 'admin_header.php';

if (isset($_POST['add'])) {
    extract($_POST);
    $q="select * from login where user_name='$uname'";
    $res=select($q);
    if(sizeof($res)>0){
    alert('Username already exist');
}else{


    $dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 
  $q="insert into login values('$uname','$pass','staff','1')";
    insert($q);
  $q1="insert into staff values(null,'$uname','$fname','$lname','$dob','$hname','$dist','$pin','$gen','$phone','1','$target')";
    insert($q1);

    
     alert('Registration sucessfully');
  return redirect('admin_manage_staff.php');

}
 else
       {
           echo "file uploading error occured";
       }


}
}
if(isset($_GET['id']))
{
    extract($_GET);
    $q2="delete from staff where user_name='$id'";
    delete($q2);
    $q3="delete from login where user_name='$id'";
    delete($q3);
    alert("Staff Deleted......");
    return redirect('admin_nmanage_staff.php');

}
if(isset($_GET['id1']))
{
    extract($_GET);
    $q4="select * from staff where staff_id='$id1'";
    $tt=select($q4);

}

if (isset($_POST['edit'])) 
{
    extract($_POST);
  $q6="update staff set s_fname='$fname',s_lname='$lname',s_dob='$dob',s_hname='$hname',s_dist='$dist',s_pin='$pin',s_gender='$gen',s_phno='$phone' where staff_id='$id1'";
    update($q6);
    alert("update successfull.......");
    return redirect('admin_manage_staff.php');

}

if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update login set status='0' where user_name='$iid'";
	$q="update staff set s_status='0' where user_name='$iid'";
	update($q);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update login set status='1' where user_name='$aid'";
	$q="update staff set s_status='1' where user_name='$aid'";
	update($q);
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
        <h1 style="color:aliceblue">Manage Staff</h1>
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
                <td><input type="radio" name="gen" value="male" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gen" value="female">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gen" value="oters">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;others&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
                <th>ID Proof</th>
                <td><input type="file" required="" class="form-control" name="imgg"></td>
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

            <form action="" method="post">
                <center>
                    <h1>Staff Details</h1>
                    <table class="table" style="width: 1000px;">
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date Of Birth</th>
                            <th>House Name</th>
                            <th>District</th>
                            <th>Pincode</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>ID Proof</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        $qw="select * from staff";
                        $res=select($qw);
                        $si=1;
                        foreach($res as $key){
                            ?>
                            <tr>
                                <td><?php echo $si++?></td>
                                <td><?php echo $key['s_fname']?></td>
                                <td><?php echo $key['s_lname']?></td>
                                <td><?php echo $key['s_dob']?></td>
                                <td><?php echo $key['s_hname']?></td>
                                <td><?php echo $key['s_dist']?></td>
                                <td><?php echo $key['s_pin']?></td>
                                <td><?php echo $key['s_gender']?></td>
                                <td><?php echo $key['s_phno']?></td>
                                <td><img src="<?php echo $key['s_identity']?>" alt="" width="100px" height="100px"></td>
                           
                                <?php if ($key['s_status']=="1") {
    			?>
				<td><?php echo 'Active'?></td>
            <td><a class="btn btn-danger" href="?iid=<?php echo $key['user_name'] ?>">InActive</a></td>
           
                                <?php 
    		}elseif ($key['s_status']=="0") {
    			?>
				<td><?php echo 'Inactive'?></td>
    			<td><a class="btn btn-success" href="?aid=<?php echo $key['user_name'] ?>">Active</a></td>
    		<?php 
    		} ?>


<!-- 
                                <td><a href="?id=<?php echo $key['user_name']?>" class="btn btn-danger">Delete</a></td> -->
                                <td><a href="?id1=<?php echo $key['staff_id']?>" class="btn btn-warning">Update</a></td>


              
                            </tr>
                            <?php
                        }   ?>
                    </table>
                </center>
            </form>
<?php include 'footer.php'?>

<style>
    th{

        padding-top: 15px !important;
    }
    td{
        padding-top: 15px;
    }
</style>