
<?php require 'admin_session.php'; ?>

<?php
$pname = $_GET['pname'];

require 'dbcon.php';

$sql = "delete from tbl_partylist where Plist_Name = '$pname'";
$sql1 = "delete from tbl_candidates where Can_Partylist = '$pname'";
if ($conn->query($sql)) {

	$conn->query($sql1);
	header("location:add_partylist.php");
}
?>