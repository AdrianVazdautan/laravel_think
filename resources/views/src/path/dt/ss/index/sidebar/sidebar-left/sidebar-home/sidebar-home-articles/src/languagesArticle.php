<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesArticle = [
		'English' => [
			'HidePost'        => "Hide post",
			'Complain'        => "Complain",
			'ArticleRemoved'  => "Article removed",
			'TELLUSWHY'       => "TELL US WHY",
			'UNDO'            => "UNDO",
			'Joined'          => "Joined",
			'Subscribe'       => "Subscribe",
			'Publications'    => "Publications",
			'Comments'        => "Comments",
			'Subscribers'     => "Subscribers",
			'Rating'          => "Rating",
			'ContinueReading' => "Continue reading",
			'Comments'        => "Comments",
			'ILikeThis'       => "I like this",
			'Share'           => "Share",
			'LeaveAcomment'   => "Leave a comment",
			'WriteAnything'   => "Write anything",
			'Reply'           => "Reply",
			'AddAreply'       => "Add a reply",
			'articleDeleted'  => "Article Deleted",
			'RECOVER'         => "RECOVER",
			'Delete'          => "Delete"
		], 
		'Spanish' => [
			'HidePost'        => "Ocultar publicación",
			'Complain'        => "Quejarse",
			'ArticleRemoved'  => "Artículo eliminado",
			'TELLUSWHY'       => "DINOS POR QUÉ",
			'UNDO'            => "DESHACER",
			'Joined'          => "Unido",
			'Subscribe'       => "Suscribir",
			'Publications'    => "Publicaciones",
			'Comments'        => "Comentarios",
			'Subscribers'     => "Suscriptores",
			'Rating'          => "Clasificación",
			'ContinueReading' => "Sigue leyendo",
			'Comments'        => "Comentarios",
			'ILikeThis'       => "Me gusta esto",
			'Share'           => "Compartir",
			'LeaveAcomment'   => "Deja un comentario",
			'WriteAnything'   => "Escribe cualquier cosa",
			'Reply'           => "Responder",
			'AddAreply'       => "Añadir una respuesta",
			'articleDeleted'  => "Artículo eliminado",
			'RECOVER'         => "RECUPERAR",
			'Delete'          => "Borrar"
		], 
		'French' => [
			'HidePost'        => "Masquer l'article",
			'Complain'        => "Se plaindre",
			'ArticleRemoved'  => "Article supprimé",
			'TELLUSWHY'       => "DITESPOURQUOI",
			'UNDO'            => "ANNULER",
			'Joined'          => "Rejoint",
			'Subscribe'       => "S'abonner",
			'Publications'    => "Publications",
			'Comments'        => "Commentaires",
			'Subscribers'     => "Abonnés",
			'Rating'          => "Note",
			'ContinueReading' => "Continuer la lecture",
			'ILikeThis'       => "J'aime ça",
			'Share'           => "Partager",
			'LeaveAcomment'   => "Laisser un commentaire",
			'WriteAnything'   => "Écrire quelque chose",
			'Reply'           => "Répondre",
			'AddAreply'       => "Ajouter une réponse",
			'articleDeleted'  => "Article supprimé",
			'RECOVER'         => "RÉCUPÉRER",
			'Delete'          => "Supprimer"
		], 
		'Turkish' => [
			'HidePost'        => "Gönderiyi Gizle",
			'Complain'        => "Şikayet Et",
			'ArticleRemoved'  => "Makale Kaldırıldı",
			'TELLUSWHY'       => "NEDENBİZEANLAT",
			'UNDO'            => "GERİAL",
			'Joined'          => "Katıldı",
			'Subscribe'       => "Abone Ol",
			'Publications'    => "Yayınlar",
			'Comments'        => "Yorumlar",
			'Subscribers'     => "Aboneler",
			'Rating'          => "Değerlendirme",
			'ContinueReading' => "Okumaya Devam Et",
			'ILikeThis'       => "Beğendim",
			'Share'           => "Paylaş",
			'LeaveAcomment'   => "Yorum Bırak",
			'WriteAnything'   => "Bir Şeyler Yaz",
			'Reply'           => "Cevapla",
			'AddAreply'       => "Cevap Ekle",
			'articleDeleted'  => "Makale Silindi",
			'RECOVER'         => "İYİLEŞMEK",
			'Delete'          => "Silmek"
		], 
		'Portuguese' => [
			'HidePost'        => "Ocultar Publicação",
			'Complain'        => "Reclamar",
			'ArticleRemoved'  => "Artigo Removido",
			'TELLUSWHY'       => "DIGAPORQUÊ",
			'UNDO'            => "DESFAZER",
			'Joined'          => "Juntou-se",
			'Subscribe'       => "Subscrever",
			'Publications'    => "Publicações",
			'Comments'        => "Comentários",
			'Subscribers'     => "Subscritores",
			'Rating'          => "Avaliação",
			'ContinueReading' => "Continuar a Ler",
			'ILikeThis'       => "Gosto disto",
			'Share'           => "Partilhar",
			'LeaveAcomment'   => "Deixar um Comentário",
			'WriteAnything'   => "Escrever Algo",
			'Reply'           => "Responder",
			'AddAreply'       => "Adicionar uma Resposta",
			'articleDeleted'  => "Artigo excluído",
			'RECOVER'         => "RECUPERAR",
			'Delete'          => "Excluir"
		], 
		'Romanian' => [
			'HidePost'        => "Ascunde Postarea",
			'Complain'        => "Plângere",
			'ArticleRemoved'  => "Articol Eliminat",
			'TELLUSWHY'       => "SPUNENEPENTRUCE",
			'UNDO'            => "ANULEAZĂ",
			'Joined'          => "S-a alăturat",
			'Subscribe'       => "Abonează-te",
			'Publications'    => "Publicații",
			'Comments'        => "Comentarii",
			'Subscribers'     => "Abonați",
			'Rating'          => "Evaluare",
			'ContinueReading' => "Continuă Lectura",
			'ILikeThis'       => "Îmi place asta",
			'Share'           => "Distribuie",
			'LeaveAcomment'   => "Lasă un Comentariu",
			'WriteAnything'   => "Scrie ceva",
			'Reply'           => "Răspunde",
			'AddAreply'       => "Adaugă un Răspuns",
			'articleDeleted'  => "Articol șters",
			'RECOVER'         => "RECUPERA",
			'Delete'          => "Șterge"
		], 
		'Dutch' => [
			'HidePost'        => "Bericht Verbergen",
			'Complain'        => "Klacht Indienen",
			'ArticleRemoved'  => "Artikel Verwijderd",
			'TELLUSWHY'       => "VERTELONSWAAROM",
			'UNDO'            => "ONGEDAANMAKEN",
			'Joined'          => "Lid Geworden",
			'Subscribe'       => "Abonneren",
			'Publications'    => "Publicaties",
			'Comments'        => "Opmerkingen",
			'Subscribers'     => "Abonnees",
			'Rating'          => "Beoordeling",
			'ContinueReading' => "Verder Lezen",
			'ILikeThis'       => "Ik Vind Dit Leuk",
			'Share'           => "Delen",
			'LeaveAcomment'   => "Laat een Reactie Achter",
			'WriteAnything'   => "Schrijf Iets",
			'Reply'           => "Antwoorden",
			'AddAreply'       => "Een Antwoord Toevoegen",
			'articleDeleted'  => "Artikel verwijderd",
			'RECOVER'         => "HERSTELLEN",
			'Delete'          => "Verwijderen"
		], 
		'Polish' => [
			'HidePost'        => "Ukryj post",
			'Complain'        => "Zgłoś",
			'ArticleRemoved'  => "Artykuł usunięty",
			'TELLUSWHY'       => "POWIEDZNAMDLACZEGO",
			'UNDO'            => "COFNIJ",
			'Joined'          => "Dołączono",
			'Subscribe'       => "Zapisz się",
			'Publications'    => "Publikacje",
			'Comments'        => "Komentarze",
			'Subscribers'     => "Subskrybenci",
			'Rating'          => "Ocena",
			'ContinueReading' => "Kontynuuj czytanie",
			'ILikeThis'       => "Lubię to",
			'Share'           => "Udostępnij",
			'LeaveAcomment'   => "Zostaw komentarz",
			'WriteAnything'   => "Napisz coś",
			'Reply'           => "Odpowiedz",
			'AddAreply'       => "Dodaj odpowiedź",
			'articleDeleted'  => "Artykuł usunięty",
			'RECOVER'         => "ODZYSKIWAĆ",
			'Delete'          => "Usuwać"
		], 
		'Ukrainian' => [
			'HidePost'        => "Приховати публікацію",
			'Complain'        => "Поскаржитися",
			'ArticleRemoved'  => "Стаття видалена",
			'TELLUSWHY'       => "ПОВІДОМТЕНАМЧОМУ",
			'UNDO'            => "СКАСУВАТИ",
			'Joined'          => "Приєднався",
			'Subscribe'       => "Підписатися",
			'Publications'    => "Публікації",
			'Comments'        => "Коментарі",
			'Subscribers'     => "Підписники",
			'Rating'          => "Рейтинг",
			'ContinueReading' => "Продовжити читання",
			'ILikeThis'       => "Мені подобається це",
			'Share'           => "Поділитися",
			'LeaveAcomment'   => "Залишити коментар",
			'WriteAnything'   => "Напишіть що-небудь",
			'Reply'           => "Відповісти",
			'AddAreply'       => "Додати відповідь",
			'articleDeleted'  => "Стаття видалена",
			'RECOVER'         => "ВІДНОВЛЮВАТИСЯ",
			'Delete'          => "Видалити"
		]
	];
?>