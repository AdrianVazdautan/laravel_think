<?php require_once "src/languages.php";?>

<!--START Search (from Main_Menu)-->
	<div class="mobile_search_wrapp_js mobile_none">
		<div class="ts mobile_search_js p l dg alc">
			<!--START : MOBILE : SEARCH-BACK (close)-->
				<div class="mobile_search_back_js desktop_none u c" onclick="mobile_close_search()">
					
				</div>
			<!--END-->
			<!--START : SEARCH-INPUT-->
				<div class="p l w100 sedn br50">
					<input class="ts2i p l f14 pal10" id="input-search" type="text" onkeydown="handleKeyPressSearch(event)" placeholder="<?php echo $languages[$selectedLanguage]['Search'];?>" onkeyup="searchL()">
					<button class="bts p l c" onclick="search()"></button>
				</div>
			<!--END-->
			<!--START : SEARCH-LIST-->
				<div id="cSLjs" class="none ab">
					<div id="listjs" class="p l pa10"></div>
				</div>
			<!--END-->
		</div>
	</div>
<!--END-->