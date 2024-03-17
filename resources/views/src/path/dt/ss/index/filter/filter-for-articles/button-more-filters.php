<?php require_once "src/languages.php";?>

<!--START : More filters-->
	<div class="p l mt20 mobile_none">
		<!--START BUTTON Nr: 1-->
			<div class="id_btn_filter_by_nr_8_from_8_js id_btn_f_js rffanr2 h30 lh30 pal10 par10 sh u bgw p l c f14 br50 btn9js oFBjs" onclick="otherFiltersBtnF()">
				<!--START Button: Title-->
					<?= $languages[$selectedLanguage]['Morefilters'];?>
				<!--END-->
			</div>
		<!--END-->
		<div class="oFPUjs ab bgw br12 f14 none">
			<!--START BUTTON Nr: 2-->
				<div class="aIjs p l w100 c" onclick="chooseAdate()">
			        <div class="aidt1 p l w16 h16 bgsc"><!--ICON--></div>
			        <div class="aidt2 p l u">
			           <?= $languages[$selectedLanguage]['chooseAdate'];?>
			        </div>
			    </div>
			<!--END-->
			<div class="dOF ab"><div class="dEOF"><!--icon--></div></div>
		</div>
	</div>
<!--END-->