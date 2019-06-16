<?php
include("Header.php");
include("dbconnection.php");
function login()
{
$email=$password="";
include("dbconnection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
	$cemail = $_POST["email"];
	$cpassword = $_POST["password"];
	$query = "select parentsEmail,password from tblregisterusers where parentsEmail='$cemail'";
	$result = mysqli_query($connection, $query);
    $resultcheck=mysqli_num_rows($result);
	    if ($resultcheck<1)
	     {
	        echo "Account doesn't exists.Please click register to add new account ";
	     }
	     else
	    {
          $row=mysqli_fetch_assoc($result);
          $dbpassword= $row['password'];
          $hashedpassword = hash('sha512', $cpassword);
           if(strcmp("$hashedpassword","$dbpassword")== 0)
          {
           Header('Location:Uploadpicture.php');
          }
          else
           { 
           echo "Incorrect email or password.<br>";
           }  
         mysqli_close($connection);                      
         }
     }
  }
 
?>
<div class="row">
   <div class="col-sm-12 modal-content ">
<form action="Login.php" method="POST">
       <h4 class="textcolor4">Login Here</h4><br>
     <input type="email" placeholder="Username/Email" name=email style="width:50%;margin:5px auto;" required>
     <input type="password" placeholder="Password" name=password style="width:50%;margin:5px auto;" required><br>
      <input type=submit class="button" value=Login name=login><br>
	  <?php login()?>
     </form>
    </div>
  </div>
<br>
<?php
include("Footer.php");
?>