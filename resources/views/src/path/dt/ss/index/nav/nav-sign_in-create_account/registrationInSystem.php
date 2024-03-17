<?php require_once "src/path/dt/ss/index/nav/nav-sign_in-create_account/src/languages.php";?>
<div class="rISjs pf dg alc jcc t0 l0 w100 h100" data-status="hidden" style="display: none;">
	<div class="wSRIS p bgw br12 pa">
		<!--START-->
			<div class="ncbfauf1 ab w16 h16 c" title="<?= $languages[$selectedLanguage]['close'];?>" onclick="rcrw()"></div>
		<!--END-->
		<!--START-->
			<div class="w100 f18">
				<?= $languages[$selectedLanguage]['createYourAccount'];?>
			</div>
		<!--END-->
		<!--START-->
			<div class="mt20 w100 f14 fw">
				<?= $languages[$selectedLanguage]['email'];?>
			</div>
			<input type="email" class="r_emailjs mt10 w100 br4 h32 pal10 risbs oun" onclick="redisbs_r_email()" data-error="1">
			<div class="mt10 w100 f14 cr err_r_emailjs"></div>
		<!--END-->
		<!--START-->
			<div class="mt20 w100 f14 fw">
				<?= $languages[$selectedLanguage]['username'];?> *
			</div>
			<input type="text" class="r_usernamejs mt10 w100 h32 pal10 br4 risbs oun" onclick="r_err_r_username()" name="username" data-error="1">
			<div class="mt10 w100 f14 cr err_r_usernamejs"></div>
		<!--END-->
		<!--START-->
			<div class="mt20 w100 f14 fw">
				<?= $languages[$selectedLanguage]['password'];?> *
			</div>
			<input type="password" class="r_passwordjs mt10 w100 br4 h32 pal10 risbs oun" onclick="rer_r_password()" data-error="1" name="password">
			<div class="mt10 w100 f14 cr err_r_passwordjs"></div>
		<!--END-->
		<!--START-->
			<div class="mt10 l w100 f14">
				<?= $languages[$selectedLanguage]['rules'];?>
			</div>
		<!--END-->
		<!--START-->
			<input type="submit" class="appearance_RIS_js rN mt20 w100 br4 f14 c" value="<?= $languages[$selectedLanguage]['register'];?>" onclick="register()">
			<input type="submit" class="cOr mt10 w100 br4 bgw f14 c" onclick="rcrw()" value="<?= $languages[$selectedLanguage]['cancel'];?>">
		<!--END-->
	</div>
</div>