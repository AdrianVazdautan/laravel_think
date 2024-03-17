<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesLPAP = [
	    'English' => [
	        'publish_now' => "Publish now"
	    ], 
	    'Spanish' => [
	        'publish_now' => "Publicar ahora"
	    ], 
	    'French' => [
	        'publish_now' => "Publier maintenant"
	    ], 
	    'Turkish' => [
	        'publish_now' => "Şimdi yayımla"
	    ], 
	    'Portuguese' => [
	        'publish_now' => "Publicar agora"
	    ], 
	    'Romanian' => [
	        'publish_now' => "Publică acum"
	    ], 
	    'Dutch' => [
	        'publish_now' => "Nu publiceren"
	    ], 
	    'Polish' => [
	        'publish_now' => "Opublikuj teraz"
	    ], 
	    'Ukrainian' => [
	        'publish_now' => "Опублікувати зараз"
	    ]
	];
?>