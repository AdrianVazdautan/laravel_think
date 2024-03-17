<?php 
	#START : AJAX : MENU + Filter
		#MENU
			$filter__menu                         = $_POST['filter__menu'] ?? "all_topics";
		#Filter
			$filter__new_the_best                 = $_POST['filter__new_the_best'] ?? "new";
			$filter__day_week_month_year_all_time = $_POST['filter__day_week_month_year_all_time'] ?? "All_time";
		#Search
			$search                               = $_POST["search"];
	#END
	#START
		#New
			#Day
			#Week
			#Month
			#Year
			#Any time
		#The best
			#Day
			#Week
			#Month
			#Year
			#Any time
	#END
	#START
		if(!empty($search)){
			require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
			
			$r = mysqli_query($connect,"SELECT id, title FROM articles100percent WHERE title LIKE '$search%' ORDER BY id DESC LIMIT 10");
			while($v = mysqli_fetch_assoc($r)){
				echo '<div id="rSItem" onclick="show_article_in_extended_mode(`',$v['id'],'`)">',$v['title'],'</div>';
			}
		}
	#END
?>