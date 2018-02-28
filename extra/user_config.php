<?php
	if(isset($_POST['user_data_update'])){
		$msgsValid = database_submit($_POST,$_SESSION['id']);
	}
	include("function/user_data_via_id.php");
	$user_data = user_data_via_id($_SESSION['id']);
		
	

?>


<form   action=" <?php echo $_SERVER['PHP_SELF']; ?> " method="post">
	<fieldset >
		<legend >update data: 
		<?php	
			if(!empty($msgsValid)){
				if($msgsValid['main'] == 'Registration succeful'){
					echo '<h3>Update succesful. Redirecting...</h3>';
					header( "refresh:2;url=".$_SERVER['PHP_SELF']."?decision=home" );
				}
			}
		?>
		</legend>
	<dl>
	
		<dt>Surname: <?php if(isset($msgsValid['surname'])) echo $msgsValid['surname']; ?> </dt>
		<dd><input type="text" name="surname" value="<?php echo $user_data['surname'];?>" /><dd>
		
		<dt>Forename: <?php if(isset($msgsValid['forename'])) echo $msgsValid['forename']; ?> </dt>
		<dd><input type="text" name="forename" value="<?php echo $user_data['forename'];?>" /><dd>
		
		<dt>E-mail: <?php if(isset($msgsValid['email'])) echo $msgsValid['email']; ?> </dt>
		<dd><input type="text" name="email" value="<?php echo $user_data['email']; ?>" /><dd>
		
		<dt>Telephone number: <?php if(isset($msgsValid['telephone_number'])) echo $msgsValid['telephone_number']; ?> </dt>
		<dd><input type="text" name="telephone_number" value="<?php echo $user_data['telephone_number'];?>" /><dd>
		
		<dt>Address: <?php if(isset($msgsValid['address'])) echo $msgsValid['address']; ?> </dt>
		<dd><input type="text" name="address"  value="<?php echo $user_data['address'];?>" /><dd>
		
		<dt>Old password: <?php if(isset($msgsValid['old_password'])) echo $msgsValid['old_password'];?> </dt>
		<dd><input type="password" name="old_password" placeholder="old password"/><dd>
		
		<dt>New password: <?php if(isset($msgsValid['new_password'])) echo $msgsValid['new_password']; ?> </dt>
		<dd><input type="password" name="new_password" placeholder="new password"/><dd>
		<dd><input type="password" name="new1_password" placeholder="retype new password"/><dd>
		
		<dd><input type="submit" name="user_data_update" value="update"/>
	</dl>
	</fieldset>
</form>