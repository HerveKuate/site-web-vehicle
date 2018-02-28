<?php			
	include("function/get_vehicle_via_search.php");
	include("function/result.php");
	include("function/get_last_vehicle_search_result.php");
	if(function_exists ('insert_data_to_result_database') == false)
		include('function/insert_data_to_result_database.php');

	
	$data = get_vehicle_via_search($_GET, $_SESSION['id']);
	if(isset($data)){
		
		insert_data_to_result_database($_SESSION['id'], $data);
		
		
		echo '<table id="show_vehicle" ><tr>';
		$y=1;
		foreach($data AS $key => $value)
			result($data[$key], $_SESSION['id'], $y++);
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
?>