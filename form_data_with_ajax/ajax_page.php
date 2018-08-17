<?php 
if(isset($_POST['action'])){
	$action = $_POST['action'];
	
	if($action == 'savadata'){
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$check = $_POST['check'];
		
		echo "Name : ".$name;
		echo "Email : ".$email;
		echo "Check : ".$check;
		
	}
	
	else{
		 echo "Invalid Method!";
	}
}
else{
	echo "Invalid Calling Method!";
}
?> 