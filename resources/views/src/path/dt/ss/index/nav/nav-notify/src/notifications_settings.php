<?php
    #START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
        $userWhichSignIn = null;
        if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
            $userWhichSignIn = $_SESSION['user']['nickname'];
        }
    #AJAX
        $settings = $_POST['settings'];
    #Connect
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
    #Check
        if($settings != ""){
            #START : value
                #0 : Show all
                    if($settings == 0){
                        $value = $settings;
                    }
                #1 : Hide all
                    elseif($settings == 1){
                        $value = $settings;
                    }
                #2 : Hide commentaries | Show likes
                    elseif($settings == 2){
                        $value = $settings;
                    }
                #3 : Hide likes | Show commentaries
                    elseif($settings == 3){
                        $value = $settings;
                    }
                #Error
                    else {
                        echo "Error";
                    }
            #END
            #START : UPDATE settings
                $query = mysqli_query($connect, "
                    UPDATE users SET notifications_settings='$value' WHERE nickname='$userWhichSignIn'
                ");
            #END
        }
?>