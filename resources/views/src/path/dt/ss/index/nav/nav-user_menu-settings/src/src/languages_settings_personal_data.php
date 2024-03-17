<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesSettingsPersonalData = [
		'English' => [
			'personal_data'   => "Personal data",
			'profile_picture' => "Profile picture",
			'edit'            => "Edit",
			'email'           => "E-mail",
			'username'        => "Username",
			'new_password'    => "New password",
			'apply'           => "Apply"
		], 
		'Spanish' => [
			'personal_data'   => "Información personal",
			'profile_picture' => "Foto de perfil",
			'edit'            => "Editar",
			'email'           => "Correo electrónico",
			'username'        => "Nombre de usuario",
			'new_password'    => "Nueva contraseña",
			'apply'           => "Aplicar"
		], 
		'French' => [
			'personal_data'   => "Données personnelles",
			'profile_picture' => "Image de profil",
			'edit'            => "Modifier",
			'email'           => "E-mail",
			'username'        => "Nom d'utilisateur",
			'new_password'    => "Nouveau mot de passe",
			'apply'           => "Appliquer"
		], 
		'Turkish' => [
			'personal_data'   => "Kişisel veri",
			'profile_picture' => "Profil fotoğrafı",
			'edit'            => "Düzenlemek",
			'email'           => "E-posta",
			'username'        => "Kullanıcı adı",
			'new_password'    => "Yeni Şifre",
			'apply'           => "Uygula"
		], 
		'Portuguese' => [
			'personal_data'   => "Dados pessoais",
			'profile_picture' => "Foto do perfil",
			'edit'            => "Editar",
			'email'           => "E-mail",
			'username'        => "Nome de usuário",
			'new_password'    => "Nova Senha",
			'apply'           => "Aplicar"
		], 
		'Romanian' => [
			'personal_data'   => "Date personale",
			'profile_picture' => "Poză de profil",
			'edit'            => "Editează",
			'email'           => "E-mail",
			'username'        => "Nume de utilizator",
			'new_password'    => "Parolă nouă",
			'apply'           => "Aplica"
		], 
		'Dutch' => [
			'personal_data'   => "Persoonlijke gegevens",
			'profile_picture' => "Profielfoto",
			'edit'            => "Bewerking",
			'email'           => "E-mail",
			'username'        => "Gebruikersnaam",
			'new_password'    => "Nieuw paswoord",
			'apply'           => "Toepassen"
		], 
		'Polish' => [
			'personal_data'   => "Dane osobiste",
			'profile_picture' => "Zdjęcie profilowe",
			'edit'            => "Edytować",
			'email'           => "E-mail",
			'username'        => "Nazwa użytkownika",
			'new_password'    => "Nowe hasło",
			'apply'           => "Stosować"
		], 
		'Ukrainian' => [
			'personal_data'   => "Особисті дані",
			'profile_picture' => "Зображення профілю",
			'edit'            => "Редагувати",
			'email'           => "Електронна пошта",
			'username'        => "Ім'я користувача",
			'new_password'    => "Новий пароль",
			'apply'           => "Застосувати"
		]
	];
?>