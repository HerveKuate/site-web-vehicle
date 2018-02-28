<?php
	function number_of_same_vehicle_in_result($myid, $veh_id){
		include("extra/config.php");
		
		$sql = "SELECT count(vehicle_id) AS number
		from result
		WHERE user_id = $myid
		AND vehicle_id = $veh_id";
	
		$result = mysqli_query($conn,($sql));
			
		if ($result === FALSE)
			echo "Error:  <br>" . $conn->error;
		else{	
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				return $row['number'];
			}
			return false;
		}
	}
?>