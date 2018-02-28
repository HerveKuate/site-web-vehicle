<?php
function get_target_search_number($myid,$x3){
	include("extra/config.php");
	
	$myid = mysqli_real_escape_string($conn,$myid);
	$x3 = mysqli_real_escape_string($conn,$x3-1);
	
	$sql = "SELECT DISTINCT search_number
		FROM result
		WHERE user_id = '$myid'
		LIMIT $x3, 1";
		
		 $y = mysqli_query($conn,$sql);
		if($y == FALSE)
			return "";
		
		while($getter = mysqli_fetch_array($y,MYSQLI_ASSOC)){
			return $getter['search_number'];
		}
		
	}	
?>