
<?php require 'admin_session.php'; ?>

<?php
$id = $_GET['id'];

require 'dbcon.php';
$sql0 = "select * from tbl_candidates where Can_ID = '$id'";
$res = $conn->query($sql0);
$row = $res->fetch_assoc();
$plist = $row['Can_Partylist'];

$sql = "delete from tbl_candidates where Can_ID = '$id'";
$conn->query($sql);
if ($plist == "none") {
	header("location:independent_can.php");
}else{
	header("location:partylist_can.php?pname=$plist");
}
?>