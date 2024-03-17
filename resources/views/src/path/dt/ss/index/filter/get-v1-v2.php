<?php
	#START : AJAX
		$v1 = $_POST['v1'];#New/The best
		$v2 = $_POST['v2'];#Any rating/>= 0/>= 10/>= 25/>= 50/>= 100
	#END
	#Connect
		require_once($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
	#START : Query
		$getArticles = mysqli_query($connect,"
			SELECT id, nickname, title, textarea, dateofpublication, views 
			FROM articles30percent ORDER BY id DESC LIMIT 1
		");
		$numarul = 0;
		
		echo "<div class='feed-wrapp-articles-0'>";
		
		while($article = mysqli_fetch_assoc($getArticles)){
			$id                   = $article['id'];
			$nickname             = $article['nickname'];
			$title                = $article['title'];
			$queryCountOfcomments = mysqli_query($connect, "
				SELECT count(*) 
				FROM articles_commentary 
				WHERE articleAuthor='$nickname' AND articleTitle='$title'
			");
			$countOfcomments = $queryCountOfcomments->fetch_row();
			
			require_once "../sidebar/sidebar-left/sidebar-home/sidebar-home-articles/time.php";
		    require_once "../sidebar/sidebar-left/sidebar-home/sidebar-home-articles/like.php";
			require_once "../sidebar/sidebar-left/sidebar-home/sidebar-home-articles/article.php";
		}

		require_once "../sidebar/sidebar-left/sidebar-home/sidebar-home-articles/loading.php";
	#END
?>