<?php
	require_once "src/languages_settings_language.php";
?>
<!--START : Lanugages : Settings-->
	<div class="swppw-2">
		<!--START : Title-->
			<div class="swppw21 p l">
				<div class="p l">
					<div class="p l f16">
						<?= $languagesSettingsLanguage[$selectedLanguage]['language'];?>
					</div>
					<div class="ab w100 spsinni"><!--icon--></div>
				</div>
			</div>
		<!--END-->
		<!--START : List : Languages-->
			<div class="swppw-2-2 pal">
				<select class="f14 settings_change_language_ausl_js mobile_w100" name="" id="" style="border: none;">
					<option class="id_slscla_js" value="English">
						<?= $languagesSettingsLanguage[$selectedLanguage]['english_US'];?>
					</option>
					<option class="id_slscla_js" value="Spanish">
						<?= $languagesSettingsLanguage[$selectedLanguage]['spanish'];?>
					</option>
					<option class="id_slscla_js" value="French">
						<?= $languagesSettingsLanguage[$selectedLanguage]['french'];?>
					</option>
					<option class="id_slscla_js" value="Turkish">
						<?= $languagesSettingsLanguage[$selectedLanguage]['turkish'];?>
					</option>
					<option class="id_slscla_js" value="Portuguese">
						<?= $languagesSettingsLanguage[$selectedLanguage]['portuguese'];?>
					</option>
					<option class="id_slscla_js" value="Romanian">
						<?= $languagesSettingsLanguage[$selectedLanguage]['romanian'];?>
					</option>
					<option class="id_slscla_js" value="Dutch">
						<?= $languagesSettingsLanguage[$selectedLanguage]['dutch'];?>
					</option>
					<option class="id_slscla_js" value="Polish">
						<?= $languagesSettingsLanguage[$selectedLanguage]['polish'];?>
					</option>
					<option class="id_slscla_js" value="Ukrainian">
						<?= $languagesSettingsLanguage[$selectedLanguage]['ukrainian'];?>
					</option>
				</select>
			</div>
		<!--END-->
	</div>
<!--END-->