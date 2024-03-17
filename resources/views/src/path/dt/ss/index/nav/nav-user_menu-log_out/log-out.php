<?php 
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
	$logOut = $_POST["logOut"];

	if($logOut == "1"){
		unset(
			$_SESSION["user"]
		);
		header("Location: ../../../../../../../index.php");
	}
?>