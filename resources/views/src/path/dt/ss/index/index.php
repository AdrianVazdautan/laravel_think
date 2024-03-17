<?php
	#START : Проверка наличия активной сессии
        require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/session_start.php");
    #END

	if(isset($_SESSION["user"]) && !empty($_SESSION["user"])){
	    header("Location: feed.php");
	    exit();
	}

	if(isset($_SESSION["admin"]) && !empty($_SESSION["admin"])){
	    header("Location: signin.php");
	    exit();
	}

	if(isset($_SESSION["admin"]) && isset($_SESSION["admin"]["status"]) && $_SESSION["admin"]["status"] == "true"){
	    header("Location: admin.php");
	    exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php require_once "src/path/dt/sy/utf8.php";?>
	<?php require_once "src/path/dt/sy/titlehtml.php";?>
	<?php require_once "src/path/dt/sy/stylecss.php";?>
	<?php require_once "src/path/dt/sy/scriptjs.php";?>
</head>
<body class="overflowjs">
	<!--START : Preloader-->
		<?php require_once "src/path/dt/sy/preloader.php"; ?>
	<!--END-->
	<!--START : Offline-->
		<?php require_once "src/path/dt/sy/offline.php"; ?>
	<!--END-->
	<div class="root p">
		<div class="w p">
			<!--START : REGISTRATION POP UP-->
				<?php require_once "src/path/dt/ss/index/nav/nav-sign_in-create_account/registrationInSystem.php";?>
			<!--END-->
			<!--START : FORGOT-PASSWORD POP UP-->
				<?php require_once "src/path/dt/ss/index/nav/nav-sign_in-recover_access/forgot-password.php";?>
			<!--END-->
			<!--START : CHOOSE-A-DATE POP UP-->
				<?php require_once "src/path/dt/ss/index/filter/filter-for-articles/src/button-more-filters/chooseAdate.php";?>
			<!--END-->
			<!--START : UNAUTHORIZED POP UP-->
				<?php require_once "src/path/dt/ss/index/nav/nav-sign_in/unauthorized.php";?>
			<!--END-->
			<!--START : SHARE POP UP-->
				<?php require_once "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-share/sidebar-home-articles-share.php";?>
			<!--END-->
			<div class="pvhlzhdj_desk pvhlzhdj_mobile pf h57 l0 z3 hmd df jcc appearance_nr_1_dual_js">
				<div class="hm p">
					<div class="pf l0 vw100"></div>
					<!--START : MENU-->
						<?php require "src/path/dt/ss/index/nav/nav-menu/button-menu.php";?>
					<!--END-->
					<!--START : LOGO-->
						<?php require "src/path/dt/ss/index/nav/nav-logo/logo.php";?>
					<!--END-->
					<!--START : SEARCH-->
						<?php require "src/path/dt/ss/index/nav/nav-search/thnk-search.php";?>
					<!--END-->
					<div>
						<!--START : LANGUAGE-->
							<?php require "src/path/dt/ss/index/nav/nav-region/popUpWindowLanguage.php";?>
						<!--END-->
						<!--START : CONNECT-->
							<?php require "src/path/dt/ss/index/nav/nav-sign_in/popUpWindowCnct.php";?>
						<!--END-->
						<!--START : MENU-->
							<?php require "src/path/dt/ss/index/nav/nav-menu/menu.php"; ?>
						<!--END-->
						<!--START : MOBILE-->
							<!--START : Search-->
								<div class="m13 u c mobile_search_button_js" onclick="mobile_search()"><!--SEARCH--></div>
							<!--END-->
							<!--START : Sign In-->
								<div class="m12si u c mobile_signin_button_js" onclick="unauthorized()"><!--SIGN IN--></div>
							<!--END-->
						<!--END-->
					</div>
				<div class="sjs"></div>
				<!--START : LOADING-->
					<div class="id_loading_decor_css_js">
						<div class="id_loading_0p_to_100p_js none"></div>
					</div>
				<!--END-->
			</div>
			<div class="m p">
				<div class="rfb0 pf vh100"></div>
				<!--START : ARTICLES-->
					<?php
						if(strpos($_SERVER['REQUEST_URI'], "/index.php") !== false || $_SERVER['REQUEST_URI'] == "/" || strpos($_SERVER['REQUEST_URI'], "/article.php") !== false) {
							/*DUPLICATE 001*/
								echo "<div class='id_index_articles_session_false_js a p l'>";
									/*START : BLUE*/
										require "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-left.php";
									/*END*/
									/*START : GREEN*/
										require "src/path/dt/sy/noduplicate002.php";
									/*END*/
								echo "</div>";
							/*DUPLICATE 001*/
						}
					?>
				<!--END-->
			</div>
		</div>
	</div>
	<?php require_once "src/path/dt/ss/index/nav/nav-sign_in/src/languagesCnct.php";?>
	<?php require_once "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/src/languagesArticle.php";?>
	<script>
		/*START : Session : false*/
			//Set Appearance mode : Auto
				localStorage.setItem("appearance_mode", "Auto");
		/*END*/
	</script>
	<script>
		//LanguagesCnct
			var tslf_SignIn = "<?php echo $languagesCnct[$selectedLanguage]['SignIn'];?>",
				tslf_Cancel = "<?php echo $languagesCnct[$selectedLanguage]['Cancel'];?>";
		//LanguagesArticle
			var tslf_AddAreply = "<?php echo $languagesArticle[$selectedLanguage]['AddAreply'];?>";
	</script>
	<script>
		//System messages
			var field_is_required             = "Field is required",
				minimum_length_5_characters   = "Minimum length 5 characters",
				email_is_already_used         = "Email is already used",
				this_username_is_already_used = "This username is already used";
	</script>
	<script>localStorage.setItem("session", "false");</script>
	<!--START : ALERT/ANOUNCE/Warning (Session : true). 2 copies-->
		<div class="warning_session_true_false_js pf l0 t0 w100 f14 dg alc jcc">
			<!--START : MESSAGE-->
				<div class="wasetr_innerText_js f18 t"></div>
			<!--END-->
		</div>
	<!--END-->
	<script>
		//userWhichSignIn
			localStorage.setItem("userWhichSignIn", null);
		//ID of userWhichSignIn
			localStorage.setItem("IDofUserWhichSignIn", null);
		//Which page is opened
			localStorage.setItem("whichPageIsOpened", "feed");
	</script>
</body>
</html>