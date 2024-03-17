<?php 
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
	require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
	
	$col_a_2_2_inputjs = $_POST["col_a_2_2_inputjs"];
	$nickname          = $_SESSION["admin"]["nickname"];
	$query             = mysqli_query($connect,"
		SELECT 2FA FROM users WHERE nickname='$nickname'
	");

	while($response = mysqli_fetch_assoc($query)){
		$password_2 = $response["2FA"];
	}

	if($col_a_2_2_inputjs == $password_2){
		$_SESSION["admin"]["status"] = "true";
		echo "1";
	}
?>