<?php require_once "src/languages.php";?>

<!--START : New : Button-->
	<div class="p l mt20 mobile_w100 mobile_mt0">
		<!--START-->
			<div class="id_btn_nr_001_filter_by_new_js id_btn_f_js rffanr2 h30 lh30 pal10 par10 sh u bgw p l c f14 br50 btn1_light_mode_js bcijs mobile_w100" data-status="1" onclick="filter_nr_1('1'); filter_nr_2_ajax_load()">
				<!--START Button: Title-->
					<?php echo $languages[$selectedLanguage]['New'];?>
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