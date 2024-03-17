<?php
	#START : Проверка наличия активной сессии
        if(session_status() == PHP_SESSION_NONE){
            #Если сессия не запущена, запустить новую сессию
            	session_start();
        }
    #END
        $userWhichSignIn = null;
		if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
		    $userWhichSignIn = $_SESSION['user']['nickname'];
		}
	#Languages
		require_once "src/languages_settings_notifications.php";
	#Connect
		require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
	#START : Query
		$query_notification_GV = mysqli_query($connect, "SELECT notifications_settings FROM users WHERE nickname='$userWhichSignIn'");
		$query_notification_GV = $query_notification_GV->fetch_row();
	#END
	#START : Check
		#0 : Show all
            if($query_notification_GV[0] == 0){
                $comments = 'checked';
                $likes    = 'checked';
            }
        #1 : Hide all
            elseif($query_notification_GV[0] == 1){
                $comments = '';
                $likes    = '';
            }
        #2 : Hide commentaries | Show likes
            elseif($query_notification_GV[0] == 2){
                $comments = '';
                $likes    = 'checked';
            }
        #3 : Hide likes | Show commentaries
            elseif($query_notification_GV[0] == 3){
                $comments = 'checked';
                $likes    = '';
            }
	#END
?>
<!--START : Notifications : Settings-->
	<div class="swppw-1">
		<!--START : Title-->
			<div class="swppw-1-1">
				<div class="p l">
					<div class="p l f16">
						<?= $languagesSettingsNotifications[$selectedLanguage]['notifications'];?>
					</div>
					<div class="ab w100 spsinni"><!--icon--></div>
				</div>
			</div>
		<!--END-->
		<!--START : Commentaries-->
			<label for="swppw-1-2-ch-1">
				<div class="swppw-1-2 f14">
					<?= $languagesSettingsNotifications[$selectedLanguage]['comments'];?>
					<input type="checkbox" class="s12ch1" id="swppw-1-2-ch-1" <?= $comments;?> onclick="notification_settings_handle()">
				</div>	
			</label>
		<!--END-->
		<!--START : Likes-->
			<label for="swppw-1-2-ch-2">
				<div class="swppw-1-3 f14">
					<?= $languagesSettingsNotifications[$selectedLanguage]['likes'];?>
					<input type="checkbox" class="s12ch1" id="swppw-1-2-ch-2" <?= $likes;?> onclick="notification_settings_handle()">
				</div>	
			</label>
		<!--END-->
	</div>
<!--END-->