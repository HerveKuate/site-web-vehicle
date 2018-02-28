<?php
function basic_search($a){
	include("extra/config.php");
	$expected = split(" ",$a);
	$union="";
	$sql = "";
	
	foreach($expected as $field) {
		$mysearch = mysqli_real_escape_string($conn,$field);
		
		$sql= $sql.$union.
		"SELECT DISTINCT* FROM vehicle
		WHERE year like '%$mysearch%'
		OR make like '%$mysearch%'
		OR model like '%$mysearch%'
		OR cc like '%$mysearch%'
		OR color like '%$mysearch%'";
		$union = " union ";
	}
	return $sql;
}