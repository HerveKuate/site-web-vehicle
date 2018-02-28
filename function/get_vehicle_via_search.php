<?php

	function get_vehicle_via_search($a, $myid){
	include("extra/config.php");
	
		$expected = ['year', 'make', 'model', 'cc', 'color', 'basic_search'];
		$and=" ";
		$sql = "SELECT * 
		FROM vehicle
		WHERE ";
		foreach($expected as $field) {
			if(!empty($a[$field])){
				$mycondition = mysqli_real_escape_string($conn,$a[$field]);
				$mycolumn = mysqli_real_escape_string($conn,$field);		
				
				switch($field){
					case 'year':
						$myoperator = mysqli_real_escape_string($conn,$a[$field."_operator"]);
						$sql = $sql.$and."$mycolumn $myoperator '$mycondition'";
						break;
						
					case 'cc':
						$myoperator = mysqli_real_escape_string($conn,$a[$field."_operator"]);
						$sql = $sql.$and."$mycolumn $myoperator '$mycondition'";
						break;
					
					case 'make':
						$sql = $sql.$and."$mycolumn = '$mycondition'";
						break;
						
					case 'color':
						$sql = $sql.$and."$mycolumn = '$mycondition'";
						break;
						
					case 'model':
						$sql = $sql.$and."$mycolumn = '$mycondition'";
						break;
						
					case 'basic_search':
						$expected2 = explode(" ",$a['basic_search']);
						$union="";
						$sql = "";
						foreach($expected2 as $field2) {
							$mysearch = mysqli_real_escape_string($conn,$field2);
							
							$sql= $sql.$union.
							"SELECT DISTINCT* FROM vehicle
							WHERE year like '%$mysearch%'
							OR make like '%$mysearch%'
							OR model like '%$mysearch%'
							OR cc like '%$mysearch%'
							OR color like '%$mysearch%'";
							$union = " union ";
						}

				}
				$and= " AND ";
			}
		}
		
		$result78 = mysqli_query($conn,$sql);
			if($result78 == FALSE)
				return "";
		$row2=0;
		while($getter= mysqli_fetch_array($result78,MYSQLI_ASSOC)) {
			$row2++;
			$result2[$row2] = $getter;
		}
    return $result2;
	}
	
	
	
	
?>