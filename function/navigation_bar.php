<?php
function navigation_bar($x2, $current){
		//current favorite
		$x=1;
		echo '<div id="d0"><nav>Favorite Result Number: ';
		$down=$current-1;
		echo '<a href="index.php?result2_number='.$down.'" >(prec)</a>';
		while($x<=$x2){
			echo '
			<a href="index.php?result2_number='.$x.'" >'.$x.'</a>';
			$x++;
		}
		$up=$current+1;
		echo '<a href="index.php?result2_number='.$up.'" >(next)</a>
			</nav></div>';
	}
	
?>