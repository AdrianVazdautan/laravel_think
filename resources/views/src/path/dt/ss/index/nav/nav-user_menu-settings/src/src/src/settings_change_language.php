<?php
	#Подключение к сессии пользователя и получение его nickname
		session_start();
		if(isset($_SESSION["user"]) && isset($_SESSION["user"]["nickname"])){
		    $nicknameSCL = $_SESSION["user"]["nickname"];
		} else {
		    #Обработка случая, когда сессия пользователя не установлена или отсутствует нужное значение
		    #Например, перенаправление на страницу авторизации
		    echo "Ошибка: Пользователь не авторизован.";
		    exit;#Для прерывания выполнения скрипта
		}
	#Получение выбранного пользователем языка из POST-запроса
		$selectedLanguage = $_POST['selectedLanguage'];
	#Проверка, не пуст ли выбранный язык
		if(empty($selectedLanguage)){
		    #Ошибка: Пользователь не выбрал язык
		    	echo "1";
		} else {
		    #Проверка, входит ли выбранный язык в список допустимых
		    	$allowedLanguages = ["English", "Spanish", "French", "Turkish", "Portuguese", "Romanian", "Dutch", "Polish", "Ukrainian"];
			    if(in_array($selectedLanguage, $allowedLanguages)){
			        #Выполняем обновление языка в базе данных
				        if(fUDTUCLSL($selectedLanguage)){
				            #Обновление прошло успешно
				            	echo "Обновление прошло успешно";
				        }
			    } else {
			        #Ошибка: Неверный выбранный язык
			        	echo "2";
			    }
		}
	#Функция для обновления языка в базе данных
		function fUDTUCLSL($selectedLanguage){
		    #Подключение к базе данных
			    require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
				
			    if(!$connect){
			        #Ошибка подключения к базе данных
			        	die("Database connection failed: " . mysqli_connect_error());
			    }
		    #Защита от SQL-инъекций
			    $selectedLanguage = mysqli_real_escape_string($connect, $selectedLanguage);
			    global $nicknameSCL;
		    #Выполнение запроса на обновление языка
			    $query = mysqli_query($connect, "
			        UPDATE users 
			        SET choosed_language = '$selectedLanguage'
			        WHERE nickname = '$nicknameSCL'
			    ");
			    if($query){
			        #Обновление прошло успешно
			        	#SUCCESS
		            		/*Set new cookie->*/fscluc($selectedLanguage);
			    } else {
			        #Ошибка при обновлении
			        	#ERROR NR: 003
		            		echo "3";
			    }
		}
	#UPDATE cookie
		function fscluc($selectedLanguage){
			#Setting new coockie with chossed language for 28 days
				setcookie('choosed_language', $selectedLanguage, time() + 2419200, '/');
			#Reload page of site for udpdate with choosed language
				echo "4";
		}
?>