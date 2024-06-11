<?php include 'student_header.php';
extract($_GET);

$q="select * from student where student_id='$stuid'";
$res=select($q);


$q1="select * from room where room_id='$uid'";
$ty=select($q1);

if(isset($_POST['book'])){
    extract($_POST);


    $tyy="select * from booking where student_id='$stuid' and bstatus='paid'";
    $yt=select($tyy);
    if(sizeof($yt)>0)
    {
        alert("You already Own a room thankyou....");
        return redirect('student_view_bookings.php');
    } else{
        $rt="insert into booking values (null,'$stuid','$uid','$cindate','$coutdate','$tot','pending')";
        $bid=insert($rt);
        alert("Room added successfully....");
        return redirect("student_view_bookings.php?uid=$uid&cost=$tot&bid=$bid");

    }


   

    
}


?>

<script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("cindate").value;
		var y =document.getElementById("coutdate").value;
        var r =document.getElementById("rent").value;

        // var date1 = new Date(2010, 6, 17);
        // var date2 = new Date(2013, 12, 18);
        // var diff = new Date(date2.getTime("%Y-%m-%d") - date1.getTime("%Y-%m-%d"));
        // alert(diff);

        let today = new Date(y);
        let form_date=new Date(x)
        let difference=form_date>today ? form_date-today : today-form_date
        let diff_days=Math.floor(difference/(1000*3600*24))

        // alert(diff_days)
        let drent=Math.round(r/30)
        // alert( drent)
		document.getElementById("tot").value = diff_days * drent;
	}

</script> 

<div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">


                    <form action="" method="post">
                        <center>
                            <h2 style="color: #fff;">View Booking Details</h2>
                            <table class="table" style="width: 700px;color: #fff;">
                                
                                <tr>
                                    <th>Student Name</th>
                                    <td><input type="text" name="sname" disabled value="<?php echo $res[0]['st_fname'] ?><?php echo $res[0]['st_lname'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Room No</th>
                                    <td><input type="text" name="rno" disabled value="<?php echo $ty[0]['room_no'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Room Rent</th>
                                    <td><input type="text" name="rent" id="rent" readonly value="<?php echo $ty[0]['price'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Check In Date</th>
                                    <td><input type="date" name="cindate" id="cindate" required class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Check Out Date</th>
                                    <td><input type="date" name="coutdate" onchange="TextOnTextChange()" id="coutdate" required class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Total Amount</th>
                                    <td><input type="text" name="tot" id="tot" required class="form-control"></td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2"><input type="submit" name="book" value="Book Now" class="btn btn-success" ></td>
                                </tr>
                            </table>
                        </center>
                    </form>



                    </div>
                </div>

            </div></div></div>

<?php include 'footer.php'?>