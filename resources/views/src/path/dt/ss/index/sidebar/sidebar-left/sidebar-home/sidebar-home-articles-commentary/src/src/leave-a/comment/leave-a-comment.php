<?php
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
		date_default_timezone_set('Europe/Chisinau');
	#Get value of input field for commentary which have class $commentID
		#SERVER
			$c_usernameOrNickname = $_SESSION["user"]["nickname"];#Username of user who commented
			$c_curentDate         = date('Y-m-d h:i:s');	      #Date when was sent commentary
	#Information about article where was leave this commenet
		#AJAX
			$commentID        = $_POST['commentID'];       #Value from commentary
			$isCommentOrReply = $_POST['isCommentOrReply'];#Can be commentary or reply. Can be 0 or 1
			$artID            = $_POST['artID'];		   #Article id
			$IDWWRA           = $_POST["IDWWRA"];#Which page is opened
	#Check if commentary ($commentID) is empty
		if($commentID == ""){
			#ERROR NR.1
				#Commentary is empty
				echo "1";
		}
	#Check if commentary ($commentID) is NOT empty
		elseif($commentID != ""){
			#Check if artID is empty
				if($artID == ""){
					#ERROR NR.8
						echo "8";
				}
			#Check if artID is NOT empty
				elseif($artID != ""){
					#Check if is empty
						if($isCommentOrReply == ""){
							#ERROR NR.7
								echo "7";
						}
					#Check if is NOT empty
						elseif($isCommentOrReply != ""){
							/*Send to BD commentary->*/stbc($commentID, $c_usernameOrNickname, $c_curentDate, $isCommentOrReply, $artID, $IDWWRA);
						}
				}
		}
	#Send commentary to server
		#BD_table : articles_commentary
		/*
			$c_usernameOrNickname : nickname
			$c_curentDate         : dateofpublication
			$commentID            : commentaryText
			$isCommentOrReply     : type_of_comment
			$artID                : artID
		*/
		function stbc($commentID, $c_usernameOrNickname, $c_curentDate, $isCommentOrReply, $artID, $IDWWRA){
		    #Подключение к базе данных
				require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
		    #Проверка соединения с базой данных
			    if(!$connect){
			        die("Connection failed: " . mysqli_connect_error());
			    }
		    #Экранирование значений для безопасного использования в запросе
			    $commentaryText      = mysqli_real_escape_string($connect, $commentID);
			    $nickname            = mysqli_real_escape_string($connect, $c_usernameOrNickname);
			    $dateofpublication   = mysqli_real_escape_string($connect, $c_curentDate);
			    $isCommentOrReply    = mysqli_real_escape_string($connect, $isCommentOrReply);
		    #START : Obtain id of commentator by nickname $c_usernameOrNickname
		    	$query_id_by_nickname = mysqli_query($connect, "SELECT id FROM users WHERE nickname='$c_usernameOrNickname'");
				$query_id_by_nickname = $query_id_by_nickname->fetch_row();
				$commentatorID = $query_id_by_nickname[0];
		    #END
		    #Создание SQL-запроса INSERT для добавления комментария
		    	$sql = "INSERT INTO articles_commentary (commentaryText, nickname, commentatorID, dateofpublication, type_of_comment, artID)
		            	VALUES ('$commentaryText', '$nickname', '$commentatorID', '$dateofpublication', '$isCommentOrReply', '$artID')";
		        #START : DB Query : get nickname of author of article by $id_of_article
					$getNicknameOfAuthorOAByID = mysqli_query($connect, "
						SELECT nickname FROM articles100percent WHERE id='$artID'
					");
					$getNicknameOfAuthorOAByID = $getNicknameOfAuthorOAByID->fetch_row();
					$getNicknameOfAuthorOAByID = $getNicknameOfAuthorOAByID[0];
				#END
		    	/*START : Notify->*/
			    	$nickname_id = $_SESSION['user']['id'];
					$query_LNETS = mysqli_query($connect, "
						INSERT INTO notifications(nickname, nickname_id, author_of_article, id_of_article, type, status) 
						VALUES('$c_usernameOrNickname', '$nickname_id', '$getNicknameOfAuthorOAByID', '$artID', '1', '0')");
				/*END*/
		    #Выполнение запроса
			    if(mysqli_query($connect, $sql)){
			    	#SUCCESS NR.5
			    		#Comment added successfully
			    		#Check if is comment
				    		if($isCommentOrReply == "0"){
				    			require "myArticleCommentaryJSON.php";
								echo json_encode($myArticleCommentaryJSON);
				    		}
				    	#Check if is reply
				    		elseif($isCommentOrReply == "1"){
				    			require "myArticleReplyJSON.php";
				    			echo json_encode($myArticleReplyJSON);
				    		}
			    } else {
			    	#ERROR NR.6
			    		echo "6";
			    }
		}
?>