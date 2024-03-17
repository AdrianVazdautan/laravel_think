<?php
	#START : AJAX
		$id_of_article = substr($_POST['id_of_article'], 0, -3);
	#END
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
		$userWhichSignIn = null;
		if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
		    $userWhichSignIn = $_SESSION['user']['nickname'];
		}
	#START : Send
		#Connect
			require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
		#Query
			$query_save_view_to_bd = mysqli_query($connect, "INSERT INTO history(nickname, id_of_article, status) VALUES('$userWhichSignIn','$id_of_article','0')");
		#Запрос выполнен успешно
			if($query_save_view_to_bd){

			} 
		#В случае ошибки
			else {
				echo "Ошибка при добавлении данных: " . mysqli_error($connect);
			}
	#END
?>