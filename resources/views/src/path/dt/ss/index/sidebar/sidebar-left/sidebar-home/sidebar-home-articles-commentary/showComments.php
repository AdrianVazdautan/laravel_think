<?php
	#Show commentaryes : after click on button commentaryes
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
	require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
	require_once "../sidebar-home-articles/src/languagesArticle.php";
	#START : AJAX
		$artID                        = $_POST["id"];
		$showedAlreadyCountOfComments = $_POST["showedAlreadyCountOfComments"] ?? 0;
		$IDWWRA                       = $_POST["IDWWRA"];#Which page is opened
		$type_of_article              = $_POST["type_of_article"] ?? null;#Type of article; 1 : standart; 2 : extended
	#END
	#START : type of article
		#Standart
			if($type_of_article == "1"){
				$type_of_query_TOA = "
					SELECT *
					FROM articles_commentary 
					WHERE artID='$artID' AND type_of_comment='0' LIMIT 5 OFFSET $showedAlreadyCountOfComments;
				";
			} 
		#Extended
			else if($type_of_article == "2"){
				$type_of_query_TOA = "
					SELECT *
					FROM articles_commentary 
					WHERE artID='$artID' AND type_of_comment='0';
				";
			}
	#END
	$request = mysqli_query($connect,"
		$type_of_query_TOA;
	");
	
	while($article = mysqli_fetch_assoc($request)){
		/*Include time*/require_once "../sidebar-home-articles/time.php";
		echo
		"
		<!--START : COMMENTARY-->
			<div class='cc1 cc1ID".$artID.$IDWWRA."'>
				<div class='ccr2 p l'>
					<!--START : AVATAR-->
						<div class='ccr3'>";
							#Get avatar, background, and nickname using ID
							    $query = mysqli_query($connect, "
							        SELECT avatar, background, nickname
							        FROM users
							        WHERE nickname = '".$article['nickname']."'
							    ");
							    
							    if($profile_user = mysqli_fetch_assoc($query)){
							        $isp_Avatar     = $profile_user['avatar'];
							    }
							#Check if image is NOT stored in BD
							    if($isp_Avatar == ""){
							    	$Show_Avatar = "<div class='p l dg alc jcc br50 cw' style='background: blue; width: 24px; height: 24px;'>".substr($article['nickname'], 0, 1)."</div>";
							    } 
							#Check if image is stored in BD
								else if($isp_Avatar != "" && $isp_Avatar != NULL){
									#START : Obtain image_name.png from bd
										/*Query->*/ $query_image_name = mysqli_query($connect, "SELECT avatar FROM users WHERE nickname='".$article['nickname']."'");
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
							    echo $Show_Avatar;
							echo "
						</div>
					<!--END-->
					<!--START : COMMENTATOR-NICKNAME-->
						<div class='ccr4' onclick='wshowUserProfile(".$article['commentatorID'].",`".$article['nickname']."`)'>
							".$article['nickname']."
						</div>
					<!--END-->
					<!--START : DATE-PUBLICATION-->
						<div class='ccr5'>
							"; echo getTimeAgo($article['dateofpublication']); echo "
						</div>
					<!--END-->
				</div>	
				<div class='cc6'>
					".$article['commentaryText']."
				</div>	
				<div class='ccr7 pal24'>
					<!--START : Button-->
						<div class='ccr7w'>";
							if(session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['user'])){
							    #Ваш код, который зависит от сессии пользователя
								    /*
										bd                    : like-for-commentary-from-article
										$article['id']        : id_of_commentary
										$likeCommentaryStatus : likeZeroOrOne
										$likeCommentaryCount  : COUNT(*) from id_of_commentary
									*/
										$userNickname = $_SESSION["user"]["nickname"];
									#Получение значения likeCommentaryStatus
										$queryStatus = mysqli_query($connect, "
										    SELECT likeZeroOrOne
										    FROM `like_for_commentary_from_article`
										    WHERE id_of_commentary=".$article['id']." AND nickname='$userNickname';
										");
										if ($statusRow = mysqli_fetch_assoc($queryStatus)) {
										    $likeCommentaryStatus = $statusRow['likeZeroOrOne'];
										} else {
										    $likeCommentaryStatus = 0; #Значение по умолчанию, если запись не найдена
										}
									#Получение суммы всех лайков на комментарии с id равным $article['id']
										$queryCount = mysqli_query($connect, "
										    SELECT COUNT(*) AS likeCount
										    FROM `like_for_commentary_from_article`
										    WHERE id_of_commentary=".$article['id']." AND likeZeroOrOne='1' AND type_of_comment='0'
										");
										if ($countRow = mysqli_fetch_assoc($queryCount)) {
										    $likeCommentaryCount = $countRow['likeCount'];
										} else {
										    $likeCommentaryCount = 0; #Значение по умолчанию, если записи не найдены
										}
									#Check if like exist 
										if($likeCommentaryStatus == 1){
											$likeCommentaryHTML = "
												<div class='cwcpi31 bgsz16 w16 h16 ab glfc1ID".$article['id'].$IDWWRA."'><!--liked-1--></div>
												<div class='cwcpi3 bgsz16 w16 h16 ab glfc0ID".$article['id'].$IDWWRA." none'><!--liked-0--></div>
											";
											#Update value for data-status
												$likeCommentaryDataStatus = 1;
										}
									#Check if like NOT exist
										elseif($likeCommentaryStatus == 0){
											$likeCommentaryHTML = "
												<div class='cwcpi31 bgsz16 w16 h16 ab glfc1ID".$article['id'].$IDWWRA." none'><!--liked-1--></div>
												<div class='cwcpi3 bgsz16 w16 h16 ab glfc0ID".$article['id'].$IDWWRA."'><!--liked-0--></div>
											";
											#Update value for data-status
												$likeCommentaryDataStatus = 0;
										}
							} else {
								#Получение суммы всех лайков на комментарии с id равным $article['id']
									$queryCount = mysqli_query($connect, "
									    SELECT COUNT(*) AS likeCount
									    FROM `like_for_commentary_from_article`
									    WHERE id_of_commentary=".$article['id']." AND likeZeroOrOne='1'
									");
									if($countRow = mysqli_fetch_assoc($queryCount)){
									    $likeCommentaryCount = $countRow['likeCount'];
									} else {
									    $likeCommentaryCount = 0; #Значение по умолчанию, если записи не найдены
									}
									$likeCommentaryHTML = "
										<div class='cwcpi31 bgsz16 w16 h16 ab glfc1ID".$article['id'].$IDWWRA." none'><!--liked-1--></div>
										<div class='cwcpi3 bgsz16 w16 h16 ab glfc0ID".$article['id'].$IDWWRA."'><!--liked-0--></div>
									";
									#Update value for data-status
										$likeCommentaryDataStatus = 0;
							}

							echo "
							<div class='ccr8 dg alc jcc glfcID".$article['id'].$IDWWRA."' data-status='".$likeCommentaryDataStatus."' onclick='giveLikeForComment(".$article['id'].$IDWWRA.")'>
								<div class='w16 h16 p'>
									".$likeCommentaryHTML."
								</div>
							</div>
							<div class='ccr9 glfcCommentCountID".$article['id'].$IDWWRA."'>
								".$likeCommentaryCount."
							</div>
						</div>
					<!--END-->
					<!--START : Button-->
						<div class='ccr10 ccr10o-1' id='ccr".$article['id'].$IDWWRA."' onclick='respond(".$article['id'].$IDWWRA.",`".$article['nickname']."`)' data-status='0'>
							".$languagesArticle[$selectedLanguage]['Reply']."
						</div>
					<!--END-->
					<!--START : Button-->
						<div class='p l'>
							<div class='ccrsb12 p l dg alc jcc c btncID".$article['id'].$IDWWRA."' onclick='optionsForComment(".$article['id'].$IDWWRA.")'>
								<div class='ccr12'>
									<div class='ccr13'></div>
									<div class='ccr14'></div>
									<div class='ccr15'></div>
								</div>
							</div>
							<!--START : Complain commentary-->
								<div class='sdfcccom ab z1 none sdfcccomID".$article['id'].$IDWWRA."'>
									<div>
										<div class='pudorWPU ab w20'><div class='pudeb ab bgw'><!--icon--></div></div>
									</div>
									<div class='sdfcccom2 p l br12 pat10 pab10'>
										<div>
											<div class='buufjs aC c h40' onclick='unauthorized(0), complain(0)'>
								            	<!--START : Icon-->
										            <div class='ac1 p l h40 w16 dg alc'>
										        		<img class='ac1ico' src='../src/du/icon/forbbiden.png'>
										            </div>
								        		<!--END-->
									        	<!--START : Title-->
											        <div class='p l pal10 h40 lh40 arcm'>
											        	Complain
											        </div>
									            <!--END-->
									        </div>
										</div>
									</div>
								</div>
							<!--END-->
						</div>
					<!--END-->
				</div>
				<div class='cmr7-place_0 cmrp".$article['id'].$IDWWRA."'>
					<div class='cmr7p_1 cmr7p".$article['id'].$IDWWRA."'>
						"; /*Include replyes->*/ require "src/showReplyes.php"; 
						echo "
					</div>
					<div class='cmr7p_1 cmr7pReplyID".$article['id'].$IDWWRA."'></div>
				</div>
				<div class='cmr7p_1 p l f14 mt10 cmr7pReplyShowMoreID".$article['id'].$IDWWRA." none'>
					<div class='p l u smrc pal10 par10 sdfrhrID".$article['id'].$IDWWRA." smrcrep' onclick='smrfShowMoreReplyes(".$article['id'].$IDWWRA.")'>
						Show more replyes →
					</div>
				</div>
			</div>
		<!--END-->
		";
	}
    #END
?>