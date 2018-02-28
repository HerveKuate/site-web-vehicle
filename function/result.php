<?php
	function result($output, $myid, $num){
		include("extra/config.php");
		echo '<td>
		<div class="picture">
		<img src="'.$output['picture'].'" alt="picture" width="164" height="124" />
		</div>
		<div class="search_result_content">
			year :'.$output["year"].'<br>
			make :'.$output["make"].'<br>
			cc :'.$output["cc"].'<br>
		</div>';
				
		//save the vehicle id
		$myid = mysqli_real_escape_string($conn, $myid);
		$myvehicle = mysqli_real_escape_string($conn,$output['id']);
		
		$ontable = mysqli_query($conn,"SELECT * FROM saved WHERE user_id = '$myid' AND vehicle_id = '$myvehicle'");
		if($ontable != FALSE)
			$current_vehicle_displayed=mysqli_num_rows($ontable);
		
		if(!empty($current_vehicle_displayed))
			echo 'already saved';
		else
			echo'<a href="'.$_SERVER['PHP_SELF'].'?add_to_favorite='.$output['id'].'" >save</a>';
		
		echo '</td>';
		if(is_int($num / 4))
			echo '</tr><tr>';
	}
?>