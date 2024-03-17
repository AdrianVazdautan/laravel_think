<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else {
		$selectedLanguage = 'English';
	}

	$languages_user_profile_buttons = [
		'English' => [
			'articles' => "Articles"
		], 
		'Spanish' => [
			'articles' => "Artículos"
		], 
		'French' => [
			'articles' => "Des articles"
		], 
		'Turkish' => [
			'articles' => "Nesne"
		], 
		'Portuguese' => [
			'articles' => "Artigos"
		], 
		'Romanian' => [
		    'articles' => "Articole"
		],
		'Dutch' => [
		    'articles' => "Lidwoord"
		],
		'Polish' => [
		    'articles' => "Artykuły"
		],
		'Ukrainian' => [
		    'articles' => "Cтатті"
		]
	];
?>