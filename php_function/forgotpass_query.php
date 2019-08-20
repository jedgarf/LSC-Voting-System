<?php

require '../dbcon.php';

	$user = $_POST['user'];
	$quest = $_POST['quest'];
	$ans = $_POST['ans'];
	$forgotpass = $_POST['forgotpass'];
	$forgotrepass = $_POST['forgotrepass'];
	$forgotrepassenc = md5($forgotrepass);

	$sql1 = "select Acc_Type,Acc_ID,Acc_Quest,Acc_Ans from tbl_students where Acc_ID = '$user' union all 
	select Acc_Type,Acc_Uname,Acc_Quest,Acc_Ans from tbl_administrator where Acc_Uname = '$user'";

	if ($result1 = $conn->query($sql1)) {
		$row1 = $result1->fetch_assoc();

			if ($row1['Acc_ID'] == $user) {
				
				if ($row1['Acc_Quest'] == $quest && $row1['Acc_Ans'] == $ans) {

						if ($forgotpass == $forgotrepass) {
							
							$type = $row1['Acc_Type'];

						if ($type == 'Administrator') {
							$sql2 = "update tbl_administrator set Acc_Pword = '$forgotrepassenc' where Acc_Uname = '$user'";
							if ($conn->query($sql2)) {
								echo "Your Password is Successfully Saved!";

							}

						}elseif ($type == 'Student') {
							$sql2 = "update tbl_students set Acc_Pword = '$forgotrepassenc' where Acc_ID = '$user'";

							if ($conn->query($sql2)) {
							
								echo "Your Password is Successfully Saved!";

							}

							}
						}else{
							echo "Password Doesn\'t Match!";
						}
				}else{
					echo "Your Question/Answer is Incorrect!";
				}

			}else{
				echo "Incorrect Username/Password!";
		}
	}
