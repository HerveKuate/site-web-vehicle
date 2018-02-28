<?php 
	function user_data_via_id($myid){
		include("extra/config.php");
		$myid = mysqli_real_escape_string($conn,$myid);
				
		$sql = "SELECT surname, id, forename, email, telephone_number,address
		FROM user 
		WHERE id = $myid"; 
		
		$result = mysqli_query($conn,$sql);	
		
		if($result == FALSE)
			return "";
		
		return mysqli_fetch_array($result,MYSQLI_ASSOC);
	}	
?>
