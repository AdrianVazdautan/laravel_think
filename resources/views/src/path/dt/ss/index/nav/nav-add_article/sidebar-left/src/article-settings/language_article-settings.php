<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesLASNS = [
	    'English' => [
	        'notifications' => "Notifications"
	    ], 
	    'Spanish' => [
	        'notifications' => "Notificaciones"
	    ], 
	    'French' => [
	        'notifications' => "Notifications"
	    ], 
	    'Turkish' => [
	        'notifications' => "Bildirimler"
	    ], 
	    'Portuguese' => [
	        'notifications' => "Notificações"
	    ], 
	    'Romanian' => [
	        'notifications' => "Notificări"
	    ], 
	    'Dutch' => [
	        'notifications' => "Meldingen"
	    ], 
	    'Polish' => [
	        'notifications' => "Powiadomienia"
	    ], 
	    'Ukrainian' => [
	        'notifications' => "Сповіщення"
	    ]
	];
?>