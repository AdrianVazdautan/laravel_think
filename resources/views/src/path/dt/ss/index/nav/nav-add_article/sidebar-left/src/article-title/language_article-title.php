<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesLAT = [
	    'English' => [
	        'article_title' => "Article title"
	    ], 
	    'Spanish' => [
	        'article_title' => "Título del artículo"
	    ], 
	    'French' => [
	        'article_title' => "Titre de l'article"
	    ], 
	    'Turkish' => [
	        'article_title' => "Makale başlığı"
	    ], 
	    'Portuguese' => [
	        'article_title' => "Título do artigo"
	    ], 
	    'Romanian' => [
	        'article_title' => "Titlul articolului"
	    ], 
	    'Dutch' => [
	        'article_title' => "Artikeltitel"
	    ], 
	    'Polish' => [
	        'article_title' => "Tytuł artykułu"
	    ], 
	    'Ukrainian' => [
	        'article_title' => "Заголовок статті"
	    ]
	];
?>