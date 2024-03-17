<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesSettingsLanguage = [
		'English' => [
			'language'   => "Language",
			'english_US' => "English",
			'spanish'    => "Spanish",
			'french'     => "French",
			'turkish'    => "Turkish",
			'portuguese' => "Portuguese",
			'romanian'   => "Romanian",
			'dutch'      => "Dutch",
			'polish'     => "Polish",
			'ukrainian'  => "Ukrainian"
		], 
		'Spanish' => [
			'language'   => "Idioma",
			'english_US' => "Inglés (Estados Unidos)",
			'spanish'    => "Español",
			'french'     => "Francés",
			'turkish'    => "Turco",
			'portuguese' => "Portugués",
			'romanian'   => "Rumano",
			'dutch'      => "Holandés",
			'polish'     => "Polaco",
			'ukrainian'  => "Ucranio"
		], 
		'French' => [
			'language'   => "Langue",
			'english_US' => "Anglais (États-Unis)",
			'spanish'    => "Espagnol",
			'french'     => "Français",
			'turkish'    => "Turc",
			'portuguese' => "Portugais",
			'romanian'   => "Roumain",
			'dutch'      => "Néerlandais",
			'polish'     => "Polonais",
			'ukrainian'  => "Ukrainien"
		], 
		'Turkish' => [
			'language'   => "Dil",
			'english_US' => "İngilizce (ABD)",
			'spanish'    => "İspanyol",
			'french'     => "Fransızca",
			'turkish'    => "Türkçe",
			'portuguese' => "Portekizce",
			'romanian'   => "Romen",
			'dutch'      => "Flemenkçe",
			'polish'     => "Lehçe",
			'ukrainian'  => "Ukrayna"
		], 
		'Portuguese' => [
			'language'   => "Linguagem",
			'english_US' => "Inglês (EUA)",
			'spanish'    => "Espanhol",
			'french'     => "Francês",
			'turkish'    => "Turco",
			'portuguese' => "Português",
			'romanian'   => "Romena",
			'dutch'      => "Holandês",
			'polish'     => "Polonês",
			'ukrainian'  => "Ucraniano"
		], 
		'Romanian' => [
			'language'   => "Limba",
			'english_US' => "Engleză (SUA)",
			'spanish'    => "Spaniolă",
			'french'     => "Franceză",
			'turkish'    => "Turc",
			'portuguese' => "Portugheză",
			'romanian'   => "Română",
			'dutch'      => "Olandeză",
			'polish'     => "Lustrui",
			'ukrainian'  => "Ucrainean"
		], 
		'Dutch' => [
			'language'   => "Taal",
			'english_US' => "Engeland",
			'spanish'    => "Spaans",
			'french'     => "Frans",
			'turkish'    => "Turks",
			'portuguese' => "Portugees",
			'romanian'   => "Roemeense",
			'dutch'      => "Nederlands",
			'polish'     => "Pools",
			'ukrainian'  => "Oekraïens"
		], 
		'Polish' => [
			'language'   => "Język",
			'english_US' => "Angielski (Amerykański)",
			'spanish'    => "Hiszpański",
			'french'     => "Francuski",
			'turkish'    => "Turecki",
			'portuguese' => "Portugalski",
			'romanian'   => "Rumuński",
			'dutch'      => "Holenderski",
			'polish'     => "Polski",
			'ukrainian'  => "Ukraiński"
		], 
		'Ukrainian' => [
			'language'   => "Мова",
			'english_US' => "Aнглійська (США)",
			'spanish'    => "Іспанська",
			'french'     => "Французька",
			'turkish'    => "Турецька",
			'portuguese' => "Португальська",
			'romanian'   => "Румунська",
			'dutch'      => "Голландська",
			'polish'     => "Польський",
			'ukrainian'  => "Українська"
		]
	];
?>