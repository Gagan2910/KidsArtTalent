<?php
include("Header.php");
include("dbconnection.php");
function registeruser()
{
	include("dbconnection.php");
$ParentsFirstname=$ParentsLastname=$ParentsEmail=$password=$confirmpassword=$Kidsnumber=$Childname1=$age1=$Childname2=$age2=$Parentscontactnumber=$radio=$Comments="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
 $cfn=$_POST['ParentsFirstname'];
      $cln=$_POST["ParentsLastname"];
      $cemail=$_POST["ParentsEmail"];
	   $cp=$_POST["password"];
      $ccp=$_POST["confirmpassword"];
	  $ckidsno=$_POST["Kidsnumber"];
      $c1kidname=$_POST["Childname1"];
	   $c1kidage=$_POST["age1"];
	   $c2kidname=$_POST["Childname2"];
	   $c2kidage=$_POST["age2"];
      $cmobile=$_POST["Parentscontactnumber"];
      $cassistance=$_POST["radio"];
	   $ccomments=$_POST["Comments"];
      $hashedpassword = hash('sha512', $cp);
      $hashedconfirmpassword = hash('sha512', $ccp);
      if(strlen("$cp")<8)
      {
          echo "Password must be 8 characters long";
      }
	  else if(("$ckidsno")>2)
	  {
		  echo "Maximum 2 kids can participate";
	  }
	  else if(("$c1kidage")<6&&("$c1kidage")>13)
	  {
		  echo "Age must be between 6 and 13 years";
	  }
	   else if(("$c2kidage")<6&&("$c2kidage")>13)
	  {
		  echo "Age must be between 6 and 13 years";
	  }
      else if (strcmp("$hashedpassword","$hashedconfirmpassword")==0)
      {
      $query = "select parentsEmail from tblregisterusers where parentsEmail='$cemail'";
      $result = mysqli_query($connection, $query);
      $resultcheck=mysqli_num_rows($result);
      if( $resultcheck<1)
       {
         $query="insert into tblregisterusers values('$cfn','$cln','$cemail','$hashedpassword','$ckidsno','$c1kidname','$c1kidage','$c2kidname',
		 '$c2kidage','$cmobile','$cassistance',' $ccomments')";
         $result = mysqli_query($connection, $query);
         header('Location:Login.php');
       }

       else
        {
            echo "Email already exists please enter different email address";
        }
      }
      else{echo "Password and confirm password doesn't match";}
     mysqli_close($connection);
     }
}

?>
<div class="row">
   <div class="col-sm-12 modal-content">
    <form action="Registerpage.php" method="POST">
     <img src="images/girl.png" style="width:50px;height:50px;"> <img src="images/boy.png" style="width:50px;height:50px;"><br>
     <h4 class="textcolor4">Please Register your kids here.Only two kids can participate as maximum</h4><br>
	  <h4 class="textcolor4">Kids must be between 6 and 13 years of age</h4><br>
     <input type="text" placeholder="Parents First Name" name=ParentsFirstname required style="width:50%;margin:5px;">
     <input type="text" placeholder="Parents Last Name" name=ParentsLastname required style="width:50%;margin:5px;">
     <input type="email" placeholder="Parents Email address" name=ParentsEmail required style="width:50%;margin:5px;">
	 <input type="password" placeholder="Enter password" name=password required style="width:50%;margin:5px;">
	 <input type="password" placeholder="Confirm password" name=confirmpassword required style="width:50%;margin:5px;">
     <input type="text" placeholder="Mailing Address" style="width:50%;margin:5px;">
     <input type="text" placeholder="Number of Kids participating" name=Kidsnumber required style="width:50%;margin:5px;">
     <input type="text" placeholder="Name of Child" name=Childname1 required style="width:50%;margin:5px;">
    <div>
    <div> <input type="text" placeholder="Age" name=age1 required style="width:50%;margin:5px;display:inline"></div>
    <div><button class="button" id="btnpopup" name=addnewchild>Add more child</button></div></div>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
     <input type="text" placeholder="Enter new Child name" name=Childname2  style="width:50%;margin:5px;" required>
    <input type="age" placeholder="Age" name=age2  style="width:50%;margin:5px;" required>
    <button class="button" id="btnsave" name=save style="width:50%;margin:5px;">Save</button>
  </div>
</div>
     <input type="text" placeholder="Parents contact Number" name=Parentscontactnumber required style="width:50%;margin:5px;">
     <input type="text" placeholder="Any Special assistance required?" style="width:50%;margin:5px;">
     <label class="container">Yes
   <input type="radio" checked="checked" name="radio">
   <span class="checkmark"></span>
   </label>
  <label class="container">No
  <input type="radio" name="radio">
  <span class="checkmark"></span>
  </label> <p>If yes please comment</p>
  <textarea placeholder="Comments" style="width:50%;margin:5px;" name=Comments></textarea><br>
     <input type="submit" class="button" style="width:50%;margin:5px;" value=Submit name=register><br>
	 <?php
	 registeruser()
	 ?>
     </form>

       </div>
</div>
<br>
     <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btnpopup = document.getElementById("btnpopup");

// Get the button that saves the modal data
var btnsave = document.getElementById("btnsave");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btnpopup.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks the save button, save data and close the modal
btnsave.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<?php
include("Footer.php");
?>
