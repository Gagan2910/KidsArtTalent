<?php
include("Header.php");
include("dbconnection.php");
function insert()
{
include("dbconnection.php");
$paintingdesc="";
$imageFileType="";
$target_file="";
$file1="";

if(isset($_POST["submit"])) {
 
$target_dir = "uploadimages/";
$target_file = $target_dir . basename($_FILES['file1']['name']);

$file1=$_FILES['file1']['name'];
$paintingdesc=$_POST['paintingdesc'];

$query="insert into tblpaintings (paintingname,paintingdesc) VALUES ('$file1','$paintingdesc')";
mysqli_query($connection,$query);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is an actual image or fake image
   
    $check = getimagesize($_FILES['file1']['tmp_name']);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        } 
		else
		{  echo "File is not an image.";
              $uploadOk = 0;
		}
	
	
		// Check if file already exists
       if (file_exists($target_file)) {
        echo "File already exists.";
          $uploadOk = 0;
           }
		   // Check file size
         if ($_FILES['file1']['size'] > 500000) {
            echo "File is too large.";
           $uploadOk = 0;
           }
		   // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
           echo "Only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
          }
		
		  
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry,file was not uploaded.";
}
// if everything is ok, try to upload file
  else {
    if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
        echo "The file has been uploaded successfully.";
    } 
	else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
}
?>
<div class="row">
   <div class="col-sm-12 modal-content ">
   <a href="index.php" style="color:red;text-align:right">Logout</a>
 <form action="Uploadpicture.php" method="POST" enctype="multipart/form-data">
   <h4 class="textcolor4">Upload Painting</h4><br>
Select painting to upload <input type=file name=file1 required><br><br>
 <textarea placeholder="Say something about painting" style="width:50%;margin:5px;" name=paintingdesc></textarea><br>
 <center><input type=submit value=Upload name=submit class="button"><center><br>
 <?php insert()?>
  </form>
 </div>
 </div>
 
<br>
<?php
include("Footer.php");
?>