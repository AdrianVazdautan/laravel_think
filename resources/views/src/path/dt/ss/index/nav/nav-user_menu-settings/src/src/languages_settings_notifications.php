<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesSettingsNotifications = [
	    'English' => [
	        'notifications' => "Notifications",
	        'comments'      => "Comments",
	        'likes'         => "Likes",
	        'subscriptions' => "Subscriptions"
	    ], 
	    'Spanish' => [
	        'notifications' => "Notificaciones",
	        'comments'      => "Comentarios",
	        'likes'         => "Me gusta",
	        'subscriptions' => "Suscripciones"
	    ], 
	    'French' => [
	        'notifications' => "Notifications",
	        'comments'      => "Commentaires",
	        'likes'         => "J'aime",
	        'subscriptions' => "Abonnements"
	    ], 
	    'Turkish' => [
	        'notifications' => "Bildirimler",
	        'comments'      => "Yorumlar",
	        'likes'         => "Beğeniler",
	        'subscriptions' => "Abonelikler"
	    ], 
	    'Portuguese' => [
	        'notifications' => "Notificações",
	        'comments'      => "Comentários",
	        'likes'         => "Curtidas",
	        'subscriptions' => "Inscrições"
	    ], 
	    'Romanian' => [
	        'notifications' => "Notificări",
	        'comments'      => "Comentarii",
	        'likes'         => "Aprecieri",
	        'subscriptions' => "Abonamente"
	    ], 
	    'Dutch' => [
	        'notifications' => "Meldingen",
	        'comments'      => "Reacties",
	        'likes'         => "Vind-ik-leuks",
	        'subscriptions' => "Abonnementen"
	    ], 
	    'Polish' => [
	        'notifications' => "Powiadomienia",
	        'comments'      => "Komentarze",
	        'likes'         => "Lubię to",
	        'subscriptions' => "Subskrypcje"
	    ], 
	    'Ukrainian' => [
	        'notifications' => "Сповіщення",
	        'comments'      => "Коментарі",
	        'likes'         => "Лайки",
	        'subscriptions' => "Підписки"
	    ]
	];
?>