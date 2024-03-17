<?php
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
	#REQUIRED DATA
		$id_of_article = $_POST['id'];
		$nickname      = $_SESSION['user']['nickname'];
		$nickname_id   = $_SESSION['user']['id'];
	#VERIFY IF LIKE EXIST
			require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
		#DB Query
			$verifyIfLikeExist = mysqli_query($connect, "
				SELECT count(*) 
				FROM liked 
				WHERE id_of_article ='$id_of_article' 
					AND nickname ='$nickname'
			");
			$verifyIfLikeExist = $verifyIfLikeExist->fetch_row();
		#START : DB Query : get nickname of author of article by $id_of_article
			$getNicknameOfAuthorOAByID = mysqli_query($connect, "
				SELECT nickname FROM articles100percent WHERE id='$id_of_article'
			");
			$getNicknameOfAuthorOAByID = $getNicknameOfAuthorOAByID->fetch_row();
			$getNicknameOfAuthorOAByID = $getNicknameOfAuthorOAByID[0];
		#END
		#LIKE : NOT EXIST - then set
			if($verifyIfLikeExist[0] == 0){
				/*Set->*/$query_LNETS    = mysqli_query($connect, "INSERT INTO liked(Liked, id_of_article, nickname) VALUES ('1','$id_of_article','$nickname')");
				/*START : Notify->*/
					$query_LNETS = mysqli_query($connect, "
						INSERT INTO notifications(nickname, nickname_id, author_of_article, id_of_article, type, status) 
						VALUES('$nickname', '$nickname_id', '$getNicknameOfAuthorOAByID', '$id_of_article', '0', '0')");
				/*END*/
			}
		#LIKE : EXIST - then remove
			else if($verifyIfLikeExist[0] > 0){
				$query_LNETS = mysqli_query($connect, "DELETE FROM liked WHERE Liked = '1' AND id_of_article = '$id_of_article' AND nickname = '$nickname'");
			}
?>