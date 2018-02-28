<?php 
function show_target_result($myid ,$mysearch){
	include("extra/config.php");
	include('function/result.php');
	include('function/list_vehicle_result_same_search_number.php');
	
	$data = list_vehicle_result_same_search_number($myid, $mysearch);
	echo '<table id="show_vehicle" ><tr>';
	foreach($data AS $key => $value){
		$value = mysqli_real_escape_string($conn,$value);
		
			$result = mysqli_query($conn,"SELECT *
			FROM vehicle
			WHERE id = '$value'");
			$i= 1;
			$output = mysqli_fetch_array($result,MYSQLI_ASSOC);
				result($output, $myid, $i++);
			
			
	}
	switch(($i-1)%4){
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
	echo'</tr></table>';
}
?>
