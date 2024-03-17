<?php require_once "src/languages.php";?>
<!--START-->
	<div class="aPUMjs ab f14 br12 bgw pat10 pab10 none">
		<!--START My profile-->
			<div class="apumb u w100 h35 pal10 par10 c" onclick="goToProfile(<?php echo $_SESSION['user']['id'];?>,`<?php echo $_SESSION['user']['nickname'];?>`)">
				<div class="apumb1 p l bgsz16 bgnr mpi1"><!--icon--></div>
				<div class="p l lh35">
					<?= $languagesUserMenu[$selectedLanguage]['myProfile'];?>
				</div>
			</div>
		<!--End-->
		<div class="mt5 mb5 w100 h1 pal par"><div class="bgws w100 h1"><!--hr--></div></div>
		<!--START Dark theme-->
			<div class="apumb u w100 h35 pal10 par10 c none" onclick="changeAppearance()">
				<div class="id_appearance_user_menu_icon apumb1 p l bgsz16 bgnr mpi2"><!--icon--></div>
				<div class="p l lh35">
					<!--START Dark Theme-->
						<div class="id_btn_user_menu_dark_js">
							<?= $languagesUserMenu[$selectedLanguage]['darkTheme'];?>
						</div>
					<!--END-->
					<!--START Light Theme-->
						<div class="id_btn_user_menu_light_js none">
							<?= $languagesUserMenu[$selectedLanguage]['lightTheme'];?>
						</div>
					<!--END-->
				</div>
			</div>
		<!--END-->
		<!--START Settings-->
			<div class="apumb u w100 h35 pal10 par10 se wPPcjs c" onclick="uMWPU('0')">
				<div class="apumb1 p l bgsz16 bgnr mpi4"><!--icon--></div>
				<div class="p l lh35">
					<?= $languagesUserMenu[$selectedLanguage]['settings'];?>
				</div>
			</div>
		<!--END-->
		<!--START Help-->
			<a href="help.php">
				<div class="apumb u w100 h35 pal10 par10 he wPPcjs">
					<div class="apumb1 p l bgsz16 bgnr mpi6"><!--icon--></div>
					<div class="p l lh35">
						<?= $languagesUserMenu[$selectedLanguage]['help'];?>
					</div>
				</div>
			</a>
		<!--END-->
		<div class="mt5 mb5 w100 h1 pal par"><div class="bgws w100 h1"><!--hr--></div></div>
		<!--START Sign out-->
			<div class="apumb u w100 h35 pal10 par10 c" onclick="logOut()">
				<div class="apumb1 p l bgsz16 bgnr mpi7"><!--icon--></div>
				<div class="p l lh35">
					<?= $languagesUserMenu[$selectedLanguage]['signOut'];?>
				</div>
			</div>
		<!--END-->
	    <div class="pusermenu pudo ab"><div class="pude bgw ab"><!--icon--></div></div>
	</div>
<!--END-->