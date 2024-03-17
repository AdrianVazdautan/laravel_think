<?php
	#START : AJAX
		$newpassword_js = $_POST['newpassword_js'];
		$hash           = $_POST['hash'];
	#Connect
		require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
	#Check : $newpassword_js
		#is empty input
			if($newpassword_js == ""){
				#ERROR 1
					echo "1";
					exit();
			}
		#is NOT empty input
			elseif($newpassword_js != ""){
				#Minimum length 5 characters
					if(strlen($newpassword_js) < 5){
						#ERROR 2
							echo "2";
							exit();
					}
				#Maximum length 100 characters
					elseif(strlen($newpassword_js) > 100){
						#ERROR 3
							echo "3";
							exit();
					}
				#Enough
					else {
						#START : find 'email' of account using hash
							#Query
								$query_FAUH = mysqli_query($connect, "
							        SELECT email FROM recover WHERE hash='$hash'
							    ");
							    $query_FAUH = $query_FAUH->fetch_assoc();
							    $email      = $query_FAUH['email'];
							#Success
								if($query_FAUH){
									#START : UPDATE password
										#Query
											$query_update_password = mysqli_query($connect, "
										        UPDATE users SET password='$newpassword_js' WHERE email='$email'
										    ");
										#Success
											if($query_update_password){
												#SUCCESS
													#Authorize user
														require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/ss/index/nav/nav-sign_in/auth.php");
											} 
										#Error
											else {
												echo "Ошибка при добавлении данных: " . mysqli_error($connect);
												exit();
											}
									#END
								} 
							#Error
								else {
									echo "Ошибка при добавлении данных: " . mysqli_error($connect);
									exit();
								}
						#END
					}
			}
?>