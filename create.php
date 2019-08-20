<?php
if (isset($_COOKIE['type']) && $_COOKIE['type'] == "Administrator") {
	header("location:administrator_module.php");
}elseif (isset($_COOKIE['type']) && $_COOKIE['type'] == "Student") {
	header("location:student_module.php");
}else{

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Student Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		function focus() {
			$("#frame").focus();
		}
	</script>
</head>
<body onload="focus()">
<?php require 'header.php'; ?>

<iframe id="frame" src="create_account.php" height="650px" width="99.8%" style=" border: none; margin-left: 5px;"></iframe>
</body>
</html>