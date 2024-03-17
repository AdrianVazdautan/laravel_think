<?php
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
	#Redirect if not authorized
		if(!$_SESSION["user"]){
			header("Location: index.php");
		}
	#AJAX
		$article_title         = $_POST["article_title"];
		$article_text          = $_POST["article_text"];
		$article_category      = $_POST["article_category"];
		$article_notifications = $_POST["article_notifications"];
	#Check if $article_title is empty
		if($article_title == ""){
			#ERROR NR.1
				echo "1";
		}
	#Check if $article_title is NOT empty
		else if($article_title != ""){
			#Check if $article_text is empty
				if($article_text == ""){
					#ERROR NR.2
						echo "2";
				}
			#Check if $article_text is NOT empty
				else if($article_text != ""){
					#Check if $article_category is empty
						if($article_category == ""){
							#ERROR NR.3
								echo "3";
						}
					#Check if $article_category is NOT empty
						else if($article_category != ""){
							#Check if $article_notifications is empty
								if($article_notifications == ""){
									#ERROR NR.4
										echo "4";
								}
							#Check if $article_notifications is NOT empty
								if($article_notifications != ""){
									/*SEND TO BD->*/ saveData($article_title, $article_text, $article_category, $article_notifications);
								}
						}
				}
		}
	#1/3 : SAVE DATA IN TABLE articles100percent.sql
		function saveData($article_title, $article_text, $article_category, $article_notifications){
			#INCLUDE
				#PHP data
			        $save_article_session_nickname = $_SESSION["user"]["nickname"];
			        $save_date                     = date('Y-m-d h:i:s');
			    #INCLUDE
			        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
			    #CODE GENERATE
			        $code_data = substr($article_title, 0, 20) . substr($article_text, 0, 20) . $save_article_session_nickname . $save_date;
			        $code      = password_hash($code_data, PASSWORD_DEFAULT);
			    #Prepare the statement
			        $query = "INSERT INTO articles100percent (code, nickname, category, title, textarea, allow_notifications, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
			        if($stmt = mysqli_prepare($connect, $query)) {
			        		$status = 0;
			            #Bind the parameters
			                mysqli_stmt_bind_param($stmt, "ssssssi", $code, $save_article_session_nickname, $article_category, $article_title, $article_text, $article_notifications, $status);
			            #Execute the statement
			                if(mysqli_stmt_execute($stmt)) {
			                    #SUCCESS
					        		redirectUser($code);
			                } else {
			                    # Error
			                        echo "5" . mysqli_error($connect);
			                }
			            #Close the statement
			                mysqli_stmt_close($stmt);
			        }
		}
	#REDIRECT
		function redirectUser($code){
			#IF_IS_PUBLISHED_THEN_REDIRECT_TO_ARTICLE.PHP
				#Get ID of new added article
					#INCLUDE
						require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
					#QUERY
						$query      = mysqli_query($connect, "SELECT id FROM articles100percent WHERE code='$code'");
					    $obtainedID = $query->fetch_row();
				#ELSE
					#Check if query was successfull
						if($query){
					        #SUCCESS
					        	$id_of_article_for_url = array(
							        "status" => "9",
							        "id"     => $obtainedID[0]
							    );
							    echo json_encode($id_of_article_for_url);
					    }
					#Query was unsuccessfull
					    else {
					        #ERROR NR.8
					        	echo "8";
					    }
		}
?>