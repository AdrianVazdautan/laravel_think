<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesLET = [
	    'English' => [
	        'editor_text' => "Editor text"
	    ], 
	    'Spanish' => [
	        'editor_text' => "Texto del editor"
	    ], 
	    'French' => [
	        'editor_text' => "Texte de l'éditeur"
	    ], 
	    'Turkish' => [
	        'editor_text' => "Editör metni"
	    ], 
	    'Portuguese' => [
	        'editor_text' => "Texto do editor"
	    ], 
	    'Romanian' => [
	        'editor_text' => "Editor text"
	    ], 
	    'Dutch' => [
	        'editor_text' => "Tekst van de editor"
	    ], 
	    'Polish' => [
	        'editor_text' => "Tekst edytora"
	    ], 
	    'Ukrainian' => [
	        'editor_text' => "Текст редактора"
	    ]
	];
?>