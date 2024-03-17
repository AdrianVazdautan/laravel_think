<?php
    #Required
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #Defined var
        $nickname = $_SESSION["user"]["nickname"];
        $theme    = $_POST['theme'];
    #Check var $theme
        #theme is empty
            if($theme == ""){
                #ERROR NR: 001
                    echo "1";
            } 
        #theme is NOT empty
            else {
                #Check if theme contains one value from these: 0; 1; 2;
                    if($theme == "0" || $theme == "1" || $theme == "2"){
                        fSSMOAIB($theme);
                    } 
                #theme NOT contains one value from these: 0; 1; 2;
                    else {
                        #ERROR NR: 002
                            echo "2";
                    }
            }
    #Save selected mode of appearance in BD
        function fSSMOAIB($theme){
            global $nickname;
            require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");

            if(!$connect){
                die("Connection failed: " . mysqli_connect_error());
            }

            $theme = mysqli_real_escape_string($connect, $theme);
            $sql   = "UPDATE `users` SET `Appearance` = '$theme' WHERE `users`.`nickname` = '$nickname';";

            if(mysqli_query($connect, $sql)){
                echo "Update successful";
            } else {
                echo "Error: " . mysqli_error($connect);
            }

            mysqli_close($connect);
        }
?>