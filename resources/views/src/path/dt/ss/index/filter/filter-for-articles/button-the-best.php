<?php require_once "src/languages.php";?>

<!--START : The best : Button-->
	<div class="p l ml15 mt20 mobile_w100 mobile_ml0">
		<!--START-->
			<div class="id_btn_nr_002_filter_by_best_js id_btn_f_js rffanr2 h30 lh30 pal10 par10 sh u bgw l c f14 br50 btn2js bcijs mobile_w100" data-status="0" onclick="filter_nr_1('2'); filter_nr_2_ajax_load()">
				<!--START Button: Title-->
					<?php echo $languages[$selectedLanguage]['TheBest'];?>
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