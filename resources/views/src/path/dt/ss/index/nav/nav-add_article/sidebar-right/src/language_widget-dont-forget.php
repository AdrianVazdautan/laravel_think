<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesLWDF = [
	    'English' => [
	        'title_widget' => "Please ensure",
	        'WDF_p1'       => "That your article adheres to the site rules while also focusing on formatting for improved readability.",
	        'WDF_p2'       => "Kindly review our guidelines for editing posts."
	    ], 
	    'Spanish' => [
	        'title_widget' => "Por favor asegúrese",
	        'WDF_p1'       => "Que su artículo cumpla con las reglas del sitio y también se centre en el formato para mejorar la legibilidad.",
	        'WDF_p2'       => "Por favor, revise nuestras pautas para editar publicaciones."
	    ], 
	    'French' => [
	        'title_widget' => "Veuillez vous assurer",
	        'WDF_p1'       => "Que votre article respecte les règles du site tout en se concentrant sur le formatage pour une meilleure lisibilité.",
	        'WDF_p2'       => "Veuillez consulter nos directives pour la modification des publications."
	    ], 
	    'Turkish' => [
	        'title_widget' => "Lütfen emin olun",
	        'WDF_p1'       => "Makalenizin site kurallarına uyduğundan ve aynı zamanda okunabilirliği artırmak için biçimlendirmeye odaklandığından emin olun.",
	        'WDF_p2'       => "Lütfen yayınları düzenleme kurallarımızı gözden geçirin."
	    ], 
	    'Portuguese' => [
	        'title_widget' => "Por favor, assegure-se",
	        'WDF_p1'       => "Que o seu artigo cumpra as regras do site, focando também na formatação para uma melhor legibilidade.",
	        'WDF_p2'       => "Por favor, reveja nossas diretrizes para edição de postagens."
	    ], 
	    'Romanian' => [
	        'title_widget' => "Vă rugăm să vă asigurați",
	        'WDF_p1'       => "Că articolul dvs. respectă regulile site-ului și se concentrează și pe formatare pentru o mai bună lizibilitate.",
	        'WDF_p2'       => "Vă rugăm să consultați ghidurile noastre pentru editarea postărilor."
	    ], 
	    'Dutch' => [
	        'title_widget' => "Zorg ervoor",
	        'WDF_p1'       => "Dat uw artikel voldoet aan de site regels en ook gericht is op het formatteren voor een betere leesbaarheid.",
	        'WDF_p2'       => "Gelieve onze richtlijnen voor het bewerken van berichten te bekijken."
	    ], 
	    'Polish' => [
	        'title_widget' => "Upewnij się",
	        'WDF_p1'       => "Że twój artykuł spełnia zasady serwisu, skupiając się także na formacie dla lepszej czytelności.",
	        'WDF_p2'       => "Prosimy zapoznać się z naszymi wytycznymi dotyczącymi edycji postów."
	    ], 
	    'Ukrainian' => [
	        'title_widget' => "Будь ласка, переконайтеся",
	        'WDF_p1'       => "Що ваша стаття дотримується правил сайту, а також спрямована на форматування для поліпшення зрозумілості.",
	        'WDF_p2'       => "Будь ласка, перегляньте наші вказівки з редагування повідомлень."
	    ]
	];
?>