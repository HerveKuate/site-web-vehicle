<?php
session_start();
include("extra/config.php");
include("function/ranged_favorite_result.php");
include('function/login.php');
include("function/save_vehicle.php");
include("function/database_submit.php");
?>

<!DOCTYPE html> 
<html> 
<head>
	<title>Main Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="extra/style.css">
	<script type="text/javascript"> </script>
	<script type="text/javascript" src="1.js"></script>
</head>

<body>
<?php
if(!empty($_POST)){
	foreach($_POST AS $key => $value){
		switch($key){
			case 'login':
				$login = login($_POST);
				if($login){
					foreach($login AS $key => $value)
						$_SESSION[$key]=$value;
				}
				if(isset($_SESSION['id']))$_GET['decision'] = 'home';
			break;
		}
	}
}
if(!empty($_GET)){
	foreach($_GET AS $key => $value){
		switch($key){
			case 'decision':
			$_SESSION['decision'] = $_GET['decision'];
			switch($_SESSION['decision']){
				case "logout":
					session_unset();
					unset($_GET);
				break;
			}
			break;
			case 'anon';
				session_unset();
				unset($_GET);
			break;
			case 'add_to_favorite':
			save_vehicle($_SESSION['id'], $_GET['add_to_favorite']);
			break;
		}
	}
}
if(!empty($_SESSION)){
	foreach($_SESSION AS $key => $value){
		switch($key){
			case 'login_input':
				echo'<header>';
				include("extra/user_bar_navigator.php");
				echo'<h2> Welcome '.$_SESSION['login_input'].'</h2>';
				echo'</header>';
			break;
			case 'decision':
				include('extra/'.$_SESSION['decision'].'.php');
			break;
		}
	}
}
if(empty($_SESSION['id'])  && empty($_GET) && empty($_POST['sign_up'])){ 
	include("extra/login_form.php");
}

?>
<footer>
	<p>
	<a href="http://jigsaw.w3.org/css-validator/check/referer">
		<img style="border:0;width:88px;height:31px"
			src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
			alt="Valid CSS!" />
		</a>
	</p>
	Copyright Staffordshire, all right reserved.
</footer>
	
</body>
</html>