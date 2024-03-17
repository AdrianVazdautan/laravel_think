<?php
	require "src/language_widget-dont-forget.php";
?>
<!--START Widget-->
	<div class="amfaw p l w100 br12 pa mt25">
		<!--TITLE WIDGET-->
			<div class="rwban2 l w100 fw f14 pab mb20">
				<div class="p l">
					<div class="p l">
						<?= $languagesLWDF[$selectedLanguage]['title_widget'];?>
					</div>
					<div class="ab w100 cWCD"><!--icon--></div>
				</div>
			</div>
		<!--END-->
		<!--START Text-->
			<p class="w100 f14 mb20">
				<?= $languagesLWDF[$selectedLanguage]['WDF_p1'];?>
			</p>
			<p class="w100 f14">
				<?= $languagesLWDF[$selectedLanguage]['WDF_p2'];?>
			</p>
		<!--END-->
	</div>
<!--END-->