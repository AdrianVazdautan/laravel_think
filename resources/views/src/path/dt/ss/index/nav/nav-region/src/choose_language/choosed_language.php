<?php
	#Receiving choosed language
		$choosed_language = $_POST['choosed_language'];
	#Setting new coockie with chossed language for 28 days
		setcookie('choosed_language', $choosed_language, time() + 2419200, '/');
	#Reload page of site for udpdate with choosed language
		echo 1;
?>