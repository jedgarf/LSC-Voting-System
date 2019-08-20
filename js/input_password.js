function pass1(){
		pass=false;
		password="";
		password=prompt("Enter A Password:","");
		password=password.toLowerCase();
		if (password=="login") { 
			pass=true;
			$("#form").attr("src","all_candidates.php");
		}
		if (pass==false) {
			alert("Invalid Password!");
		}
		}
function pass2(){
		pass=false;
		password="";
		password=prompt("Enter A Password:","");
		password=password.toLowerCase();
		if (password=="login") { 
			pass=true;
			$("#form").attr("src","vote_history.php");
		}
		if (pass==false) {
			alert("Invalid Password!");
		}
		}