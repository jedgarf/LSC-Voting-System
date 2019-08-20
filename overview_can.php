<?php
$user = $_COOKIE['uname'];
require 'dbcon.php';

//Print Your Information
		$sql13 = "select * from tbl_students where Acc_ID = '$user'";
		$result = $conn->query($sql13);
		$row10 = $result->fetch_assoc();
		$Full_Name = $row10['Acc_Fname']." ".$row10['Acc_Mname']." ".$row10['Acc_Lname']." ".$row10['Acc_NameExt'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify Form</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body class="bg-1" style="background-image: url('images/b.png');">

<div>
<div id="verify" align="center">
<form method="POST" autocomplete="off">
<h2>View Your Candidate(s)</h2>
<div id="printarea">
<table width="100%" style="text-align: center;">
<tr>
<td>
<label>Chairman:</label><br>
<?php

//Chairman
$nom1 = $_COOKIE['nom1'];
$sql = "select * from tbl_candidates where Can_ID = '$nom1'";
$res = $conn->query($sql);
if ($res->num_rows == 0) {
	$chairman_photo = "";
	$chairman = "";
	echo "<h5>No Selected For Chairman</h5>";
}else{
	$row = $res->fetch_assoc();

	$chairman_photo = $row['Can_image'];

	echo '<img src="uploads/'.$chairman_photo.'" width="180px" height="180px"><br><br>';

	$chairman = $row['Can_Fname']." ".$row['Can_Mname']." ".$row['Can_Lname']." ".$row['Can_NameExt'];

	echo "<p>".$chairman."</p><br>";
}
?>
</td>
<td>
<label>Vice Chairman:</label><br>	
<?php

//Vice Chairman
$nom2 = $_COOKIE['nom2'];
$sql2 = "select * from tbl_candidates where Can_ID = '$nom2'";
$res1 = $conn->query($sql2);
if ($res1->num_rows == 0) {
	$vicechairman_photo = "";
	$vice_chairman = "";
	echo "<h5>No Selected For Vice Chairman</h5>";
}else{
	$row1 = $res1->fetch_assoc();

	$vicechairman_photo = $row1['Can_image'];

	echo '<img src="uploads/'.$vicechairman_photo.'" width="180px" height="180px"><br><br>';

	$vice_chairman = $row1['Can_Fname']." ".$row1['Can_Mname']." ".$row1['Can_Lname']." ".$row1['Can_NameExt'];

	echo "<p>".$vice_chairman."</p><br>";
}
?>
</td>
<td>
<label>Secretary:</label><br>	
<?php

//secretary
$nom3 = $_COOKIE['nom3'];
$sql3 = "select * from tbl_candidates where Can_ID = '$nom3'";
$res2 = $conn->query($sql3);
if ($res2->num_rows == 0) {
	$secretary_photo = "";
	$secretary = "";
	echo "<h5>No Selected For Secretary</h5>";
}else{
	$row2 = $res2->fetch_assoc();
	$secretary_photo = $row2['Can_image'];

	echo '<img src="uploads/'.$secretary_photo.'" width="180px" height="180px"><br><br>';

	$secretary = $row2['Can_Fname']." ".$row2['Can_Mname']." ".$row2['Can_Lname']." ".$row2['Can_NameExt'];

	echo "<p>".$secretary."</p><br>";
}
?>
</td>
</tr>
<tr>
<td>
<label>Treasurer:</label><br>	
<?php

//treasurer
$nom4 = $_COOKIE['nom4'];
$sql4 = "select * from tbl_candidates where Can_ID = '$nom4'";
$res3 = $conn->query($sql4);
if ($res3->num_rows == 0) {
	$treasurer_photo = "";
	$treasurer = "";
	echo "<h5>No Selected For Treasurer</h5>";
}else{
	$row3 = $res3->fetch_assoc();
	$treasurer_photo = $row3['Can_image'];

	echo '<img src="uploads/'.$treasurer_photo.'" width="180px" height="180px"><br><br>';

	$treasurer = $row3['Can_Fname']." ".$row3['Can_Mname']." ".$row3['Can_Lname']." ".$row3['Can_NameExt'];

	echo "<p>".$treasurer."</p><br>";
}
?>
</td>
<td>
<label>Business Manager:</label><br>	
<?php

//business manager
$nom5 = $_COOKIE['nom5'];
$sql5 = "select * from tbl_candidates where Can_ID = '$nom5'";
$res4 = $conn->query($sql5);
if ($res4->num_rows == 0) {
	$busiman_photo = "";
	$business_manager = "";
	echo "<h5>No Selected For Business Manager</h5>";
}else{
	$row4 = $res4->fetch_assoc();
	$busiman_photo = $row4['Can_image'];

	echo '<img src="uploads/'.$busiman_photo.'" width="180px" height="180px"><br><br>';

	$business_manager = $row4['Can_Fname']." ".$row4['Can_Mname']." ".$row4['Can_Lname']." ".$row4['Can_NameExt'];

	echo "<p>".$business_manager."</p><br>";
}
?>
</td>
<td>
<label>Board of Trustee 1:</label><br>	
<?php

//board of trustee 1
$nom6 = $_COOKIE['nom6'];
$sql6 = "select * from tbl_candidates where Can_ID = '$nom6'";
$res5 = $conn->query($sql6);
if ($res5->num_rows == 0) {
	$bot1_photo = "";
	$bot1 = "";
	echo "<h5>No Selected For Board of Trustee 1</h5>";
}else{
	$row5 = $res5->fetch_assoc();
	$bot1_photo = $row5['Can_image'];

	echo '<img src="uploads/'.$bot1_photo.'" width="180px" height="180px"><br><br>';

	$bot1 = $row5['Can_Fname']." ".$row5['Can_Mname']." ".$row5['Can_Lname']." ".$row5['Can_NameExt'];

	echo "<p>".$bot1."</p><br>";
}
?>
</td>
</tr>
<tr>
<td>
<label>Board of Trustee 2:</label><br>	
<?php

//board of trustee 2
$nom7 = $_COOKIE['nom7'];
$sql7 = "select * from tbl_candidates where Can_ID = '$nom7'";
$res6 = $conn->query($sql7);
if ($res6->num_rows == 0) {
	$bot2_photo = "";
	$bot2 = "";
	echo "<h5>No Selected For Board of Trustee 2</h5>";
}else{
	$row6 = $res6->fetch_assoc();
	$bot2_photo = $row6['Can_image'];

	echo '<img src="uploads/'.$bot2_photo.'" width="180px" height="180px"><br><br>';

	$bot2 = $row6['Can_Fname']." ".$row6['Can_Mname']." ".$row6['Can_Lname']." ".$row6['Can_NameExt'];

	echo "<p>".$bot2."</p><br>";
}
?>
</td>
<td>
<label>Board of Trustee 3:</label><br>	
<?php

//board of trustee 3
$nom8 = $_COOKIE['nom8'];
$sql8 = "select * from tbl_candidates where Can_ID = '$nom8'";
$res7 = $conn->query($sql8);
if ($res7->num_rows == 0) {
	$bot3_photo = "";
	$bot3 = "";
	echo "<h5>No Selected For Board of Trustee 3</h5>";
}else{
	$row7 = $res7->fetch_assoc();
	$bot3_photo = $row7['Can_image'];

	echo '<img src="uploads/'.$bot3_photo.'" width="180px" height="180px"><br><br>';

	$bot3 = $row7['Can_Fname']." ".$row7['Can_Mname']." ".$row7['Can_Lname']." ".$row7['Can_NameExt'];

	echo "<p>".$bot3."</p><br>";
}
?>
</td>
<td>
<label>Board of Trustee 4:</label><br>	
<?php

//board of trustee 4
$nom9 = $_COOKIE['nom9'];
$sql9 = "select * from tbl_candidates where Can_ID = '$nom9'";
$res8 = $conn->query($sql9);
if ($res8->num_rows == 0) {
	$bot4_photo = "";
	$bot4 = "";
	echo "<h5>No Selected For Board of Trustee 4</h5>";
}else{
	$row8 = $res8->fetch_assoc();
	$bot4_photo = $row8['Can_image'];

	echo '<img src="uploads/'.$bot4_photo.'" width="180px" height="180px"><br><br>';

	$bot4 = $row8['Can_Fname']." ".$row8['Can_Mname']." ".$row8['Can_Lname']." ".$row8['Can_NameExt'];

	echo "<p>".$bot4."</p><br>";
}
?>
</td>
</tr>
<tr><td><br></td></tr>
</table>
</div>
<div align="center">
	<a href="reset_voting.php"><input class="btn btn-primary btn-lg" type="button" name="" value="Reset Voting Form"></a>
<input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit the Voting Form">
</div>
</form>
<?php
if (isset($_POST['submit'])) {

	if ($_COOKIE['nom1'] == "none" && $_COOKIE['nom2'] == "none" && $_COOKIE['nom3'] == "none" && $_COOKIE['nom4'] == "none" && $_COOKIE['nom5'] == "none"
		 && $_COOKIE['nom6'] == "none" && $_COOKIE['nom7'] == "none" && $_COOKIE['nom8'] == "none" && $_COOKIE['nom9'] == "none") {
		
		?>

		<script type="text/javascript">
			alert("0 Candidate(s) Selected!");
		</script>

	<?php

  }else{

  	$sql1 = "update tbl_candidates set Can_Votes = (Can_Votes + 1) where Can_ID = '$nom1'";
	$sql2 = "update tbl_candidates set Can_Votes = (Can_Votes + 1) where Can_ID = '$nom2'";
	$sql3 = "update tbl_candidates set Can_Votes = (Can_Votes + 1) where Can_ID = '$nom3'";
	$sql4 = "update tbl_candidates set Can_Votes = (Can_Votes + 1) where Can_ID = '$nom4'";
	$sql5 = "update tbl_candidates set Can_Votes = (Can_Votes + 1) where Can_ID = '$nom5'";
	$sql6 = "update tbl_candidates set Can_Votes = (Can_Votes + 1) where Can_ID = '$nom6'";
	$sql7 = "update tbl_candidates set Can_Votes = (Can_Votes + 1) where Can_ID = '$nom7'";
	$sql8 = "update tbl_candidates set Can_Votes = (Can_Votes + 1) where Can_ID = '$nom8'";
	$sql9 = "update tbl_candidates set Can_Votes = (Can_Votes + 1) where Can_ID = '$nom9'";

  	if ($conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3) && $conn->query($sql4) && $conn->query($sql5) && $conn->query($sql6) && $conn->query($sql7) && $conn->query($sql8) && $conn->query($sql9)) {

		/*setcookie(nom1, "", time() + (86400 * 30), "/");
		setcookie(nom2, "", time() + (86400 * 30), "/");
		setcookie(nom3, "", time() + (86400 * 30), "/");
		setcookie(nom4, "", time() + (86400 * 30), "/");
		setcookie(nom5, "", time() + (86400 * 30), "/");
		setcookie(nom6, "", time() + (86400 * 30), "/");
		setcookie(nom7, "", time() + (86400 * 30), "/");
		setcookie(nom8, "", time() + (86400 * 30), "/");
		setcookie(nom9, "", time() + (86400 * 30), "/");*/

		$sql11 = "select * from tbl_students where Acc_ID = '$user'";
		$res9 = $conn->query($sql11);
		$row9 = $res9->fetch_assoc();
		$image = $row9['Acc_image'];
		$idnum = $row9['Acc_ID'];
		$fname = $row9['Acc_Fname'];
		$mname = $row9['Acc_Mname'];
		$lname = $row9['Acc_Lname'];
		$next = $row9['Acc_NameExt'];
		$gender = $row9['Acc_Gender'];
		$ylevel = $row9['Acc_Ylevel'];
		$course = $row9['Acc_Course'];


		//Vote Records
		$sql10 = "insert into tbl_vote_history values('$image','$idnum','$fname','$mname','$lname','$next','$gender','$ylevel','$course',now())";
		$conn->query($sql10);

		//Back_up Records
		$sql11 = "insert into tbl_records values('$image','$idnum','$fname','$mname','$lname','$next','$gender','$course','$ylevel',now())";
		$conn->query($sql11);

		//Save the Vote Logs
		$sql12 = "insert into tbl_voting_logs values ('$user','$chairman_photo','$chairman','$vicechairman_photo','$vice_chairman','$secretary_photo','$secretary','$treasurer_photo','$treasurer','$busiman_photo','$business_manager','$bot1_photo','$bot1','$bot2_photo','$bot2','$bot3_photo','$bot3','$bot4_photo','$bot4',now())";
		$conn->query($sql12);

		
		?>

		<input type="hidden" name="fullname" id="fullname" value="<?php echo $Full_Name; ?>">

		<script type="text/javascript">
			alert("Your Vote Has Successfuly Submitted!");

			var toPrint = document.getElementById('printarea');
			var fullname = document.getElementById('fullname').value;
        	var popupWin = window.open('', '_blank', 'width=500,height=700,location=no,left=200px');

        	popupWin.document.open();
        	popupWin.document.write('<!DOCTYPE html><html><head><title>::Print Copy::</title><link rel="stylesheet" type="text/css" href="CSS/style.css"><link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"></head><body onload="window.print()">');
        	
        	//popupWin.document.write('<div id="printhead"><hr><img id="logo1" src="images/neust.png" width="110px" height="105px" style="margin-right: -80px; margin-left: 10px; margin-top: -8px;" align="left"><small>REPUBLIC OF THE PHILIPPINES</small><br><big>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</big><br><small>Gapan Academic Extension Campus</small><br><small>Km. 92 Maharlika Highway, Bayanihan, Gapan City, 3105, Nueva Ecija</small><br><big align="center" style="margin-right: -125px;" >Local Student Council Voting System</big><img id="logo2" src="images/ne.png" width="105px" height="105px" style="margin-top: -87px; margin-right: 10px;" align="right"><hr></div>');

        	popupWin.document.write("<h1 align = 'center'>Voting Reciept</h1>");
        	popupWin.document.write("<br><br>");
        	popupWin.document.write("<div align='left' style='margin:20px;'>");
        	popupWin.document.write("<label>Student ID:</label> ");
        	popupWin.document.write("<u><?php echo $user; ?></u>");
        	popupWin.document.write("<br><label>Student Name:</label> <u>");
        	popupWin.document.write(fullname);
        	popupWin.document.write("</u><br><label>Voting Date:</label> ");
        	popupWin.document.write('<?php date_default_timezone_set("asia/manila"); ?>');
        	popupWin.document.write("<?php echo '<u>'.date('h:i:s a / F-d-Y').'</u>'; ?>");
        	popupWin.document.write('</div>');

        	popupWin.document.write("<br>");

        	popupWin.document.write("<div id='verify' align='center'>");
        	
        	popupWin.document.write("<br>");

        	//change it

			popupWin.document.write("<table border align='center' style = 'text-align: center;'>");
			popupWin.document.write("<tr>");
			popupWin.document.write("<th>Candidate Position</th>");
			popupWin.document.write("<th>Vote or Not?</th>");
			popupWin.document.write("</tr>");

			popupWin.document.write("<tr>");
			popupWin.document.write("<td><b>CHAIRMAN</b></td>");
			popupWin.document.write("<td><?php if ($_COOKIE['nom1'] != 'none') { echo 'Vote'; }else{ echo 'Not'; } ?></td>");
			popupWin.document.write("</tr>");

			popupWin.document.write("<tr>");
			popupWin.document.write("<td><b>VICE CHAIRMAN</b></td>");
			popupWin.document.write("<td><?php if ($_COOKIE['nom2'] != 'none') { echo 'Vote'; }else{ echo 'Not'; } ?></td>");
			popupWin.document.write("</tr>");

			popupWin.document.write("<tr>");
			popupWin.document.write("<td><b>SECRETARY</b></td>");
			popupWin.document.write("<td><?php if ($_COOKIE['nom3'] != 'none') { echo 'Vote'; }else{ echo 'Not'; } ?></td>");
			popupWin.document.write("</tr>");

			popupWin.document.write("<tr>");
			popupWin.document.write("<td><b>TREASURER</b></td>");
			popupWin.document.write("<td><?php if ($_COOKIE['nom4'] != 'none') { echo 'Vote'; }else{ echo 'Not'; } ?></td>");
			popupWin.document.write("</tr>");

			popupWin.document.write("<tr>");
			popupWin.document.write("<td><b>BUSINESS MANAGER</b></td>");
			popupWin.document.write("<td><?php if ($_COOKIE['nom5'] != 'none') { echo 'Vote'; }else{ echo 'Not'; } ?></td>");
			popupWin.document.write("</tr>");

			popupWin.document.write("<tr>");
			popupWin.document.write("<td><b>BOARD OF TRUSTEE 1</b></td>");
			popupWin.document.write("<td><?php if ($_COOKIE['nom6'] != 'none') { echo 'Vote'; }else{ echo 'Not'; } ?></td>");
			popupWin.document.write("</tr>");

			popupWin.document.write("<tr>");
			popupWin.document.write("<td><b>BOARD OF TRUSTEE 2</b></td>");
			popupWin.document.write("<td><?php if ($_COOKIE['nom7'] != 'none') { echo 'Vote'; }else{ echo 'Not'; } ?></td>");
			popupWin.document.write("</tr>");

			popupWin.document.write("<tr>");
			popupWin.document.write("<td><b>BOARD OF TRUSTEE 3</b></td>");
			popupWin.document.write("<td><?php if ($_COOKIE['nom8'] != 'none') { echo 'Vote'; }else{ echo 'Not'; } ?></td>");
			popupWin.document.write("</tr>");

			popupWin.document.write("<tr>");
			popupWin.document.write("<td><b>BOARD OF TRUSTEE 4</b></td>");
			popupWin.document.write("<td><?php if ($_COOKIE['nom9'] != 'none') { echo 'Vote'; }else{ echo 'Not'; } ?></td>");
			popupWin.document.write("</tr>");

			popupWin.document.write("</table>");        	

        	//popupWin.document.write(toPrint.innerHTML);

        	popupWin.document.write("<div align='center' style='margin-right:30px; margin-top:50px;'>");
          popupWin.document.write("<p>___________________");
          popupWin.document.write("<br>Election Officer</p>");
          popupWin.document.write("</div>");
        	popupWin.document.write("</div>");
        	popupWin.document.write("</body>");
        	popupWin.document.write('</html>');
        	popupWin.document.close();

			window.location = "student_page.php";
		</script>

		<?php

	}else{

		echo "Voting Failed!";
		
	}
  }
}
?>
</div>
</div>
</body>
</html>