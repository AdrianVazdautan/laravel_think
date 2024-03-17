<?php
	if(isset($_COOKIE['choosed_language'])){
    	$selectedLanguage = $_COOKIE['choosed_language'];
	} else{
		$selectedLanguage = 'English';
	}

	$languagesLSRNSRN = [
	    'English' => [
	        'no_result_found'                => "No result found",
	        'did_not_find_what_you_searched' => "Did not find what you searched?",
	        'add_article'                    => "Add article →"
	    ],
	    'Spanish' => [
	        'no_result_found'                => "No se encontraron resultados",
	        'did_not_find_what_you_searched' => "¿No encontró lo que buscaba?",
	        'add_article'                    => "Agregar artículo →"
	    ],
	    'French' => [
	        'no_result_found'                => "Aucun résultat trouvé",
	        'did_not_find_what_you_searched' => "Vous n'avez pas trouvé ce que vous cherchiez ?",
	        'add_article'                    => "Ajouter un article →"
	    ],
	    'Turkish' => [
	        'no_result_found'                => "Sonuç bulunamadı",
	        'did_not_find_what_you_searched' => "Aradığınızı bulamadınız mı?",
	        'add_article'                    => "Makale ekle →"
	    ],
	    'Portuguese' => [
	        'no_result_found'                => "Nenhum resultado encontrado",
	        'did_not_find_what_you_searched' => "Não encontrou o que procurava?",
	        'add_article'                    => "Adicionar artigo →"
	    ],
	    'Romanian' => [
	        'no_result_found'                => "Niciun rezultat găsit",
	        'did_not_find_what_you_searched' => "Nu ați găsit ceea ce căutați?",
	        'add_article'                    => "Adăugați un articol →"
	    ],
	    'Dutch' => [
	        'no_result_found'                => "Geen resultaten gevonden",
	        'did_not_find_what_you_searched' => "Niet gevonden wat u zocht?",
	        'add_article'                    => "Artikel toevoegen →"
	    ],
	    'Polish' => [
	        'no_result_found'                => "Nie znaleziono wyników",
	        'did_not_find_what_you_searched' => "Nie znalazłeś tego, czego szukałeś?",
	        'add_article'                    => "Dodaj artykuł →"
	    ],
	    'Ukrainian' => [
	        'no_result_found'                => "Результатів не знайдено",
	        'did_not_find_what_you_searched' => "Не знайшли те, що шукали?",
	        'add_article'                    => "Додати статтю →"
	    ]
	];
?>