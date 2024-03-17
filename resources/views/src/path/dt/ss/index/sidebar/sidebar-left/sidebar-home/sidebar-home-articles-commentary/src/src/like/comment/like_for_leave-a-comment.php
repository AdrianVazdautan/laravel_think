<?php
    #SEND LIKE TO BD
    #START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END
    #Get variables using ajax
    #AJAX
        $glfcCommentReplyCountID = $_POST['glfcCommentReplyCountID'];#glfcCommentReplyCountID can have value 1 or 0. Comment/Reply
        $id                      = $_POST['id'];                     #id from like commentary. ID of commentary
        $type                    = $_POST['type'];                   #Type comment (0) or reply (1)
    #SERVER
        $nicknameWhoLiked        = $_SESSION["user"]["nickname"];    #Nickname of user who liked
    #Check if $nicknameWhoLiked is NOT empty
        if(!empty($nicknameWhoLiked)){
            #Check if $glfcCommentReplyCountID is empty
                if($glfcCommentReplyCountID == ""){
                    #ERROR NR.1
                        echo "1";
                }
            #Check if $glfcCommentReplyCountID is NOT empty
                elseif($glfcCommentReplyCountID != ""){
                    #Check if $id is empty
                        if($id == ""){
                            #ERROR NR.2
                                echo "2";
                        }
                    #Check if $id is NOT empty
                        elseif($id != ""){
                            #Check if is 0 or 1
                                if($glfcCommentReplyCountID == 0 || $glfcCommentReplyCountID == 1){
                                    #Check if type is empty
                                        if($type == ""){
                                            #ERROR NR.4
                                                echo "4";
                                        }
                                    #Check if type if NOT empty
                                        elseif($type != ""){
                                            #Check if type have 0 or 1
                                                if($type == "0" || $type == "1"){
                                                    /*#Send like for comment in bd*/slfcib($glfcCommentReplyCountID, $id, $nicknameWhoLiked, $type);
                                                }
                                            #Check if type dont have 0 or 1
                                                elseif($type != "0" || $type != "1"){
                                                    #ERROR NR.5
                                                        echo "5";
                                                }
                                        }
                                }
                            #Check if is NOT equal with 0 or 1
                                elseif($glfcCommentReplyCountID != 0 || $glfcCommentReplyCountID != 1){
                                    #ERROR NR.3
                                        echo "3";
                                }
                        }
                }
        }
    #Check if $nicknameWhoLiked is empty
        elseif(empty($nicknameWhoLiked)){
            #ERROR NR.0
                echo "0";
        }

    #Send like for comment in bd
    /*
        bd                      : like_for_commentary_from_article

        $id                     : id
        $glfcCommentReplyCountID: id_of_commentary
        $nicknameWhoLiked       : nickname
        $likeZeroOrOne          : likeZeroOrOne
        $type                   : type_of_comment
    */
    function slfcib($likeZeroOrOne, $id, $nicknameWhoLiked, $type){
        #Include $connect var
            require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
        #Check if like is already exist for comment with ID
            $stmt = $connect->prepare("SELECT likeZeroOrOne FROM `like_for_commentary_from_article` WHERE id_of_commentary = ? AND nickname = ?");
            $stmt->bind_param("is", $id, $nicknameWhoLiked);
            $stmt->execute();
            $stmt->bind_result($existingLike);
            $stmt->fetch();
            $stmt->close();

            if($existingLike !== null){
                #If like is set (1), then we will remove it by setting 0
                    if($existingLike == 1){
                        $stmt = $connect->prepare("UPDATE `like_for_commentary_from_article` SET likeZeroOrOne = 0 WHERE id_of_commentary = ? AND nickname = ?");
                        $stmt->bind_param("is", $id, $nicknameWhoLiked);
                        $stmt->execute();
                        echo "Like removed";
                    } else{
                        $stmt = $connect->prepare("UPDATE `like_for_commentary_from_article` SET likeZeroOrOne = 1 WHERE id_of_commentary = ? AND nickname = ?");
                        $stmt->bind_param("is", $id, $nicknameWhoLiked);
                        $stmt->execute();
                        echo "Like inserted";
                    }
            } else {
                #If like does NOT exist or is set to 0, then insert 1
                    $stmt = $connect->prepare("INSERT INTO `like_for_commentary_from_article` (id_of_commentary, nickname, likeZeroOrOne, type_of_comment) VALUES (?, ?, 1, ?)");
                    $stmt->bind_param("iss", $id, $nicknameWhoLiked, $type);
                    $stmt->execute();
                    echo "Like inserted";
            }
    }
?>