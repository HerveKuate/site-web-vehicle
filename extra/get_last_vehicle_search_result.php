<?php		//get last vehicle search result		
	$result = mysqli_query($conn,
	"SELECT DISTINCT vehicle.*
	FROM vehicle, result
	where result.vehicle_id = vehicle.id 
	AND user_id = '$myid' 
	AND result.search_number = 
	( SELECT Max(search_number)
	FROM result
	WHERE user_id = '$myid')");
	if($result == TRUE){
	
		$row1=0;
		while($getter = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		$row1++;
		$result1[$row1] = $getter;
		}
	}
?>