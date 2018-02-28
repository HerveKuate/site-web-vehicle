<?php
$sql = "UPDATE user
		SET surname = '".$_POST["surname"]."', forename ='" . $_POST["forename"]."', email ='" . $_POST["email"]."', telephone_number ='" . $_POST["telephone_number"]."', address ='" . $_POST["address"]."', password ='".$_POST["new_password"]."'
		WHERE id = '".$_SESSION['id']."'" ;
			
			if ($conn->query($sql) == FALSE) 
				echo "Error: " . $sql . "<br>" . $conn->error;
?>