<?php
	function input_to_search_table($search, $myid){
		include("extra/config.php");
		
		$expected = ['year', 'year_operator','make', 'model', 'cc', 'cc_operator', 'color', 'basic_search'];
		$myid = mysqli_real_escape_string($conn,$myid);
		
		foreach($expected as $field) {
			if(!empty($search[$field])){
				$mycolumn_value = mysqli_real_escape_string($conn,$search[$field]);
				$mycolumn = mysqli_real_escape_string($conn,$field);
				
				if(!isset($last_id)){
					mysqli_query($conn, "INSERT INTO search (id, user_id) VALUES (NULL, '$myid')");
					$last_id = mysqli_real_escape_string($conn, mysqli_insert_id($conn));
				}
				
				$conn->query("UPDATE search SET $mycolumn = '$mycolumn_value' WHERE id = '$last_id'");
				
			}
			else if(!empty($_GET[$field])){
				$mycolumn_value = mysqli_real_escape_string($conn,$_GET[$field]);
				
				if($conn->query("INSERT INTO search (id, user_id, basic_search)
				VALUES (NULL, '$myid', '$mycolumn_value'") == FALSE)
					die("Connection failed: " . $conn->connect_error);
			}
		}
		return TRUE;
	}
?>