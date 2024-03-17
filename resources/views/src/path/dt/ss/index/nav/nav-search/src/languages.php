<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languages = [
		'English'    => ['Search' => "Search"], 
		'Spanish'    => ['Search' => "Buscar"], 
		'French'     => ['Search' => "Recherche"], 
		'Turkish'    => ['Search' => "Aramak"], 
		'Portuguese' => ['Search' => "Procurar"], 
		'Romanian'   => ['Search' => "Caută"], 
		'Dutch'      => ['Search' => "Zoekopdracht"], 
		'Polish'     => ['Search' => "Szukaj"], 
		'Ukrainian'  => ['Search' => "Пошук"]
	];
?>