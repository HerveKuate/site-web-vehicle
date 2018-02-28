<?php
	function insert_data_to_result_database($myid,$myvehicule_id){
		include("extra/config.php");
		$result = mysqli_query($conn,
		"SELECT Max(search_number) AS recent
		FROM result, user
		WHERE user.id = '$myid'");
		$mysearch_number = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$mysearch = mysqli_real_escape_string($conn,$mysearch_number['recent']+1);
		
		foreach($myvehicule_id AS $key => $value){
			$myveh = mysqli_real_escape_string($conn,$myvehicule_id[$key]['id']);
			$myid = mysqli_real_escape_string($conn,$myid);
			
			if($conn->query("INSERT INTO result(id, search_number, user_id, vehicle_id)
			VALUES (NULL, '$mysearch', '$myid', $myveh)") == FALSE)
				die("Connection failed: " . $conn->connect_error);
		}
	}
?>