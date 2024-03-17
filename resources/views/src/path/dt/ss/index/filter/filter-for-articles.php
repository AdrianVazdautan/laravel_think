<!--START : Mobile Advertisement-->
	<div class='mobile_baner desktop_none'>
		<?php require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/ss/index/sidebar/sidebar-right/ad/ad_mobile.php");?>
	</div>
<!--END-->
<!--START : FILTER FOR ARTICLES [(New/The best) (Day/Week/Month/Year/All time) (More filters)]-->
	<div class="rffanr1js p l mobile_dg_alc_jcc mobile_none">
		<div class="mobile_filter_wrapp">
			<!--START : New/Best-->
				<?php require_once "filter-for-articles/button-new.php";?>
				<?php require_once "filter-for-articles/button-the-best.php";?>
			<!--END-->
			<!--START : Mobile row-->
				<div class="mobile_filter_row">
					<div class="mobile_filter_row_background"></div>
				</div>
			<!--END-->
			<!--START : Day/Week/Month/Year/All time-->
				<?php require_once "filter-for-articles/button-all-time.php";?>
				<?php require_once "filter-for-articles/button-day.php";?>
				<?php require_once "filter-for-articles/button-week.php";?>
				<?php require_once "filter-for-articles/button-month.php";?>
				<?php require_once "filter-for-articles/button-year.php";?>
			<!--END-->
			<!--START : More filters-->
				<?php require_once "filter-for-articles/button-more-filters.php";?>
			<!--END-->
		</div>
	</div>
<!--END-->
<!--START : Mobile Filter-->
	<div class='wfs'>
		<!--START : Mobile Filter-->
			<div class='wfsf br12 u c' onclick="mobile_filter()">
				<div class='wfsf0'></div>
				<div class='wfsf1'>Filter</div>
			</div>
		<!--END-->
		<!--START : Mobile Button sort-->
			<div class='wfss0 br12 u c' onclick='chooseAdate()'>
				<div class='wfss'></div>
			</div>
		<!--END-->
	</div>
<!--END-->