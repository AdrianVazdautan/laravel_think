<?php 
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
	if($_SESSION["admin"]){
		echo "qwe";
	} 
?>