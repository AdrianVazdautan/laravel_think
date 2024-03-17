<?php
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
		$userWhichSignIn = null;
		if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
		    $userWhichSignIn = $_SESSION['user']['nickname'];
		}
		require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
		require "../../../../../sidebar-home-articles/src/languagesTime.php";
		require "../../../../../sidebar-home-articles/src/languagesArticle.php";
		$tsw = date('s');
	#START
		#Get avatar, background, and nickname using ID
		    $query = mysqli_query($connect, "
		        SELECT avatar, background, nickname
		        FROM users
		        WHERE nickname = '".$userWhichSignIn."'
		    ");
		    if($profile_user = mysqli_fetch_assoc($query)){
		        $isp_Avatar     = $profile_user['avatar'];
		    }
		#Check if image is NOT stored in BD
		    if($isp_Avatar == ""){
		    	$Show_Avatar = "<div class='p l dg alc jcc br50 cw' style='background: blue; width: 24px; height: 24px;'>".substr($userWhichSignIn, 0, 1)."</div>";
		    } 
		#Check if image is stored in BD
			else if($isp_Avatar != "" && $isp_Avatar != NULL){
				#START : Obtain image_name.png from bd
					/*Query->*/ $query_image_name = mysqli_query($connect, "SELECT avatar FROM users WHERE nickname='".$userWhichSignIn."'");
					/*Result->*/$query_image_name = $query_image_name->fetch_row();
			        #Check if query was successfull
			            if($query_image_name){
			                #Запрос выполнен успешно 
		    					$Show_Avatar = "<img class='wUI' src='src/du/avatar/". $query_image_name[0] ."'/>";
			            } else {
			                #В случае ошибки
			            }
				#END
		    }
		#Show avatar
	#END
	#START : id of comment by id of article
		$requestIDAC = mysqli_query($connect,"
			SELECT * FROM articles_commentary WHERE artID='$artID' AND type_of_comment='0' ORDER BY id DESC LIMIT 1
		");
		$requestIDAC = $requestIDAC->fetch_row();
		$requestIDAC = $requestIDAC[0];
	#END
	$myArticleCommentaryJSON = array(
		"status" => "5",
		"markup" => "
			<!--START COMMENTARY-->
			<div class='cc1 cc1ID".$requestIDAC."001'>
				<div class='ccr2 p l'>
					<!--START AVATAR-->
						<div class='ccr3'>
							".$Show_Avatar."
						</div>
					<!--END-->
					<!--START COMMENTATOR-NICKNAME-->
						<div class='ccr4' onclick='wshowUserProfile(`Vazdautan Adrian`)'>
							".$c_usernameOrNickname."
						</div>
					<!--END-->
					<!--START DATE-PUBLICATION-->
						<div class='ccr5'>
							".$languagesTime[$selectedLanguage]['Now']."
						</div>
					<!--END-->
				</div>
				<!--START COMMENTARY-->
					<div class='cc6'>
						".$commentID."
					</div>
				<!--END-->	
				<div class='ccr7 pal24'>
					<!--START Button-->
						<div class='ccr7w'>
							<div class='ccr8 dg alc jcc glfcID".$requestIDAC."001' data-status='0' onclick='giveLikeForComment(".$requestIDAC."001)'>
								<div class='w16 h16 p'>
									<div class='cwcpi31 bgsz16 w16 h16 ab glfc1ID".$requestIDAC."001'><!--liked-1--></div>
									<div class='cwcpi3 bgsz16 w16 h16 ab glfc0ID".$requestIDAC."001'><!--liked-0--></div>
								</div>
							</div>
							<div class='ccr9 glfcCommentCountID".$requestIDAC."001'>
								0
							</div>
						</div>
					<!--END-->
					<!--START Button-->
						<div class='ccr10 ccr10o-1' id='ccr".$requestIDAC."001' onclick='respond(".$requestIDAC."001,`".$c_usernameOrNickname."`)' data-status='0'>
							".$languagesArticle[$selectedLanguage]['Reply']."
						</div>
					<!--END-->
					<!--START Button-->
					<div class='p l'>
						<div class='ccrsb12 p l dg alc jcc c btncID".$requestIDAC."001' onclick='optionsForComment(".$requestIDAC."001)'>
							<div class='ccr12'>
								<div class='ccr13'></div>
								<div class='ccr14'></div>
								<div class='ccr15'></div>
							</div>
						</div>
						<!--START Complain commentary-->
							<div class='sdfcccom ab z1 none sdfcccomID".$requestIDAC."001'>
								<div>
									<div class='pudorWPU ab w20'><div class='pudeb ab bgw'><!--icon--></div></div>
								</div>
								<div class='sdfcccom2 p l br12 pat10 pab10'>
									<div>
										<div class='buufjs aC c h40' onclick='unauthorized(0), hidePost(0)'>
											<div class='ac1 p l h40 w16 dg alc'>
												<!--Icon-->
													<img class='ac1ico' src='../src/du/icon/forbbiden.png'>
												<!--Icon-->
											</div>
											<div class='p l pal10 h40 lh40 arcm'>
												<!--Title-->
													Complain
												<!--Title-->
											</div>
										</div>
									</div>
								</div>
							</div>
						<!--END-->
					</div>
					<!--END-->
				</div>
				<div class='cmr7-place_0 cmrp".$requestIDAC."001'>
					<div class='cmr7p_1 cmr7p".$requestIDAC."001'>

					</div>
					<div class='cmr7p_1 cmr7pReplyID".$requestIDAC.$IDWWRA."'></div>
				</div>
			</div>
			<!--END-->
		"
	);
?>