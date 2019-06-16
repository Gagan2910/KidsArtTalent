<?php
include("Header.php");
?>
    <div class="row">
                <div class="col-sm-12">
                   <h1 class="heading1">Welcome to the world of Art</h1>
                   <p class="para">Art is not what you see, but what you make others see</p>
                </div>
    </div>
    <div class="row">
                <div class="col-sm-12">
                <img class=" headerimage w3-image" src="images/image1.jpg">
                <img class=" headerimage w3-image" src="images/image2.jpg">
                <img class=" headerimage w3-image" src="images/image3.jpeg">
                <img class=" headerimage w3-image" src="images/image4.jpg">
                <img class=" headerimage w3-image" src="images/image5.jpg">                
                </div>
    </div>
    </br>
    <script>
    var myIndex = 0;
    carousel();
    function carousel() {
    var i;
    var x = document.getElementsByClassName("headerimage");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000);    
     }
    </script>
    <div class="row">
    <div class="col-sm-12 text-center">
       <h4 class="heading4">Take part in this creative painting challenge and </br> be the one to put your painting in this lovely gallery</h4>
    </div>    
    </div>
      <div class="row">
    <div class="col-sm-12">
       <h3 class="heading3">Your Art Gallery</h3>
    </div>    
    </div>
    <div class="row">
    <div class="col-sm-6 left">
    <div class="gallery content">
    <img src="images/gallery1.jpg" alt="image1" width="200" height="200">
  <div class="desc">Gallery1</div>
   </div>
     <div class="gallery">
    <img src="images/gallery2.jpg" alt="Forest" width="200" height="200">
     <div class="desc">Gallery2</div>
    </div>
</div>
<div class="col-sm-6 right">
   <div class="gallery">
    <img src="images/gallery3.jpg" alt="Northern Lights" width="200" height="200">
    <div class="desc">Gallery3</div>
    </div>
    <div class="gallery">
    <img src="images/gallery4.jpg" alt="Mountains" width="200" height="200">
    <div class="desc">Gallery4</div>
 </div>
</div>
 </div>
</br>
<?php
include("Footer.php");
?>