

<a><label id="updateprofile">CHANGE PROFILE</label></a>

<script type="text/javascript">
    $(document).ready(function () {
        $("#updateprofile").click(function () {
       $("#pwd").focus(); 
    });
    });
</script>

<style type="text/css">
        /* The Modal (background) */
.modalupdate {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modalupdate-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
}

/* The Close Button */
.updateclose {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.updateclose:hover,
.updateclose:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
    </style>

    <script type="text/javascript">
//submit close
function update_close() {
    modal.style.display = "none";
    modal.removeData();
}
</script>

<!-- The Modal -->
<div id="myModal" class="modalupdate">

  <!-- Modal content -->
  <div class="modalupdate-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Enter Your Password:</h2>
    </div>
    <br>
    <form method="POST" autocomplete="off" onsubmit="update_close()" target="view">
    <div align="center">
    <input type="Password" id="pwd" name="uppass" class="form-control" placeholder="Enter Password" required="">
    </div>

    <br>
    <div>
        <label style="color: black; font-size: 15px;" id="text"><input id="eye" type="checkbox"> show password</label>
                        <script type="text/javascript" src="jquery/pwd_show.js"></script>
    </div>
    <br>
    <div class="modal-footer">
    <input type="reset" name="reset" class="btn" value="Clear">    
    <input type="submit" name="update_submit" class="btn btn-primary" value="Submit">
    </div>
    </form>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("updateprofile");

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
if (isset($_POST['update_submit'])) {

    //Declaring Variables
    $upd_pass = $_POST['uppass'];
    $update_pass = md5($upd_pass);


    if ($upsec == $update_pass) {

        ?>

        <script type="text/javascript">
            window.location = "edit_admin_profile.php";
        </script>

        <?php
      
    }else{
        ?>

        <script type="text/javascript">
            alert("Incorrect Password!");
            window.location = "all_candidates.php";
            modal.style.display = "block";
        </script>

        <?php
    }
}
?>
