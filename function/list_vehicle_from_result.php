<?php		
	function list_vehicle_from_result($myid){
		include("extra/config.php");
		$sql = "SELECT DISTINCT vehicle_id
		from result
		WHERE user_id = '$myid'";
		
		$result = mysqli_query($conn,($sql));
		
		if($result == FALSE){
			echo "Error:  <br>" . $conn->error;
		} else {
			$count=0;
			$vehicle = [];
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$vehicle[$count] = $row['vehicle_id'];
				$count++;
			}
			return $vehicle;
		}
		return "";
	}
?>