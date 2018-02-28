<?php
	function list_vehicle_result_same_search_number($myid, $mysearch){
		include("extra/config.php");
		include('function/get_target_search_number.php');
		
		$myid = mysqli_real_escape_string($conn,$myid);
		$mysearch = mysqli_real_escape_string($conn,get_target_search_number($myid,$mysearch));
		
		$sql = "SELECT vehicle_id AS ID, search_number
		FROM result
		WHERE search_number = '$mysearch'
		AND user_id = '$myid'";
		
		$y = mysqli_query($conn,$sql);
		
		if($y == FALSE)
			return "";
		$counter=0;
		$output=[];
		 while($vehicle_id = mysqli_fetch_array($y,MYSQLI_ASSOC)){
			$output[$counter] = $vehicle_id['ID'];
			$counter++;
		}
	return $output;
}	
?>