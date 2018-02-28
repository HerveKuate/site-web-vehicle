<form  method="post" action=" <?php echo $_SERVER['PHP_SELF']; ?> ">
	<fieldset>
		<header>
			<h2 id="titre-form">login</h2>
		</header>
		Pseudo<input type="text" name="login_input" placeholder="name,e-mail or phone number" size="25" />
		Password<input type="password" name="password" placeholder="password" size="25" /><br>
		<?php if(isset($_POST['login'])) echo "wrong username or password"?>
		<input type="submit"  name="login" value="login" />
	</fieldset>
	<a href="index.php?decision=register" >Not a menber yet? Register </a>
</form>