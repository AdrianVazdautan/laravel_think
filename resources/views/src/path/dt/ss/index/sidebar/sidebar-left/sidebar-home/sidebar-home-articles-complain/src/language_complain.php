<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesLCSLCP = [
	    'English' => [
	        'report_an_infringement' => "Report an infringement",
	        'CRAI_p1'                => "Please elaborate on the details of the violation to assist us in resolving it more efficiently.",
	        'close'                  => "Close",
	        'cancel'                 => "Cancel",
	        'complain'               => "Complain"
	    ],
	    'Spanish' => [
	        'report_an_infringement' => "Informe una infracción",
	        'CRAI_p1'                => "Por favor, proporcione detalles sobre la infracción para ayudarnos a resolverla de manera más eficiente.",
	        'close'                  => "Cerrar",
	        'cancel'                 => "Cancelar",
	        'complain'               => "Queja"
	    ],
	    'French' => [
	        'report_an_infringement' => "Signaler une infraction",
	        'CRAI_p1'                => "Veuillez donner des détails sur l'infraction pour nous aider à la résoudre plus efficacement.",
	        'close'                  => "Fermer",
	        'cancel'                 => "Annuler",
	        'complain'               => "Plainte"
	    ],
	    'Turkish' => [
	        'report_an_infringement' => "Bir ihlal bildir",
	        'CRAI_p1'                => "Lütfen ihlal ayrıntılarını belirtin, böylece daha hızlı çözmemize yardımcı olun.",
	        'close'                  => "Kapat",
	        'cancel'                 => "İptal",
	        'complain'               => "Şikayet"
	    ],
	    'Portuguese' => [
	        'report_an_infringement' => "Reportar uma infração",
	        'CRAI_p1'                => "Por favor, forneça detalhes sobre a infração para nos ajudar a resolvê-la de forma mais eficiente.",
	        'close'                  => "Fechar",
	        'cancel'                 => "Cancelar",
	        'complain'               => "Reclamar"
	    ],
	    'Romanian' => [
	        'report_an_infringement' => "Raportați o încălcare",
	        'CRAI_p1'                => "Vă rugăm să furnizați detalii despre încălcare pentru a ne ajuta să o rezolvăm mai eficient.",
	        'close'                  => "Închideți",
	        'cancel'                 => "Anulați",
	        'complain'               => "Plânge"
	    ],
	    'Dutch' => [
	        'report_an_infringement' => "Meld een schending",
	        'CRAI_p1'                => "Geef alstublieft details over de schending om ons te helpen deze efficiënter op te lossen.",
	        'close'                  => "Sluiten",
	        'cancel'                 => "Annuleren",
	        'complain'               => "Klagen"
	    ],
	    'Polish' => [
	        'report_an_infringement' => "Zgłoś naruszenie",
	        'CRAI_p1'                => "Proszę podać szczegóły naruszenia, aby pomóc nam rozwiązać je bardziej efektywnie.",
	        'close'                  => "Zamknij",
	        'cancel'                 => "Anuluj",
	        'complain'               => "Skarga"
	    ],
	    'Ukrainian' => [
	        'report_an_infringement' => "Повідомити про порушення",
	        'CRAI_p1'                => "Будь ласка, надайте деталі порушення, щоб допомогти нам вирішити його більш ефективно.",
	        'close'                  => "Закрити",
	        'cancel'                 => "Скасувати",
	        'complain'               => "Скарга"
	    ]
	];
?>