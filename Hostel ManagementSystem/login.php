<?php include 'public_header.php';
if(isset($_POST['login']))
{
    extract($_POST);
    $q="SELECT * FROM `login` WHERE `user_name`='$uname' AND `Password`='$password' AND `status`='1'";
    $res=select($q);
    if(sizeof($res)>0)
    {
        $_SESSION['log_id']=$res[0]['user_name'];
        $log_id=$_SESSION['log_id'];
        $_SESSION['user_type']=$res[0]['user_type'];
        $user_type=$_SESSION['user_type'];
        if($res[0]['user_type']=='admin')
      {
        return redirect('admin_home.php');
      }
    
      elseif($res[0]['user_type']=='customer')
      
        
         {
            $q0="select * from student where user_name='$log_id'";
            $temp=select($q0);
            $_SESSION['stud_id']=$temp[0]['student_id'];
            // $_SESSION['Type']=$temp[0]['Type'];
            $type=$_SESSION['user_type'];
            $stuid=$_SESSION['stud_id'];
            return redirect('student_home.php');
         }
    

         elseif($res[0]['user_type']=='staff')
         {
            $qwe="select * from staff";
            $sd=select($qwe);
            if (sizeof($sd)>0)
            {
                $_SESSION['staff_id']=$sd[0]['staff_id'];
                $staff_id=$_SESSION['staff_id'];
                return redirect('admin_home.php');
            }
            
        
         
            
         }
    
       
    }
    
    else{
        alert("login failed,check username or password or your and inactive user....");
        return redirect('login.php');
    }
}
?>
<div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 800px;">
                            <h4 class="text-primary text-uppercase font-weight-normal mb-md-3"></h4>
                            <h3 class="display-3 text-white mb-md-4"></h3>
                   
<form action="" method="post">
    <center>
       
        
        <table class="table" style="width: 500px;">
                <h1 style="color: white;">Login form</h1>
                <tr>
                    <th style="color:white ;">USERNAME</th>
                     <td><input type="text" class="form-control" name="uname"></td>
                </tr>
                <tr>
                    <th style="color:white ;">PASSWORD</th>
                    <td><input type="password" class="form-control" name="password"></td>
                </tr>

                <tr>
                   
                    <td align="center" colspan="2"><input  class="btn btn-success" type="submit" name="login" value='login'></td>
                </tr>
            
            </table>
</center>
        </form>

        </div>
                    </div>
                </div>
