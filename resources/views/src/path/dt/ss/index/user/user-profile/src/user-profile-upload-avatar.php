<?php
    #AJAX
        $id_of_user = $_POST['id'];
    #Required
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
    #Query: Obtain avatar-name.png
        $query_get_avatar_name = mysqli_query($connect, "SELECT avatar FROM users WHERE id='$id_of_user'");
    #Check if the query returned a result
        if($query_get_avatar_name){
            $row = $query_get_avatar_name->fetch_row();
            if($row && !empty($row[0])){
                #If a result is found and it's not empty, echo the avatar name
                    echo $row[0];
            } else {
                #If no result is found or it's empty, echo a message indicating no avatar found
                    echo "1"; // или любое другое сообщение об отсутствии аватара
            }
        } else {
            #If there was an error in the query, echo an error message
                echo "2"; // или другое сообщение об ошибке запроса
        }
?>
