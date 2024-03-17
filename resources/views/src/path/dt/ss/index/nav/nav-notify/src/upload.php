<?php
    #Show notifications if exist
    #START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
        $userWhichSignIn = null;
        if(isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])){
            $userWhichSignIn = $_SESSION['user']['nickname'];
        }
    #AJAX
        $upload = $_POST['upload'];
    #Connect
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
    #Time
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/time.php");
    #Check
        if($upload == 1){
            #Query
                $query_upload_notify = mysqli_query($connect, "SELECT nickname, nickname_id, author_of_article, id_of_article, type, status FROM notifications WHERE author_of_article='$userWhichSignIn' AND status='0'");
            #Запрос выполнен успешно
                if($query_upload_notify){
                    if(mysqli_num_rows($query_upload_notify) == 0){
                        echo "nothing";
                    } else {
                        while($notify = mysqli_fetch_assoc($query_upload_notify)){
                            #START : Query ->get title from article
                                #Query
                                    $query_get_title_FA = mysqli_query($connect, "SELECT title FROM articles100percent WHERE id='".$notify['id_of_article']."'");
                                    $query_get_title_FA = $query_get_title_FA->fetch_row();
                            #END
                            #START : Query -> get date from notification
                                    $n_nickname      = $notify['nickname'];
                                    $n_id_of_article = $notify['id_of_article'];
                                #Query
                                    $query_get_date_FN = mysqli_query($connect, "SELECT dateofpublication FROM notifications WHERE author_of_article='$userWhichSignIn' AND nickname='$n_nickname' AND id_of_article='$n_id_of_article' AND status='0' LIMIT 1");
                                    $query_get_date_FN = $query_get_date_FN->fetch_row();
                            #END
                            #Check type
                                #0 : Like
                                    if($notify['type'] == 0){
                                        $type_of_notify = "liked article:";
                                    }
                                #1 : Comment
                                    if($notify['type'] == 1){
                                        $type_of_notify = "commented article:";
                                    }
                            #Date
                                $getTimeAgo = getTimeAgo($query_get_date_FN[0]);
                            echo "
                                <div class='bnwnr1 p l w100'>
                                    <div class='p l'>
                                        <div class='bnwnr3 br50 l ml20'>";
                                            #Get avatar, background, and nickname using ID
                                                $query = mysqli_query($connect, "
                                                    SELECT avatar, background, nickname
                                                    FROM users
                                                    WHERE nickname = '".$notify['nickname']."'
                                                ");
                                                
                                                if($profile_user = mysqli_fetch_assoc($query)){
                                                    $isp_Avatar = $profile_user['avatar'];
                                                }
                                            #Check if image is NOT stored in BD
                                                if($isp_Avatar == ""){
                                                    $Show_Avatar = "<div class='p l dg alc jcc br50 cw w36 h36' style='background: blue;'>".substr($notify['nickname'], 0, 1)."</div>";
                                                } 
                                            #Check if image is stored in BD
                                                else if($isp_Avatar != "" && $isp_Avatar != NULL){
                                                    #START : Obtain image_name.png from bd
                                                        /*Query->*/ $query_image_name = mysqli_query($connect, "SELECT avatar FROM users WHERE nickname='".$notify['nickname']."'");
                                                        /*Result->*/$query_image_name = $query_image_name->fetch_row();
                                                        #Check if query was successfull
                                                            if($query_image_name){
                                                                #Запрос выполнен успешно 
                                                                    $Show_Avatar = "<img class='l w36 h36 br50' src='src/du/avatar/". $query_image_name[0] ."'/>";
                                                            } else {
                                                                #В случае ошибки
                                                            }
                                                    #END
                                                }
                                            #Show avatar
                                                echo $Show_Avatar;
                                            echo "
                                        </div>
                                    </div>
                                    <div class='bnwnr4 p l'>
                                        <div class='bnwnr5 p l w100'>
                                            <b class='c aas f14' onclick='wshowUserProfile(`".$notify['nickname_id']."`,`".$notify['nickname']."`)'>".$notify['nickname']."</b> <span class='cs f14'> ".$getTimeAgo." ".$type_of_notify."</span> <span class='articleLink c f16' onclick='show_article_in_extended_mode(".$notify['id_of_article'].")'>&quot;".$query_get_title_FA[0]."&quot;</span>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    }
                    #START : Hide all notifications
                        $query = mysqli_query($connect, "
                            UPDATE notifications SET status='1' WHERE author_of_article='$userWhichSignIn'
                        ");
                    #END
                } 
            #В случае ошибки
                else {
                    echo "Ошибка при добавлении данных: " . mysqli_error($connect);
                }
        }
?>