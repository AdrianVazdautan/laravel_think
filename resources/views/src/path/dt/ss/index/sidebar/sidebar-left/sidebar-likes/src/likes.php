<?php
    require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");

    #Функция для выполнения запроса и вывода заголовков статей
        function get_articles_using_id($article_ids_array, $connect) {
            #increment for document.getElementsByClassName[if]
                $if        = 0;
                $foundData = false; #флаг для определения, найдены ли данные
            foreach ($article_ids_array as $article_id){
                $query  = "SELECT nickname, title, textarea FROM articles100percent WHERE id='$article_id' AND status='0'";
                $result = mysqli_query($connect, $query);

                if($result){
                    $row = mysqli_fetch_assoc($result);
                    if($row){
                            $foundData              = true; #устанавливаем флаг, что данные найдены
                        #Удаление HTML-тегов из текста
                            $text_without_html_tags = strip_tags($row['textarea']);
                        #Обрезание текста до 120 символов с сохранением слов
                            $trimmed_text           = mb_substr($text_without_html_tags, 0, 150);
                            $trimmed_text           = rtrim($trimmed_text, "!,.-");
                            $last_space             = mb_strrpos($trimmed_text, ' ');
                            $trimmed_text           = mb_substr($trimmed_text, 0, $last_space) . '...';
                        #Обрезание заголовка до 100 символов и добавление трех точек
                            $trimmed_title          = mb_substr($row['title'], 0, 35);
                            if(mb_strlen($row['title']) > 35){
                                $trimmed_title .= '...';
                            }
                        echo "<!--START : WRAPP ITEM-->
                                <div class='liked_window_center p l mb10 mt10'>
                                    <!--START : ITEM-->
                                        <div class='liked_element_article_preview sh p l pa br12'>
                                            <!--START : AVATAR-->
                                                <div class='LEAP_avatar p l'>";
                                                    #Get avatar, background, and nickname using ID
                                                        $query = mysqli_query($connect, "
                                                            SELECT id, avatar, background, nickname
                                                            FROM users
                                                            WHERE nickname = '".$row['nickname']."'
                                                        ");
                                                        
                                                        if($profile_user = mysqli_fetch_assoc($query)){
                                                            $isp_Avatar  = $profile_user['avatar'];
                                                        }
                                                    #Check if image is NOT stored in BD
                                                        if($isp_Avatar == ""){
                                                            $Show_Avatar = "<div class='LEAP_avatar_size p l dg alc jcc br50 cw' style='background: blue;'>".substr($row['nickname'], 0, 1)."</div>";
                                                        } 
                                                    #Check if image is stored in BD
                                                        else if($isp_Avatar != "" && $isp_Avatar != NULL){
                                                            #START : Obtain image_name.png from bd
                                                                /*Query->*/ $query_image_name = mysqli_query($connect, "SELECT avatar FROM users WHERE nickname='".$row['nickname']."'");
                                                                /*Result->*/$query_image_name = $query_image_name->fetch_row();
                                                                #Check if query was successfull
                                                                    if($query_image_name){
                                                                        #Запрос выполнен успешно 
                                                                            $Show_Avatar = "<img class='LEAP_avatar_size br50' src='src/du/avatar/". $query_image_name[0] ."'/>";
                                                                    } else {
                                                                        #В случае ошибки
                                                                    }
                                                            #END
                                                        }
                                                    #Show avatar
                                                        echo $Show_Avatar;
                                                echo "
                                                </div>
                                            <!--END-->
                                            <!--START : WRAPP-->
                                                <div class='LEAP_title_text p l ml20'>
                                                    <!--START : Title-->
                                                        <div class='LEAP_title w100 fw f24 c p l' title='". htmlspecialchars($row['title'], ENT_QUOTES) ."' onclick='show_article_in_extended_mode(".$article_id."), close_likes_window_popup()'>
                                                            ". htmlspecialchars($trimmed_title, ENT_QUOTES) ."
                                                        </div>
                                                    <!--END-->
                                                    <!--START : Author-->
                                                        <div class='f14 p l mt5 tdu c' onclick='wshowUserProfile(".$profile_user['id'].",`".$row['nickname']."`)'>
                                                            Author: ".$row['nickname']."
                                                        </div>
                                                    <!--END-->
                                                    <!--START : Text-->
                                                        <div class='LEAP_text w100 f18 mt5 p l'>
                                                            ". nl2br($trimmed_text) ."
                                                        </div>
                                                    <!--END-->
                                                </div>
                                            <!--END-->
                                        </div>
                                    <!--END-->
                                    <!--START : Remove/Share-->
                                        <div class='LEAP_remove_share ab dg alc pal'>
                                            <div class='LEAP_remove_btn br50 dg alc jcc c' onclick='remove_like_from_article(". $if++ .",".$article_id."001)'>
                                                <div class='LEAP_btnw'>
                                                    <div class='ab h3 w26 LEAP_close_color br4' style='transform: rotate(45deg);'></div>
                                                    <div class='ab h3 w26 LEAP_close_color br4' style='transform: rotate(-45deg);'></div>
                                                </div>
                                            </div>
                                        </div>
                                    <!--END-->
                                </div>
                            <!--END-->
                        ";
                    }
                } else {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connect) . "<br>";
                }
            }
            echo "<div class='count_of_active_elements_js none'>". $if ."</div>";
                echo "<!--START : Session : true-->
                        <div class='puwsulik_session_true_js dg alc jcc hi none' style='width: 600px;'>
                            <div class='puwsu1 dg alc jcc'>
                                <div class='puwsu2 p'>
                                    <div class='dg jcc w100'>
                                        <div class='puwsu4l w80 h80 bgsz80 bgnr'><!--icon--></div>
                                    </div>
                                    <div class='puwsu5 f24 mt20 w100 t '>
                                        Enjoy your favourite articles
                                    </div>
                                    <div class='puwsu6 mt20 w100 t f14'>
                                        Access articles that you've liked
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--END-->
                ";
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['load']) && $_POST['load'] === "1" && isset($_SESSION['user']['nickname'])){
                $nickname = $_SESSION['user']['nickname'];
                require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
                $id_of_liked_articles = mysqli_query($connect, "SELECT id_of_article FROM liked WHERE nickname='$nickname' ORDER BY dateofpublication DESC");
                if($id_of_liked_articles){
                    if(mysqli_num_rows($id_of_liked_articles) > 0){
                        $article_ids_array = array();
                        while($row = mysqli_fetch_assoc($id_of_liked_articles)){
                            $article_ids_array[] = $row['id_of_article'];
                        }
                        #Вызываем функцию get_articles_using_id() с массивом ID статей и подключением к БД
                        get_articles_using_id($article_ids_array, $connect);
                    } else {
                        echo "  <!--START : Session : true-->
                                    <div class='puwsulik_session_true_js dg alc jcc hi' style='width: 600px;'>
                                        <div class='puwsu1 dg alc jcc'>
                                            <div class='puwsu2 p'>
                                                <div class='dg jcc w100'>
                                                    <div class='puwsu4l w80 h80 bgsz80 bgnr'><!--icon--></div>
                                                </div>
                                                <div class='puwsu5 f24 mt20 w100 t '>
                                                    Enjoy your favourite articles
                                                </div>
                                                <div class='puwsu6 mt20 w100 t f14'>
                                                    Access articles that you've liked
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!--END-->
                            ";
                    }
                } else {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connect);
                }
                mysqli_close($connect); #Закрыть соединение с базой данных
            }
        }
?>