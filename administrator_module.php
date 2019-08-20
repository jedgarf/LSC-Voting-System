<?php require 'admin_session.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator Module</title>

	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- JQuery -->
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>



<!-- Function Script -->
	<script type="text/javascript" src = "jquery/function.js">
		w3_open();
		w3_close();

	function focus() {
		$("#form").focus();
	}
</script>

<script type="text/javascript" src="js/input_password.js">
		pass2();
	</script>

</head>
<body class="bg-1">

<?php require 'header.php'; ?>

<nav id="info" class="w3-sidenav w3-white w3-card-2" style="display:none;" onmouseleave="w3_close()">
<br><br>
	<?php
		require 'dbcon.php';
		$sql = "select Acc_image,Acc_Type,Acc_Uname,Acc_Fname,Acc_Lname,Acc_Gender,Acc_Bdate from tbl_administrator where Acc_Uname = '$user'";
		$today = date("Y-m-d");
		if ($result = $conn->query($sql)) {
			while ($row = $result->fetch_assoc()) {

		$dateOfBirth = $row['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');
				
				echo '<center><h4>CURRENT LOGGED</h4><HR></center>';
				echo '<center><img src="uploads/'.$row['Acc_image'].'" alt="Administrator Image" width="150px" height="150px"></center>';
				echo "<h2 align='center'>".$row['Acc_Type']."</h2><br>";
				echo "<big><b>Full Name:</b><br>".$row['Acc_Fname']." ".$row['Acc_Lname']."</big><br>";
				echo "<big><b>Gender:</b> ".$row['Acc_Gender']."</big><br>";
				echo "<big><b>Age:</b> ".$age." Years Old</big><br>";
			}
		}
	?>
</nav>

<!-- Navigation Bar -->

<div id="nav">
<ul>
	<div class="dropdown">
	<li class="dropbtn" onclick="w3_open()">
	<span class="glyphicon glyphicon-info-sign"></span> <label>VIEW PROFILE</label></li>
	</div>
	
	<div class="dropdown">
	<a href="all_candidates.php" target="view">
		<li class="dropbtn">
	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <label>TOP CANDIDATES</label>
	</li>
	</a>
	</div>

	<div class="dropdown">
	<a href="add_partylist.php" target="view"><li class="dropbtn">
	<span class="glyphicon glyphicon-star" aria-hidden="true	"></span> <label>PARTY-LIST</label>
	</li></a>
	</div>

	<div class="dropdown">
	<li class="dropbtn">
	<span class="glyphicon glyphicon-education" aria-hidden="true"></span> <label>STUDENTS</label>
	 <span class="caret" aria-hidden="true"></span>
  	<div class="dropdown-content">
  	<a href="all_students.php" target="view"><label>VIEW ALL STUDENTS</label></a>
    <a href="student_requests.php" target="view"><label>VIEW STUDENT REQUESTS</label></a>
    <a href="deactivated_students.php" target="view"><label>VIEW DEACTIVATED STUDENTS</label></a>
  	</div>
  	</li>

	</div>
	<div class="dropdown">
	<a href="admin_gallery.php" target="view"><li class="dropbtn">
	<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> <label>GALLERY</label>
  	</li></a>
	</div>

	<div class="dropdown">
	<a href="vote_history.php" target="view">
	<li class="dropbtn" onclick="//pass2()">
	<span class="glyphicon glyphicon-time" aria-hidden="true"></span> <label>VOTE HISTORY</label>
  	</li></a>
	</div>

  	<div class="dropdown">
	 <a href="system_setting.php" target="view">
	<li class="dropbtn" onclick="//pass2()">
	<span class="glyphicon glyphicon-wrench"></span> <label id="setting">SYSTEM SETTINGS</label>
  	</li></a>
	</div>

	<div class="dropdown">
	<li class="dropbtn">
	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <label>ACCOUNTS</label>
	 <span class="caret" aria-hidden="true"></span>
  	<div class="dropdown-content">
  	<?php 
	//SQL Command
    $sql = "select Acc_Pword from tbl_administrator where Acc_Uname = '$user'";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $upsec = $row['Acc_Pword'];
 	?>

    <?php require_once 'admin_update_prompt.php'; ?>
    <a href="admin_changepass.php" id="change" target="view"><span class="glyphicon glyphicon-lock"></span> <label>CHANGE PASSWORD</label></a>

    <a href="logout.php" onclick="return confirm('Are you Sure, You Want to Logout?')">
		<span class="glyphicon glyphicon-off" aria-hidden="true"></span> <label>LOGOUT</label>
	</a>
    
  	</div>
  	</li>
  </div>

</ul>
</div>
	<iframe src="admin_mainpage.php" id="form" onload="$(this).focus();" name="view"></iframe>

</body>
</html>