<?php require_once "src/languagesRWBA.php";?>

<div class="l mt25 bgw pal par br12 sh w100 pab">
	<div class="rwban2 l w100 fw f18 mt20 pab">
		<!--START : WIDGET-->
			<div class="p l">
				<!--START : TITLE WIDGET-->
					<div class="p l" style="color: #4B4F56;">
						<?php echo $languagesRWBA[$selectedLanguage]['Top10popularAuthorsForLastYear'];?>
					</div>
				<!--END-->
				<div class="ab w100 cWCDjs"><!--icon--></div>
			</div>
		<!--END-->
	</div>
	<div class="rwbaln1 l w100 pab">
		<!--START-LIST-OF-AUTHORS-->
			<?php
				#Top 10
					$top10 = 10;
				#Required
					require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
				#Query
					$query_get_nickname_AND_points = mysqli_query($connect, "
						SELECT u.id, a.nickname, 
						       COALESCE(SUM(article_count), 0) + COALESCE(SUM(commentary_count), 0) + COALESCE(SUM(like_count), 0) as total_count,
						       u.studies
						FROM (
						    SELECT nickname, COUNT(*) as article_count
						    FROM articles100percent
						    WHERE dateofpublication >= CURDATE() - INTERVAL 1 YEAR
						    GROUP BY nickname
						) a
						LEFT JOIN (
						    SELECT nickname, COUNT(*) as commentary_count
						    FROM articles_commentary
						    WHERE dateofpublication >= CURDATE() - INTERVAL 1 YEAR
						    GROUP BY nickname
						) b ON a.nickname = b.nickname
						LEFT JOIN (
						    SELECT nickname, COUNT(*) as like_count
						    FROM liked
						    WHERE dateofpublication >= CURDATE() - INTERVAL 1 YEAR
						    GROUP BY nickname
						) c ON a.nickname = c.nickname
						LEFT JOIN (
						    SELECT nickname, COUNT(*) as like_for_commentary_count
						    FROM like_for_commentary_from_article
						    WHERE dateofpublication >= CURDATE() - INTERVAL 1 YEAR
						    GROUP BY nickname
						) d ON a.nickname = d.nickname
						LEFT JOIN users u ON a.nickname = u.nickname
						GROUP BY u.id, a.nickname, u.studies
						ORDER BY total_count DESC
						LIMIT 10;
					");
				#Fetch results into an array
					$results = [];
					while ($query_GNP = mysqli_fetch_assoc($query_get_nickname_AND_points)) {
					    $results[] = $query_GNP;
					}
				#Reverse the array to display in ascending order
					$results = array_reverse($results);
				#Echo from bd
					foreach ($results as $query_GNP) {
						#RANK
							$rank = $top10;
						#Top 10 style
							#10
								if($top10 < 10){
									$rank = "0".$top10;
								}
							#3
								if($top10 == 3){
									$rank = "<p style='color: red;'>"."0".$top10."</p>";
								}
							#2
								if($top10 == 2){
									$rank = "<p style='color: orange;'>"."0".$top10."</p>";
								}
							#1
								if($top10 == 1){
									$rank = "<p style='color: green;'>"."0".$top10."</p>";
								}
						#Output
							echo "
								<!--START-->
									<div class='h36 l mt20 f14 w100'>
										<!--START : RANK-->
											<div class='p l f14 h36 lh36 cs'>
												".$rank."
											</div>
										<!--END-->
										<!--START : IMAGE-->
											<div class='w36 h36 l ml10'>";
												#Get avatar, background, and nickname using ID
												    $query = mysqli_query($connect, "
												        SELECT avatar, background, nickname
												        FROM users
												        WHERE nickname = '".$query_GNP['nickname']."'
												    ");
												    
												    if($profile_user = mysqli_fetch_assoc($query)){
												        $isp_Avatar     = $profile_user['avatar'];
												    }
												#Check if image is NOT stored in BD
												    if($isp_Avatar == ""){
												    	$Show_Avatar = "<div class='p l dg alc jcc br50 cw w36 h36' style='background: blue;'>".substr($query_GNP['nickname'], 0, 1)."</div>";
												    } 
												#Check if image is stored in BD
													else if($isp_Avatar != "" && $isp_Avatar != NULL){
														#START : Obtain image_name.png from bd
															/*Query->*/ $query_image_name = mysqli_query($connect, "SELECT avatar FROM users WHERE nickname='".$query_GNP['nickname']."'");
															/*Result->*/$query_image_name = $query_image_name->fetch_row();
													        #Check if query was successfull
													            if($query_image_name){
													                #Запрос выполнен успешно 
												    					$Show_Avatar = "<img class='l w36 h36 br50' src='src/du/avatar/". $query_image_name[0] ."'/>";
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
										<div class='h36 l ml10 dg alc'>
											<div>
												<!--START : USERNAME-->
													<div class='c tdu rwbajs' onclick='wshowUserProfile(".$query_GNP['id'].",`".$query_GNP['nickname']."`)'>
														".$query_GNP['nickname']."
													</div>
												<!--END-->
												<!--START : STUDIES-->
													<div class='cs f10'>
														".$query_GNP['studies']."
													</div>
												<!--END-->
											</div>
										</div>
										<!--START : POINTS-->
											<div class='cwbarn1 h36 lh36 r' title='Points'>
												".$query_GNP['total_count']."
											</div>
										<!--END-->
									</div>
								<!--END-->
							";
						#Decrement
							$top10--;
					}
			?>
		<!--END-LIST-OF-AUTHORS-->
	</div>
</div>