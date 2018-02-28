<?php
	function checker($data,$myuserid){
		include("extra/config.php");
		$msgsValid = array();
		$expected = array('surname', 'forename', 'email', 'telephone_number', 'address', 'birthday', 'password', 'new_password');
		$required = array('surname', 'forename', 'email', 'telephone_number', 'address', 'password');
		if(isset($data['old_password'])){
			
			$myuserid = mysqli_real_escape_string($conn,$myuserid);
			
			$sql = "SELECT password 
			FROM user 
			WHERE id = '$myuserid'";

			$result = mysqli_query($conn,$sql);	
			if($result == FALSE)
				return "";
			
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
			if($data['old_password'] != $row['password'])
				$msgsValid['old_password']= '<span class="warning"> wrong old password </span>';
			
			if($data['new_password'] != $data['new1_password'])
			$msgsValid['new_password']= '<span class="warning"> wrong new password </span>';
			
		}
		
		foreach($required AS $field){
			if(empty($data[$field]))
			$msgsValid[$field] = '<span class="warning">'.$field.' must not be empty'.'</span>';
		}
		
		foreach($expected as $field) {
			if(isset($data[$field]))
				$value = trim($data[$field]);
			
			if(!empty($value) || $value === '0') {
				$value = htmlentities($value, ENT_COMPAT, 'UTF-8');
				switch($field) {
					case 'email':
						if(filter_var($value, FILTER_VALIDATE_EMAIL) === FALSE)
							$msg = 'Not a valid email address';
						break;
					case 'telephone_number':
						$options = ['options' => ['min_range' => 1]];
						if(filter_var($value, FILTER_VALIDATE_INT, $options) === FALSE) {
							$msg = 'bad phone number';
						break;
						}
				}
				if(!empty($msg)){ //Output for specific error message
					$msgsValid[$field] = '<span class="warning">'.$msg.'</span>';
					unset($msg);
				}
			}
		}
		if(!empty($msgsValid)){
			
			return $msgsValid;
		}
		else return NULL;
	}
?>