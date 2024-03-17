<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesLTAS = [
	    'English' => [
	        'publish_an_article' => "Publish an article"
	    ], 
	    'Spanish' => [
	        'publish_an_article' => "Publicar un artículo"
	    ], 
	    'French' => [
	        'publish_an_article' => "Publier un article"
	    ], 
	    'Turkish' => [
	        'publish_an_article' => "Makale yayınla"
	    ], 
	    'Portuguese' => [
	        'publish_an_article' => "Publicar um artigo"
	    ], 
	    'Romanian' => [
	        'publish_an_article' => "Publică un articol"
	    ], 
	    'Dutch' => [
	        'publish_an_article' => "Een artikel publiceren"
	    ], 
	    'Polish' => [
	        'publish_an_article' => "Opublikuj artykuł"
	    ], 
	    'Ukrainian' => [
	        'publish_an_article' => "Опублікувати статтю"
	    ]
	];
?>