<?php
	function ranged_favorite_result($myid){
		include("extra/config.php");
		include('function/list_vehicle_from_result.php');
		include('function/number_of_same_vehicle_in_result.php');
		
		if(function_exists ('result') == false)
		include('function/result.php');
		
		$myid = mysqli_real_escape_string($conn, $myid);
		
		
		$myvehicle = [];
		foreach(list_vehicle_from_result($myid) AS $id){
			$veh_id = mysqli_real_escape_string($conn,$id);
			
			$myvehicle[$id] = number_of_same_vehicle_in_result($myid,$veh_id);
			
		}
		if(!empty($myvehicle)){
			echo'<h2> Top 5 Vehicle(s)</h2>';
			echo'<table id="favorite_vehicle" ><tr>';
			arsort($myvehicle); //http://php.net/manual/en/function.asort.php
			
			$counter=0;
			foreach($myvehicle AS $key => $value){
				$key = mysqli_real_escape_string($conn, $key);
				
				
				$result = mysqli_query($conn,"SELECT *	FROM vehicle WHERE id = '$key'");
				for($i = 1; $output = mysqli_fetch_array($result,MYSQLI_ASSOC); $i++)
					result($output, $myid, $i);	
				$counter++;
				if($counter == 5){
					echo '<td></td></tr></table>';
					$conn ->close();
					return true;
				}
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
			echo '</tr></table>';
			$conn ->close();
			return true;
		}
	}
?>