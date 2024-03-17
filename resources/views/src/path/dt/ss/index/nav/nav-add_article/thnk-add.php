<?php
	require "thnk-add/language_thnk-add.php";
?>
<!--START Add article-->
	<div class='a0tajs td'>
		<div class="tans pf"><!--icon--></div>
		<div class="taw p">
			<div class="tat p l w100 f20 u">
				<?= $languagesLTAS[$selectedLanguage]['publish_an_article'];?>
			</div>
			<div class="taa p l w100 bgw br12">
				<!--START sidebar left-->
					<div class="tai p l">
						<!--START article title-->
							<?php require_once "sidebar-left/article-title.php"; ?>
						<!--END-->
						<!--START editor text-->
							<?php require_once "sidebar-left/editor-text.php"; ?>
						<!--END-->
						<!--START article category-->
							<?php require_once "sidebar-left/article-category.php"; ?>
						<!--END-->
						<!--START publish article-->
							<?php require_once "sidebar-left/publish-article.php"; ?>
						<!--END-->
						<!--START article settings-->
							<?php require_once "sidebar-left/article-settings.php"; ?>
						<!--END-->
					</div>
				<!--END-->
				<!--START sidebar right-->
					<div class="tab p l">
						<!--START WIDGET Dont forget-->
							<?php require_once "sidebar-right/widget-dont-forget.php"; ?>
						<!--END-->
					</div>
				<!--END-->
			</div>
		</div>
	</div>
<!--END-->