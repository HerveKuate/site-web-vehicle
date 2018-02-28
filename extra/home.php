<?php


	echo'
	<form id="search_form" action="'.$_SERVER['PHP_SELF'].'" method="GET">
	search:
	<input type="text" name="basic_search"  />
	<input type="submit" name="basic_search_ok" value="search" />
	</form>';
	

	if(isset($_GET['basic_search'])){
		if(function_exists ('input_to_search_table') == false)
		include('function/input_to_search_table.php');
	
	
		if(function_exists ('get_vehicle_via_search') == false)
		include('function/get_vehicle_via_search.php');
	
		if(function_exists ('result') == false)
		include('function/result.php');
		
		input_to_search_table($_GET ,$_SESSION['id']);
		
		$data = get_vehicle_via_search($_GET, $_SESSION['id']);
		$y=1;
		echo'<table id="show_vehicle" ><tr>';
		
		if(!empty($data)){
			
			foreach($data AS $key => $value)
				result($data[$key], $_SESSION['id'], $y++);

		}
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
	ranged_favorite_result(mysqli_real_escape_string($conn,$_SESSION['id']));	
?>