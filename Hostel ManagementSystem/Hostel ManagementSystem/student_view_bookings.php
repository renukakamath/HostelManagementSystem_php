<?php include 'student_header.php';
extract($_GET);
if (isset($_POST['pay']))
 {
    extract($_POST);
    $po="select * from room  where room_id='$rid'";
    $pi=select($po);
    $m=$pi[0]['npa'];
    $n=$pi[0]['cat_type'];
    if($n==$m)
    {
      alert("Room Not Available At Right Now......");
      return redirect('student_view_room.php');
    } else{
    // $ss=date("Y-m")."%";
    // $var="select * from payment where booking_id='$bid' and payment_date like '$ss'";
    // $var1=select($var);
    // if(sizeof($var1)>0)
    // {
    //     alert("you have aleady paid this month fee.....");
    //     return redirect('student_view_bookings.php');

    // } else{

    
    $q="insert into payment values(null,'$bid',curdate(),'paid')";
    insert($q);
    $q1="insert into card values(null,'$stuid','$cnum','$chname','$date')";
    insert($q1);
    $e4="update room set npa=npa+'1' where room_id='$rid'";
    update($e4);
    $hu="select * from room inner join subcat using (subcat_id) inner join category using(cat_id) where room_id='$rid'";
    $sd=select($hu);
    $hk=$sd[0]['npa'];
    if($sd[0]['cat_type']==$hk)
    {
        $q3="update room set room_status='occupied' where room_id='$rid'";
        update($q3);
        $ff="update booking set bstatus='paid' where booking_id='$bid'";
        update($ff);
        alert("Payment success fees paid......");
        return redirect("student_view_bookings.php");
    } else{
      $ff="update booking set bstatus='paid' where booking_id='$bid'";
      update($ff);
      alert("Payment success fees paid......");
      return redirect("student_view_bookings.php");
    }
    }  
    
  }



    if (isset($_GET['id'])) 
{
    extract($_GET);
    $a="update room set room_status='available',npa=npa-'1' where room_id='$id'";
    update($a);
    $e="update booking set bstatus='vecated' where room_id='$id' and student_id='$stuid'";
    delete($e);
    alert("Room Vecated.......");
    return redirect("student_home.php");
}


// if (isset($_GET['id'])) 
// {
//     extract($_GET);
//     $a="update room set room_status='available',npa=npa-'1' where room_id='$id'";
//     update($a);
//     $e="delete from booking where room_id='$id' and student_id='$stuid'";
//     delete($e);
//     alert("Room Vecated.......");
//     return redirect("student_home.php");
// }

?>
 <form method="post">
                    <?php 
                    if (isset($_GET['uid'])) {

                        ?>

<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="800px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      
                   
                        <center>
                            <h1 style="color:white">make payment</h1>
                        <form action="" method="post">
                            <table class="table" style="width:700px;color:white">
                                <tr>
                                    <th>Total Amount</th>
                                    <td><input type="text" name='cost' readonly value="<?php echo $cost?>" class="form-control"></td>
                                    <td><input type="hidden" name='rid' readonly value="<?php echo $uid?>" class="form-control"></td>
                                    <td><input type="hidden" name='bid' readonly value="<?php echo $bid?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>CARDHOLDER NAME</th>
                                    <td><input type="text" name="chname" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <th>CARD NUMBER</th>
                                    <td><input type="text" name="cnum" pattern="[0-9]{16}" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <th>CVV</th>
                                    <td><input type="password" name="cvv" pattern="[0-9]{3}" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <th>EXP DATE</th>
                                    <td>
                                        <input type="month" name="date" placeholder="MM" pattern="[0-9]{2}" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2"><input type="submit" name="pay" class="btn btn-success"></td>
                                </tr>
                            </table>
                        </form>
                        </center>
                   
                    
                    </div>
                </div>

            </div></div></div>
            <?php 
        } else{

            ?>
            <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="300px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                    </div>
                </div>

            </div></div></div>
            <?php
  $q="SELECT * FROM `booking` INNER JOIN student USING(student_id) INNER JOIN room USING(room_id) inner join payment using(booking_id) inner join subcat using(subcat_id) where student_id='$stuid' and bstatus='paid'";
$res=SELECT($q);
$sino=1;
 if(sizeof($res)<=0)
 {
    ?>
    <h3 align="center" style="color:red ;">No Bookings Yet......</h3>  
    <?php
 }
     ?>
            <h2 style="color: red" align="center"><u>My Room</u></h2>
    <div class="container" style="margin:1em;height: auto;">
          
    <div class="" id="ccd" style="margin-top: 100px; width: 1500px; height: 400px;">   
<?php 

foreach ($res as $row) {?>
                 
<div class="row " >
                <div class="photo col-md-4" style="float: left;">
                    <img src="<?php echo $row['image']?>" width="500px" height="300px">
                
                </div>
              
                <div class="description col-md-8" style="float: right;" >
                    <h2 style="margin-left: 50px;">Room-<?php echo $row['room_no']?></h2>
                    <h4  style="margin-left: 50px;"><?php echo $row['room_desc']?></h4>
                    <h1  style="margin-left: 50px;">₹<?php echo $row['rent']?></h1>
                    <!-- <p>Classic Peace Lily is a spathiphyllum floor plant arranged in a bamboo planter with a blue & red ribbom and butterfly pick.</p> -->
                    <?php if($row['bstatus']=='pending')
                    {
                        ?>
                        <?php
                    }else if($row['bstatus']=='paid') 
                    {
                        ?>
                         <div style="margin-left: 600px;" ><td><a class="btn btn-success" href="genarate_bill.php?">Genarte Bill</a></td></div>
                       <div><td><a href="?id=<?php echo $row['room_id']?>&stid=<?php echo $row['student_id']?>" class="btn btn-danger"> Vecate Room</a></td></div>
                    <?php
                    }
                    ?>

                </div>
                
               
                </div>
                <hr>
                <?php 
            
        }  ?>
                
                </div>
                </div>
        
    <?php }
    ?>
