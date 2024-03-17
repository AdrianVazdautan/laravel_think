<?php
		require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
		$userWhichSignIn = null;
		if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
		    $userWhichSignIn = $_SESSION['user']['nickname'];
		}
		require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
	#Required
		$article         = $_POST['article'];
		$user_profile_id = $_POST['user_profile_id'];
		$IDWWRA          = $_POST['IDWWRA'];
		require "src/languages_1_article_AJAX.php";
	#START : Obtain nickname using id
		$user_profile_id = mysqli_query($connect, "
	        SELECT nickname FROM users WHERE id='$user_profile_id'
	    ");
    	$user_profile_id   = $user_profile_id->fetch_row();
    	$user_profile_id_r = $user_profile_id[0];
	#END
	//Check
		if($article == "1"){
			#echo "Text 2";
			require ($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/" . "src/languagesArticle.php");
			require ($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/" . "time.php");
			$numarul = 0;                               #(Increment). Count of articles
			#START 001
				$getArticles = mysqli_query($connect, "
				    SELECT *
				    FROM articles100percent 
				    WHERE nickname='$user_profile_id_r' AND status='0'
				    ORDER BY id DESC 
				");

				if(mysqli_num_rows($getArticles) === 0) {
			        #Если нет данных в результате запроса
			        	echo "<div class='w100 t f18 mt20 rf1bp'>".$languages_1_article_AJAX[$selectedLanguage]['no_articles_available']."</div>";
			    } else {
			        #Если есть данные в результате запроса
				        while($article = mysqli_fetch_assoc($getArticles)){
						    #START 001-001
							    $id       = isset($article['id']) ? $article['id'] : null;
							    $code     = isset($article['code']) ? $article['code'] : null;
							    $nickname = isset($article['nickname']) ? $article['nickname'] : null;
							    $title    = isset($article['title']) ? $article['title'] : null;
							    if($id === null || $code === null || $nickname === null || $title === null){
							        continue; #Skip this iteration if any required values are missing
							    }
						    #END   001-001
								#Show with checking
						    		$id_of_article_fh_c_a = $id;
						    		$query_fh_c_a = mysqli_query($connect, "SELECT count(*) FROM hided WHERE id_of_article_which_is_hided='$id_of_article_fh_c_a' AND nickname='$userWhichSignIn'");
						    		$query_fh_c_a = $query_fh_c_a->fetch_row();
						    	#Check : if is hided
						    		if($query_fh_c_a[0] == "1"){
						    			#Если нет данных в результате запроса
			        						echo "<div class='w100 t f18 mt20 rf1bp'>".$languages_1_article_AJAX[$selectedLanguage]['no_articles_available']."</div>";
						    			exit();
						    		}
						    #START 001-002
						    	if ($id !== null) {
								    $queryCountOfcomments = mysqli_query($connect, "
								        SELECT count(*) 
								        FROM articles_commentary
								        WHERE artID=$id;
								    ");
							    	$countOfcomments = $queryCountOfcomments->fetch_row();
						    	}
						    #END   001-002
						    #START 001-003
							    #We should count the likes and show the number in the like button
							    #title nickname
							    $countActualLikes = mysqli_query($connect, "
							        SELECT count(*) 
							        FROM liked 
							        WHERE id_of_article='$id'
							    ");
							    $cal = $countActualLikes->fetch_row();
						    #END   001-003
						    #START 001-005
							    	$likeStatus = ""; #Initialize the variable
							    #Session : false
								    if(!isset($_SESSION['user'])){
								        $likeStatus = "<div class='cwcpi3 bgsz16 w16 h16'><!--liked-0--></div>";
								    }
							    #Session : true
								    elseif(isset($_SESSION['user'])){
								        #Check if the user has set a like
									        $checkLikeStatus = mysqli_query($connect, "
									            SELECT Liked 
									            FROM liked 
									            WHERE id_of_article = '$id' 
									                AND nickname = '$userWhichSignIn' 
									            ORDER BY dateofpublication DESC 
									            LIMIT 1
									        ");
									        $cLS = $checkLikeStatus->fetch_row();
									        if($cLS && isset($cLS[0]) && $cLS[0] == 0){
									            $likeStatus = "<div class='cwcpi3 bgsz16 w16 h16 hdsjsID".$article['id'].$IDWWRA."' data-status='0'><!--liked-0--></div>";
									        } elseif($cLS && isset($cLS[0]) && $cLS[0] == 1){
									            $likeStatus = "<div class='cwcpi31 bgsz16 w16 h16 hdsjsID".$article['id'].$IDWWRA."' data-status='1'><!--liked-1--></div>";
									        } else {
									        	$likeStatus = "<div class='cwcpi3 bgsz16 w16 h16 hdsjsID".$article['id'].$IDWWRA."' data-status='0'><!--liked-0--></div>";
									        }
								    }
						    #END 001-005
						    #START 001-004
						    	#Using query to db for obtain ID of account of author SELECTed ID by nickname in table users
						    		$queryUQTD     = mysqli_query($connect, "SELECT id FROM users WHERE nickname = '$nickname' LIMIT 1");
							        $resultUQTD_id = $queryUQTD->fetch_row();
							    #Check if article was not hided by user
							        #Session : false
									    if(!isset($_SESSION['user'])){
										    #Show without checking
									    		require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/" . "articleL.php");
									    }
								    #Session : true
									    elseif(isset($_SESSION['user'])){
									    	#Show with checking
									    		#echo $article['id'];
									    		$id_of_article_fh = $article['id'];
									    		$query_fh = mysqli_query($connect, "SELECT count(*) FROM hided WHERE id_of_article_which_is_hided='$id_of_article_fh' AND nickname='$userWhichSignIn'");
									    		$query_fh = $query_fh->fetch_row();
									    	#Check : if Not hided
									    		if($query_fh[0] == "0"){
									    			require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/" . "articleL.php");
									    		}
									    }
						    #END   001-004
						}
				}
			#END   001
		}
?>