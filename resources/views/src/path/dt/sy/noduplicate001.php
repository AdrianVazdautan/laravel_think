<?php
	echo "
		<!DOCTYPE html>
		<html>
		<head>
	";
		require_once "src/path/dt/sy/utf8.php";
		require_once "src/path/dt/sy/titlehtml.php";
		require_once "src/path/dt/sy/stylecss.php";
		require_once "src/path/dt/sy/scriptjs.php";
	echo "</head>";
	echo "<body class='overflowjs'>";
	echo "<!--START : Preloader-->";
			require_once 'src/path/dt/sy/preloader.php';
	echo "<!--END-->";
	echo "<!--START : Offline-->";
			require_once "src/path/dt/sy/offline.php";
	echo "<!--END-->
		<div class='root p'>
			<div class='w p'> 
	";
	require_once "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-complain/complain.php";
	require_once "src/path/dt/ss/index/filter/filter-for-articles/src/button-more-filters/chooseAdate.php";
	require_once "src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/settings_sign_in_options_change_username.php";
	require_once "src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/settings_sign_in_options_change_password.php";
	require_once "src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/settings_sign_in_options_change_email.php";
	require_once "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-share/sidebar-home-articles-share.php";
	require_once "src/path/dt/ss/index/nav/nav.php";
	require_once "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-left.php";
?>