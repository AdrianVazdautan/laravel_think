<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languages = [
		'English' => [
			'restoringAccess' => "Restoring access",
			'mail'            => "Mail",
			'mailBoxName'     => "MailBox Name",
			'restore'         => "Restore",
			'cancel'          => "Cancel",
			'close'           => "Close"
		], 
		'Spanish' => [
			'restoringAccess' => "Restaurando el acceso",
			'mail'            => "Correo",
			'mailBoxName'     => "Nombre de la bandeja de entrada",
			'restore'         => "Restaurar",
			'cancel'          => "Cancelar",
			'close'           => "Cerrar"
		], 
		'French' => [
			'restoringAccess' => "Restauration de l'accès",
			'mail'            => "Courrier",
			'mailBoxName'     => "Nom de la boîte aux lettres",
			'restore'         => "Restaurer",
			'cancel'          => "Annuler",
			'close'           => "Fermer"
		], 
		'Turkish' => [
		    'restoringAccess' => "Erişimi Geri Yükleme",
		    'mail'            => "Posta",
		    'mailBoxName'     => "Posta Kutusu Adı",
		    'restore'         => "Geri Yükle",
		    'cancel'          => "İptal Et",
		    'close'           => "Kapat"
		], 
		'Portuguese' => [
		    'restoringAccess' => "Restaurando o Acesso",
		    'mail'            => "Correio",
		    'mailBoxName'     => "Nome da Caixa de Correio",
		    'restore'         => "Restaurar",
		    'cancel'          => "Cancelar",
		    'close'           => "Fechar"
		], 
		'Romanian' => [
		    'restoringAccess' => "Restaurarea Accesului",
		    'mail'            => "E-mail",
		    'mailBoxName'     => "Numele Casetei Poștale",
		    'restore'         => "Restaurare",
		    'cancel'          => "Anulare",
		    'close'           => "Închidere"
		], 
		'Dutch' => [
		    'restoringAccess' => "Toegang Herstellen",
		    'mail'            => "E-mail",
		    'mailBoxName'     => "Naam van de Postbus",
		    'restore'         => "Herstellen",
		    'cancel'          => "Annuleren",
		    'close'           => "Sluiten"
		], 
		'Polish' => [
		    'restoringAccess' => "Przywracanie Dostępu",
		    'mail'            => "Poczta",
		    'mailBoxName'     => "Nazwa Skrzynki Pocztowej",
		    'restore'         => "Przywróć",
		    'cancel'          => "Anuluj",
		    'close'           => "Zamknij"
		], 
		'Ukrainian' => [
		    'restoringAccess' => "Відновлення доступу",
		    'mail'            => "Пошта",
		    'mailBoxName'     => "Ім'я поштової скриньки",
		    'restore'         => "Відновити",
		    'cancel'          => "Скасувати",
		    'close'           => "Закрити"
		]
	];
?>