<?php
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
	#START POST RESPONSES
		$article_id      = $_POST['article_id'];	
		$type_of_article = $_POST["type_of_article"] ?? null;#Type of article; 1 : standart article; 2 : Extended article;
	#END
	#START PROCESING
		#Check if $article_id is empty
		    if($article_id == ""){
		        #ERROR NR: 001
		        	echo '1';
		        	exit();
		    } 
	    #Check if $article_id is NOT empty
		    else if($article_id != ""){
		        #Check if $article_id is NOT a number type
			        if(is_numeric($article_id) == false){
			            #ERROR NR: 002
			            	article_not_found_ANFOIUA();
			            	exit();
			        } 
		        #Check if $article_id is a number type
			        else if(is_numeric($article_id) == true){
			            /*Run function which works with database->*/ RFWWWD($article_id, $type_of_article);
			        }
		    }
	    #END
	    #Function which works with database
	    	function RFWWWD($article_id, $type_of_article){
		        #Connect to DB
		        	require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
		        #Check if the connection was successful
			        if($connect){
			            #1: Get code using ID
				            $_1_GTOEA_get_code = mysqli_query($connect, "
					            SELECT code FROM `articles100percent`
					            WHERE id='$article_id' AND status = '0'
				        	");
			            #If went well
				            if($_1_GTOEA_get_code){
				                #Getting result
				                	$_1_obtained_code = $_1_GTOEA_get_code->fetch_row();
				                #Check if query was well
					                if($_1_obtained_code){
					                    $code_value = $_1_obtained_code[0];
					                    #echo "Значение кода: $code_value";
					                    	FWWGFATTOATCFADDOOA_($connect, $code_value, $article_id, $type_of_article);
					                } 
				                #Something went wrong
					                else {
					                    article_not_found_ANFOIUA();
					                    exit();
					                }
				            }
			            #Well wrong
				            else {
				                echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connect);
					            exit();
				            }
		        	}
		        #Connection failed, handle the error
			        else {
			            die("Connection failed: " . mysqli_connect_error());
			            exit();
			        }
		    }
		#0 : Article not found or invalid URL address
		    function article_not_found_ANFOIUA(){
		    	echo "0";
		    }
	    #1 : Function which will get from articles100percent : title(Title of article), textarea(Content from article), dateofpublication(Date of publication of article)
		    function FWWGFATTOATCFADDOOA_($connect, $article_code, $article_id, $type_of_article){	
			    	global $_VALUE_Title_;
			    	global $_VALUE_Textarea_;
			    	global $_VALUE_Nickname_;
			    	global $_VALUE_DateP_;
			    #Check if article was not hided by user
			    	#Session : true
		    			if(isset($_SESSION['user'])){
		    					$userWhichSignIn_c = null;
								if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
								    $userWhichSignIn_c = $_SESSION['user']['nickname'];
								}
							#Show with checking
					    		$id_of_article_fh_c = $article_id;
					    		$query_fh_c = mysqli_query($connect, "SELECT count(*) FROM hided WHERE id_of_article_which_is_hided='$id_of_article_fh_c' AND nickname='$userWhichSignIn_c'");
					    		$query_fh_c = $query_fh_c->fetch_row();
					    	#Check : if is hided
					    		if($query_fh_c[0] == "1"){
					    			article_not_found_ANFOIUA();
					    			exit();
					    		}
						}
			    #END
		        #GET : title, textarea
			        $_2_GTT = mysqli_query($connect, "
				        SELECT nickname, title, textarea, dateofpublication FROM `articles100percent`
				        WHERE code='$article_code'
				    ");
		        #If went well
			        if($_2_GTT){
			            #Getting result
			            	$_2_obtained_Title_Textarea = $_2_GTT->fetch_row();
			            #Check if query was well
				            if($_2_obtained_Title_Textarea){
				                $_VALUE_Nickname_ = $_2_obtained_Title_Textarea[0];
				                $_VALUE_Title_    = $_2_obtained_Title_Textarea[1];
				                $_VALUE_Textarea_ = $_2_obtained_Title_Textarea[2];
				                $_VALUE_DateP_    = $_2_obtained_Title_Textarea[3];
				                #Do something with the result here
				            } 
			            #Something went wrong
				            else {
				                echo "Данные не найдены.";
				                exit();
				            }
			        }
		        #Well wrong
			        else {
			            echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connect);
			            exit();
			        }
		    }
			#START Time
				require "../../time.php";
				$fullDateTimeFromBD = substr($_VALUE_DateP_, 0, 19);
			#END
	#END
	#START 1: Avatar/Widget
		#START VARIABLES
			$_1_AW_onmouseover_show_avatar_window_js_ = "0";
			$_1_AW_onmouseout_hiden_avatar_window_js_ = "0";
			$_1_AW_img_avatar_src_                    = "src/du/avatar/adrian.jpg";#Avatar of author
			$_1_AW_Author_Nickname_                   = "";
			$_1_AW_date_of_registration_              = "";
			$_1_AW_subscribe_                         = "";
			$_1_AW_username_                          = $_VALUE_Nickname_;
			$_1_AW_date_                              = getTimeAgo($fullDateTimeFromBD);#Date of publication
			$_1_AW_wshowUserProfile_                  = "";
			$_1_AW_rowWindowPopUpFunction_            = "0";#Complain | Hide article
			$_1_AW_count_publications_                = "";
			$_1_AW_publications_                      = "";
			$_1_AW_count_commentaryes_                = "";
			$_1_AW_commentaryes_                      = "";
			$_1_AW_count_subscribers_                 = "";
			$_1_AW_subscribers_                       = "";
			$_1_AW_count_rating_                      = "";
			$_1_AW_rating_                            = "";
		#END
		#START __MAIN__
			$_1_AW__MAIN__Avatar_Widget_ = "
			<!--START 1 : Avatar/Widget-->
				<div class='roW1 w100'>
					<!--START : Author avatar/widget-->
						<div class='p l'>
							<!--START : Avatar-->
								<div class='widgetcommentid'>";
										#Connect to DB
		        							require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
										#Get avatar, background, and nickname using ID
										    $query = mysqli_query($connect, "
										        SELECT avatar, background, nickname
										        FROM users
										        WHERE nickname = '".$_1_AW_username_."'
										    ");
										    
										    if($profile_user = mysqli_fetch_assoc($query)){
										        $isp_Avatar     = $profile_user['avatar'];
										    }
										#Check if image is NOT stored in BD
										    if($isp_Avatar == ""){
										    	$Show_Avatar = "<div class='p l dg alc jcc br50 cw' style='background: blue; width: 24px; height: 24px;'>".substr($_1_AW_username_, 0, 1)."</div>";
										    } 
										#Check if image is stored in BD
											else if($isp_Avatar != "" && $isp_Avatar != NULL){
												#START : Obtain image_name.png from bd
													/*Query->*/ $query_image_name = mysqli_query($connect, "SELECT avatar FROM users WHERE nickname='".$_1_AW_username_."'");
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
										#START : Obtain user id by nickname $_1_AW_username_
										    /*Query->*/ $query_user_id = mysqli_query($connect, "SELECT id FROM users WHERE nickname='$_1_AW_username_'");
											/*Result->*/$query_user_id = $query_user_id->fetch_row();
									        #Check if query was successfull
									            if($query_user_id){
									                #Запрос выполнен успешно 
								    					$user_id_is = $query_user_id[0];
									            } else {
									                #В случае ошибки
									            }
										#END
									echo "
								</div>
							<!--END-->
						</div>
					<!--END-->
					<!--START : Username-->
						<div class='p l'>
							<div class='h24 dg alc ml10 f14 c aas wsupjs' onclick='wshowUserProfile(`".$user_id_is."`,`".$_1_AW_username_."`)'>
								<p class='author_of_article_js'>".$_1_AW_username_."</p>
							</div>
						</div>
					<!--END-->
					<!--START : Date-->
						<div class='h24 dg alc p l ml10 f14 cs'>
							".$_1_AW_date_."
						</div>
					<!--END-->
					<!--START : Button-->
						<!--START-->
							<div class='p r h30 w30 dg alc jcc br50 c cw4srtm cw4srtmnrExtended' onclick='show_popup_hide_tellwhy_complain_js()'>
								<div class='cW4SRTMjs'>
									<div class='dC1'><!--icon--></div>
									<div class='dC2'><!--icon--></div>
									<div class='dC3'><!--icon--></div>
								</div>
							</div>
						<!--END-->
					<!--END-->
				</div>
			<!--END-->";
		#END
	#END
	#START 2: Title
		#START VARIABLES
			$_2_Title_ = $_VALUE_Title_;
		#END
		#START __MAIN__
			$_2_Title__MAIN__ = "   
			<!--START 2 : Title-->
				<div class='show_article_in_extended_mode_js f24 mt20 c fw articleLink'>
					".$_2_Title_."
				</div>
			<!--END-->";
		#END
	#END
	#START 3: Content
		#START VARIABLES
			$_3_Content_TEXT_ = $_VALUE_Textarea_;
		#END
		#START __MAIN__
			$_3_Content__MAIN__ = " 
			<!--START 3 : Content-->
				<div class='rW5 p l w100 mt20 f18'>
					".$_3_Content_TEXT_."
				</div>
			<!--END-->";
		#END
	#END
	#START 4: Button (show more)
		#START VARIABLES
			//nothing yet
		#END
		#START __MAIN__
			$_4_Button__MAIN__ = "  
			<!--START 4 : Button-->
				<div class='wGTRjs w100 p l mt20 wgtrbtnID0 none'>
					<button class='wGTR p l f14 fw c shg' onclick='showAll()'>
						Continuă Lectura →
					</button>
				</div>
			<!--END-->";
		#END
	#END
	#START 5: Comment/Like/Share
		#START VARIABLES
			#5.1 : SHOW count of likes
				#Connect to DB
        			require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
				$countActualLikes = mysqli_query($connect, "
			        SELECT count(*) 
			        FROM liked 
			        WHERE id_of_article='$article_id'
			    ");
			    $cal                    = $countActualLikes->fetch_row();
				$show_count_of_likes_ex = $cal[0];
			#5.2 : SHOW icon of like by type
				#5.2.1 : session : true
					if(isset($_SESSION["user"]) && !empty($_SESSION["user"])){
						#Required
							$userWhichSignInEx = $_SESSION['user']['nickname'];
						#Connect to DB
		        			require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
						#Check if the user has set a like
					        $checkLikeStatus = mysqli_query($connect, "
					            SELECT Liked 
					            FROM liked 
					            WHERE id_of_article = '$article_id' 
					                AND nickname = '$userWhichSignInEx' 
					            ORDER BY dateofpublication DESC 
					            LIMIT 1
					        ");
					        $cLS = $checkLikeStatus->fetch_row();
					        if($cLS && isset($cLS[0]) && $cLS[0] == 0){
					            $show_icon_of_like_by_type = "<div class='cwcpi3 bgsz16 w16 h16 hdsjsID".$article_id."012' data-status='0'><!--liked-0--></div>";
					        } elseif($cLS && isset($cLS[0]) && $cLS[0] == 1){
					            $show_icon_of_like_by_type = "<div class='cwcpi31 bgsz16 w16 h16 hdsjsID".$article_id."012' data-status='1'><!--liked-1--></div>";
					        } else {
					        	$show_icon_of_like_by_type = "<div class='cwcpi3 bgsz16 w16 h16 hdsjsID".$article_id."012' data-status='0'><!--liked-0--></div>";
					        }
					}
				#5.2.2 : session : false
					else {
						$show_icon_of_like_by_type = "<div class='cwcpi3 bgsz16 w16 h16'><!--liked-0--></div>";
					}
				#START 001-002
				    $queryCountOfcomments = mysqli_query($connect, "
				        SELECT count(*) 
				        FROM articles_commentary
				        WHERE artID=$article_id;
				    ");
			    	$countOfcomments = $queryCountOfcomments->fetch_row();
			    #END   001-002
		#END
		#START __MAIN__
			$_5_Comment_Like_Share__MAIN__ = "
			<!--START 5 : Comment/Like/Share-->
				<div class='p l w100 mt20'>
					<!--START : Button Comment-->
						<div class='tfccb1 u p l c br12 pa10' id='cwcp0' onclick='showComments(".$article_id."012,`2`)' title='Comentarii' style='background: #EFEFEF;'>
							<div class='cwcpi p l bgsz16 w16 h16'><!--icon--></div>
							<div class='h16 lh16 p l ml10 f14'>
								".$countOfcomments[0]."
							</div>
							<div class='ab w100 mlm10 decorID".$article_id."012'><!--icon--></div>
						</div>
					<!--END-->
					<!--START : Button Like-->
						<div class='tfccb1 u cwcpi3js p l c ml15 pa10 br12' onclick='setLS(".$article_id."012)' style='background: #EFEFEF;'>
							<div class='p l w16 h16 hlikeStatusjsID".$article_id."012' title='Îmi place asta'>
								".$show_icon_of_like_by_type."
							</div>
							<div class='h16 lh16 p l ml10 f14 counthlikeStatusjsID".$article_id."012'>
								".$show_count_of_likes_ex."
							</div>
						</div>
					<!--END-->
					<!--START : Button Share-->
						<div class='tfccb1 u p l c ml15 pa10 br12 cwcp1share0' onclick='share_this(".$article_id.")' title='Distribuie' style='background: #EFEFEF;'>
							<div class='cwcpi4 p l w16 h16 bgsz16'><!--icon--></div>
							<div class='h16 lh16 p l ml10 f14'>
								Distribuie
							</div>
						</div>
					<!--END-->
				</div>
			<!--END-->";
		#END
	#END
	#START 6: (6-1: Count/Commentary) (6-2: Wr. ajax.r.c.a.) (6-3: Title/Textarea/Button)
		#START VARIABLES
			//nothing yet
		#END
		#START __MAIN__
			$_6_61_Count_Commentary_62_Wr_ajaxrca_63_Title_Textarea_Button__MAIN__ = "
			<!--START 6: (6-1 : Count/Commentary) (6-2: Wr. ajax.r.c.a.) (6-3: Title/Textarea/Button)-->
				<div class='ccw p l mt20 pat w100 LeaveAcommentID".$article_id."012 none'>
					<!--START 6-1 : Count/Commentary-->
						<div class='p l w100 f18 mb20'>
							<!--START : COUNT-->
								<div class='p l countofcommentsID".$article_id."012'>
									".$countOfcomments[0]."
								</div>
							<!--END-->
							<!--START : Title-->
								<div class='p l ml10'>
									Comentarii
								</div>
							<!--END-->
						</div>
					<!--END-->
					<!--START 6-2 : Wrapp ajax.response commentaryes article-->
						<div class='pfacjs innerCommentsAndReplyesID".$article_id."012'></div>
					<!--END-->
					<!--START 6-3 : Title/Textarea/Button-->
						<div class='p l cmc1js w100 pa10 br12'>
							<!--START : Title-->
								<div class='w100 f18 mb20'>
									Lasă un Comentariu
								</div>
							<!--END-->
							<!--START : Textarea/Button-->
								<div class='p l w100' style='height: 46px;'>
									<!--START : Textarea-->
		                                <input type='text' class='c_lacfajs wwctit2Input w100 br50 sh pal commentID".$article_id."012' placeholder='Scrie ceva...' onclick='removeErrorInput(".$article_id."012)'>
									<!--END-->
		                            <!--START : Button-->
		                            	<div class='wwctit3 ab dg jcc alc'>
		                            		<div class='wwctit4 br50 c' onclick='c_lacfac(".$article_id."012)'></div>
		                            	</div>
		                            <!--END-->
								</div>
							<!--END-->
						</div>
					<!--END-->
				</div>
			<!--END-->";
		#END
	#END
	#START 7: Hide_post_Complain
		#START VARIABLES

		#END
		#START __MAIN__
			//$_7_Hide_post_Complain = "";
		#END
	#END
	#START ECHO __MAIN__
		$_ECHO__MAIN__ = $_1_AW__MAIN__Avatar_Widget_ . $_2_Title__MAIN__ . $_3_Content__MAIN__ . $_4_Button__MAIN__ . $_5_Comment_Like_Share__MAIN__ . $_6_61_Count_Commentary_62_Wr_ajaxrca_63_Title_Textarea_Button__MAIN__;
	#END
	#START __EXPORT__
		echo $_ECHO__MAIN__;
	#END
?>