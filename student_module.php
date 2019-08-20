<?php require 'student_session.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Module</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script type="text/javascript" src = "jquery/function.js">
		w3_open();
		w3_close();
	</script>
</head>
<body class="bg-1">
	
<?php require 'header.php'; ?>

<nav id="info" class="w3-sidenav w3-white w3-card-2" style="display:none;" onmouseleave="w3_close()">
	<?php
		require 'dbcon.php';
		$sql = "select Acc_image,Acc_Type,Acc_ID,Acc_Fname,Acc_Mname,Acc_Lname,Acc_NameExt,Acc_Gender,Acc_Bdate,Acc_Ylevel from tbl_students where Acc_ID = '$user'";
		$today = date("Y-m-d");
		if ($result = $conn->query($sql)) {
			while ($row = $result->fetch_assoc()) {

		$dateOfBirth = $row['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

				echo "<h3 style='text-transform:uppercase;'>".$row['Acc_Type']."</h3><br>";
				echo '<center><img src="uploads/'.$row['Acc_image'].'" alt="Student Image" width="180px" height="180px"></center>';
				echo "<h2 align = 'center'>".$row['Acc_ID']."</h2>";
				echo "<big><label>Full Name:</label><br>".$row['Acc_Fname']." ".$row['Acc_Mname']." ".$row['Acc_Lname']." ".$row['Acc_NameExt']."</big><br>";
				echo "<big><label>Age:</label> ".$age."</big> Years Old<br>";
				echo "<big><label>Gender:</label> ".$row['Acc_Gender']."</big><br>";
				echo "<big><label>Year Level:</label> ".$row['Acc_Ylevel']."</big><br>";
			}
		}
	?>
</nav>

<div id="nav">
<ul>
	<div class="dropdown">
	<li class="dropbtn" onclick="w3_open()" style="margin-right: 590px; margin-left: -40px; width: 200px;">
	<span class="glyphicon glyphicon-info-sign"></span> <label>VIEW PROFILE</label></li>
	</div>

	<div class="dropdown">
	<a href="student_page.php" target="view1"><li class="dropbtn">
	<span class="glyphicon glyphicon-user" aria-hidden="true"></span><label>START PAGE</label>
	</li></a>
	</div>

	<div class="dropdown">
	<a href="student_gallery.php" target="view1"><li class="dropbtn">
	<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> <label>GALLERY</label>
	</li></a>
	</div>

	<div class="dropdown">
	<a href="about.php" target="view1"><li class="dropbtn">
	<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <label>ABOUT US</label>
  	</li></a>
	</div> 

	<div class="dropdown">
	<li class="dropbtn">
	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <label>ACCOUNTS</label>
	 <span class="caret" aria-hidden="true"></span>
  	<div class="dropdown-content">
    <a href="stud_changepass.php" target="view1"><span class="glyphicon glyphicon-lock"></span> <label>CHANGE PASSWORD</label></a>
    <a href="logout.php" onclick="return confirm('Are you Sure, You Want to Logout?')"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> <label>LOG-OUT</label></a>
  	</div>
  	</li>
	</div>
	
</ul>
</div>
<iframe id="form" name="view1" src="student_page.php">
</div>
</div>
</body>
</html>