<?php require 'student_session.php'; ?>
<?php require 'dbcon.php'; ?>
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
			float: left;
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

<br>
	<?php
	$sql0 = "select * from tbl_gallery";
	$result3 = $conn->query($sql0);
	if ($result3->num_rows >= 1) {
		?>
		<form method="POST" autocomplete="off" class="form-inline" action="stud_gallery_search.php">
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