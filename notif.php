<div id="notif">
	<div id="close" align="right" title="Hide Notification"><button style="border: none; background-color: #FFFF00;"><b>&times;</b></button></div>
	<div id="par">
		<h2>You Have <font color="red"><?php echo $treq; ?></font> Student Account Request(s)<br>
		Click <a href="student_requests.php">Here</a> To View.</h2>
	</div>
</div>
<script type="text/javascript">
	$("#close").click(function () {
		$("#notif").hide();
	});
</script>