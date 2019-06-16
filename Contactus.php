<?php
include("Header.php");
include("dbconnection.php");
function contactus()
{
$fname=$lname=$email=$phone=$comments="";
include("dbconnection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
	$cfname = $_POST["fname"];
	$clname = $_POST["lname"];
	$cemail=$_POST["email"];
	$cphone=$_POST["phone"];
	$ccomments=$_POST["comments"];
	$query = "insert into tblcontactus values('$cfname','$clname','$cemail','$cphone','$ccomments')";
	mysqli_query($connection, $query);
	echo "Data has been saved successfully.We will contact you soon";
	}
}
?>
<div class="row">
     <div class="col-sm-6 modal-content">
	 <form method="POST" action="Contactus.php">
     <h4 style="text-align:center">Contact us</h4>
     <input type="text" placeholder="Firstname" name=fname required style="width:50%;margin:5px auto;">
     <input type="text" placeholder="Lastname" name=lname style="width:50%;margin:5px auto;">
     <input type="email" placeholder="Email" name=email required style="width:50%;margin:5px auto;">
     <input type="text" placeholder="Phone" name=phone style="width:50%;margin:5px auto;">
	 <textarea placeholder="Comments" style="width:50%;margin:5px;" name=comments></textarea><br>
     <input type=submit class="button" value=Contactus name=contactus><br>
	 <?php contactus() ?>
      </form>
      </div>
       <div class="col-sm-6 modal-content">
     <h4 style="text-align:center">Our location</h4>
     <img src="images/location.jpg" class="w3-image" style="width:600px;height:300px;float:right">
     </div>
     
    </div>
    
   
<br>
<?php
include("Footer.php");
?>