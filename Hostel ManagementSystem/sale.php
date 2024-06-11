<?php 

include 'connection.php';

extract($_GET);
 $r=$_SESSION['res'];

 ?>
<script> 
    function printDiv() { 
      //var divContents = document.getElementById("div_print").innerHTML; 
      //var a = window.open('', '', 'height=500, width=500'); 
      //a.document.write(divContents); 
      //a.document.close(); 
      //a.print(); 
      //document.body.style.margin = "100px";
        window.print();
    } 
    window.onafterprint = function(){
      window.location.href = "sale.php";
    }
  </script> 
<body onload="printDiv()">
  <div id="div_print" >
<center>
  
 
    <h1 style="color: orange;font-size: 100px;background-color:black">Hotel</h1>
    <!-- <div style="width: 100%;height: 100px;display: flex;justify-content: space-between;">
      <div style="position: relative;left: 10px"> -->
         <font size="4" face="Times New Roman"> Kesavadasapuram Lane 28 , Pattom ,Thiruvananthapuram <br><b>Phone:</b>+91 9074772635 , +91 7994979116<br><b>Email:</b>woofs@gmail.com</font>
      <hr color="orange">

<h1 style="font-size: 60px">BOOKING REPORT
<hr color="orange" width=50% align="center" size=20>
</h1>
<!-- <h1>View Sales</h1> -->
<table class="table" style="width: 1000px;color: black;font-style: italic;font-family: monospace;font-size: 22px" border="5">

    <tr>
    <th>Customer name</th>
        <th>Room Name</th>
                <th>Room No</th>
                <th>Price</th>
                <th>Payment Date</th>
           
        
             
    </tr>
        
        
    </tr>
    <?php 

       
      $res=$r;
       $slno=1;

       foreach ($res as $row) {
      ?>
        
       <tr> 
              <td><?php echo $row['st_fname']?><?php echo $row['st_lname']?></td>
        <td><?php echo $row['cat_name'] ?> <?php echo $row['subcat_name'] ?></td>
        <td>Room-<?php echo $row['room_no'] ?></td>

        <td><?php echo $row['rent'] ?></td>
        <td><?php echo $row['payment_date'] ?></td>
        
       

     <?php
       }


     ?>

     </tr>
  </table>

</center>
<br>
<br>

<h3 align="right">Signature: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<h2>