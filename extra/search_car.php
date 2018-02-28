<form id="search_form" action=" <?php echo $_SERVER['PHP_SELF']; ?> " method="GET">



	year:
	<select name="year_operator" >
		<option value="">&nbsp;</option>
		<option value="="> Equal </option>
		<option value="<"> Inferior </option>
		<option value=">"> Superior </option>
	</select>
	<input type="number" name="year"  /><br><br>
	
		CC:
		<select name="cc_operator" >
		<option value="">&nbsp;</option>
		<option value="="> Equal </option>
		<option value="<"> Inferior </option>
		<option value=">"> Superior </option>
	</select>
	<input type="number" name="cc" step="00.01" /><br><br>


	 

	Make:
	<select name="make" >
		<option value="">&nbsp;</option>
		<option value="Ford">Ford</option>
		<option value="Chrysler">Chrysler</option>
		<option value="Citroen">Citroen</option>
		<option value="Hillman">Hillman</option>
		<option value="Chevrolet">Chevrolet</option>
		<option value="Cadillac">Cadillac</option>
		<option value="Isuzu">Isuzu</option>
		<option value="Dodge">Dodge</option>
		<option value="Mazda">Mazda</option>
		<option value="Nissan">Nissan</option>
		<option value="Honda">Honda</option>
		<option value="Lexus">Lexus</option>
		<option value="Holden">Holden</option>
		<option value="Volkswagen">Volkswagen</option>
		<option value="Buick">Buick</option>
		<option value="Jeep">Jeep</option>
		<option value="Volvo">Volvo</option>
		<option value="GMC">GMC</option>
		<option value="Audi">Audi</option>
		<option value="Mazda">Mazda</option>
		<option value="Toyota">Toyota</option>
		<option value="Saab">Saab</option>
		<option value="BMW">BMW</option>
		<option value="HUMMER">HUMMER</option>
		<option value="Spyker Cars">Spyker Cars</option>
		<option value="Saturn">Saturn</option>
		<option value="Lotus">Lotus</option>
		<option value="Lincoln">Lincoln</option>
		<option value="Suzuki">Suzuki</option>
		<option value="Land Rover">Land Rover</option>
		<option value="Kia">Kia</option>
		<option value="Infiniti">Infiniti</option>
		<option value="Scion">Scion</option>
		<option value="Volkswagen">Volkswagen</option>
	</select><br><br><br>

	Model:
	<select name="model" >
		<option value="">&nbsp;</option>
		<option value="Model T">Model T</option>
		<option value="Imperial">Imperial</option>
		<option value="2CV">2CV</option>
		<option value="Magnificent">Magnificent</option>
		<option value="Fleetwood">Fleetwood</option>
		<option value="Corvette">Corvette</option>
		<option value="200SX">200SX</option>
		<option value="745">745</option>
		<option value="9-5">9-5</option>
		<option value="A6">A6</option>
		<option value="Amanti">Amanti</option>
		<option value="C70">C70</option>
		<option value="C8">C8</option>
		<option value="CC">CC</option>
		<option value="Civic">Civic</option>
		<option value="Commodore">Commodore</option>
		<option value="Corvette">Corvette</option>
		<option value="Dakota Club">Dakota Club</option>
		<option value="Exige">Exige</option>
		<option value="F430 Spider">F430 Spider</option>
		<option value="Fleetwood">Fleetwood</option>
		<option value="G">G</option>
		<option value="Imperial">Imperial</option>
		<option value="Ion">Ion</option>
		<option value="iQ">iQ</option>
		<option value="Jetta">Jetta</option>
		<option value="Jimmy">Jimmy</option>
		<option value="LeSabre">LeSabre</option>
		<option value="LR3">LR3</option>
		<option value="LX">LX</option>
		<option value="Minx Magnificent">Minx Magnificent</option>
		<option value="Model T">Model T</option>
		<option value="MX-6">MX-6</option>
		<option value="Neon">Neon</option>
		<option value="Protege">Protege</option>
		<option value="Ram 2500 Club">Ram 2500 Club</option>
		<option value="Reno">Reno</option>
		<option value="Thunderbird">Thunderbird</option>
		<option value="Town Car">Town Car</option>
		<option value="Wrangler">Wrangler</option>
		<option value="xD">xD</option>
		<option value="XJ">XJ</option>
	</select><br><br><br>


	Color:
	<select name="color" >
		<option value="">&nbsp;</option>
		<option value="red"> Red </option>
		<option value="red_and_black"> red and black </option>
		<option value="white"> White </option>
	</select><br>
	
		<input type="submit" name="search" value="search"/>
</form>	
	
	
<?php	
	if(isset($_GET['search'])){
		include("advanced_search_engine.php");
		if(function_exists ('function/input_to_search_table.php') == false)
		include('function/input_to_search_table.php');
		input_to_search_table($_GET,$_SESSION['id']);
	}
?>