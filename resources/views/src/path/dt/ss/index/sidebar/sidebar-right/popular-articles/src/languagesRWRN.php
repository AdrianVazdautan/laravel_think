<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesRWRN = [
		'English' => [
			'Recommended' => "Recommended",
			'Author'      => "Author"
		], 
		'Spanish' => [
			'Recommended' => "Recomendado",
			'Author'      => "Autor"
		], 
		'French' => [
			'Recommended' => "Recommandé",
			'Author'      => "Auteur"
		], 
		'Turkish' => [
			'Recommended' => "Tavsiye edilen",
			'Author'      => "Yazar"
		], 
		'Portuguese' => [
			'Recommended' => "Recomendado",
			'Author'      => "Autor"
		], 
		'Romanian' => [
			'Recommended' => "Recomandat",
			'Author'      => "Autor"
		], 
		'Dutch' => [
			'Recommended' => "Aanbevolen",
			'Author'      => "Auteur"
		], 
		'Polish' => [
			'Recommended' => "Zalecana",
			'Author'      => "Autor"
		], 
		'Ukrainian' => [
			'Recommended' => "Рекомендовано",
			'Author'      => "Автор"
		]
	];
?>