<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else {
		$selectedLanguage = 'English';
	}

	$languages_1_article_AJAX = [
		'English' => [
			'no_articles_available' => "No articles available"
		], 
		'Spanish' => [
			'no_articles_available' => "No hay artículos disponibles"
		], 
		'French' => [
			'no_articles_available' => "Aucun article disponible"
		], 
		'Turkish' => [
			'no_articles_available' => "Makale mevcut değil"
		], 
		'Portuguese' => [
			'no_articles_available' => "Nenhum artigo disponível"
		], 
		'Romanian' => [
		    'no_articles_available' => "Nu există articole disponibile"
		],
		'Dutch' => [
		    'no_articles_available' => "Geen artikelen beschikbaar"
		],
		'Polish' => [
		    'no_articles_available' => "Brak dostępnych artykułów"
		],
		'Ukrainian' => [
		    'no_articles_available' => "Немає доступних статей"
		]
	];
?>