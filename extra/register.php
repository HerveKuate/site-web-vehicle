<?php
	if(isset($_POST['sign_up'])){
		$msgsValid = database_submit($_POST, NULL);
		
	}
?>

<form   action=" <?php echo $_SERVER['PHP_SELF']; ?> " method="post">
	<fieldset > <legend >Registration: <?php if(isset($msgsValid['main'])) echo $msgsValid['main'] ?></legend>
	<dl>
	
		<dt>Surname: <?php if(isset($msgsValid['surname'])) echo $msgsValid['surname']; ?> </dt>
		<dd><input type="text" name="surname" placeholder="saikyou"/><dd>
		
		<dt>Forename: <?php if(isset($msgsValid['forename'])) echo $msgsValid['forename']; ?> </dt>
		<dd><input type="text" name="forename" placeholder="Zero"/><dd>
		
		<dt>E-mail: <?php if(isset($msgsValid['email'])) echo $msgsValid['email']; ?></dt>
		<dd><input type="text" name="email" placeholder="saikyouzero@hotmal.fr"/><dd>
		
		<dt>Telephone number: <?php if(isset($msgsValid['telephone_number'])) echo $msgsValid['telephone_number']; ?> </dt>
		<dd><input type="text" name="telephone_number" placeholder="33548594"/><dd>
		
		<dt>Address: <?php if(isset($msgsValid['address'])) echo $msgsValid['address']; ?> </dt>
		<dd><input type="text" name="address"  placeholder="ST17 9TA"/><dd>
		
		<dt>Birthday: <?php if(isset($msgsValid['birthday'])) echo $msgsValid['birthday']; ?> </dt>
		<dd><input type="date" name="birthday"  value="1996-01-08" /><dd>

		<dt>Password: <?php if(isset($msgsValid['password'])) echo $msgsValid['password']; ?> </dt>
		<dd><input type="password" name="password" placeholder="password"/><dd>
		
		<dd><input type="submit" name="sign_up" value="register"/>
		<a href="index.php?anon=accueil" >return</a>
	</dl>
	</fieldset>
</form>