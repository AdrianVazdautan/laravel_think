<?php
#START : Проверка наличия активной сессии
require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
#END
$userWhichSignIn = null;
if (isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['nickname'])) {
    $userWhichSignIn = $_SESSION['user']['nickname'];
}
require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
#START : AJAX : MENU + Filter + Calendar
#MENU
$filter__menu                         = $_POST['filter__menu'] ?? "all_topics";
#Filter
$filter__new_the_best                 = $_POST['filter__new_the_best'] ?? "new";
$filter__day_week_month_year_all_time = $_POST['filter__day_week_month_year_all_time'] ?? "All_time";
#Calendar
$filter__calendar_from                = $_POST['from'] ?? null;
$filter__calendar_upto                = $_POST['upto'] ?? null;
#Search
$filter__search                       = $_POST['filter__search'] ?? null;
# Получение текущей страницы
$page = $_POST['current_page'] ?? 1;
#END
#START : Получение общего количества статей
    # Рассчет OFFSET
    $offset = ($page*10)-10;
    
    $limit = 'DESC LIMIT 10 OFFSET '.$offset;
    require "src/filter.php";
#END
#Who was requested article. /001:Feed/002:User_Timeline/003:User_Articles/
$IDWWRA = $_POST['IDWWRA'] ?? "001";
require "src/languagesArticle.php";
require "time.php";
require "src/options.php";
#START 001
$getArticles = mysqli_query($connect, "$FNTT_query;");
#Установка флага по умолчанию в значение "статьи не найдены"
$articles_found = false;
$articles = []; #Создаем массив для хранения статей
$article_counter = 0; // Счетчик статей
while ($article = mysqli_fetch_assoc($getArticles)) {
    $article_counter++;
    #START 001-001
    $id       = isset($article['id']) ? $article['id'] : null;
    $code     = isset($article['code']) ? $article['code'] : null;
    $nickname = isset($article['nickname']) ? $article['nickname'] : null;
    $title    = isset($article['title']) ? $article['title'] : null;
    if ($id === null || $code === null || $nickname === null || $title === null) {
        continue; #Skip this iteration if any required values are missing
    }
    #END   001-001
    # Добавляем текущую статью в массив
    $articles[] = $article;

    #Установка флага в "статьи найдены", так как цикл выполняется хотя бы один раз
    $articles_found = true;
}
#Проверка флага после завершения цикла
if (!$articles_found) {
    #Вывод сообщения, если статьи не были найдены
}
# Отображение только первых 10 статей
$visible_articles = array_slice($articles, 0, 10);

foreach ($visible_articles as $article) {
    # Ваш код для отображения статей
    #START 001-002
    $queryCountOfcomments = mysqli_query($connect, "SELECT count(*) FROM articles_commentary WHERE artID=$id;");
    $countOfcomments      = $queryCountOfcomments->fetch_row();
    #END   001-002
    #START 001-003
    #We should count the likes and show the number in the like button
    #title nickname
    $countActualLikes = mysqli_prepare($connect, "SELECT count(*) FROM liked WHERE id_of_article=?");
    mysqli_stmt_bind_param($countActualLikes, "i", $article['id']);
    mysqli_stmt_execute($countActualLikes);
    $cal = $countActualLikes->get_result()->fetch_row();
    #END   001-003
    #START 001-005
    $likeStatus = ""; #Initialize the variable

    #Session : false
    if (!isset($_SESSION['user'])) {
        $likeStatus = "<div class='cwcpi3 bgsz16 w16 h16'><!--liked-0--></div>";
    } else {
        #Session : true
        $checkLikeStatus = mysqli_prepare($connect, "SELECT Liked FROM liked WHERE id_of_article = ? AND nickname = ? ORDER BY dateofpublication DESC LIMIT 1");
        mysqli_stmt_bind_param($checkLikeStatus, "is", $article['id'], $userWhichSignIn);
        mysqli_stmt_execute($checkLikeStatus);
        $cLS = $checkLikeStatus->get_result()->fetch_row();

        if ($cLS && isset($cLS[0]) && $cLS[0] == 0) {
            $likeStatus = "<div class='cwcpi3 bgsz16 w16 h16 hdsjsID" . $article['id'] . $IDWWRA . "' data-status='0'><!--liked-0--></div>";
        } elseif ($cLS && isset($cLS[0]) && $cLS[0] == 1) {
            $likeStatus = "<div class='cwcpi31 bgsz16 w16 h16 hdsjsID" . $article['id'] . $IDWWRA . "' data-status='1'><!--liked-1--></div>";
        } else {
            $likeStatus = "<div class='cwcpi3 bgsz16 w16 h16 hdsjsID" . $article['id'] . $IDWWRA . "' data-status='0'><!--liked-0--></div>";
        }
    }
    #END 001-005
    #START 001-004
    #Using query to db for obtain ID of account of author SELECTed ID by nickname in table users
    $queryUQTD     = mysqli_query($connect, "SELECT id FROM users WHERE nickname = '$nickname' LIMIT 1");
    $resultUQTD_id = $queryUQTD->fetch_row();
    #Check if article was not hided by user
    #Session : false
    if (!isset($_SESSION['user'])) {
        #Show without checking
        require "articleL.php";
    }
    #Session : true
    elseif (isset($_SESSION['user'])) {
        #Show with checking
        $id_of_article_fh = $article['id'];
        $query_fh         = mysqli_query($connect, "SELECT count(*) FROM hided WHERE id_of_article_which_is_hided='$id_of_article_fh' AND nickname='$userWhichSignIn'");
        $query_fh         = $query_fh->fetch_row();
        #Check : if Not hided
        if ($query_fh[0] == "0") {
            require "articleL.php";
        }
    }
    #END   001-004
}
#END   001
        $limit = "DESC LIMIT 1 OFFSET ". $offset+10;
        require "src/filter.php";
    # Второй запрос для получения одиннадцатой статьи
        $eleventh_article_query = mysqli_query($connect, "$FNTT_query");
        $articles2 = []; #Создаем массив для хранения статей
        while ($article2 = mysqli_fetch_assoc($eleventh_article_query)) {
            # Добавляем текущую статью в массив
            $articles2[] = $article2;
        }
        # Отображение только первых 10 статей
        $visible_articles = array_slice($articles2, 0, 1);
        # Переворачиваем массив
        $visible_articles_reversed2 = array_reverse($visible_articles);
        # Получаем первую запись из перевернутого массива
        $first_article = reset($visible_articles_reversed2);
        foreach ($visible_articles_reversed2 as $article2) {
            $article2 = $article2['id'];
            #echo $article2;
            #START 002 : Loading. Pagination.
                # Увеличение номера текущей страницы
                $nextPage = $page + 1;
                require "loading.php";
            #END   002
        }

echo "</div><!--END ARTICLES WITHOUT EXTENDED MODE-->";
?>
