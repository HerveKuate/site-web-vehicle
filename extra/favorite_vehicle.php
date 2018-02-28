<?php 
		$myid = mysqli_real_escape_string($conn,$_SESSION['id']);
		include("function/result.php");
	
		$result = mysqli_query($conn,"SELECT DISTINCT vehicle_id AS ID
		FROM saved
		WHERE user_id = '$myid'");
		if($result ==true){
			echo '<table id="show_vehicle" ><tr>';
			$y=1;
			while($fav_output = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			
			$x3 = mysqli_real_escape_string($conn,$fav_output['ID']);
				
			$result5 = mysqli_query($conn,"SELECT DISTINCT vehicle.*
			FROM vehicle, saved	
			WHERE user_id = '$myid'
			AND vehicle.id = $x3");
			
			for($i = 1; $fav_output5 = mysqli_fetch_array($result5,MYSQLI_ASSOC); $i++)
				result($fav_output5, $myid, $y++);
			
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
		}
		
?>
