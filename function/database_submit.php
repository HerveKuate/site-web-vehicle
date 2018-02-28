<?php	
	function database_submit($data,$myuserid){
		include("function/checker.php");
		include('function/user_registration_to_database.php');
		$msgsValid = array();
		$expected = array('surname', 'forename', 'email', 'telephone_number', 'address', 'birthday', 'password', 'new_password');
		
		if(!empty($data['old_password']))
			$data['password'] =$data['old_password'];
		
		$msgsValid = checker($data,$myuserid);

		if(!empty($msgsValid)){
			$msgsValid['main'] = '<span class="warning">Please amend your details as indicated</span>';	
			return $msgsValid;
		}
		else{
			if(!empty($data['new_password']))
				$data['password'] = $data['new_password'];
				
			if (isset($data['user_data_update'])){
				user_registration_to_database($data,$myuserid);
			}
			if(isset($data['sign_up'])){
				user_registration_to_database($data,NULL);
			}
		}
		return ['main' => 'Registration succeful'];
	}
?>