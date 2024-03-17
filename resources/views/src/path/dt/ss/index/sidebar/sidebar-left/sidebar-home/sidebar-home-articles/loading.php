<?php

	$getArticles = mysqli_query($connect,"
		SELECT id, nickname, title, dateofpublication
		FROM articles100percent WHERE id='$article2'
	");
	
	while($article = mysqli_fetch_assoc($getArticles)){
		#START
			require "time.php";
    	#END
		echo"
			<div class='rWW loading-rowWindowWrapper-".$nextPage." p l bgw pa br12 sh w100 mb25'>
				<div class='p l w100'>
					<div class='p l f14 w100 roW1'>
						<div class='p l u'>";
							#Get avatar, background, and nickname using ID
							    $query = mysqli_query($connect, "
							        SELECT avatar, background, nickname
							        FROM users
							        WHERE nickname = '".$article['nickname']."'
							    ");
							    
							    if($profile_user = mysqli_fetch_assoc($query)){
							        $isp_Avatar = $profile_user['avatar'];
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
						<div class='p l ml10'>
							".$article['nickname']."
						</div>
						<div class='p l ml10 cs'>
							<!--Date-->
								"; echo getTimeAgo($article['dateofpublication']); echo "
							<!--Date-->
						</div>
					</div>
					<div class='w100 f24 mt20 p l'>
						".$article['title']."
					</div>
					<div class='rW5 w100 p l mt20'>
						<span class='wTD'>
							<div class='css-selector p l w100 h20'></div>
 							<div class='css-selector p l w100 h20 mt1'></div>
 							<div class='css-selector p l w100 h20 mt1'></div>
 							<div class='css-selector p l w100 h20 mt1'></div>
 							<div class='css-selector p l w100 h20 mt1'></div>
 							<div class='css-selector p l w100 h20 mt1'></div>
 							<div class='css-selector p l w100 h20 mt1'></div>
						</span>
					</div>
				</div>
			</div>
		";
	}
?>