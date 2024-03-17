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
	    $new_password     = $_POST['new_password'];
    #END
    #START : Check password
        #Connect
        	require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
        #Query get password
	        $query_get_password = mysqli_query($connect, "SELECT password FROM users WHERE nickname='$userWhichSignIn'");
	        $query_get_password = $query_get_password->fetch_row();
	    #Check if : The current password is not correct
	        if($query_get_password[0] != $current_password){
	        	#ERROR
	        		echo "1";
	        }
	    #Check if : The current password is correct
	        elseif($query_get_password[0] == $current_password){
    			#SUCCESS
        			#Query
						$query_remove_view_to_bd = mysqli_query($connect, "
							UPDATE users SET password='$new_password' WHERE nickname='$userWhichSignIn'
						");
					#Запрос выполнен успешно
						if($query_remove_view_to_bd){
							echo "Success";
						} 
					#В случае ошибки
						else {
							echo "Ошибка при добавлении данных: " . mysqli_error($connect);
						}
	        }
    #END
?>