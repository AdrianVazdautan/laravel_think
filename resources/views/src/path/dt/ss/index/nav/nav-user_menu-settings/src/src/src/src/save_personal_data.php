<?php
    #START : Проверка наличия активной сессии
	    require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
	    $userWhichSignIn = null;
	    if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
	        $userWhichSignIn = $_SESSION['user']['nickname'];
	    }
    #START : AJAX
	    $nationality = $_POST['nationality'];
	    $town_city   = $_POST['town_city'];
	    $education   = $_POST['education'];
	    $gen         = $_POST['gen'];
    #END
    #START : Check
	    #Check
		    function isValidNationality($nationality) {
		        #Используем регулярное выражение для проверки наличия только букв
		        	return preg_match('/^[a-zA-Zа-яА-ЯёЁ]+$/', $nationality);
		    }
	    #Check
		    if(isValidNationality($nationality)){
		        #Connect
		        	require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
		        #Query
			        $query_save = mysqli_query($connect, "UPDATE users SET nationality='$nationality', city='$town_city', studies='$education', gen='$gen' WHERE nickname='$userWhichSignIn'");
			    #Check
			        if($query_save){
			            echo "Success"; // Данные успешно записаны
			        } else {
			            echo "Error: " . mysqli_error($connect); // Ошибка при выполнении запроса
			        }
		    } else {
		        echo "Error: Invalid Nationality"; // Ошибка валидации национальности
		    }
    #END
?>