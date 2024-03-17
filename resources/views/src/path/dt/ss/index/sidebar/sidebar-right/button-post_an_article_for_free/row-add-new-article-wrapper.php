<?php
	if(!isset($_SESSION['user']) || !$_SESSION['user']){
		require_once "src/languagesRANAW.php";
		echo"
			<!--START Button_Post_Article_Free-->
				<div class='l t c p u ranaw h40 lh40 ranawjs br50 sh mt25 f14 bgw w100' onclick='unauthorized()'>
					".$languagesRANAW[$selectedLanguage]['PostAnArticleForFree']."
				</div>
			<!--END-->
			";
	}
?>