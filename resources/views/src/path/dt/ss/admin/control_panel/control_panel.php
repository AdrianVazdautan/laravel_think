<?php
	#GET AJAX RESPONSE
		$item_002 = $_POST['item_002'];

	$DOM_control_panel = '
		<div class="p wSRIS bgw br12 pa">
			<!--START-->
				<div class="w100 f18 h35 lh35 mb20">
					Control panel
				</div>
			<!--END-->
			<!--START-->
				<div class="pa10 ab btnc btnhov br50 c">
					<div class="ncbfauf1 p l w16 h16" title="Close" onclick="rcrw()"></div>
				</div>
			<!--END-->
			<!--START-->
				<div class="apumb u w100 h35 br12 mb10" onclick="openPageArticle()">
					<div class="apumb1 p l bgsz16 bgnr mpi6 br8 shadowIn1"><!--icon--></div>
					<div class="p l lh35 ml10">
						Article
					</div>
					<!--NOTIFY-->
						<div class="ab h35 r20 dg alc">
							<div class="w16 h16 bgcnima br50 shadowIn1"></div>
						</div>
					<!--NOTIFY-->
				</div>
			<!--END-->
			<!--START-->
				<div class="apumb u w100 h35 br12 mb10" onclick="">
					<div class="apumb1 p l bgsz16 bgnr mpi5 br8 shadowIn1"><!--icon--></div>
					<div class="p l lh35 ml10">
						Comment
					</div>
					<!--NOTIFY-->
						<div class="ab h35 r20 dg alc">
							<div class="w16 h16 bgcnin br50 shadowIn1"></div>
						</div>
					<!--NOTIFY-->
				</div>
			<!--END-->
			<!--START-->
				<div class="apumb u w100 h35 br12 mb10" onclick="">
					<div class="apumb1 p l bgsz16 bgnr mpi4 br8 shadowIn1"><!--icon--></div>
					<div class="p l lh35 ml10">
						User
					</div>
					<!--NOTIFY-->
						<div class="ab h35 r20 dg alc">
							<div class="w16 h16 bgcn br50 shadowIn1"></div>
						</div>
					<!--NOTIFY-->
				</div>
			<!--END-->


			<!--START-->
				<div class="mt10 mb10 w100 h1"><div class="bgws w100 h1"><!--hr--></div></div>
			<!--END-->
			<!--START-->
				<div class="apumb u w100 h35 br12" onclick="logOut()">
					<div class="apumb1 p l bgsz16 bgnr mpi7 br8 shadowIn1 bgsc"><!--icon--></div>
					<div class="p l lh35 ml10">
						Sign out
					</div>
				</div>
			<!--END-->
		</div>
	';

	if($item_002 == '0'){
		echo $DOM_control_panel;
	}
?>