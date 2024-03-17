<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languages = [
		'English' => [
			'close'    => "Close",
			'share'    => "Share",
			'copyLink' => "Copy link"
		], 
		'Spanish' => [
		    'close'    => "Cerrar",
		    'share'    => "Compartir",
		    'copyLink' => "Copiar enlace"
		], 
		'French' => [
		    'close'    => "Fermer",
		    'share'    => "Partager",
		    'copyLink' => "Copier le lien"
		], 
		'Turkish' => [
		    'close'    => "Kapat",
		    'share'    => "Paylaş",
		    'copyLink' => "Bağlantıyı Kopyala"
		], 
		'Portuguese' => [
		    'close'    => "Fechar",
		    'share'    => "Compartilhar",
		    'copyLink' => "Copiar Link"
		], 
		'Romanian' => [
		    'close'    => "Închide",
		    'share'    => "Partajează",
		    'copyLink' => "Copiază Linkul"
		], 
		'Dutch' => [
		    'close'    => "Sluiten",
		    'share'    => "Delen",
		    'copyLink' => "Kopieer link"
		], 
		'Polish' => [
		    'close'    => "Zamknij",
		    'share'    => "Udostępnij",
		    'copyLink' => "Skopiuj link"
		], 
		'Ukrainian' => [
		    'close'    => "Закрити",
		    'share'    => "Поділитися",
		    'copyLink' => "Скопіювати посилання"
		]
	];
?>