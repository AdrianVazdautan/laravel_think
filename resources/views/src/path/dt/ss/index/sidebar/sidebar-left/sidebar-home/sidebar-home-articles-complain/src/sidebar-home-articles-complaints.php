<?php
    #START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
        $userWhichSignIn = null;
    #Проверяем, есть ли данные в $_SESSION['user'] и корректны ли они
        if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
            $userWhichSignIn = $_SESSION['user']['nickname'];
        }
    #Получаем id статьи, для жалобы
        $gioawsbhс_id = $_POST['id'];
        $gioawsbhс_me = $_POST['message'];
    #Отправляем данные в базу данных и проверяем успешность выполнения запроса
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
        $query_stbc = mysqli_query($connect, "INSERT INTO complaints(nickname, id_of_article, message) VALUES ('$userWhichSignIn','$gioawsbhс_id','$gioawsbhс_me')");

        if($query_stbc){
            #Success
                echo "1";
        } else {
            #В случае ошибки
                echo "Ошибка при добавлении данных: " . mysqli_error($connect);
        }
?>
