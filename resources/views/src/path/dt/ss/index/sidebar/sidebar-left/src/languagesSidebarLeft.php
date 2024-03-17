<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesSidebarLeft = [
		'English' => [
			'Home'          => "Home",
			'Subscriptions' => "Subscriptions",
			'Likes'         => "Likes",
			'Historic'      => "Historic"
		], 
		'Spanish' => [
			'Home'          => "Hogar",
			'Subscriptions' => "Suscripciones",
			'Likes'         => "Me gusta",
			'Historic'      => "Histórico"
		], 
		'French' => [
		    'Home'          => "Accueil",
		    'Subscriptions' => "Abonnements",
		    'Likes'         => "J'aime",
		    'Historic'      => "Historique"
		], 
		'Turkish' => [
		    'Home'          => "Ana Sayfa",
		    'Subscriptions' => "Abonelikler",
		    'Likes'         => "Beğeniler",
		    'Historic'      => "Geçmiş"
		], 
		'Portuguese' => [
		    'Home'          => "Início",
		    'Subscriptions' => "Inscrições",
		    'Likes'         => "Curtidas",
		    'Historic'      => "Histórico"
		], 
		'Romanian' => [
		    'Home'          => "Acasă",
		    'Subscriptions' => "Abonamente",
		    'Likes'         => "Aprecieri",
		    'Historic'      => "Istoric"
		], 
		'Dutch' => [
		    'Home'          => "Startpagina",
		    'Subscriptions' => "Abonnementen",
		    'Likes'         => "Vind-ik-leuks",
		    'Historic'      => "Historisch"
		], 
		'Polish' => [
		    'Home'          => "Strona główna",
		    'Subscriptions' => "Subskrypcje",
		    'Likes'         => "Polubienia",
		    'Historic'      => "Historia"
		], 
		'Ukrainian' => [
		    'Home'          => "Головна",
		    'Subscriptions' => "Підписки",
		    'Likes'         => "Подобається",
		    'Historic'      => "Історія"
		]
	];
?>