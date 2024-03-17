<?php
    #START : Проверка наличия активной сессии
	    require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
	    $userWhichSignIn = null;
	    if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
	        $userWhichSignIn = $_SESSION['user']['nickname'];
	    }
    #START : AJAX
	    $r_email_current_password_js = $_POST['r_email_current_password_js'] ?? null;
	    $r_new_email_js              = $_POST['r_new_email_js'] ?? null;
    #START : AJAX 2
	    $verification_code           = $_POST['verification_code'] ?? null;
    #END
	#START : Check password
        #Connect
        	require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
        #Query get password
	        $query_get_password = mysqli_query($connect, "SELECT password FROM users WHERE nickname='$userWhichSignIn'");
	        $query_get_password = $query_get_password->fetch_row();
	    #Check if : The current password is not correct
	        if($query_get_password[0] != $r_email_current_password_js && $_SESSION["user"]["code_status"] == "false"){
	        	#ERROR
	        		echo "1";
	        }
	    #Check if : The current password is correct
	        elseif($query_get_password[0] == $r_email_current_password_js){
    			#START : Check if : email exist
    				#Query get email
				        $query_get_email = mysqli_query($connect, "
				        	SELECT COUNT(*) FROM users WHERE email='$r_new_email_js'
				        ");
				        $query_get_email = $query_get_email->fetch_row();
				    #1 : Email is already used
				        if($query_get_email[0] == 1){
				        	#ERROR
				        		echo "2";
				        }
				    #0 : Email is free
				        elseif($query_get_email[0] == 0){
				        	#START : SEND
				        		#START : Save result of check password/email
				        			$_SESSION["user"]["code_status"] = "true";
				        			$_SESSION["user"]["code_email"] = $r_new_email_js;
				        		#END
				        		#START : Generate code
				        			$_SESSION["user"]["code"] = mt_rand(100000, 999999);
				        		#END
				        		#START : Send code to email
				        			$markup  = "
						                <html>
						                <head>
						                	<style>
						                		.melewr{
													width          : 100%;
													display        : grid;
													justify-content: center;
													padding-bottom : 25px;
													font-family    : Arial;
												}
												.melewr_box{
													position      : relative;
													max-width     : 600px;
													background    : white;
													padding-left  : 20px;
													padding-right : 20px;
													padding-bottom: 20px;
												}
						                	</style>
						                </head>
						                <body>
						                	<div class='melewr'>
												<div class='melewr_box'>
												    <h1>Confirm your email address</h1>
												 	<p>There's one quick step you need to complete in order to confirm your email address.</p>
												 	<p>Please enter this verification code when prompted</p>
													<b>".$_SESSION["user"]["code"]."</b>
													<p>Do not share this code with anyone. If you did not request a code, someone may be trying to gain access to your account. We recommend changing your password.</p>
												</div>
											</div>
						                </body>
						                </html>
						            ";
						            $to      = $r_new_email_js;
						            $subject = $_SESSION["user"]["code"]." is your verification code";
						            $message = $markup;
						            $headers = "From: no-reply@think.ceo" . "\r\n" .
						                       "X-Mailer: PHP/" . phpversion() . "\r\n" .
						                       "Content-Type: text/html; charset=UTF-8";
						            if(mail($to, $subject, $message, $headers)){
						                #Email sent successfully
						        	        #echo "codeSentSuccessfully";
						            } else {
						               	#Failed to send email
						        	        #echo "FailedCodeSentSuccessfully";
						            }
				        		#END
				        		#START : Switch on client side window for confirmation window
				        			echo "3";
				        		#END
				        	#END
				        }
	        	#END
	        }
    #END
	#START : Verify code
		#Check if is NOT empty
	        if($verification_code != ""){
        		#Code is NOT writted
	        		if($verification_code == ""){
	        			#ERROR
	        				echo "4";
	        		}
	        	#Code is writted
	        		elseif($verification_code != "" && $_SESSION["user"]["code_status"] == "true"){
	        			#Code is NOT equal to
	        				if($verification_code != $_SESSION["user"]["code"]){
	        					#ERROR
	        						echo "5";
	        				}
	        			#Code is equal
	        				elseif($verification_code == $_SESSION["user"]["code"]){
				        		#START : UPDATE status -> result of check password/email
				        			$_SESSION["user"]["code_status"] = "false";
				        		#END
	        					#START : UPDATE : email in table users
				        			#SUCCESS
				        					$r_new_email_js = $_SESSION["user"]["code_email"];
					        			#Query
											$query_change_email = mysqli_query($connect, "
												UPDATE users SET email='$r_new_email_js' WHERE nickname='$userWhichSignIn'
											");
										#Запрос выполнен успешно
											if($query_change_email){
	        									#Show success message : Email was changed
													echo "Success";
											} 
										#В случае ошибки
											else {
												echo "Ошибка при добавлении данных: " . mysqli_error($connect);
											}
				        		#END
	        				}
	        		}
	        }
	#END
?>