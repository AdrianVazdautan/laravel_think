<?php
	/*SELECT FROM BD BY ID OBTAINED FROM URL
		BD : users
			$isp_Avatar    : avatar
			$isp_Background: background
			$isp_Username  : nickname
	*/
	#Obtain ID from URL
	    function getIdFromURL(){
			#Check if URL is correctly formatted
				if(preg_match('/^\/profile\.php\?id\d+$/', $_SERVER['REQUEST_URI'])){
					#URL address has correct format
						return str_replace('/profile.php?id', '', $_SERVER['REQUEST_URI']);
				} else {
					#Incorrect URL format address
						require_once "404.php";
						exit();
				}
	    }
	/*Get ID from URL when page load->*/$idFromURL = getIdFromURL();
    require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");

    #Get avatar, background, and nickname using ID
	    $query = mysqli_query($connect, "
	        SELECT avatar, background, nickname
	        FROM users
	        WHERE id = $idFromURL
	    ");
    
    if($profile_user = mysqli_fetch_assoc($query)){
        $isp_Avatar     = $profile_user['avatar'];
        $isp_Background = $profile_user['background'];
        $isp_Username   = $profile_user['nickname'];
    } else {
        #User with the specified ID was not found
	        require_once "404.php";
	        exit();
    } 
?>