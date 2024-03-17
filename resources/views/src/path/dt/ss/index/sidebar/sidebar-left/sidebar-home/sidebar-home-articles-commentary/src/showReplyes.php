<?php
    #AJAX
        $showedAlreadyCountOfReplyes = $_POST['showedAlreadyCountOfReplyes'] ?? 0;
        $artID2DifferentSource       = $article['id'] ?? 85;
        $IDWWRA                      = $_POST["IDWWRA"];#Which page is opened
    #Required
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/time.php");
    #START : whrID : $showedAlreadyCountOfReplyes scenary
        #0 : first loading
            if($showedAlreadyCountOfReplyes == "0"){
                $whrIDnone = "none";
            }
        #1 : Second loading
            elseif($showedAlreadyCountOfReplyes > "0"){
                $whrIDnone = "";
            }
    #END
    #Проверка существования ответов
        $requestReplyCheckIfExist = mysqli_query($connect, "
            SELECT COUNT(*)
            FROM articles_commentary 
            WHERE artID = '$artID2DifferentSource' AND type_of_comment = '1'
        ");
        $resultRRCIE = $requestReplyCheckIfExist->fetch_row();
    #Если ответы НЕ существуют
        if($resultRRCIE[0] == 0){
            #Действия при отсутствии ответов
        }
    #Если ответы существуют
        elseif($resultRRCIE[0] > 0){
                $requestReply = mysqli_query($connect, "
                    SELECT * 
                    FROM articles_commentary 
                    WHERE artID = '$artID2DifferentSource' AND type_of_comment = '1' LIMIT 5 OFFSET $showedAlreadyCountOfReplyes;
                ");
            #Проверка грамматики
                if($resultRRCIE[0] == 1){
                    $replyText = "Reply";
                } elseif($resultRRCIE[0] > 1){
                    $replyText = "Replies";
                }
            #Button REPLY
                #START : whrID : $showedAlreadyCountOfReplyes scenary
                    #0 : first loading
                        if($showedAlreadyCountOfReplyes == "0"){
                            $buttonShowMoreReplyes = "
                                <div class='w100 p l'>
                                    <div class='p l u pal10 par10 br12 sdfrhr sdfrhrID".$artID2DifferentSource.$IDWWRA."' onclick='whrID(".$artID2DifferentSource.$IDWWRA.")'>
                                        <span class='p l sdfrhrspanID".$artID2DifferentSource.$IDWWRA."'>&#x25BE;</span><span class='p l ml10'><span class='resultRRCIeID".$artID2DifferentSource.$IDWWRA."'>".$resultRRCIE[0]."</span> ".$replyText."</span>
                                    </div>
                                </div>
                            ";
                        }
                    #1 : Second loading
                        elseif($showedAlreadyCountOfReplyes > "0"){
                            $buttonShowMoreReplyes = "";
                        }
                #END
                $buttonCommentReply = $buttonShowMoreReplyes;
                #Show button reply if not was sended ajax request
                    echo $buttonCommentReply;
                    echo "<div class='w100 p l whrID".$artID2DifferentSource.$IDWWRA." ".$whrIDnone."'>";
            while($reply_req = mysqli_fetch_assoc($requestReply)){
                echo "
                    <div class='ccr22 ccrReplyID".$artID2DifferentSource.$IDWWRA."'>
                        <!--START : AVATAR-->
                            <div class='ccr3'>";
                                #Get avatar, background, and nickname using ID
                                    $query = mysqli_query($connect, "
                                        SELECT avatar, background, nickname
                                        FROM users
                                        WHERE nickname = '".$reply_req['nickname']."'
                                    ");
                                    
                                    if($profile_user = mysqli_fetch_assoc($query)){
                                        $isp_Avatar     = $profile_user['avatar'];
                                    }
                                #Check if image is NOT stored in BD
                                    if($isp_Avatar == ""){
                                        $Show_Avatar = "<div class='p l dg alc jcc br50 cw' style='background: blue; width: 24px; height: 24px;'>".substr($reply_req['nickname'], 0, 1)."</div>";
                                    } 
                                #Check if image is stored in BD
                                    else if($isp_Avatar != "" && $isp_Avatar != NULL){
                                        #START : Obtain image_name.png from bd
                                            /*Query->*/ $query_image_name = mysqli_query($connect, "SELECT avatar FROM users WHERE nickname='".$reply_req['nickname']."'");
                                            /*Result->*/$query_image_name = $query_image_name->fetch_row();
                                            #Check if query was successfull
                                                if($query_image_name){
                                                    #Запрос выполнен успешно 
                                                        $Show_Avatar = "<img class='wUI' src='src/du/avatar/". $query_image_name[0] ."'/>";
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
                        <div class='ab'></div>
                        <!--START COMMENTATOR-NICKNAME-->
                            <div class='ccr4' onclick='wshowUserProfile(\"Vazdautan Adrian\")'>
                                ".$reply_req['nickname']."
                            </div>
                        <!--END-->
                        <!--START DATE-PUBLICATION-->
                            <div class='ccr5'>
                                "; echo getTimeAgo($reply_req['dateofpublication']); echo "
                            </div>
                        <!--END-->
                        <!--START TEXT-OF-REPLY-->
                            <div class='cc6'>
                                ".$reply_req['commentaryText']."
                            </div>
                        <!--END-->
                        <div class='ccr7 pal24'>
                            <!--START Button-->
                                <div class='ccr7w'>";
                                    if(session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['user'])){
                                        #Ваш код, который зависит от сессии пользователя
                                            /*
                                                bd                   : like-for-commentary-from-reply_req
                                                $reply_req['id']     : id_of_commentary
                                                $likeCommentaryStatus: likeZeroOrOne
                                                $likeCommentaryCount : COUNT(*) from id_of_commentary
                                            */
                                            $userNickname = $_SESSION["user"]["nickname"];
                                        #Получение значения likeCommentaryStatus
                                            $queryStatus = mysqli_query($connect, "
                                                SELECT likeZeroOrOne
                                                FROM `like_for_commentary_from_article`
                                                WHERE id_of_commentary=".$reply_req['id']." AND nickname='$userNickname' AND type_of_comment='1'
                                            ");

                                            if($statusRow = mysqli_fetch_assoc($queryStatus)){
                                                $likeCommentaryStatus = $statusRow['likeZeroOrOne'];
                                            } else {
                                                $likeCommentaryStatus = 0; #Значение по умолчанию, если запись не найдена
                                            }
                                        #Получение суммы всех лайков на комментарии с id равным $reply_req['id']
                                            $queryCount = mysqli_query($connect, "
                                                SELECT COUNT(*) AS likeCount
                                                FROM `like_for_commentary_from_article`
                                                WHERE id_of_commentary=".$reply_req['id']." AND likeZeroOrOne='1' AND type_of_comment='1'
                                            ");

                                            if($countRow = mysqli_fetch_assoc($queryCount)){
                                                $likeCommentaryCount = $countRow['likeCount'];
                                            } else {
                                                $likeCommentaryCount = 0; #Значение по умолчанию, если записи не найдены
                                            }
                                        #Check if like exist 
                                            if($likeCommentaryStatus == 1){
                                                    $likeCommentaryHTML = "
                                                        <div class='cwcpi31 bgsz16 w16 h16 ab glfcReply1ID".$reply_req['id'].$IDWWRA."'><!--liked-1--></div>
                                                        <div class='cwcpi3 bgsz16 w16 h16 ab glfcReply0ID".$reply_req['id'].$IDWWRA." none'><!--liked-0--></div>
                                                    ";
                                                #Update value for data-status
                                                    $likeCommentaryDataStatus = 1;
                                            }
                                        #Check if like NOT exist
                                            elseif($likeCommentaryStatus == 0){
                                                    $likeCommentaryHTML = "
                                                        <div class='cwcpi31 bgsz16 w16 h16 ab glfcReply1ID".$reply_req['id'].$IDWWRA." none'><!--liked-1--></div>
                                                        <div class='cwcpi3 bgsz16 w16 h16 ab glfcReply0ID".$reply_req['id'].$IDWWRA."'><!--liked-0--></div>
                                                    ";
                                                #Update value for data-status
                                                    $likeCommentaryDataStatus = 0;
                                            }
                                    } else {
                                        #Получение суммы всех лайков на комментарии с id равным $article['id']
                                            $queryCount = mysqli_query($connect, "
                                                SELECT COUNT(*) AS likeCount
                                                FROM `like_for_commentary_from_article`
                                                WHERE id_of_commentary=".$reply_req['id']." AND likeZeroOrOne='1' AND type_of_comment='1'
                                            ");
                                            if ($countRow = mysqli_fetch_assoc($queryCount)) {
                                                $likeCommentaryCount = $countRow['likeCount'];
                                            } else {
                                                $likeCommentaryCount = 0; #Значение по умолчанию, если записи не найдены
                                            }
                                            $likeCommentaryHTML = "
                                                <div class='cwcpi31 bgsz16 w16 h16 ab glfcReply1ID".$reply_req['id'].$IDWWRA." none'><!--liked-1--></div>
                                                <div class='cwcpi3 bgsz16 w16 h16 ab glfcReply0ID".$reply_req['id'].$IDWWRA."'><!--liked-0--></div>
                                            ";
                                            #Update value for data-status
                                                $likeCommentaryDataStatus = 0;
                                    }

                                    echo "
                                    <div class='ccr8 dg alc jcc glfcReplyID".$reply_req['id'].$IDWWRA."' data-status='".$likeCommentaryDataStatus."' onclick='giveLikeForReply(".$reply_req['id'].$IDWWRA.")'>
                                        <div class='w16 h16 p'>
                                            ".$likeCommentaryHTML."
                                        </div>
                                    </div>
                                    <div class='ccr9 glfcReplyCountID".$reply_req['id'].$IDWWRA."'>
                                        ".$likeCommentaryCount."
                                    </div>
                                </div>
                            <!--END-->
                            <!--START Button-->
                                <div class='ccr10 ccrc-".$artID2DifferentSource.$IDWWRA."' data-name='c-1' onclick='respond(".$artID2DifferentSource.$IDWWRA.",`".$reply_req['nickname']."`)'>
                                   <!--Reply-->
                                       Reply
                                   <!--Reply-->
                                </div>
                            <!--END-->
                            <!--START Button-->
                                <div class='p l'>
                                    <div class='ccrsb12 p l dg alc jcc c btncID".$reply_req['id'].$IDWWRA."' onclick='optionsForComment(".$reply_req['id'].$IDWWRA.")'>
                                        <div class='ccr12'>
                                            <div class='ccr13'></div>
                                            <div class='ccr14'></div>
                                            <div class='ccr15'></div>
                                        </div>
                                    </div>
                                    <!--START Complain commentary-->
                                        <div class='sdfcccom ab z1 none sdfcccomID".$reply_req['id'].$IDWWRA."'>
                                            <div>
                                                <div class='pudorWPU ab w20'><div class='pudeb ab bgw'><!--icon--></div></div>
                                            </div>
                                            <div class='sdfcccom2 p l br12 pat10 pab10'>
                                                <div>
                                                    <div class='buufjs aC c h40' onclick='unauthorized(0), hidePost(0)'>
                                                        <div class='ac1 p l h40 w16 dg alc'>
                                                            <!--Icon-->
                                                                <img class='ac1ico' src='../src/du/icon/forbbiden.png'>
                                                            <!--Icon-->
                                                        </div>
                                                        <div class='p l pal10 h40 lh40 arcm'>
                                                            <!--Title-->
                                                                Complain
                                                            <!--Title-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!--END-->
                                </div>
                            <!--END-->
                        </div>
                    </div>     
                ";
            }
            
            echo "
                </div> 
            ";
        }
?>