<style>
  /* cyrillic-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCAIT5lu.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCkIT5lu.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCIIT5lu.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCMIT5lu.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyC0ITw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCAIT5lu.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCkIT5lu.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCIIT5lu.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCMIT5lu.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyC0ITw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCAIT5lu.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCkIT5lu.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCIIT5lu.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCMIT5lu.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyC0ITw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 700;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCAIT5lu.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 700;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCkIT5lu.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 700;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCIIT5lu.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 700;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCMIT5lu.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 700;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyC0ITw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
 * {
	 box-sizing: border-box;
}

 body .card {
	 width: 650px;
	 position: absolute;
	 background: white;
	 margin: 0 auto;
	 top: 50%;
	 left: 50%;
	 transform: translate(-50%, -50%);
	 box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
	 transition: all 0.3s;
}
 body .card:hover {
	 box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
 body .card nav {
	 width: 100%;
	 color: #727272;
	 text-transform: uppercase;
	 padding: 20px;
	 border-bottom: 2px solid #efefef;
	 font-size: 12px;
}
 body .card nav svg.heart {
	 height: 24px;
	 width: 24px;
	 float: right;
	 margin-top: -3px;
	 transition: all 0.3s ease;
	 cursor: pointer;
}
 body .card nav svg.heart:hover {
	 fill: red;
}
 body .card nav svg.arrow {
	 float: left;
	 height: 15px;
	 width: 15px;
	 margin-right: 10px;
}
 body .card .photo {
	 padding: 30px;
	 width: 45%;
	 text-align: center;
	 float: left;
}
 body .card .photo img {
	 max-height: 240px;
}
 body .card .description {
	 padding: 30px;
	 float: left;
	 width: 55%;
	 border-left: 2px solid #efefef;
}
 body .card .description h1 {
	 color: #515151;
	 font-weight: 300;
	 padding-top: 15px;
	 margin: 0;
	 font-size: 30px;
	 font-weight: 300;
}
 body .card .description h2 {
	 color: #515151;
	 margin: 0;
	 text-transform: uppercase;
	 font-weight: 500;
}
 body .card .description h4 {
	 margin: 0;
	 color: #727272;
	 text-transform: uppercase;
	 font-weight: 500;
	 font-size: 12px;
}
 body .card .description p {
	 font-size: 12px;
	 line-height: 20px;
	 color: #727272;
	 padding: 20px 0;
	 margin: 0;
}
 body .card .description button {
	 outline: 0;
	 border: 0;
	 background: none;
	 border: 1px solid #d9d9d9;
	 padding: 8px 0px;
	 margin-bottom: 30px;
	 color: #515151;
	 text-transform: uppercase;
	 width: 125px;
	 font-family: inherit;
	 margin-right: 5px;
	 transition: all 0.3s ease;
	 font-weight: 500;
}
 body .card .description button:hover {
	 border: 1px solid #aedaa6;
	 color: #aedaa6;
	 cursor: pointer;
}
 

</style>



