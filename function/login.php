<?php
	function login($data){
		include("extra/config.php");
		$myuserinput = mysqli_real_escape_string($conn,$data['login_input']);
		$mypassword = mysqli_real_escape_string($conn,$data['password']);
		
		$sql = "SELECT surname AS login_input, id 
		FROM user 
		WHERE password = '$mypassword' 
		AND (surname = '$myuserinput' OR  forename = '$myuserinput' OR email = '$myuserinput' OR telephone_number = '$myuserinput' )";
		
		$result = mysqli_query($conn,$sql);	
		
		if($result == FALSE)
			return "";
		
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		
		if($count == 1){
			return $row;
		} else {
			$error = "Your Login Name or Password is invalid";
			return "";
		}
	}
?>