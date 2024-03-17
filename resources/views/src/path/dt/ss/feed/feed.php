<?php
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
    	$userWhichSignIn = null;
        if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
            $userWhichSignIn = $_SESSION['user']['nickname'];
        }
	if(!isset($_SESSION["user"])){
		header("Location: index.php");
		exit;
	} else {
        #START : Check settings for notifications
		    #Connect
		        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
            #Query
                $query_notification_settings = mysqli_query($connect, "SELECT notifications_settings FROM users WHERE nickname='$userWhichSignIn'");
                $query_notification_settings = $query_notification_settings->fetch_row();
            #Check : 0 means Like | 1 means Commentary
                if(!empty($query_notification_settings)){
	                #1 : Hide all
	                    if($query_notification_settings[0] == 1){
	                        $query = mysqli_query($connect, "
	                            UPDATE notifications SET status='1' WHERE author_of_article='$userWhichSignIn'
	                        ");
	                    }
	                #2 : Hide commentaries | Show likes
	                    elseif($query_notification_settings[0] == 2){
	                        $query = mysqli_query($connect, "
	                            UPDATE notifications SET status='1' WHERE author_of_article='$userWhichSignIn' AND type='1'
	                        ");
	                    }
	                #3 : Hide likes | Show commentaries
	                    elseif($query_notification_settings[0] == 3){
	                        $query = mysqli_query($connect, "
	                            UPDATE notifications SET status='1' WHERE author_of_article='$userWhichSignIn' AND type='0'
	                        ");
	                    }
                } else {
                	#Обработка случая, когда нет настроек уведомлений для данного пользователя
                }
        #END
		require_once "src/path/dt/sy/noduplicate001.php";
		#START ARTICLES
			#DUPLICATE 002
				if(strpos($_SERVER['REQUEST_URI'], "/feed.php") !== false || strpos($_SERVER['REQUEST_URI'], "/article.php") !== false || strpos($_SERVER['REQUEST_URI'], "/profile.php") !== false || strpos($_SERVER['REQUEST_URI'], "/add.php") !== false){
					echo "<!--START ARTICLES--><div class='id_index_articles_session_true_js a p l'>";
						require_once "src/path/dt/sy/noduplicate002.php";
					echo "</div><!--END ARTICLES-->";
				}
			#DUPLICATE 002
		#END
		require_once "src/path/dt/ss/index/nav/nav-add_article/thnk-add.php";
		#START USER PROFILE
			#DUPLICATE 003
				if(strpos($_SERVER['REQUEST_URI'], "/feed.php") !== false || strpos($_SERVER['REQUEST_URI'], "/article.php") !== false || strpos($_SERVER['REQUEST_URI'], "/profile.php") !== false || strpos($_SERVER['REQUEST_URI'], "/add.php") !== false){
					echo "<!--START MY PROFILE--><div class='mwupwsnjs up p l none'>";
					require_once "src/path/dt/ss/index/user/user-profile/user-page.php";
				}
			#DUPLICATE 003
		#END
	}
	require_once "src/path/dt/sy/noduplicate003.php";
?>
<?php require_once "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/src/languagesArticle.php";?>
<script>
	/*Hide : Add article->*/document.getElementsByClassName("a0tajs")[0].classList.add("none");
	var tslf_AddAreply = "<?php echo $languagesArticle[$selectedLanguage]['AddAreply'];?>",
		user_nickname  = "<?php echo $_SESSION['user']['nickname'];?>";
</script>
<script>
	//System messages
		var field_is_required             = "Field is required",
			minimum_length_5_characters   = "Minimum length 5 characters",
			email_is_already_used         = "Email is already used",
			this_username_is_already_used = "This username is already used";
</script>
<!--START ALERT/ANOUNCE/Warning (Session : true). 2 copies-->
	<div class="warning_session_true_false_js pf l0 t0 w100 f14 dg alc jcc">
		<!--START MESSAGE-->
			<div class="wasetr_innerText_js f18 t"></div>
		<!--END-->
	</div>
<!--END-->
<script>
	//userWhichSignIn
		localStorage.setItem("userWhichSignIn", "<?= $_SESSION['user']['nickname']; ?>");
	//ID of userWhichSignIn
		localStorage.setItem("IDofUserWhichSignIn", "<?= $_SESSION['user']['id']; ?>");
	//Which page is opened
		localStorage.setItem("whichPageIsOpened", "feed");
</script>