<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sign In s</title>
	<link rel="stylesheet" href="src/path/dt/cs/admin/signin_admin/css/signin_admin.css">
	<script src="src/path/dt/cs/admin/signin_admin/js/signin_admin.js"></script>
</head>
<body>
	<!--START : Preloader-->
		<?php require_once "src/path/dt/sy/preloader.php"; ?>
	<!--END-->
	<!--START : signin_admin.php-->
		<div class="w100 vh100 dg alc jcc">
			<div class="p wSRIS bgw br12 pa">
				<!--START-->
					<div class="cYTA w100 f24">
						Unlock account
					</div>
					<div class="cYTA mt20 w100 f14 fw">
						Invite code
					</div>
					<!--START : Invite code-->
						<input type="password" class="iYE mt10 w100 br4 col_a_2_2_inputjs" name="password">
					<!--END-->
					<!--START : Sign In-->
						<input type="button" class="ib p w100 br4 f14 mt20 c" onclick="login()" value="Sign In">
					<!--END-->
					<!--START : CANCEL-->
						<input type="button" class="cOr p w100 br4 f14 mt10 c" value="Cancel">
					<!--END-->
				<!--END-->
			</div>
		</div>
	<!--END-->
</body>
</html>