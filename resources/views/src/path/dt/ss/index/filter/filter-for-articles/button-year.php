<?php require_once "src/languages.php";?>

<!--START : Year : Button-->
	<div class="p l ml15 mt20 mr40 mobile_w100 mobile_ml0">
		<!--START-->
			<div class="id_btn_filter_by_nr_7_from_8_js id_btn_f_js rffanr2 h30 lh30 pal10 par10 sh u bgw l c f14 br50 btn7js bcijs mobile_w100" data-status="0" onclick="filter_nr_2('7'); filter_nr_2_ajax_load()">
				<!--START Button: Title-->
					<?php echo $languages[$selectedLanguage]['Year'];?>
				<!--END-->
			</div>
		<!--END-->
		<!--START Loading-->
			<div class="w100 ab dg alc jcc h30 filtLdjs none">
				<?php require_once "src/loading.php"; ?>
			</div>
		<!--END-->
	</div>
<!--END-->