<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Terms - Think</title>
	<link rel="stylesheet" href="about.css">
</head>
<body>
	<!--START-->
		<div class='lojs pf vw100 vh100 dg alc jcc none'>
			<div class='loader pf w100 h100'>
				<div class='loader__item ab br50'></div>
			</div>
		</div>
	<!--END-->
	<div class="awfsfstc">
		<!--START Menu-->
			<div class="w100 p h57 z1">
				<div class="p h57 mbrs">
					<div class="w100 h57 p l0 hmd dg jcc">
						<div class="p l h57">
							<!--START-->
								<a href="index.php">
									<div class="p l">
										@include('src.path.dt.ss.index.nav.nav-logo.logo')
									</div>
								</a>
							<!--END-->
						</div>
					</div>
				</div>
			</div>
		<!--END-->
		<!--START-->
			<div class="w100">
				<div class="p mbrs">
					<div class="w100 pa f18">
						<!--START-->
							<h1 class="mt20 mb10">Terms of service</h1>
							<h3>Rules for using the site</h3>
							<ol style="margin: 40px;">
								<li class="mt20">The user is any natural or legal person who visits the site or uses its functionality.</li>
								<li class="mt20">The site is an Internet resource located at https://www.think.ceo/, which provides the opportunity to create articles on any topics and receive money for views and sales of their works.</li>
								<li class="mt20">The site administration is a person or organization that owns and manages the site.</li>
								<li class="mt20">The user agrees to comply with these rules when using the site and its functionality.</li>
								<li class="mt20">The user is responsible for their actions on the site and for the content of their articles.</li>
								<li class="mt20">The user undertakes not to violate the copyrights and other intellectual property rights of third parties when creating and publishing their articles on the site.</li>
								<li class="mt20">The user undertakes not to distribute illegal, harmful, defamatory, pornographic or other information that contradicts the legislation of the international norms.</li>
								<li class="mt20">The user undertakes not to use the site for spamming, fraud, hacking or other purposes that may harm the site or other users.</li>
								<li class="mt20">The site administration has the right to moderate, edit, delete or block any articles or accounts of users at its discretion without explaining reasons.</li>
								<li class="mt20">The site administration has the right to change these rules at any time without prior notice to users.</li>
							</ol>
						<!--END-->
					</div>
				</div>
			</div>
		<!--END-->	
		<!--START-->
@if ($nickname)
    <p>Никнейм пользователя: {{ $nickname }}</p>
@else
    <p>Пользователь с таким никнеймом не найден.</p>
@endif


		<!--END-->
	</div>
</body>
</html>