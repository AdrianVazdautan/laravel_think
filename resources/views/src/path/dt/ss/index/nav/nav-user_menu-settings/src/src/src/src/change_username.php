<?php
    #START : Проверка наличия активной сессии
	    require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
	    $userWhichSignIn = null;
	    if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
	        $userWhichSignIn = $_SESSION['user']['nickname'];
	    }
    #START : AJAX
	    $current_password = $_POST['current_password'];
	    $new_username     = $_POST['new_username'];
    #END
    #START : Check password
        #Connect
        	require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
        #Query get password
	        $query_get_password = mysqli_query($connect, "SELECT password FROM users WHERE nickname='$userWhichSignIn'");
	    #Check
	        if($query_get_password){
	        		$row = mysqli_fetch_assoc($query_get_password);
	            #Check if is incorect password
	            	if($current_password != $row['password']){
	            		#ERROR
	            			echo "1";
	            	}
	            #Check if password is corect
	            	if($current_password == $row['password']){
	            		#START
		            		#Query check if username exist
						        $query_get_username = mysqli_query($connect, "SELECT COUNT(*) FROM users WHERE nickname='$new_username'");
						    #Check
						        if($query_get_username){
						        		$query_get_username = $query_get_username->fetch_row();
						            #Check if username exist
						        		if($query_get_username[0] == "1"){
						        			#ERROR : Username already exist
						        				echo "2";
						        		}
						            #Check if username NOT exist
						        		if($query_get_username[0] == "0"){
						        			#SUCCESS : username is FREE
						        				#START : UPDATE username/nickname in table : users
						        					update_username_in_table_users($connect, $new_username, $userWhichSignIn);
						        				#END
						        		}
						        } else {
						            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
						        }
					    #END
	            	}
	        } else {
	            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
	        }
    #END
	/*UPDATE
		01 : users
		02 : articles100percent
		03 : articles_commentary
		04 : chat
		05 : complaints
		06 : hided
		07 : history
		08 : liked
		09 : like_for_commentary_from_article
		10 : notifications
		11 : recommended
	END*/
	#START : 01 users: UPDATE username/nickname in table : users
		function update_username_in_table_users($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE users SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	update_username_in_table_articles100percent($connect, $new_username, $userWhichSignIn);
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
	#START : 02 articles100percent: UPDATE username/nickname in table : articles100percent
		function update_username_in_table_articles100percent($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE articles100percent SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	update_username_in_table_articles_commentary($connect, $new_username, $userWhichSignIn);
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
	#START : 03 articles_commentary: UPDATE username/nickname in table : articles_commentary
		function update_username_in_table_articles_commentary($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE articles_commentary SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	update_username_in_table_articles_chat($connect, $new_username, $userWhichSignIn);
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
	#START : 04 chat: UPDATE username/nickname in table : chat
		function update_username_in_table_articles_chat($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE chat SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	update_username_in_table_articles_complaints($connect, $new_username, $userWhichSignIn);
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
	#START : 05 complaints: UPDATE username/nickname in table : complaints
		function update_username_in_table_articles_complaints($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE complaints SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	update_username_in_table_articles_hided($connect, $new_username, $userWhichSignIn);
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
	#START : 06 hided: UPDATE username/nickname in table : hided
		function update_username_in_table_articles_hided($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE hided SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	update_username_in_table_articles_history($connect, $new_username, $userWhichSignIn);
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
	#START : 07 history: UPDATE username/nickname in table : history
		function update_username_in_table_articles_history($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE history SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	update_username_in_table_articles_liked($connect, $new_username, $userWhichSignIn);
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
	#START : 08 liked: UPDATE username/nickname in table : liked
		function update_username_in_table_articles_liked($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE liked SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	update_username_in_table_articles_like_for_commentary_from_article($connect, $new_username, $userWhichSignIn);
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
	#START : 09 like_for_commentary_from_article: UPDATE username/nickname in table : like_for_commentary_from_article
		function update_username_in_table_articles_like_for_commentary_from_article($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE like_for_commentary_from_article SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	update_username_in_table_notifications($connect, $new_username, $userWhichSignIn);
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
	#START : 10 notifications: UPDATE username/nickname in table : notifications
		function update_username_in_table_notifications($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE notifications SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	update_username_in_table_recommended($connect, $new_username, $userWhichSignIn);
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
	#START : 11 recommended: UPDATE username/nickname in table : recommended
		function update_username_in_table_recommended($connect, $new_username, $userWhichSignIn){
			#Query check if username exist
		        $query_update_username = mysqli_query($connect, "UPDATE recommended SET nickname='$new_username' WHERE nickname='$userWhichSignIn'");
		    #Check
		        if($query_update_username){
		            #SUCCESS
		            	$_SESSION["user"]["nickname"] = "$new_username";
		            	echo "Success";
		        } else {
		            echo "Error: " . mysqli_error($connect); #Ошибка при выполнении запроса
		        }
		}
	#END
?>