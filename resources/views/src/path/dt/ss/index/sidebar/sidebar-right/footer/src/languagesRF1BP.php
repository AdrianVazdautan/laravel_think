<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesRF1BP = [
		'English' => [
			'RF1BP' => "
				<a class='hu' href='about.php' target='_blanck'> 
					&#149;
					About
				</a>
				<a class='hu' href='terms.php' target='_blanck'> 
					&#149;
					Terms
				</a>
				<a class='hu' href='copyright.php' target='_blanck'> 
					&#149;
					Copyright
				</a>
				<a class='hu' href='privacy.php' target='_blanck'> 
					&#149;
					Privacy
				</a>
				<a class='hu' href='advertisement.php' target='_blanck'> 
					&#149;
					Advertisement
				</a>
				<br>
				<a class='hu' href='help.php' target='_blanck'> 
					&#149;
					Help
				</a>
				<a class='hu' href='feedback.php' target='_blanck'> 
					&#149;
					Send feedback
				</a>
				<a class='hu' href='cookiepolicy.php' target='_blanck'> 
					&#149;
					This site uses cookies.
					<br>
					By continuing to browse you agree to the use of cookies in accordance with Regulation (EU) 2016/679
				</a>
			"
		], 
		'Spanish' => [
			'RF1BP' => "
				<a class='hu' href='about.php' target='_blanck'> 
					&#149;
					Sobre
				</a>
				<a class='hu' href='terms.php' target='_blanck'> 
					&#149;
					Términos
				</a>
				<a class='hu' href='copyright.php' target='_blanck'> 
					&#149;
					Derechos de autor
				</a>
				<a class='hu' href='privacy.php' target='_blanck'> 
					&#149;
					Privacidad
				</a>
				<br>
				<a class='hu' href='advertisement.php' target='_blanck'> 
					&#149;
					Anuncio
				</a>
				<a class='hu' href='help.php' target='_blanck'> 
					&#149;
					Ayuda
				</a>
				<a class='hu' href='feedback.php' target='_blanck'> 
					&#149;
					Enviar comentarios
				</a>
				<a class='hu' href='cookiepolicy.php' target='_blanck'> 
					&#149;
					Este sitio utiliza cookies.
					Al continuar navegando, acepta el uso de cookies de acuerdo con el Reglamento (UE) 2016/679
				</a>
			"
		], 
		'French' => [
			'RF1BP' => "
				<a class='hu' href='about.php' target='_blanck'> 
					&#149;
					À propos de
				</a>
				<a class='hu' href='terms.php' target='_blanck'> 
					&#149;
					Conditions
				</a>
				<a class='hu' href='copyright.php' target='_blanck'> 
					&#149;
					Droits d'auteur
				</a>
				<a class='hu' href='advertisement.php' target='_blanck'> 
					&#149;
					Publicité
				</a>
				<br>
				<a class='hu' href='help.php' target='_blanck'> 
					&#149;
					Aider
				</a>
				<a class='hu' href='privacy.php' target='_blanck'> 
					&#149;
					Confidentialité
				</a>
				<a class='hu' href='feedback.php' target='_blanck'> 
					&#149;
					Envoyer des commentaires
				</a>
				<br>
				<a class='hu' href='cookiepolicy.php' target='_blanck'> 
					&#149;
					Ce site utilise des cookies.
					En poursuivant votre navigation, vous acceptez l'utilisation de cookies conformément au règlement (UE) 2016/679
				</a>
			"
		], 
		'Turkish' => [
			'RF1BP' => "
				<a class='hu' href='about.php' target='_blanck'> 
					&#149;
					Hakkında
				</a>
				<a class='hu' href='terms.php' target='_blanck'> 
					&#149;
					Terimler
				</a>
				<a class='hu' href='copyright.php' target='_blanck'> 
					&#149;
					Telif
				</a>
				<a class='hu' href='privacy.php' target='_blanck'> 
					&#149;
					Mahremiyet
				</a>
				<a class='hu' href='advertisement.php' target='_blanck'> 
					&#149;
					Reklamcılık
				</a>
				<br>
				<a class='hu' href='help.php' target='_blanck'> 
					&#149;
					Yardım
				</a>
				<a class='hu' href='feedback.php' target='_blanck'> 
					&#149;
					Geribildirim yolla
				</a>
				<a class='hu' href='cookiepolicy.php' target='_blanck'> 
					&#149;
					Bu site çerez kullanır.
					<br>
					Göz atmaya devam ederek, Yönetmelik (AB) 2016/679 uyarınca tanımlama bilgilerinin kullanılmasını kabul etmiş olursunuz.
				</a>
			"
		], 
		'Portuguese' => [
			'RF1BP' => "
				<a class='hu' href='about.php' target='_blanck'> 
					&#149;
					Sobre
				</a>
				<a class='hu' href='terms.php' target='_blanck'> 
					&#149;
					Termos
				</a>
				<a class='hu' href='copyright.php' target='_blanck'> 
					&#149;
					Direito autoral
				</a>
				<a class='hu' href='privacy.php' target='_blanck'> 
					&#149;
					Privacidade
				</a>
				<a class='hu' href='advertisement.php' target='_blanck'> 
					&#149;
					Anúncio publicitário
				</a>
				<a class='hu' href='help.php' target='_blanck'> 
					&#149;
					Ajuda
				</a>
				<a class='hu' href='feedback.php' target='_blanck'> 
					&#149;
					Enviar feedback
				</a>
				<a class='hu' href='cookiepolicy.php' target='_blanck'> 
					&#149;
					Este site usa cookies.
					Ao continuar a navegar concorda com a utilização de cookies de acordo com o Regulamento (UE) 2016/679
				</a>
			"
		], 
		'Romanian' => [
			'RF1BP' => "
				<a class='hu' href='about.php' target='_blanck'> 
					&#149;
					Despre
				</a>
				<a class='hu' href='terms.php' target='_blanck'> 
					&#149;
					Termeni
				</a>
				<a class='hu' href='copyright.php' target='_blanck'> 
					&#149;
					Drepturi de autor
				</a>
				<a class='hu' href='privacy.php' target='_blanck'> 
					&#149;
					Confidențialitate
				</a>
				<br>
				<a class='hu' href='advertisement.php' target='_blanck'> 
					&#149;
					Publicitate
				</a>
				<a class='hu' href='help.php' target='_blanck'> 
					&#149;
					Ajutor
				</a>
				<a class='hu' href='feedback.php' target='_blanck'> 
					&#149;
					Trimite feedback
				</a>
				<a class='hu' href='cookiepolicy.php' target='_blanck'> 
					&#149;
					Acest site folosește cookie-uri.
					Continuând navigarea, sunteți de acord cu utilizarea cookie-urilor în conformitate cu Regulamentul (UE) 2016/679
				</a>
			"
		], 
		'Dutch' => [
			'RF1BP' => "
				<a class='hu' href='about.php' target='_blanck'> 
					&#149;
					Over
				</a>
				<a class='hu' href='terms.php' target='_blanck'> 
					&#149;
					Voorwaarden
				</a>
				<a class='hu' href='copyright.php' target='_blanck'> 
					&#149;
					Auteursrecht
				</a>
				<a class='hu' href='advertisement.php' target='_blanck'> 
					&#149;
					Advertentie
				</a>
				<a class='hu' href='help.php' target='_blanck'> 
					&#149;
					Help
				</a>
				<br>
				<a class='hu' href='privacy.php' target='_blanck'> 
					&#149;
					Privacy
				</a>
				<a class='hu' href='feedback.php' target='_blanck'> 
					&#149;
					Stuur feedback
				</a>
				<a class='hu' href='cookiepolicy.php' target='_blanck'> 
					&#149;
					Deze site maakt gebruik van cookies.
					Door verder te bladeren gaat u akkoord met het gebruik van cookies in overeenstemming met Verordening (EU) 2016/679
				</a>
			"
		], 
		'Polish' => [
			'RF1BP' => "
				<a class='hu' href='about.php' target='_blanck'> 
					&#149;
					Około
				</a>
				<a class='hu' href='terms.php' target='_blanck'> 
					&#149;
					Warunki
				</a>
				<a class='hu' href='copyright.php' target='_blanck'> 
					&#149;
					Prawo autorskie
				</a>
				<a class='hu' href='privacy.php' target='_blanck'> 
					&#149;
					Prywatność
				</a>
				<a class='hu' href='help.php' target='_blanck'> 
					&#149;
					Pomoc
				</a>
				<br>
				<a class='hu' href='advertisement.php' target='_blanck'> 
					&#149;
					Reklama
				</a>
				<a class='hu' href='feedback.php' target='_blanck'> 
					&#149;
					Wyślij opinię
				</a>
				<a class='hu' href='cookiepolicy.php' target='_blanck'> 
					&#149;
					Ta strona używa plików cookie.
					Kontynuując przeglądanie, wyrażasz zgodę na używanie plików cookie zgodnie z rozporządzeniem (UE) 2016/679
				</a>
			"
		], 
		'Ukrainian' => [
			'RF1BP' => "
				<a class='hu' href='about.php' target='_blanck'> 
					&#149;
					Про
				</a>
				<a class='hu' href='terms.php' target='_blanck'> 
					&#149;
					Умови
				</a>
				<a class='hu' href='copyright.php' target='_blanck'> 
					&#149;
					Авторське право
				</a>
				<a class='hu' href='privacy.php' target='_blanck'> 
					&#149;
					Конфіденційність
				</a>
				<br>
				<a class='hu' href='advertisement.php' target='_blanck'> 
					&#149;
					Оголошення
				</a>
				<a class='hu' href='feedback.php' target='_blanck'> 
					&#149;
					Надіслати відгук
				</a>
				<a class='hu' href='help.php' target='_blanck'> 
					&#149;
					Допомога
				</a>
				<a class='hu' href='cookiepolicy.php' target='_blanck'> 
					&#149;
					Цей сайт використовує файли cookie.
					Продовжуючи перегляд, ви погоджуєтеся на використання файлів cookie відповідно до Регламенту (ЄС) 2016/679
				</a>
			"
		]
	];
?>