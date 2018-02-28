<?php 
	include('function/total_number_result.php');
	include('function/navigation_bar.php');
	include("function/show_target_result.php");
	//variable
	$myid = mysqli_real_escape_string($conn,$_SESSION['id']);
	if(empty($_GET['result2_number']))$_GET['result2_number']=1;

	//total number of result of $user
	$result = total_number_result($myid);
	$x2 = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
	navigation_bar($x2['max2'],$_GET['result2_number']);

	show_target_result($myid, $_GET['result2_number']);
	
?>
