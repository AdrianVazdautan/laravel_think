<?php
		require "../../../../../sidebar-home-articles/src/languagesTime.php";
		require "../../../../../sidebar-home-articles/src/languagesArticle.php";
	$tsw = date('s')."0";
	#START : Get avatar.png
		#Get avatar, background, and nickname using ID
		    $query = mysqli_query($connect, "
		        SELECT avatar, background, nickname
		        FROM users
		        WHERE nickname = '".$c_usernameOrNickname."'
		    ");
		    
		    if($profile_user = mysqli_fetch_assoc($query)){
		        $isp_Avatar     = $profile_user['avatar'];
		    }
		#Check if image is NOT stored in BD
		    if($isp_Avatar == ""){
		    	$Show_Avatar = "<div class='p l dg alc jcc br50 cw' style='background: blue; width: 24px; height: 24px;'>".substr($c_usernameOrNickname, 0, 1)."</div>";
		    } 
		#Check if image is stored in BD
			else if($isp_Avatar != "" && $isp_Avatar != NULL){
				#START : Obtain image_name.png from bd
					/*Query->*/ $query_image_name = mysqli_query($connect, "SELECT avatar FROM users WHERE nickname='".$c_usernameOrNickname."'");
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
		    //echo $Show_Avatar;
	#END
	$myArticleReplyJSON = array(
		"status" => "5",
		"markup" => "
			<!--START REPLY-->
			<div class='ccr22 cc1ID".$artID.$tsw."'>
				<!--START : AVATAR-->
					<div class='ccr3'>
						".$Show_Avatar."
					</div>
				<!--END-->
				<!--START COMMENTATOR-NICKNAME-->
					<div class='ccr4 reval".$artID.$tsw."' onclick='wshowUserProfile(\"Vazdautan Adrian\")'>
						".$c_usernameOrNickname."
					</div>
				<!--END-->
				<!--START DATE-PUBLICATION-->
					<div class='ccr5'>
						".$languagesTime[$selectedLanguage]['Now']."
					</div>
				<!--END-->
				<!--START TEXT-OF-REPLY-->
					<div class='cc6'>
						".$commentID."
					</div>
				<!--END-->
				<div class='ccr7 pal24'>
					<!--START : Button(Like)-->
						<div class='ccr7w'>
							<div class='ccr8 dg alc jcc glfcReplyID".$artID.$tsw."' data-status='0' onclick='giveLikeForReply(".$artID.$tsw.")'>
								<div class='w16 h16 p'>
									<div class='cwcpi31 bgsz16 w16 h16 ab glfcReply1ID".$artID.$tsw." none'><!--liked-1--></div>
									<div class='cwcpi3 bgsz16 w16 h16 ab glfcReply0ID".$artID.$tsw."'><!--liked-0--></div>
								</div>
							</div>
							<div class='ccr9 glfcReplyCountID".$artID.$tsw."'>
								0
							</div>
						</div>
					<!--END-->
					<!--START Button-->
						<div class='ccr10' id='ccr".$artID.$tsw."' data-name='c-1' onclick='respond(".$artID.",`".$c_usernameOrNickname."`)'>
							".$languagesArticle[$selectedLanguage]['Reply']."
						</div>
					<!--END-->
					<!--START Button-->
						<div class='p l'>
							<div class='ccrsb12 p l dg alc jcc c btncID".$artID.$tsw."' onclick='optionsForComment(".$artID.$tsw.")'>
								<div class='ccr12'>
									<div class='ccr13'></div>
									<div class='ccr14'></div>
									<div class='ccr15'></div>
								</div>
							</div>
							<!--START Complain commentary-->
								<div class='sdfcccom ab z1 none sdfcccomID".$artID.$tsw."'>
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
			</div>
		"
	);
?>