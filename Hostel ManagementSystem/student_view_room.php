<?php include 'student_header.php';
extract($_GET);

?>


<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="300px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      
                    <form method="post">
                    <!-- <h1 align="center" style="color:white">search</h1>
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
                    </form>  -->
                    
                    </div>
                </div>


            </div>
        </div>
    </div>
<?php 

if (isset($_POST['search'])) {
    extract($_POST);
     $q="SELECT * FROM room INNER JOIN subcat USING(subcat_id) INNER JOIN category USING (cat_id) where (Subcat_Name like '%$nm%' or Cat_Name like '%$nm%')";
    $res=select($q);

}else{
     $q="select * from subcat inner join room using(subcat_id) inner join category using(cat_id) where room_status='available' and subcat_id='$type'";
     $res=select($q);
     $sino=1;

     ?>
  <h1 align="center">Hotel</h1>
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
                    <h1  style="margin-left: 50px;">₹<?php echo $row['price']?></h1>
                    <!-- <p>Classic Peace Lily is a spathiphyllum floor plant arranged in a bamboo planter with a blue & red ribbom and butterfly pick.</p> -->
                    <div style="margin-left:600px ;"><td><a class="btn btn-success" href="student_book_rooms.php?uid=<?php echo $row['room_id'] ?>">Book Room</a></td></div>

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



