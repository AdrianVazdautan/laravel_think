<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesACP = [
	    'English' => [
	        'category'        => "Category",
	        'select_category' => "Select category"
	    ], 
	    'Spanish' => [
	        'category'        => "Categoría",
	        'select_category' => "Seleccionar categoría"
	    ], 
	    'French' => [
	        'category'        => "Catégorie",
	        'select_category' => "Sélectionnez une catégorie"
	    ], 
	    'Turkish' => [
	        'category'        => "Kategori",
	        'select_category' => "Kategori seçin"
	    ], 
	    'Portuguese' => [
	        'category'        => "Categoria",
	        'select_category' => "Selecionar categoria"
	    ], 
	    'Romanian' => [
	        'category'        => "Categorie",
	        'select_category' => "Selectați categoria"
	    ], 
	    'Dutch' => [
	        'category'        => "Categorie",
	        'select_category' => "Selecteer categorie"
	    ], 
	    'Polish' => [
	        'category'        => "Kategoria",
	        'select_category' => "Wybierz kategorię"
	    ], 
	    'Ukrainian' => [
	        'category'        => "Категорія",
	        'select_category' => "Виберіть категорію"
	    ]
	];
?>