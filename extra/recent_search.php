<?php
	function count_number_search_to_user($myid){
		include("extra/config.php");
		
		$myid = mysqli_real_escape_string($conn,$myid);
		
		$result = mysqli_query($conn,"SELECT DISTINCT year, year_operator, make, cc, cc_operator, color, model, basic_search
		FROM search
		WHERE user_id = '$myid'");
		
		if($result == false){
			echo 'error detected';
			return "";
		}
		$rowcount=mysqli_num_rows($result);

		return $rowcount;
	}

	include("function/get_vehicle_via_search.php");//function
	include("function/navigation_bar.php");
	include("function/result.php");
	
	$myid = mysqli_real_escape_string($conn,$myid);
	
	if(empty($_GET['result2_number']))
		$_GET['result2_number'] = 1;
	
	navigation_bar(count_number_search_to_user($myid), $_GET['result2_number']);

	if($_GET['result2_number']>0 && $_GET['result2_number']<=count_number_search_to_user($myid)){
		
		$x3 = mysqli_real_escape_string($conn,$_GET['result2_number']-1);
		
		$result4 = mysqli_query($conn,"SELECT DISTINCT year, year_operator, make,
		cc, cc_operator, color, model, basic_search 
		FROM search
		WHERE user_id = '$myid'
		LIMIT $x3, 1");
		
		while($data_search2 = mysqli_fetch_array($result4, MYSQLI_ASSOC))
			$data_search = $data_search2;
		
		$result = get_vehicle_via_search($data_search, $_SESSION['id']);
		
		if($result){
			echo '<table id="show_vehicle" ><tr>';
			$y=1;
			foreach($result AS $key => $value)
				result($result[$key], $myid, $y++);
			
			switch(($y-1)%4){
				case 0:
				echo'<td></td><td></td><td></td><td></td>';
				break;
				case 1:
				echo'<td></td><td></td><td></td>';
				break;
				case 2:
				echo'<td></td><td></td>';
				break;
				case 3:
				echo'<td></td>';
				break;
			}
			echo '</tr></table>';
		}
	}
?>