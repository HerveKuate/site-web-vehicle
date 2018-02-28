<?php	

	function total_number_result($myid){
		include("extra/config.php");
		$sql = "SELECT count(DISTINCT search_number) AS max2
		FROM result
		WHERE user_id = '$myid'";
		$result = mysqli_query($conn,$sql);
		
		if($result == FALSE)
			return "";
		return $result;
	}
?>