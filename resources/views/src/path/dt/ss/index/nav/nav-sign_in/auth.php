<?php 
	#START : Проверка наличия активной сессии
	    require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
	#END
		require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
		$inputUsername = $_POST["inputUsername"] ?? $email;
		$inputPassword = $_POST["inputPassword"] ?? $newpassword_js;
	#Check username or email
		function cuoe($usernameOrEmail, $password){
			#If username or email is NOT writted
				if($usernameOrEmail == ""){
					#ERROR NR.1
						#1 : Username or email is NOT writted
						echo "1";
				}
			#If username or email is writted
				elseif($usernameOrEmail != ""){
					#Check if is email address
						if(filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)){
						    #Is email address
						    	cipinw($usernameOrEmail, "is_email", $password);
						} else {
						    #Is NOT email address. Then is username
						    	cipinw($usernameOrEmail, "is_username", $password);
						}
				}
		}
	#Check password
		function cipinw($usernameOrEmail, $IsUsernameOrIsEmail, $password){
			#If password is NOT writted
				if($password == ""){
					#ERROR NR.2
						#2 : Password is NOT writted
						echo "2";
				}
			#If password is writted
				elseif($password != ""){
					#Check if Username is registered
						if($IsUsernameOrIsEmail == "is_username"){
							$c_username = $usernameOrEmail;
							/*Run function which check if Username is registered->*/ciuir($c_username, $password);
						}
					#Check if Email is registered
						elseif($IsUsernameOrIsEmail == "is_email"){
							$c_email = $usernameOrEmail;
							/*Check if Email is registered->*/cieir($c_email, $password);
						}
				}
		}
	#Check if Username is registered
		function ciuir($c_username, $password){
		    #Initialize and check database connection
				require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
			    if(!$connect){
			        #Database connection failed
			        	die("Database connection failed: " . mysqli_connect_error());
			    }
		    #Escape user input to prevent SQL injection
				$username = mysqli_real_escape_string($connect, $c_username);
		    #Create SQL query to check if username is registered
			    $query = mysqli_query($connect, "
			        SELECT * 
			        FROM users 
			        WHERE nickname = '$c_username'
			    ");
			    $result = mysqli_fetch_assoc($query);
			    if($result){
			        /*Username is registered*/ auuep($username, "is_username", $password);
			    } else {
			        #ERROR NR.3
				        #3 : Username is NOT registered
				        echo "3";
			    }
		}
	#Check if Email is registered
		function cieir($c_email, $password){
			#Initialize and check database connection
			    require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
			    if(!$connect){
			        #Database connection failed
			        	die("Database connection failed: " . mysqli_connect_error());
			    }
		    #Escape user input to prevent SQL injection
		    	$c_email = mysqli_real_escape_string($connect, $c_email);
		    #Create SQL query to check if username is registered
			    $query = mysqli_query($connect, "
			        SELECT * 
			        FROM users 
			        WHERE email = '$c_email'
			    ");
			    $result = mysqli_fetch_assoc($query);
			    if($result){
			        /*Email is registered*/ auuep($c_email, "is_email", $password);
			    } else {
			        #ERROR NR.4
				        #4 : Email is NOT registered
				        echo "4";
			    }
		}
	#Authorize user
		function auuep($data_username_or_email, $IsUsernameOrIsEmail, $data_password){
		    #Init and check connection to bd
			    require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
			    if(!$connect){
			        #Failed connection to bd
			        die("Database connection failed: " . mysqli_connect_error());
			    }
		    #Escape user input to prevent SQL injection
			    $username_or_email = mysqli_real_escape_string($connect, $data_username_or_email);
			    $password          = mysqli_real_escape_string($connect, $data_password);
		    #Choose request which will by executed
		    	#if $inputUsername is username
				    if($IsUsernameOrIsEmail == "is_username"){
				    	$query = mysqli_query($connect, "
					        SELECT * 
					        FROM users 
					        WHERE nickname = '$data_username_or_email' 
					        AND password = '$data_password'
					    ");
				    }
			    #if $inputUsername is email
				    elseif($IsUsernameOrIsEmail == "is_email"){
				    	$query = mysqli_query($connect, "
					        SELECT * 
					        FROM users 
					        WHERE email = '$data_username_or_email' 
					        AND password = '$data_password'
					    ");
				    }
			$result = mysqli_fetch_assoc($query);

		    if($result){
		    	#SUCCESS NR.5
			        #True Username or Email and Password
					#AUTHORIZE USER
						#Setting new coockie with chossed language for 28 days
							setcookie('choosed_language', $result["choosed_language"], time() + 2419200, '/');
						#If is user
							if($result["type"] == "User"){
								#Set value in session variable
									$_SESSION["user"] = [
										"avatar"      => $result["avatar"],
										"nickname"    => $result["nickname"],
										"id"          => $result["id"],
										"type"        => $result["type"],
										"code"        => "",
										"code_status" => "false",
										"code_email"  => ""
									];
								#Succesfull authorization
			    					echo "5";
							}
						#If is admin
							elseif($result["type"] == "admin"){
								#Set value in session variable
									$_SESSION["admin"] = [
										"avatar"   => $result["avatar"],
										"nickname" => $result["nickname"],
										"type"     => $result["type"],
										"status"   => "false"
									];
								#Succesfull authorization
			    					echo "7";
							}
		    } else{
		    	#ERROR NR.6
			        #Invalid password
			        echo "6";
		    }
		}
	#Run function cuoe($usernameOrEmail, $password){...}
		cuoe($inputUsername, $inputPassword);
?>