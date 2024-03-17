<!--START : nav : Session : true-->
<?php
		if(!$_SESSION["user"]){
			header("Location: index.php");
		}
		require "src/languages.php";
		require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
    #Get avatar, background, and nickname using ID
	    $query = mysqli_query($connect, "
	        SELECT avatar, background, nickname
	        FROM users
	        WHERE id = '".$_SESSION['user']['id']."'
	    ");
	    
	    if($profile_user = mysqli_fetch_assoc($query)){
	        $isp_Avatar = $profile_user['avatar'];
	    }
?>  
	<div class="naveljs pf vw100 h57 l0 z3 df jcc">
		<div class="pvhlzhdj_mobile hm p hmd">
			<div class="dd pf l0 vw100 appearance_nr_1_dual_js"></div>
				<?php require_once "src/path/dt/ss/index/nav/nav-menu/button-menu.php";?>
				<?php require_once "src/path/dt/ss/index/nav/nav-logo/logo.php";?>
				<?php require_once "src/path/dt/ss/index/nav/nav-search/thnk-search.php";?>
				<!--START : Search-->
					<div class="m13 u c mobile_search_button_js" onclick="mobile_search()" style="right: 113px;"><!--SEARCH--></div>
				<!--END-->
				<!--START Button->(Add article) Button->(User menu with logo) Button->(Notify)-->
					<div class="tBjs">
						<!--START : Add new article : Button-->
							<div class="appearance_add_new_article_AANANA_js aa u p l c t cw f14 pal10 par10 mobile_none" id="addqwwd" onclick="addTheArticle()">
								<?= $languagesNav[$selectedLanguage]['addArticle'];?>
							</div>
						<!--END-->
						<!--START AVATAR image-->
							<div class="ajs ua p l c dg alc jcc appearance_nr_2js light_mode_style_001" onclick="show_aua_0()">
								<div class="uan0an-0 u p br50 t f14">
									<?php
										#Check if image is NOT stored in BD
										    if($isp_Avatar == ""){
										    	$Show_Avatar = substr($_SESSION['user']['nickname'], 0, 1);
										    } 
										#Check if image is stored in BD
											else if($isp_Avatar != "" && $isp_Avatar != NULL){
												#START : Obtain image_name.png from bd
													/*Query->*/ $query_image_name = mysqli_query($connect, "SELECT avatar FROM users WHERE nickname='".$_SESSION['user']['nickname']."'");
													/*Result->*/$query_image_name = $query_image_name->fetch_row();
											        #Check if query was successfull
											            if($query_image_name){
											                #Запрос выполнен успешно 
										    					$Show_Avatar = "<img src='src/du/avatar/". $query_image_name[0] ."'/>";
											            } else {
											                #В случае ошибки
											            }
												#END
										    }
										#Show avatar
										    echo $Show_Avatar;
									?>
								</div>
							</div>
						<!--END-->
						<?php require_once "src/path/dt/ss/index/nav/nav-user_menu/user-menu.php";?>
						<!--START : Notification-->
							<div class="tBmjs p l c u appearance_nr_3js" onclick="notifications_f()">
								<?php
										$userWhichSignIn = $_SESSION['user']['nickname'];
									/*Query->*/
										$query_notify_count = mysqli_query($connect, "
											SELECT COUNT(*) 
											FROM notifications 
											WHERE nickname !='$userWhichSignIn' AND 
											author_of_article ='$userWhichSignIn' AND status!='1'
										");
									/*Result->*/$query_notify_count = $query_notify_count->fetch_row();
							        #Check if query was successfull
							            if($query_notify_count){
							                #Запрос выполнен успешно 
						    					if($query_notify_count[0] > 0){
						    						echo "<div class='tBm_count_js ab'>".$query_notify_count[0]."</div>";
						    					}
							            } else {
							                #В случае ошибки
							            }
								?>
							</div>
							<?php require_once "src/path/dt/ss/index/nav/nav-notify/notify.php";?>
						<!--END-->
					</div>
				<!--END-->
			<?php require_once "src/path/dt/ss/index/nav/nav-menu/menu.php";?>
			<?php require_once "src/path/dt/ss/index/nav/nav-user_menu-settings/settings.php";?>
		</div>
		<div class="sjs"></div>
		<!--START LOADING-->
			<div class="id_loading_decor_css_js">
				<div class="id_loading_0p_to_100p_js none"></div>
			</div>
		<!--END-->
	</div>
<!--END : nav : Session : true-->
<div class="m p">
	<div class="rfb0 pf vh100"></div>