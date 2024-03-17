<?php
    #START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
        $userWhichSignIn = null;
        if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
            $userWhichSignIn = $_SESSION['user']['nickname'];
        }
    #START : AJAX : Session : true : user-menu->settings->personal information->upload avatar. Save image in folder
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['croppedImage'])) {
                // Укажите путь к папке, куда будут загружены изображения
                    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/src/du/avatar/"; 
                // Получение имени файла на основе имени пользователя и текущей даты и времени
                    $username = $userWhichSignIn; // Замените "username" на фактическое имя пользователя
                    $timestamp = date("dmYHis"); // Получение текущей даты и времени
                    $avatar_username_timestamp_png = "avatar_" . $username . "_" . $timestamp . ".png";
                    $uploadFile = $uploadDir . $avatar_username_timestamp_png;
                // Перемещаем изображение из временной директории в нужное место на сервере
                    if (move_uploaded_file($_FILES['croppedImage']['tmp_name'], $uploadFile)) {
                        echo "Изображение успешно загружено.";
                    } else {
                        echo "Ошибка при загрузке изображения: " . $_FILES['croppedImage']['error'];
                    }
            } else {
                echo "Изображение не было передано.";
            }
        }
    #END
    #START : Save image_name.png to bd : users->avatar
        /*Connect to bd->*/require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
        /*Query->*/$query_delete_stb = mysqli_query($connect, "UPDATE `users` SET `avatar` = '$avatar_username_timestamp_png' WHERE `users`.`nickname` = '$userWhichSignIn';");
        #Check if query was successfull
            if($query_delete_stb){
                #Запрос выполнен успешно 
            } else {
                #В случае ошибки
            }
    #END
?>