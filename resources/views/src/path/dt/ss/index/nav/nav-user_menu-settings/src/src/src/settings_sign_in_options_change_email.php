<div class="changeemailjs pf w100 h100 dg alc jcc l0 t0" data-status="open" style="display: none;">
	<div class="email2js p bgw br12">
		<div class="cadn3 p t0 l0 pa">
			<!--START : Form 1-->
				<div class="step_1_change_email_js p l">
					<!--START : Title-->
						<div class="cadn5 p l f18">
							Change email
						</div>
					<!--END-->
					<!--START : Close-->
						<div class="p l w16">
							<div class="cadn41 p r w16 h16 c" title="Close" onclick="emailclose()"></div>
						</div>
					<!--END-->
					<!--START : Current password-->
						<div class="p l mt20 w100 f14 fw">
							Current password
						</div>
						<input type="password" class="r_email_current_password_js mt10 w100 br4 h32 pal10 risbs oun" onclick="redisbs_r_email_current_password()" data-error="1">
						<div class="mt10 w100 f14 cr err_r_email_current_password_js"></div>
					<!--END-->
					<!--START : New email-->
						<div class="mt20 w100 f14 fw">
							New email address
						</div>
						<input type="email" class="r_new_email_js mt10 w100 br4 h32 pal10 risbs oun" onclick="redisbs_r_email_new_email()" data-error="1">
						<div class="mt10 w100 f14 cr err_r_new_emailjs"></div>
					<!--END-->
					<!--START : Buttons-->
						<div class="p l w100">
							<input type="submit" class="btn_filter_id_apply_js p l w100 br4 t f14 mt20 cadn101_dark_mode" value="Next" onclick="save_new_email()">
							<input type="submit" class="cadn102 p l w100 bgw br4 t mt10 mb20 f14" value="Cancel" onclick="emailclose()">
						</div>
					<!--END-->
				</div>
			<!--END-->
			<!--START : Form 2. Verification code-->
				<div class="step_2_verification_code_js p l none">
					<!--START : Title-->
						<div class="cadn5 p l f18">
							We sent you a code
						</div>
					<!--END-->
					<!--START : Close-->
						<div class="p l w16">
							<div class="cadn41 p r w16 h16 c" title="Close" onclick="emailclose()"></div>
						</div>
					<!--END-->
					<!--START : Title/Input/Error-->
						<div class="mt20 w100 f14 fw p l">
							Enter it below to verify your email
						</div>
						<input type="text" class="r_verify_code_js mt10 w100 br4 h32 pal10 risbs oun" onclick="redisbs_r_verify_code_()" data-error="1">
						<div class="mt10 w100 f14 cr err_r_verify_code_js"></div>
					<!--END-->
					<!--START : Buttons-->
						<div class="p l w100">
							<input type="submit" class="btn_filter_id_apply_js p l w100 br4 t f14 mt20 cadn101_dark_mode" value="Verify" onclick="verify_email_using_code()">
							<input type="submit" class="cadn102 p l w100 bgw br4 t mt10 mb20 f14" value="Cancel" onclick="emailclose()">
						</div>
					<!--END-->
				</div>
			<!--END-->
		</div>
	</div>
</div>