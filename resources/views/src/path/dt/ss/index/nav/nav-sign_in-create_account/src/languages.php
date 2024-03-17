<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languages = [
		'English' => [
			'close'             => "Close",
			'createYourAccount' => "Create your account",
			'email'             => "E-mail",
			'username'          => "Username",
			'password'          => "Password",
			'rules'             => "By creating account, I agree to <a href='terms.php' target='_blank' class='f14' style='color: royalblue;'>Terms of service</a> and <a href='privacy.php' target='_blank' class='f14' style='color: royalblue;'>Privacy policy</a>, including <a href='cookiepolicy.php' target='_blank' class='f14' style='color: royalblue;'>Cookie use.</a>",
			'register'          => "Register",
			'cancel'            => "Cancel"
		], 
		'Spanish' => [
			'close'             => "Cerca",
			'createYourAccount' => "Crea tu cuenta",
			'email'             => "Correo electrónico",
			'username'          => "Nombre de usuario",
			'password'          => "Contraseña",
			'rules'             => "Al crear una cuenta, acepto <a href='terms.php' target='_blank' class='f14' style='color: royalblue;'>Términos de servicio</a> y <a href='privacy.php' target='_blank' class='f14' style='color: royalblue;'>Política de privacidad</a>, incluida <a href='cookiepolicy.php' target='_blank' class='f14' style='color: royalblue;'>Uso de cookies.</a>",
			'register'          => "Registro",
			'cancel'            => "Cancelar"
		], 
		'French' => [
			'close'             => "Fermer",
			'createYourAccount' => "Créez votre compte",
			'email'             => "E-mail",
			'username'          => "Nom d'utilisateur",
			'password'          => "Mot de passe",
			'rules'             => "En créant un compte, j'accepte <a href='terms.php' target='_blank' class='f14' style='color: royalblue;'>Conditions d'utilisation</a> et <a href='privacy.php' target='_blank' class='f14' style='color: royalblue;'>Politique de confidentialité</a>, y compris <a href='cookiepolicy.php' target='_blank' class='f14' style='color: royalblue;'>Utilisation des cookies.</a>",
			'register'          => "Registre",
			'cancel'            => "Annuler"
		], 
		'Turkish' => [
		    'close'             => "Kapalı",
			'createYourAccount' => "Hesabını oluştur",
			'email'             => "E-posta",
			'username'          => "Kullanıcı adı",
			'password'          => "Şifre",
			'rules'             => "Hesap oluşturarak şunu kabul ediyorum <a href='terms.php' target='_blank' class='f14' style='color: royalblue;'>Kullanım Şartları</a> ve <a href='privacy.php' target='_blank' class='f14' style='color: royalblue;'>Gizlilik Politikası</a>, içermek <a href='cookiepolicy.php' target='_blank' class='f14' style='color: royalblue;'>Çerez kullanımı.</a>",
			'register'          => "Kayıt olmak",
			'cancel'            => "İptal etmek"
		], 
		'Portuguese' => [
		    'close'             => "Fechar",
			'createYourAccount' => "Crie sua conta",
			'email'             => "E-mail",
			'username'          => "Nome de usuário",
			'password'          => "Senha",
			'rules'             => "Ao criar uma conta, eu concordo em <a href='terms.php' target='_blank' class='f14' style='color: royalblue;'>Termos de serviço</a> e <a href='privacy.php' target='_blank' class='f14' style='color: royalblue;'>Política de Privacidade</a>, incluindo <a href='cookiepolicy.php' target='_blank' class='f14' style='color: royalblue;'>Uso de cookies.</a>",
			'register'          => "Registro",
			'cancel'            => "Cancelar"
		], 
		'Romanian' => [
		    'close'             => "Închide",
			'createYourAccount' => "Creeaza-ti contul",
			'email'             => "E-mail",
			'username'          => "Nume de utilizator",
			'password'          => "Parola",
			'rules'             => "Prin crearea contului, sunt de acord <a href='terms.php' target='_blank' class='f14' style='color: royalblue;'>Termenii serviciului</a> și <a href='privacy.php' target='_blank' class='f14' style='color: royalblue;'>Politica de confidențialitate</a>, inclusiv <a href='cookiepolicy.php' target='_blank' class='f14' style='color: royalblue;'>Utilizarea cookie-urilor.</a>",
			'register'          => "Inregistreaza-te",
			'cancel'            => "Anulare"
		], 
		'Dutch' => [
		    'close'             => "Dichtbij",
			'createYourAccount' => "Maak een account aan",
			'email'             => "E-mail",
			'username'          => "Gebruikersnaam",
			'password'          => "Wachtwoord",
			'rules'             => "Door een account aan te maken, ga ik hiermee akkoord <a href='terms.php' target='_blank' class='f14' style='color: royalblue;'>Servicevoorwaarden</a> en <a href='privacy.php' target='_blank' class='f14' style='color: royalblue;'>Privacybeleid</a>, inbegrepen <a href='cookiepolicy.php' target='_blank' class='f14' style='color: royalblue;'>Cookiegebruik.</a>",
			'register'          => "Register",
			'cancel'            => "Annuleren"
		], 
		'Polish' => [
		    'close'             => "Zamknąć",
			'createYourAccount' => "Utwórz swoje konto",
			'email'             => "E-mail",
			'username'          => "Nazwa użytkownika",
			'password'          => "Hasło",
			'rules'             => "Tworząc konto wyrażam zgodę <a href='terms.php' target='_blank' class='f14' style='color: royalblue;'>Warunki usługi</a> i <a href='privacy.php' target='_blank' class='f14' style='color: royalblue;'>Polityka prywatności</a>, w tym <a href='cookiepolicy.php' target='_blank' class='f14' style='color: royalblue;'>Wykorzystanie plików cookie.</a>",
			'register'          => "Rejestr",
			'cancel'            => "Anulować"
		], 
		'Ukrainian' => [
		    'close'             => "Закрити",
			'createYourAccount' => "Створити свій обліковий запис",
			'email'             => "Електронна пошта",
			'username'          => "Ім'я користувача",
			'password'          => "Пароль",
			'rules'             => "Створюючи обліковий запис, я погоджуюся <a href='terms.php' target='_blank' class='f14' style='color: royalblue;'>Умови використання</a> і <a href='privacy.php' target='_blank' class='f14' style='color: royalblue;'>Політика конфіденційності</a>, в тому числі <a href='cookiepolicy.php' target='_blank' class='f14' style='color: royalblue;'>Використання файлів cookie.</a>",
			'register'          => "Зареєструватися",
			'cancel'            => "Скасувати"
		]
	];
?>