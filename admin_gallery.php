
<?php require 'admin_session.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>

	<style type="text/css">
		th,td{
			text-align: center;
		}
		.container{
			background-color: white;
			color: black;
			padding: 10px;
		}
		.petsa{
			text-align: right;
			margin-left: 230px;
		}
		#caption_body{
			width: 520px;
		}
		p {
			text-align: justify;
			text-indent: 50px;
			word-break: break-all;
    		white-space: normal;
    		position: relative;
    		font-size: 20px;
  
		}
		.left_content{
			float: left;
			border-radius: 5px;
			margin-right: 10px;
		}
		.right_content{
			margin-top: -30px;
			float: left;
		}
		.right_content span h3 b{
			margin-right: -500px;
		}
		.right_content span h3 b a{
			text-decoration-line: none;
			color: black;
		}
		.right_content span h3 b a:hover{
			color: blue;
		}
		.form-group{
			float: left;
		}
	</style>

	<script>
	$(function(){
    Test = {
        UpdatePreview: function(obj){
          // if IE < 10 doesn't support FileReader
          if(!window.FileReader){
             // don't know how to proceed to assign src to image tag
          } else {
             var reader = new FileReader();
             var target = null;

             reader.onload = function(e) {
              target =  e.target || e.srcElement;
               $("#img").prop("src", target.result);
             };
              reader.readAsDataURL(obj.files[0]);
          }
        }
    };
});
</script>
    
</head>
<body class="bg-1" style="background-image: url('images/b.png');"><br>

<center>
	<button type="button" id="click" class="btn btn-primary btn-lg"><span class='glyphicon glyphicon-plus'></span> Add Photo</button>
</center>
<div id="addpic" align="center" hidden>
	<form method="POST" enctype="multipart/form-data" autocomplete="off">
		<div align="center">
			<div id="preview">
				<img src="" id="img" width="600px" height="300px" hidden>
			</div><br>
		<input type="file" name="image" id="image" onchange='Test.UpdatePreview(this)' required>
		<p id="over" style="color: red; text-align: center;"></p>
		<p id="unsuport" style="color: red; text-align: center;"></p>
		<br>
		<script type="text/javascript">
			$("#image").change(function () {
				$("#img").show();
			});
		</script>

		<div class="input-group">
		<textarea name="caption" cols="80px" rows="5px" maxlength="255" class="form-control" placeholder="Caption Here(255 Characters Maximum)...." required></textarea>
		<script type="text/javascript">
			$('textarea').keypress(function(e) {
  				  var tval = $('textarea').val(),
        			tlength = tval.length,
        			set = 255,
       				remain = parseInt(set - tlength);
    				$('.p').text(remain);
    		if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        	$('textarea').val((tval).substring(0, tlength - 1))
    }
})
		</script>
		<div><span class="p">255</span> letter(s) left.</div>
		</div>

		<br>
		<input type="reset" id="hide" class='btn btn-primary' name="" value="Close">
		<input type="reset" id="reset" name="reset" class='btn btn-primary' value="Reset"> 
		<input type="submit" name="submit" class='btn btn-primary' value="Upload">
		</div>
	</form>
</div>

<script type="text/javascript">

	$("#click").click(function () {
		$("#addpic").show();
		$(this).hide();
	});
	$("#hide").click(function () {
		$("#addpic").hide();
		$("#img").hide();
		$("#click").show();
	});
	$("#reset").click(function () {
		$("#img").hide();
	});
</script>

<?php
	require 'dbcon.php';
	if (isset($_POST['submit'])) {

		//Declaration of Variables
		date_default_timezone_set("asia/manila");
		$image = "gal".date('his')."~".date('m-d-Y').".jpg";
		$caption = $_POST['caption'];

		//SQL Command
		$sql = "insert into tbl_gallery (gal_photo,gal_desc,gal_datetime) values ('$image','$caption',now())";
		if ($_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg") {
			if ($_FILES['image']['size'] <= 5000000) {
				if ($conn->query($sql)) {

			move_uploaded_file($_FILES['image']['tmp_name'], "gallery/gal".date('his')."~".date('m-d-Y').".jpg");

			?>

			<script type="text/javascript">
				alert("Uploading Successfully!");
			</script>

			<?php
		}else{
			?>

			<script type="text/javascript">
				alert("Uploading Failed!");
			</script>

			<?php
			}
		  }else{

		  	?>

			<script type="text/javascript">
				alert("Oversize Image!");
				$("#addpic").show();
				$("#click").hide();
				document.getElementById('over').innerHTML = "Less than Equal 5mb are Supported!";
			</script>

			<?php

		  }
		}else{
			?>

			<script type="text/javascript">
				alert("Unsupported Format!");
				$("#addpic").show();
				$("#click").hide();
				document.getElementById('unsuport').innerHTML = "Only jpg, png & jpeg are Supported!";
			</script>

			<?php
		}
	}
?>

<br>
	<?php
	$sql0 = "select * from tbl_gallery";
	$result3 = $conn->query($sql0);
	if ($result3->num_rows >= 1) {
		?>
		<form method="POST" autocomplete="off" class="form-inline" action="gallery_search.php">
	<div class="form-group">
	<label>Select Year: </label>
	<select name="search" class="form-control" required>
		<?php
		$sql0 = "select min(year(gal_datetime)) as min from tbl_gallery";
		$result0 = $conn->query($sql0);
		$row = $result0->fetch_assoc();
		
		$min = $row['min'];
		$curyear = date("Y");
		for ($i=$min; $i <= $curyear; $i++) { 
			echo "<option>".$i."</option>";
		}
		?>
	</select>
		<input type="submit" name="submit1" class='btn btn-primary' value="Search">
	</div>
	</form>
		<?php
	}else{

	}
	?>
	<?php
	$sql1 = "select count(*) as count from tbl_gallery";
	if ($result2 = $conn->query($sql1)) {
		$count = $result2->fetch_assoc();
		$total = $count['count'];
		echo "<div style='margin-left:1370px; position:fixed;'>";
		echo "<span class='badge'>".$total."</span> Image(s)";
		echo "</div>";
	}
	?>
<br><br><br>
<?php
	$sql = "select * from tbl_gallery order by gal_datetime DESC";

	$result1 = $conn->query($sql);
	
		if ($result1->num_rows == 0) {
			echo "<h2 align='center'>No Image Uploaded!</h2>";
		}else{
		while ($res = $result1->fetch_assoc()) {
		echo "<div class='container'>";
		echo "<div class='left_content'>";
		echo "<img src='gallery/".$res['gal_photo']."' height='300px' width='600px' >";
		echo "</div>";
		echo "<div class='right_content'>";
		echo "<span><h3><b><a href='remove_gallery.php?pic=$res[gal_photo]' onClick=\"return confirm('Are you sure you want to Remove This Image?')\">&times;</a></b></h3></span>";
		echo "<div class='petsa'>".date('F-d-Y / h:i a', strtotime($res['gal_datetime']));
		echo "</div>";
		echo "<br>";
		echo "<div id='caption_body'>";
		echo "<h4 align='center'><b>Caption:</b></h4>";
		echo "<p class='caption'>";
		echo $res['gal_desc'];
		echo "</p>";
		echo "</div>";
		echo "<div class='button'>";
		
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
	}
		}
?>
</body>
</html>