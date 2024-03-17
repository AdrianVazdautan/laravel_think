<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesUserMenu = [
	    'English' => [
	        'myProfile'  => "My profile",
	        'darkTheme'  => "Dark theme",
	        'lightTheme' => "Light theme",
	        'settings'   => "Settings",
	        'help'       => "Help",
	        'signOut'    => "Sign out"
	    ], 
	    'Spanish' => [
	        'myProfile'  => "Mi perfil",
	        'darkTheme'  => "Tema oscuro",
	        'lightTheme' => "Tema ligero",
	        'settings'   => "Configuración",
	        'help'       => "Ayuda",
	        'signOut'    => "Cerrar sesión"
	    ], 
	    'French' => [
	        'myProfile'  => "Mon profil",
	        'darkTheme'  => "Thème sombre",
	        'lightTheme' => "Thème lumière",
	        'settings'   => "Paramètres",
	        'help'       => "Aide",
	        'signOut'    => "Déconnexion"
	    ], 
	    'Turkish' => [
	        'myProfile'  => "Profilim",
	        'darkTheme'  => "Karanlık tema",
	        'lightTheme' => "Işık teması",
	        'settings'   => "Ayarlar",
	        'help'       => "Yardım",
	        'signOut'    => "Çıkış yap"
	    ], 
	    'Portuguese' => [
	        'myProfile'  => "Meu perfil",
	        'darkTheme'  => "Tema escuro",
	        'lightTheme' => "Tema claro",
	        'settings'   => "Configurações",
	        'help'       => "Ajuda",
	        'signOut'    => "Sair"
	    ], 
	    'Romanian' => [
	        'myProfile'  => "Profilul meu",
	        'darkTheme'  => "Tema întunecat",
	        'lightTheme' => "Tema luminoasa",
	        'settings'   => "Setări",
	        'help'       => "Ajutor",
	        'signOut'    => "Deconectare"
	    ], 
	    'Dutch' => [
	        'myProfile'  => "Mijn profiel",
	        'darkTheme'  => "Donker thema",
	        'lightTheme' => "Licht thema",
	        'settings'   => "Instellingen",
	        'help'       => "Hulp",
	        'signOut'    => "Uitloggen"
	    ], 
	    'Polish' => [
	        'myProfile'  => "Mój profil",
	        'darkTheme'  => "Ciemny motyw",
	        'lightTheme' => "Lekki motyw",
	        'settings'   => "Ustawienia",
	        'help'       => "Pomoc",
	        'signOut'    => "Wyloguj"
	    ], 
	    'Ukrainian' => [
	        'myProfile'  => "Мій профіль",
	        'darkTheme'  => "Темна тема",
	        'lightTheme' => "Світла тема",
	        'settings'   => "Налаштування",
	        'help'       => "Допомога",
	        'signOut'    => "Вийти"
	    ]
	];
?>