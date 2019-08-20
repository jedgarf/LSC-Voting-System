
 

<!-- Modal -->

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-header">
<h3 id="myModalLabel">Create An Account</h3>
</div>

<div class="modal-body">

<form id="create-form" method="post" enctype="multipart/form-data" autocomplete="off" action="php_function/createacc_query.php">

	<div align="center">
		<div id="image_show" hidden>
		<img id="img" src="#" width="230px" height="188px">
		</div>
	
		<input type="file" name="image" id="image" onchange='Test.UpdatePreview(this)' required>

		<script type="text/javascript">
			$("#image").change(function () {
				$("#image_show").show();
			});
		</script>

		<br><br>
	</div>

<div class="first-column">
	<div class="col-xs-6">
		<label>Student ID: </label>
		<div class="input-group">
		<input type="text" id="studid" class="form-control" name="sid" maxlength="15" placeholder="Student ID" onkeydown="return isStudId(event.keyCode);" required>
		</div>
	</div>	

	<div class="col-xs-5">
		<label>Password: </label>
		<input type="password" class="form-control" name="pass" maxlength="10" placeholder="Password" required="">
	</div>
	<div class="col-xs-5">
		<label>Confirm Password: </label>
		<input type="password" class="form-control" name="repass" maxlength="10" placeholder="Password" required="">
	</div>

	<div class="col-xs-4">
		<label>First Name: </label>
		<input type="text" class="form-control" name="fname" maxlength="25" onkeypress="return onlyAlphabets(event,this);" placeholder="First Name" required="">
	</div>
	<div class="col-xs-4">
		<label>Middle Name: </label>
		<input type="text" class="form-control" name="mname" maxlength="25" onkeypress="return onlyAlphabets(event,this);" placeholder="Middle Name">
	</div>
	<div class="col-xs-4">
		<label>Last Name: </label>
		<input type="text" class="form-control" name="lname" maxlength="25" onkeypress="return onlyAlphabets(event,this);" placeholder="Last Name" required="">
	</div>
	
	<div class="col-xs-5">
			<label>Extension Name: </label>
			<select class="form-control" name="next">
			<option value="">none</option>
			<option value="Jr.">Jr.</option>
			<option value="Sr.">Sr.</option>
			<option value="III">III</option>
			<option value="Iv">IV</option>
			<option value="V">V</option>
		</select>
	</div>

</div>


<div class="second-column">

	<div class="col-xs-3">
	<label>Gender: </label>
	Male 
	<input type="radio" name="gender" value="Male" checked> 
	 Female 
	<input type="radio" name="gender" value="Female">
	</div>

	<div class="col-xs-5">
		<label>Course:</label>
		<select name="course" class="form-control" required>
			<option>BSIT</option>
			<option>BSE-English</option>
			<option>BSE-MAPEH</option>
			<option>BSBA</option>
			<option>BSHRM</option>
		</select>
	</div>
	<div class="col-xs-6">
	<label>Year Level: </label>
	<select name="ylevel" class="form-control" required>
		<option>1st Year</option>
		<option>2nd Year</option>
		<option>3rd Year</option>
		<option>4th Year</option>
	</select>
	</div>
	<div class="col-xs-6">
		<label>Birth Date:</label>
		<?php
		date_default_timezone_set("asia/manila");
		$curdate = date("F-d-Y");
		?>
	<input type="text" id="p" class="form-control" name="bdate" value="<?php echo $curdate; ?>" readonly required>

			<script type="text/javascript">
				$(function() {
					 $('#p').datepicker({
        			 format: 'MM-dd-yyyy',
        			 endDate: "January-01-1970",
   					 endDate: "January-01-2040",
        			 todayHighlight: true,
        			 orientation: 'bottom right',
        			 autoclose: true,
 				   });
				});
			</script>
	</div>

	<div class="col-xs-6">
		<label>Security Question: </label>
		<select class="form-control" style="font-size: 12px;" name="quest">
		<option>What is Your Favorite Food?</option>
		<option>What is Your Favorite Color?</option>
		<option>What is Your Favorite Subject?</option>
		<option>Who is Your Favorite Teacher?</option>
		<option>What is Your Favorite Games?</option>
		</select>
	</div>
	<div class="col-xs-6">
		<label>Answer: </label>
		<input type="text" class="form-control" name="ans" maxlength="30" placeholder="Answer">
	</div>
</div>

</div>

 <div class="modal-footer">
 	<p id="status"></p>
    <button class="btn" id="btn2" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn" id="reset" type="reset" aria-hidden="true">Clear</button>

    <script type="text/javascript">
    	$("#reset").click(function () {
    		$("#image_show").hide();
    	});
    </script>

<button type="submit" name="sub" class="btn btn-primary">Create Account</button>

    </div>

<script type="text/javascript">
	$(document).ready(function () {
		$("#create-form").submit(function (evt) {
			evt.preventDefault();

			$.ajax({
				url: $(this).attr("action"),
				type: "POST",
				data: new FormData(this),
				processData: false,
				contentType: false,

				success: function (response) {
					$.alert({
						title: 'Alert!',
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

</form>
</div>