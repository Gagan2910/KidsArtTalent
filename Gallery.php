<?php
include("Header.php");
include("dbconnection.php");
function display()
{
include("dbconnection.php");
$button="";
$span="";
$query="select * from tblpaintings";
$result=mysqli_query($connection,$query);
echo "<table align=center>";
$i=0;
while($row=mysqli_fetch_array($result))
   {
     if($i%3==0)
    {
     echo "<tr>";
    }
 echo "<td><img src='uploadimages/".$row['paintingname']."' width=350px height=350px hspace=10dp>";
 echo "<center><p>".$row["paintingdesc"]."</p></center>";
 echo "<center><p><button>Click Me to Vote</button><br>Click Me <span id='count'>0</span></p></center>";
 echo "</td>";

   if($i%3==2)
    {
    echo "</tr>";
    }
    $i++;
  }
   echo "</table>";
}
?>

<div class="row">
   <div class="col-sm-12 modal-content ">
   <?php display()?>
   <script>
 $button=document.querySelector('button');
 $span=document.querySelector('span');
 function inc(){
   $result=$span.innerHTML++;
 }
 $button.addEventListener('click',inc);
 </script>
   </div>
   </div>
   
<br>
<?php
include("Footer.php");
?>