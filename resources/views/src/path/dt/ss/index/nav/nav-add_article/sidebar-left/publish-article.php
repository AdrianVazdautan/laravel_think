<?php
	require "src/publish-article/language_publish-article.php";
?>
<!--START-->
	<div class="w100 h35 p l mt20">
		<button class="btn_appearance_publish_article_js ptaa u c p l pal par h35 lh35 br50 f14" onclick="publishTheArticle()">
			<?= $languagesLPAP[$selectedLanguage]['publish_now'];?>
		</button>
	</div>
<!--END-->