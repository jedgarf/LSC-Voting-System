<!DOCTYPE html>
<html>
<title></title>
<style>
.mySlides {display:none;}
.w3-content{max-width:980px;margin:auto;}
.w3-section{margin-top:16px;margin-bottom:16px;}
</style>
<body>

<div class="w3-content w3-section" style="max-width:600px;">

<img class="mySlides" src="slideshow/ss1.gif" style="width:600px; height: 350px; border-radius: 20px;">
<img class="mySlides" src="slideshow/ss2.jpeg" style="width:600px; height: 350px; border-radius: 20px;">
<img class="mySlides" src="slideshow/ss3.jpg" style="width:600px; height: 350px; border-radius: 20px;">
<img class="mySlides" src="slideshow/ss4.png" style="width:600px; height: 350px; border-radius: 20px;">

</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000);    
}
</script>

</body>

</html> 
