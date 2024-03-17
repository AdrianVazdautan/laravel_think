<?php
	require_once "src/languagesSidebarLeft.php";
?>
<!--START : SIDEBAR LEFT-->
	<div class='sijs ab h100'>
		<!--START : SIDEBAR-LEFT-BUTTONS (HOME/SUBSCRIPTIONS/LIKES/HISTORY)-->
			<div class="sid pf wi h100">
				<div class="home_sb_button_id_js bth ab t bhn1o bhs1 bhn1ojs c" onclick="goToFeed()">
					<div class="bt0 b0 f10 p u">
						<?php echo $languagesSidebarLeft[$selectedLanguage]['Home'];?>
					</div>
				</div>
				<div class="btl ab btn c t bLjs" onclick="showPopUpInrerfaceLikes()">
					<div class="bt0 b0 f10 p u">
						<?php echo $languagesSidebarLeft[$selectedLanguage]['Likes'];?>
					</div>
				</div>
				<!--START : enabled_version: mobile-->
					<div class="bh_mobile_add_new_article bgnr wi db ab btn c t bHjs desktop_none" title="" onclick="addTheArticle()">
						<div class="bt0 b0 f10 p u">
							
						</div>
					</div>
				<!--END-->
				<div class="bh bgnr wi db ab btn c t bHjs" title="Historic" onclick="showPopUpInrerfaceHistory()">
					<div class="bt0 b0 f10 p u">
						<?php echo $languagesSidebarLeft[$selectedLanguage]['Historic'];?>
					</div>
				</div>
				<div class="bc db bgnr wi ab btn c t bCjs" title="Chat" onclick="showPopUpInrerfaceChat()">
					<div class="bt0 b0 f10 p u">
						Chat
					</div>
				</div>
				<?php require_once "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-likes/likes.php"?>
				<?php require_once "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-chat/chat.php"?>
				<?php require_once "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-history/history.php"?>
			</div>
		<!--END-->
		<!--START : Shadow for nav-->
			<div class="hshdw pf naveljs"><!--Shadow--></div>
		<!--END-->
	</div>
<!--END-->