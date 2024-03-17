<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else {
		$selectedLanguage = 'English';
	}

	$languagesTime = [
		'English' => [
			'1HourAgo'   => "1 hour ago",
			'hoursAgo'   => "hours ago",
			'Now'        => "Now",
			'secondAgo'  => "second ago",
			'secondsAgo' => "seconds ago",
			'minuteAgo'  => "minute ago",
			'minutesAgo' => "minutes ago",
			'dayAgo'     => "day ago",
			'daysAgo'    => "days ago",
			'monthAgo'   => "month ago",
			'monthsAgo'  => "months ago",
			'yearAgo'    => "year ago",
			'yearsAgo'   => "years ago"
		], 
		'Spanish' => [
			'1HourAgo'   => "1 hora antes",
			'hoursAgo'   => "horas atras",
			'Now'        => "Ahora",
			'secondAgo'  => "hace un segundo",
			'secondsAgo' => "hace segundos",
			'minuteAgo'  => "hace un minuto",
			'minutesAgo' => "hace minutos",
			'dayAgo'     => "hace un dia",
			'daysAgo'    => "hace días",
			'monthAgo'   => "hace un mes",
			'monthsAgo'  => "Hace meses",
			'yearAgo'    => "Hace años",
			'yearsAgo'   => "hace años que"
		], 
		'French' => [
			'1HourAgo'   => "1 Il ya heure",
			'hoursAgo'   => "il y a des heures",
			'Now'        => "Maintenant",
			'secondAgo'  => "il y a une seconde",
			'secondsAgo' => "il y a quelques instants",
			'minuteAgo'  => "il y a une minute",
			'minutesAgo' => "il y a quelques minutes",
			'dayAgo'     => "il y a un jour",
			'daysAgo'    => "il y a quelques jours",
			'monthAgo'   => "il y a un mois",
			'monthsAgo'  => "il y a des mois",
			'yearAgo'    => "il y'a un an",
			'yearsAgo'   => "il y a des années"
		], 
		'Turkish' => [
			'1HourAgo'   => "1 saat önce",
			'hoursAgo'   => "saatler önce",
			'Now'        => "Şimdi",
			'secondAgo'  => "ikinci önce",
			'secondsAgo' => "saniyeler önce",
			'minuteAgo'  => "bir dakika önce",
			'minutesAgo' => "dakika önce",
			'dayAgo'     => "gün önce",
			'daysAgo'    => "günler önce",
			'monthAgo'   => "ay önce",
			'monthsAgo'  => "aylar önce",
			'yearAgo'    => "yıl önce",
			'yearsAgo'   => "Yıllar önce"
		], 
		'Portuguese' => [
			'1HourAgo'   => "1 hora atrás",
			'hoursAgo'   => "horas atrás",
			'Now'        => "Agora",
			'secondAgo'  => "segundo atrás",
			'secondsAgo' => "segundos atrás",
			'minuteAgo'  => "minuto atrás",
			'minutesAgo' => "minutos atrás",
			'dayAgo'     => "dia atrás",
			'daysAgo'    => "dias atrás",
			'monthAgo'   => "mês atrás",
			'monthsAgo'  => "meses antes",
			'yearAgo'    => "ano atrás",
			'yearsAgo'   => "anos atrás"
		], 
		'Romanian' => [
		    '1HourAgo'   => "O oră în urmă",
		    'hoursAgo'   => "ore în urmă",
		    'Now'        => "Acum",
		    'secondAgo'  => "acum câteva secunde",
		    'secondsAgo' => "secunde în urmă",
		    'minuteAgo'  => "acum un minut",
		    'minutesAgo' => "minute în urmă",
		    'dayAgo'     => "acum o zi",
		    'daysAgo'    => "zile în urmă",
		    'monthAgo'   => "acum o lună",
		    'monthsAgo'  => "o lună în urmă",
		    'yearAgo'    => "acum un an",
		    'yearsAgo'   => "un an în urmă"
		],
		'Dutch' => [
		    '1HourAgo'   => "1 uur geleden",
		    'hoursAgo'   => "uren geleden",
		    'Now'        => "Nu",
		    'secondAgo'  => "een paar seconden geleden",
		    'secondsAgo' => "seconden geleden",
		    'minuteAgo'  => "een minuut geleden",
		    'minutesAgo' => "minuten geleden",
		    'dayAgo'     => "een dag geleden",
		    'daysAgo'    => "dagen geleden",
		    'monthAgo'   => "een maand geleden",
		    'monthsAgo'  => "maanden geleden",
		    'yearAgo'    => "een jaar geleden",
		    'yearsAgo'   => "jaren geleden"
		],
		'Polish' => [
		    '1HourAgo'   => "1 godzinę temu",
		    'hoursAgo'   => "godziny temu",
		    'Now'        => "Teraz",
		    'secondAgo'  => "kilka sekund temu",
		    'secondsAgo' => "sekund temu",
		    'minuteAgo'  => "minutę temu",
		    'minutesAgo' => "minut temu",
		    'dayAgo'     => "dzień temu",
		    'daysAgo'    => "dni temu",
		    'monthAgo'   => "miesiąc temu",
		    'monthsAgo'  => "miesięcy temu",
		    'yearAgo'    => "rok temu",
		    'yearsAgo'   => "lat temu"
		],
		'Ukrainian' => [
		    '1HourAgo'   => "1 годину тому",
		    'hoursAgo'   => "годин тому",
		    'Now'        => "Зараз",
		    'secondAgo'  => "кілька секунд тому",
		    'secondsAgo' => "секунд тому",
		    'minuteAgo'  => "хвилину тому",
		    'minutesAgo' => "хвилин тому",
		    'dayAgo'     => "день тому",
		    'daysAgo'    => "днів тому",
		    'monthAgo'   => "місяць тому",
		    'monthsAgo'  => "місяців тому",
		    'yearAgo'    => "рік тому",
		    'yearsAgo'   => "років тому"
		]
	];
?>