<?php
	$numarul++;#numarul is required
	#START : Edit
		#START : Hide/Complain
			$markup_article_option_Hide_Complain = "
			<!--START : Button Hide post-->
			    <div class='buufjs aC c h40' onclick='unauthorized(".$article['id'].$IDWWRA."), hidePost(".$article['id'].$IDWWRA.")'>
	            	<!--START : Icon-->
			            <div class='ac1 p l h40 w16 dg alc'>
			        		<img class='ac1ico' src='../src/du/icon/forbbiden.png'>
			            </div>
	        		<!--END-->
		        	<!--START : Title-->
				        <div class='p l pal10 h40 lh40 arcm'>
				        	".$languagesArticle[$selectedLanguage]['HidePost']."
				        </div>
		            <!--END-->
		        </div>
		    <!--END-->
		    <!--START : Button Complain-->
		        <div class='buufjs aC c h40' onclick='unauthorized(".$article['id'].$IDWWRA."), complain(".$article['id'].$IDWWRA.")'>
	        		<!--START : Icon-->
			            <div class='ac1 p l h40 w16 dg alc'>
			        		<svg width='16px' height='16px' viewBox='0 0 16 16' fill='#4B4F56'><path fill-rule='evenodd' d='M8 0c4.415 0 8 3.585 8 8s-3.585 8-8 8-8-3.585-8-8 3.585-8 8-8zm.999 11a1 1 0 10-2 0 1 1 0 002 0zm0-6a1 1 0 00-2 0v3a1 1 0 002 0V5z'></path></svg>
			            </div>
	        		<!--END-->
		        	<!--START : Title-->
				        <div class='p l pal10 h40 lh40 arcm'>
							".$languagesArticle[$selectedLanguage]['Complain']."
				        </div>
		            <!--END-->
		        </div>
			<!--END-->";
		#END
		#START : Delete
			$markup_article_option_delete = "
			<!--START : Button Delete-->
		        <div class='buufjs aC c h40' onclick='deletePost(".$article['id'].$IDWWRA.")'>
	        		<!--START : Icon-->
			            <div class='ac1 p l h40 w16 dg alc'>
			        		<svg width='16px' height='16px' viewBox='0 0 16 16' fill='#4B4F56'><path fill-rule='evenodd' d='M8 0c4.415 0 8 3.585 8 8s-3.585 8-8 8-8-3.585-8-8 3.585-8 8-8zm.999 11a1 1 0 10-2 0 1 1 0 002 0zm0-6a1 1 0 00-2 0v3a1 1 0 002 0V5z'></path></svg>
			            </div>
	        		<!--END-->
		        	<!--START : Title-->
				        <div class='p l pal10 h40 lh40 arcm'>
							".$languagesArticle[$selectedLanguage]['Delete']."
				        </div>
		            <!--END-->
		        </div>
			<!--END-->";
		#END
		#START : UNDO
			$markup_article_option_undo = " 
			<div class='tosrjs p l w100 bgw pa sh br12 mb25 none tosrID".$article['id'].$IDWWRA."'>
				<span class='rw1s p l f14 fw'>
					".$languagesArticle[$selectedLanguage]['ArticleRemoved']."
				</span>
				<div class='id_undo_appearance_js rw2b c p fw f14' onclick='rw2bUndo(".$article['id'].$IDWWRA.")'>
					".$languagesArticle[$selectedLanguage]['UNDO']."
				</div>
			</div>";
		#END
		#START : UNDO-DELETED
			$markup_article_option_undo_deleted = " 
			<div class='tosr_removed_js p l w100 bgw pa sh br12 mb25 none tosr_removed_ID".$article['id'].$IDWWRA."'>
				<span class='rw1s p l f14 fw'>
					".$languagesArticle[$selectedLanguage]['articleDeleted']."
				</span>
				<div class='id_undo_removed_appearance_js rw2b c p fw f14' onclick='rw2bUndoRemoved(".$article['id'].$IDWWRA.")'>
					".$languagesArticle[$selectedLanguage]['RECOVER']."
				</div>
			</div>";
		#END
		#Get
			$article_author_nickname  = $article['nickname'];
		#START : Check
			#Delete
				if($article_author_nickname == $userWhichSignIn){
					#ECHO
						$echo_markup_article_option = $markup_article_option_delete;
						$echo_markup_article_undo   = $markup_article_option_undo_deleted;
				}
			#Hide/Complain
				else if($article_author_nickname != $userWhichSignIn){
					#ECHO
						$echo_markup_article_option = $markup_article_option_Hide_Complain;
						$echo_markup_article_undo   = $markup_article_option_undo;
				}
			#Session : false
				else {
					#ECHO
						$echo_markup_article_option = $markup_article_option_Hide_Complain;
						$echo_markup_article_undo   = $markup_article_option_undo;
				}
		#END
	#END
	echo
	"<!--SEVEN 7-->
	<!--START : Article-->
		<div class='p l articleID'>
			<!--START Hide post. Complain-->
				<div class='mobile_hide_post_js mobile_hpID".$article['id'].$IDWWRA." none'>
					<div class='rWPUjs none ab bgw f14 br12 u rwpuID".$article['id'].$IDWWRA."'>
						". $echo_markup_article_option ."
						<div class='pudorWPU ab w20'><div class='pudeb ab bgw'><!--icon--></div></div>
					</div>
				</div>
			<!--END-->
			<div class='p l arws tosf".$article['id'].$IDWWRA."js'>
			<!--START : Widget Hide post-->
				". $echo_markup_article_undo ."
			<!--END-->
			<div class='p l w100 pa mb25 bgw sh br12 tosaID".$article['id'].$IDWWRA."'>
				<div class='roW1 w100'>
					<div class='p l'>
						<!--START : Author avatar-->
							<div class='u widgetcommentid'>";
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
					</div>
					<!--START : Username-->
						<div class='p l'>
							<div class='ml10 f14 c aas wsupjs' onclick='wshowUserProfile($resultUQTD_id[0],`".$article['nickname']."`)'>
								".$article['nickname']."
							</div>
						</div>
					<!--END-->
					<!--START : Date-->
						<div class='p l ml10 f14 cs'>
							"; echo getTimeAgo($article['dateofpublication']); echo "
						</div>
					<!--END-->
					<!--START : Button-->
						<div class='p r h30 w30 dg alc jcc br50 c cw4srtm cw4srtmnr".$article['id'].$IDWWRA."' onclick='rowWindowPopUpFunction(".$article['id'].$IDWWRA.")'>
							<div class='cW4SRTMjs'>
								<div class='dC1'><!--icon--></div>
								<div class='dC2'><!--icon--></div>
								<div class='dC3'><!--icon--></div>
							</div>
						</div>
					<!--END-->
				</div>
				<!--START : Title-->
					<div class='show_article_in_extended_mode_js f24 mt20 c fw articleLink' onclick='show_article_in_extended_mode(".$article['id'].")'>
						".$article['title']."
					</div>
				<!--END-->
				<div class='article_text_".$article['id'].$IDWWRA." article_text_hidden_js rW5 p l w100 mt20 f18'>
					<!--START : Content-->
						<div class='p l w100'>".$article['textarea']."</div>
					<!--END-->
					<!--START : Shadow for text-->
						<div class='asft_id_".$article['id'].$IDWWRA." article_shadow_for_text_js ab w100'></div>
					<!--END-->
					<!--START : Show less-->
						<div class='showLessCss c p l w100 none watShowLessID".$article['id'].$IDWWRA."' onclick='recoverButtonShowAll(".$article['id'].$IDWWRA.")'>
							Show less
						</div>
					<!--END-->
				</div>
				<div class='wGTRjs w100 p l mt20 wgtrbtnID".$article['id'].$IDWWRA."'>
					<!--START : Button-->
						<button class='wGTR p l f14 fw c shg' onclick='showAll(".$article['id'].$IDWWRA.",`".$code."`)'>
							".$languagesArticle[$selectedLanguage]['ContinueReading']." →
						</button>
					<!--END-->
				</div>
				<div class='p l w100 mt20'>
					<!--START : Button Comment-->
						<div class='tfccb1 u p l c br12 pa10' id='cwcp".$article['id'].$IDWWRA."' onclick='showComments(".$article['id'].$IDWWRA.",`1`)' title='".$languagesArticle[$selectedLanguage]['Comments']."' style='background: #EFEFEF;'>
							<div class='cwcpi p l bgsz16 w16 h16'><!--icon--></div>
							<div class='h16 lh16 p l ml10 f14'>".$countOfcomments[0]."</div>
							<div class='ab w100 mlm10 decorID".$article['id'].$IDWWRA."'><!--icon--></div>
						</div>
					<!--END-->
					<!--START : Button Like-->
						<div class='tfccb1 u cwcpi3js p l c ml15 pa10 br12' onclick='setLS(".$article['id'].$IDWWRA.")' style='background: #EFEFEF;'>
							<div class='p l w16 h16 hlikeStatusjsID".$article['id'].$IDWWRA."' title='".$languagesArticle[$selectedLanguage]['ILikeThis']."'>
								".$likeStatus."
							</div>
							<div class='h16 lh16 p l ml10 f14 counthlikeStatusjsID".$article['id'].$IDWWRA."'>".$cal[0]."</div>
						</div>
					<!--END-->
					<!--START : Button Share-->
						<div class='tfccb1 u p l c ml15 pa10 br12 cwcp1share".$article['id'].$IDWWRA."' onclick='share_this(".$article['id'].")' title='".$languagesArticle[$selectedLanguage]['Share']."' style='background: #EFEFEF;'>
							<div class='cwcpi4 p l w16 h16 bgsz16'><!--icon--></div>
							<div class='h16 lh16 p l ml10 f14'>
								".$languagesArticle[$selectedLanguage]['Share']."
							</div>
						</div>
					<!--END-->
				</div>
				<!--START : Leave a comment on article-->
					<div class='ccw p l mt20 pat none w100 LeaveAcommentID".$article['id'].$IDWWRA."'>
						<!--START-->
							<div class='p l w100 f18 mb20'>
								<!--START : COUNT-->
									<div class='p l countofcommentsID".$article['id'].$IDWWRA."'>".$countOfcomments[0]."</div>
								<!--END-->
								<!--START : Title-->
									<div class='p l ml10'>
										".$languagesArticle[$selectedLanguage]['Comments']."
									</div>
								<!--END-->
							</div>
						<!--END-->
						<!--START : Wrapp ajax.response commentaryes article-->
							<div class='pfacjs innerCommentsAndReplyesID".$article['id'].$IDWWRA."'></div>
						<!--END-->
						";
						if($countOfcomments[0] > 5){
							echo "					
							<!--START : Button (View more comments)-->
								<div class='w100 p l f14 pab countOfCommentsvcID".$article['id'].$IDWWRA."' onclick='vcmcsdfc(".$article['id'].")'>
									<div class='smrc p l pal10 par10 smrccom'>
										View <span class='vcmcsdfcspancountID".$article['id'].$IDWWRA."'>",$countOfcomments[0]-5,"</span> more comments →
									</div>
								</div>
							<!--END-->
							";
						}
						echo"
						<!--START : Textarea leave comment-->
							<div class='p l cmc1js w100 pa10 br12'>
								<!--START-->
									<div class='w100 f18 mb20'>
										".$languagesArticle[$selectedLanguage]['LeaveAcomment']."
									</div>
								<!--END-->
								<!--START-->
									<div class='p l w100' style='height: 46px;'>
										<!--START : Textarea-->
			                                <input type='text' class='c_lacfajs wwctit2Input w100 br50 sh pal commentID".$article['id'].$IDWWRA."' placeholder='".$languagesArticle[$selectedLanguage]['WriteAnything']."...' onclick='removeErrorInput(".$article['id'].$IDWWRA.")'>
										<!--END-->
			                            <!--START : Button-->
			                            	<div class='wwctit3 ab dg jcc alc'><div class='wwctit4 br50 c' onclick='c_lacfac(".$article['id'].$IDWWRA.")'><!--Button--></div></div>
			                            <!--END-->
									</div>
								<!--END-->
							</div>
						<!--END-->
					</div>
				<!--END-->
				</div>
			</div>
		</div>
	<!--END-->
	";	
?>