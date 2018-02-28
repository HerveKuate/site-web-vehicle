<?php
	$myid = mysqli_real_escape_string($conn,$_SESSION['id']);
	
	$counter2=0;
	$fav_output = mysqli_query($conn,"SELECT DISTINCT vehicle.* FROM saved, vehicle
	WHERE saved.user_id = '$myid'
	AND saved.vehicle_id = vehicle.id");
	
	echo'<div id="saved_vehicle">';
	while($fav_output2=mysqli_fetch_array($fav_output,MYSQLI_ASSOC)){
		$output = $fav_output2;
		echo'<img width="164" height="124" src="'.$output['picture'].'" alt="picture" />';
		if($counter2>4)break;
		$counter2++;
	}
	echo '</div>';
?>
<nav>
	<ul>
	  <li><a href="index.php?decision=home" >Home</a></li>
	  <li><a href="index.php?decision=user_config" >Config</a></li>
	  <li><a href="index.php?decision=search_car" >Car search</a></li>
	  <li><a href="index.php?decision=favorite_result" >Favorite Result</a></li>
	  <li><a href="index.php?decision=favorite_vehicle" >Favorite Vehicle</a></li>
	  <li><a href="index.php?decision=recent_search" >Recent Search</a></li>
	  <li id="logout"><a href="index.php?decision=logout" >Logout</a></li>
	</ul>
</nav>
