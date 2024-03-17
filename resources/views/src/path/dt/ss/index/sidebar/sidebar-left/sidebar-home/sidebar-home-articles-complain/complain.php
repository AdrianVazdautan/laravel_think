<?php
	require "src/language_complain.php";
?>
<div class="coar0js pf vw100 vh100 l0 t0 dg alc jcc" data-status="hidden" style="display: none;">
	<div class="coar3js p bgw br12 pa">
		<div class="ncbfauf1 ab w16 h16 c" title="<?= $languagesLCSLCP[$selectedLanguage]['close'];?>" onclick="ccancel_0()"><!--icon--></div>
		<div class="coar4 w100 f18">
			<?= $languagesLCSLCP[$selectedLanguage]['report_an_infringement'];?>
		</div>
		<!--START-->
			<textarea type="text" class="complain_article_js cTa mt20 p br4 pa10 w100"></textarea>
			<div class='ctp0 w100 mt10 f14'>
				<?= $languagesLCSLCP[$selectedLanguage]['CRAI_p1'];?>
			</div>
		<!--END-->
		<!--START-->
			<input type="submit" class="id_btn_complain_js sendco0 h32 mt20 w100 br4 f14 c" value="<?= $languagesLCSLCP[$selectedLanguage]['complain'];?>" onclick='send_complain_to_server()'>
			<input type="submit" class="sendco1 w100 p br4 bgw f14 h32 mt10 c" onclick="ccancel_0()" value="<?= $languagesLCSLCP[$selectedLanguage]['cancel'];?>">
		<!--END-->
	</div>
</div>