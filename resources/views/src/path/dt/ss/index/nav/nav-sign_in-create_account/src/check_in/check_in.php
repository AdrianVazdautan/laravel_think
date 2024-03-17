<?php 
    #START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
    #0. Get data from ajax request for registering
        $r_emailjs     = $_POST["r_emailjs"];    #if is used echo 1
        $r_usernamejs  = $_POST["r_usernamejs"]; #if is used echo 2
        $r_passwordjs  = $_POST["r_passwordjs"]; #if is used echo 3
        $r_joined_date = date('Y-m-d h:i:s');    #Curent day month year and hour and minutes and seconds

        if(isset($_COOKIE['choosed_language'])){ 
            $r_choosed_language = $_COOKIE['choosed_language']; 
        } else { 
            $r_choosed_language = 'English'; 
        };
    #1. Check if variables are not empty
        function civine($r_emailjs, $r_usernamejs, $r_passwordjs){
            if($r_usernamejs == ""){
                #1 : Username is not written
                    return 1;
            } elseif($r_usernamejs != ""){
                #Username is written
                    if($r_passwordjs == ""){
                        #2 : Password is not written
                            return 2;
                    } elseif($r_passwordjs != ""){
                        #Password is written
                            #Check password length
                                if (strlen($r_passwordjs) < 5) {
                                    #3 : Password is too short
                                        return 3;
                                } else {
                                    return cieinau($r_emailjs, $r_usernamejs, $r_passwordjs);
                                }
                    }  
            }
        }
    #2. Check if email is already used
        function cieinau($r_emailjs, $r_usernamejs, $r_passwordjs){
            #If email is writted
                if($r_emailjs != ""){
                        global $r_choosed_language, $r_joined_date;
                    #Initialize and check database connection
                        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");

                        if (!$connect) {
                            #Database connection failed
                                die("Database connection failed: " . mysqli_connect_error());
                        }

                        $query = mysqli_query($connect, "
                            SELECT * 
                            FROM users 
                            WHERE email = '$r_emailjs'
                        ");
                        $result = mysqli_fetch_assoc($query);

                        if ($result) {
                            #4 : Email is already used
                                return 4;
                        } else {
                            #Email is not used
                                return ciuiau($r_usernamejs);
                        }
                }
            #if email is NOT writted
                elseif($r_emailjs == ""){
                    return ciuiau($r_usernamejs);
                }
        }
    #3. Check if username is already used
        function ciuiau($r_usernamejs){  
                global $r_emailjs, $r_passwordjs, $r_choosed_language, $r_joined_date;
            #Initialize and check database connection
                require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");

                if (!$connect) {
                    #Database connection failed
                        die("Database connection failed: " . mysqli_connect_error());
                }

                $query = mysqli_query($connect, "
                    SELECT * 
                    FROM users 
                    WHERE nickname = '$r_usernamejs'
                ");
                $result = mysqli_fetch_assoc($query);

                if ($result) {
                    #5 : Username is already used
                        return 5;
                } else {
                    #Username is not used
                        return ciplinltfc($r_emailjs, $r_usernamejs, $r_passwordjs);
                }
        }
    #4. Register user into bd
        function ciplinltfc($r_emailjs, $r_usernamejs, $r_passwordjs){
                global $r_choosed_language, $r_joined_date;
            #Initialize and check database connection
                require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
                if (!$connect) {
                    #Database connection failed
                        die("Database connection failed: " . mysqli_connect_error());
                }
            #Escape user input to prevent SQL injection
                $email    = mysqli_real_escape_string($connect, $r_emailjs);
                $username = mysqli_real_escape_string($connect, $r_usernamejs);
                $password = mysqli_real_escape_string($connect, $r_passwordjs);
            #Create SQL query to insert data into users table
                $query = "INSERT INTO users (email, nickname, password, type, choosed_language, joined_date) VALUES ('$email', '$username', '$password', 'User', '$r_choosed_language', '$r_joined_date')";
            #Execute the query
                if (mysqli_query($connect, $query)) {
                    #6 : Registration successful
                        #AUTHORIZE USER
                            #Setting new coockie with chossed language for 28 days
                                setcookie('choosed_language', $r_choosed_language, time() + 2419200, '/');
                            #Set value in session variable
                                $query = mysqli_query($connect, "
                                    SELECT * 
                                    FROM users 
                                    WHERE nickname = '$r_usernamejs' 
                                    AND password   = '$r_passwordjs'
                                ");
                                $result = mysqli_fetch_assoc($query);
                                if($result["type"] == "User"){
                                    #Set value in session variable
                                        $_SESSION["user"] = [
                                            "avatar"   => $result["avatar"],
                                            "nickname" => $result["nickname"],
                                            "id"       => $result["id"],
                                            "type"     => $result["type"]
                                        ];
                                }
                    return 6;
                } else {
                    #7 : Registration failed
                        return 7;
                }
        }
    #5. Begin registration
        #Usage
            $result = civine($r_emailjs, $r_usernamejs, $r_passwordjs);
    #6. Echo codes
        /*
            1 : Username is not written
            2 : Password is not written
            3 : Password is too short
            4 : Email is already used
            5 : Username is already used
            6 : Registration successful
            7 : Registration failed
        */
        echo $result;
?>