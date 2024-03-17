<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesRANAW = [
		'English'    => ['PostAnArticleForFree' => "+ Post an article for free"],
		'Spanish'    => ['PostAnArticleForFree' => "+ Publicar un artículo gratis"],
		'French'     => ['PostAnArticleForFree' => "+ Publier un article gratuitement"],
		'Turkish'    => ['PostAnArticleForFree' => "+ Ücretsiz bir makale yayınlayın"],
		'Portuguese' => ['PostAnArticleForFree' => "+ Publique um artigo gratuitamente"],
		'Romanian'   => ['PostAnArticleForFree' => "+ Postați un articol gratuit"],
		'Dutch'      => ['PostAnArticleForFree' => "+ Plaats gratis een artikel"],
		'Polish'     => ['PostAnArticleForFree' => "+ Opublikuj artykuł za darmo"],
		'Ukrainian'  => ['PostAnArticleForFree' => "+ Опублікуйте статтю безкоштовно"]
	];
?>