<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesCnct = [
		'English' => [
			'SignIn'          => "Sign In",
			'Cancel'          => "Cancel",
			'UsernameOrEmail' => "Username or email",
			'Password'        => "Password",
			'RecoverAccess'   => "Forgotten password?",
			'CreateAccount'   => "Create account",
			'Close'           => "Close"
		], 
		'Spanish' => [
			'SignIn'          => "Iniciar sesión",
			'Cancel'          => "Cancelar",
			'UsernameOrEmail' => "Nombre de usuario o email",
			'Password'        => "Contraseña",
			'RecoverAccess'   => "Contraseña olvidada?",
			'CreateAccount'   => "Crear una cuenta",
			'Close'           => "Cerca"
		], 
		'French' => [
			'SignIn'          => "S'identifier",
			'Cancel'          => "Annuler",
			'UsernameOrEmail' => "Nom d'utilisateur ou email",
			'Password'        => "Mot de passe",
			'RecoverAccess'   => "Mot de passe oublié?",
			'CreateAccount'   => "Créer un compte",
			'Close'           => "Fermer"
		], 
		'Turkish' => [
			'SignIn'          => "Oturum aç",
			'Cancel'          => "Iptal",
			'UsernameOrEmail' => "Kullanıcı adı ya da email",
			'Password'        => "Şifre",
			'RecoverAccess'   => "Unutulan Şifre?",
			'CreateAccount'   => "Hesap oluşturmak",
			'Close'           => "Kapalı"
		], 
		'Portuguese' => [
			'SignIn'          => "Assinar em",
			'Cancel'          => "Cancelar",
			'UsernameOrEmail' => "Nome de usuário ou email",
			'Password'        => "Senha",
			'RecoverAccess'   => "Palavra-chave esquecida?",
			'CreateAccount'   => "Criar uma conta",
			'Close'           => "Fechar"
		], 
		'Romanian' => [
			'SignIn'          => "Autentificare",
			'Cancel'          => "Anulare",
			'UsernameOrEmail' => "Nume de utilizator sau email",
			'Password'        => "Parola",
			'RecoverAccess'   => "Ai uitat parola?",
			'CreateAccount'   => "Creează cont",
			'Close'           => "Închide"
		], 
		'Dutch' => [
			'SignIn'          => "Log in",
			'Cancel'          => "Annuleren",
			'UsernameOrEmail' => "Gebruikersnaam of email",
			'Password'        => "Wachtwoord",
			'RecoverAccess'   => "Vergeten wachtwoord?",
			'CreateAccount'   => "Account aanmaken",
			'Close'           => "Dichtbij"
		], 
		'Polish' => [
			'SignIn'          => "Zalogować się",
			'Cancel'          => "Anulować",
			'UsernameOrEmail' => "Nazwa użytkownika lub email",
			'Password'        => "Hasło",
			'RecoverAccess'   => "Zapomniane hasło?",
			'CreateAccount'   => "Utwórz konto",
			'Close'           => "Zamknąć"
		], 
		'Ukrainian' => [
			'SignIn'          => "Увійти",
			'Cancel'          => "Скасувати",
			'UsernameOrEmail' => "Ім'я користувача або e-mail",
			'Password'        => "Пароль",
			'RecoverAccess'   => "Забули пароль?",
			'CreateAccount'   => "Створити акаунт",
			'Close'           => "Закрити"
		]
	];
?>