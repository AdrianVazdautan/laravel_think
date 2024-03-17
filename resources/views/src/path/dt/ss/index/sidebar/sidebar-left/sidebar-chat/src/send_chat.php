<?php
	#START : AJAX
		$get_message = $_POST['get_message'];
	#END
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
		$userWhichSignIn = null;
		if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
		    $userWhichSignIn = $_SESSION['user']['nickname'];
			#START : Check get_message
				#If is empty
					if($get_message == ""){
						#ERROR NR:1
							echo "1";
					}
				#If is NOT empty
					elseif($get_message != ""){
						/*Save chat message to bd->*/save_chat_message_to_bd($userWhichSignIn, $get_message);
					}
			#END
		} else {
			#Сессия не активна, возвращаем ошибку
        		echo "Сессия не активна";
		}
	#START : Save
		function save_chat_message_to_bd($userWhichSignIn, $get_message){
			#Connect
				require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
			#Защита от SQL-инъекций (используйте prepared statements)
		        $userWhichSignIn = mysqli_real_escape_string($connect, $userWhichSignIn);
		        $get_message = mysqli_real_escape_string($connect, $get_message);
			#Query
				$query_save_view_to_bd = mysqli_query($connect, "INSERT INTO chat(nickname, message) VALUES('$userWhichSignIn','$get_message')");
			#Запрос выполнен успешно
				if($query_save_view_to_bd){

				} 
			#В случае ошибки
				else {
					echo "Ошибка при добавлении данных: " . mysqli_error($connect);
				}
		}
	#END
?>