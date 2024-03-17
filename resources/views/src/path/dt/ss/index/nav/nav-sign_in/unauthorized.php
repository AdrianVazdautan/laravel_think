<?php require_once "src/languagesCnct.php";?>
<div class="uunr1js pf r w100 h100 l0 t0 dg jcc alc" data-status='hidden' style="display: none;">
	<div class="uunr2 p bgw br12 uunr2js">
		<div class="uunr3 w100 f24 pa">
			<form action="">
				<!--START-->
					<div class="uunr321 ab c h16 w16" onclick="cuunr1()" title="<?php echo $languagesCnct[$selectedLanguage]['Close'];?>"><!--icon--></div>
				<!--END-->
				<!--START-->
					<div class="w100 mb20 f18">
						<?php echo $languagesCnct[$selectedLanguage]['SignIn'];?>
					</div>
				<!--END-->
				<!--START-->
					<div class="pun w100 f14">
						<?php echo $languagesCnct[$selectedLanguage]['UsernameOrEmail'];?>
					</div>
					<input type="text" class="c_l_usernamejs w100 br4 mt10 risbs" name="username" autocomplete="on" onkeydown="signInhandleKeyPress(event, 0)" onclick="redisbs_c_username(0)">
					<div class="mt10 w100 f14 cr err_c_usernamejs none"></div>
				<!--END-->
				<!--START-->
					<div class="pp w100 f14 mt20">
						<?php echo $languagesCnct[$selectedLanguage]['Password'];?>
					</div>
					<input type="password" class="c_k_passwordjs w100 br4 mt10 risbs" name="password" onkeydown="signInhandleKeyPress(event, 0)" onclick="redisbs_c_password(0)">
					<div class="mt10 w100 f14 cr err_c_passwordjs"></div>
				<!--END-->
				<!--START-->
					<input type="button" class="btn_PUWC_signin_nr_2_js signin_appearance_light_nr_2 ib p w100 br4 f14 mt20 c" onclick="authorizeUser(0)" value="<?php echo $languagesCnct[$selectedLanguage]['SignIn'];?>">
				<!--END-->
				<!--START-->
					<div class="pfpjs w100 f14 mt20 c u" onclick="forgotPasswordWindow()">
						<?php echo $languagesCnct[$selectedLanguage]['RecoverAccess'];?>
					</div>
					<div class="prjs c mt10 f14 w100 u" onclick="registrationWindow()">
						<?php echo $languagesCnct[$selectedLanguage]['CreateAccount'];?>
					</div>
				<!--END-->
			</form>
		</div>
	</div>
</div>