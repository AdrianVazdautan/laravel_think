<?php
	require_once "src/article-category/src/language_article-category.php";
?>
<!--START-->
	<div class="p l w100 mt20 f14">
		<div class="asc0 p l">
			<!--START Category-->
				<!--START Title-->
					<div class="p l w100 fw mb10">
						<?= $languagesACP[$selectedLanguage]['category'];?>
					</div>
				<!--END-->
				<!--START Select category-->
					<div class="ascb0js f14 h35 p l w100 u c br12 par10 pal" data-selected='0' onclick="ascb0()">
						<!--START Button-->
							<div class="cosabjs p l h34 lh34">
								<?= $languagesACP[$selectedLanguage]['select_category'];?>
							</div>
						<!--END-->
						<!--START icon-->
							<div class="p r h34 dg alc">
								<div class="iadiconjs w16 h16 p adi bgsz16"><!--icon Arrow down--></div>
							</div>
						<!--END-->
					</div>
					<div class="categoryErrorjs w100 f14 cr mt10 p l none"></div>
				<!--END-->
				<!--START PopUpMenuWithTopics-->
					<div class="acswejs c none">
						<!--START-->
							<div class="id_pumwtms_top_js acswede w100 adi" onclick="moveScrollTop()"></div>
						<!--END-->
						<!--START-->
							<div class="mstdtcjs w100">
								<?php include "src/article-category/article-category-topics.php";?>
							</div>
						<!--END-->
						<!--START-->
							<div class="id_pumwtms_bottom_js acswedebt w100 adi" onclick="moveScrollDown()"></div>
						<!--END-->
					</div>
				<!--END-->
			<!--END-->
		</div>
	</div>
<!--END-->