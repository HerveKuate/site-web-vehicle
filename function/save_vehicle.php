<?php
	function save_vehicle($myid, $myadd){
		include("extra/config.php");
		$myadd = mysqli_real_escape_string($conn,$myadd);
		$myid = mysqli_real_escape_string($conn,$myid);
		
		if($conn->query("INSERT INTO saved (user_id, vehicle_id) VALUES ('$myid','$myadd')") == FALSE)
		echo "Error: " . $conn->error;
	}

?>