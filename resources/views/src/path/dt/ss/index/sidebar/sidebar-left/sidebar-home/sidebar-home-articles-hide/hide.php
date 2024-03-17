<?php
    #START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
        $userWhichSignIn = null;
    #Проверяем, есть ли данные в $_SESSION['user'] и корректны ли они
        if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
            $userWhichSignIn = $_SESSION['user']['nickname'];
        }
    #Получаем id статьи, которую нужно скрыть
        $gioawsbh_id = $_POST['id'];
    #Отправляем данные в базу данных и проверяем успешность выполнения запроса
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
        $query_stb = mysqli_query($connect, "INSERT INTO hided(nickname, id_of_article_which_is_hided) VALUES ('$userWhichSignIn','$gioawsbh_id')");
    #Check
        if($query_stb){
            #Remove like
                $query_LNETS = mysqli_query($connect, "DELETE FROM liked WHERE Liked = '1' AND id_of_article = '$gioawsbh_id' AND nickname = '$userWhichSignIn'");
        } else {
            #В случае ошибки
                echo "Ошибка при добавлении данных: " . mysqli_error($connect);
        }
?>