<?php
	echo "<!--START : GREEN-->";
		echo "<div class='rlfajs l'>";
			require_once "src/path/dt/ss/index/filter/filter-for-articles.php";
			echo "<div class='fFOA'>";
				require_once "src/path/dt/ss/index/nav/nav-search/search-result-null.php";
				require_once "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/home.php";
			echo "</div>";
		echo "</div>";
	echo "<!--END-->";
	echo "<!--START : GOLD-->";
		echo "<div class='rrfe l'>";
			require_once "src/path/dt/ss/index/sidebar/sidebar-right/ad/ad.php";
			require_once "src/path/dt/ss/index/sidebar/sidebar-right/popular-authors/row-window-best-authors.php";
			require_once "src/path/dt/ss/index/sidebar/sidebar-right/popular-articles/row-window-read-now.php";
			require_once "src/path/dt/ss/index/sidebar/sidebar-right/button-post_an_article_for_free/row-add-new-article-wrapper.php";
			require_once "src/path/dt/ss/index/sidebar/sidebar-right/footer/row-footer-1-bottom-publications.php";
		echo "</div>";
	echo "<!--END-->";
?>