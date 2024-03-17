<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesSettingsAppearance = [
	    'English' => [
	        'appearance' => "Appearance",
	        'light'      => "Light",
	        'dark'       => "Dark",
	        'auto'       => "Auto"
	    ], 
	    'Spanish' => [
	        'appearance' => "Apariencia",
	        'light'      => "Claro",
	        'dark'       => "Oscuro",
	        'auto'       => "Automático"
	    ], 
	    'French' => [
	        'appearance' => "Apparence",
	        'light'      => "Clair",
	        'dark'       => "Sombre",
	        'auto'       => "Automatique"
	    ], 
	    'Turkish' => [
	        'appearance' => "Görünüm",
	        'light'      => "Açık",
	        'dark'       => "Karanlık",
	        'auto'       => "Oto"
	    ], 
	    'Portuguese' => [
	        'appearance' => "Aparência",
	        'light'      => "Claro",
	        'dark'       => "Escuro",
	        'auto'       => "Automático"
	    ], 
	    'Romanian' => [
	        'appearance' => "Aspect",
	        'light'      => "Lumină",
	        'dark'       => "Întunecat",
	        'auto'       => "Automat"
	    ], 
	    'Dutch' => [
	        'appearance' => "Uiterlijk",
	        'light'      => "Licht",
	        'dark'       => "Donker",
	        'auto'       => "Automatisch"
	    ], 
	    'Polish' => [
	        'appearance' => "Wygląd",
	        'light'      => "Jasny",
	        'dark'       => "Ciemny",
	        'auto'       => "Automatyczny"
	    ], 
	    'Ukrainian' => [
	        'appearance' => "Вигляд",
	        'light'      => "Світлий",
	        'dark'       => "Темний",
	        'auto'       => "Авто"
	    ]
	];
?>