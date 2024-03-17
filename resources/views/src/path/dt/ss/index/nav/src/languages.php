<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesNav = [
	    'English'      => ['addArticle' => "Add article"], 
	    'Spanish'      => ['addArticle' => "Agregar artículo"], 
	    'French'       => ['addArticle' => "Ajouter un article"], 
	    'Turkish'      => ['addArticle' => "Makale ekle"], 
	    'Portuguese'   => ['addArticle' => "Adicionar artigo"], 
	    'Romanian'     => ['addArticle' => "Adaugă articol"], 
	    'Dutch'        => ['addArticle' => "Artikel toevoegen"], 
	    'Polish'       => ['addArticle' => "Dodaj artykuł"], 
	    'Ukrainian'    => ['addArticle' => "Додати статтю"]
	];
?>