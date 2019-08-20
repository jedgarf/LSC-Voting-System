
 <!-- Button to trigger modal -->
    	<a href="#myModal1" id="forgot" data-toggle="modal">Forgot Password?</a>

    	<script type="text/javascript">
    $(document).ready(function () {
        $("#forgot").click(function () {
       $("#u").focus(); 
    });
    });
</script>
	
<!-- Modal -->

<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-header">
<h3 id="myModalLabel">Forgot Password</h3>
</div>

<div class="modal-body" align="center">

<form id="cform" method="post" autocomplete="off" action="php_function/forgotpass_query.php">

	<table>
			<tr><td><label>Username: </label></td></tr>
			<tr><td><input type="text" id="u" class="form-control" name="user" placeholder="Username" value="<?php if(isset($_POST['sub1'])){ echo $_POST['user']; }else{} ?>" required=""></td></tr>
			<tr><td><label>Security Question: </label></td></tr>
			<tr><td><select class="form-control" style="font-size: 12px;" name="quest">
				<?php
				$sql = "select distinct(Acc_Quest) from tbl_administrator union all select distinct(Acc_Quest) from tbl_students";
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc()) {
					echo "<option>".$row['Acc_Quest']."</option>";
				}
				?>
			</select></td></tr>
			<tr><td><label>Answer: </label></td></tr>
			<tr><td><input type="text" class="form-control" name="ans" maxlength="30" placeholder="Answer" required=""></td></tr>
			<tr><td><label>New Password: </label></td></tr>
			<tr><td><input type="password" class="form-control" name="forgotpass" maxlength="30" placeholder="password" id="pwd2" required=""></td></tr>
			<tr><td><label>Confirm Password: </label></td></tr>
			<tr><td><input type="password" class="form-control" name="forgotrepass" maxlength="30" placeholder="password" id="pwd1" required=""></td></tr>
			<tr><td>
				<label style="color: black; font-size: 15px;" id="text"><input id="for" type="checkbox"> show password</label>
						<script type="text/javascript" src="jquery/forgotshow.js"></script>
					</td></tr>
			<tr><td><br></td></tr>
		</table>

		</div>

 <div class="modal-footer">
 	<p id="status" style="color: red;"></p>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn" id="btn1" type="reset" aria-hidden="true">Clear</button>

    <script type="text/javascript">
    	$("#btn1").click(function () {
    		$("#image_show").hide();
    	});
    </script>

<button type="submit" name="sub1" class="btn btn-primary">Save</button>
</div>
</form>
	
	<script type="text/javascript">
		
		$(document).ready(function () {
			$("#cform").submit(function (evt) {
				evt.preventDefault();

				$.ajax({
					url: $(this).attr("action"),
					type: "POST",
					data: $(this).serialize(),

					success: function (response) {
						console.log(response);
						$.alert({
		       				title: 'Warning!',
		       				boxWidth: '30%',
		    				useBootstrap: false,
		        			content: response,
		    			});
					},
					error: function () {
						 $.alert({
		       				title: 'Warning!',
		       				boxWidth: '30%',
		    				useBootstrap: false,
		        			content: 'Caught an Error!',
		    			});
					}
					
				});

			});
		});

	</script>
	
</div>