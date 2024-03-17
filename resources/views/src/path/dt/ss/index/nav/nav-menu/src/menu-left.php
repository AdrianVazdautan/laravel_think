<?php
	require_once "src/alphabet.php";
	require_once "src/languages_menu_left.php";
?>
<script>
	var	
	alphabet = <?= $languagesMENUAlphabet[$selectedLanguage]['alphabet'];?>,
	categoryes = [
		['<?= $languagesMENUMenuleft[$selectedLanguage]['animals_and_nature'];?>','animals_and_nature'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['art'];?>','art'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['books_and_literature'];?>','books_and_literature'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['cinema_and_music'];?>','cinema_and_music'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['current_news_and_events'];?>','current_news_and_events'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['design'];?>','design'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['dreams'];?>','dreams'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['education'];?>','education'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['ethics'];?>','ethics'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['family_and_friends'];?>','family_and_friends'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['fashion_style'];?>','fashion_style'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['food_and_drink'];?>','food_and_drink'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['games'];?>','games'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['health_and_beauty'];?>','health_and_beauty'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['hobbies'];?>','hobbies'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['humanitarian_sciences'];?>','humanitarian_sciences'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['history'];?>','history'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['innovations'];?>','innovations'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['leadership'];?>','leadership'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['love_and_relationships'];?>','love_and_relationships'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['mental_health'];?>','mental_health'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['marketing'];?>','marketing'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['mathematics'];?>','mathematics'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['natural_sciences'];?>','natural_sciences'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['other'];?>','other'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['personal_stories'];?>','personal_stories'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['programming'];?>','programming'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['religion_and_spirituality'];?>','religion_and_spirituality'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['science_technology'];?>','science_technology'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['sports_and_fitness'];?>','sports_and_fitness'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['security'];?>','security'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['time_management'];?>','time_management'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['travel_and_culture'];?>','travel_and_culture'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['trends'];?>','trends'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['weather_and_climate'];?>','weather_and_climate'],
		['<?= $languagesMENUMenuleft[$selectedLanguage]['work'];?>','work']
	],
	category_all_topics = ['<?= $languagesMENUMenuleft[$selectedLanguage]['all_topics'];?>','all_topics'];
</script>