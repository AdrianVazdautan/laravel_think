<?php
    #START : Проверка наличия активной сессии
        if(session_status() == PHP_SESSION_NONE){
            #Если сессия не запущена, запустить новую сессию
                session_start();
        }
    #END
?>