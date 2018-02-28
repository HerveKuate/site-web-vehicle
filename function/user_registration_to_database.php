<?php
	function user_registration_to_database($data, $myuserid){
		include("extra/config.php");
		$myuserid = mysqli_real_escape_string($conn,$myuserid);
		
		$expected = array('surname', 'forename', 'email', 'telephone_number', 'address'
		, 'birthday', 'password');
		
		foreach($expected AS $value){
			if(!empty($data[$value])){
				$myvalue = mysqli_real_escape_string($conn,$data[$value]);
				$mykey = mysqli_real_escape_string($conn,$value);
				
				
				switch($myuserid){
					case NULL:
						if($conn->query("INSERT INTO user (id) VALUES(NULL)") == FALSE)
							die("Connection failed: " . $conn->connect_error);
						
						$last_id = mysqli_real_escape_string($conn, mysqli_insert_id($conn));
						
						$myuserid = mysqli_real_escape_string($conn, mysqli_insert_id($conn));
						
						if($conn->query("UPDATE user SET $mykey = '$myvalue'
						WHERE id = '$myuserid'") == FALSE)
						die("Connection failed: " . $conn->connect_error);
					break;
					case $myuserid:
						if($conn->query("UPDATE user SET $mykey = '$myvalue'
						WHERE id = '$myuserid'") == FALSE)
						die("Connection failed: " . $conn->connect_error);
					break;
					default:
						if($conn->query("UPDATE user SET $mykey = '$myvalue'
						WHERE id = '$last_id'") == FALSE)
						die("Connection failed: " . $conn->connect_error);	
					break;
				}
			}
		}
	}
?>