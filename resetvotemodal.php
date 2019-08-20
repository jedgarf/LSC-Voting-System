
<script type="text/javascript">
    $(document).ready(function () {
        $("#resetvote").click(function () {
       $("#pwd").trigger("focus"); 
    });
    });
</script>

<style type="text/css">
        /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 10px; /* Location of the box */
    left: 0;
    margin-bottom: 300px;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
    </style>

    <script type="text/javascript">
//submit close
function close() {
    modal.style.display = "none";
    modal.removeData();
}
</script>

<!-- The Modal -->
<div id="resetCount" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Enter Password:</h2>
    </div>
    <br>
    <form method="POST" autocomplete="off" onsubmit="close()">
    <div align="center">
    <label>Election Chairman Password</label>
    <input type="Password" id="pwd" name="uppass" class="form-control" placeholder="Enter Password" required="">
    </div>
    <br>
    <div align="center">
    <label>Admin Password</label>
    <input type="Password" id="pwd1" name="uppass1" class="form-control" placeholder="Enter Password" required="">
    </div>
    <br>
    <!--<div>
        <label style="color: black; font-size: 15px;" id="text"><input id="eye" type="checkbox"> show password</label>
                        <script type="text/javascript" src="jquery/allpw_show.js"></script>
    </div>
    <br>-->
    <div class="modal-footer">
    <input type="reset" name="reset" class="btn" value="Clear">    
    <input type="submit" name="reset_submit" class="btn btn-primary" value="Submit">
    </div>
    </form>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('resetCount');

// Get the button that opens the modal
var btn = document.getElementById("resetvote");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<!--PHP Script-->
<?php
if (isset($_POST['reset_submit'])) {

    //Declaring Variables
    $upd_pass = $_POST['uppass'];
    $upd_pass1 = $_POST['uppass1'];

    //Hashing Password
    $update_pass = md5($upd_pass);
    $update_pass1 = md5($upd_pass1);


    if ($upsec == $update_pass && $upsec1 == $update_pass1) {

        //header("location:vote_reset.php");
        ?>

        <script type="text/javascript">
            window.location = "vote_reset.php";
        </script>

        <?php

      
    }else{
        ?>

        <script type="text/javascript">
            alert("Incorrect Password!");
            window.location = "system_setting.php";
        </script>

        <?php
    }
}
?>



