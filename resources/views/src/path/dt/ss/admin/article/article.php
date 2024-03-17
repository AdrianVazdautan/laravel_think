<?php
	#GET AJAX RESPONSE
		$item_001 = $_POST['item_001'];
	
	$DOM_article = '
		<div class="p wSRIS_article br12 mt20 mb20">
			<!--START-->
				<div class="w100 bgw p pa sh2 canr1">
					<!--START-->
						<!--Title-->
							<div class="f24 p fw">
								The Orion spacecraft circled the moon and returned to Earth - everything you need to know
							</div>
						<!--Title-->
					<!--END-->
					<!--Content Nr1-->
						<div class="contentArticleNr1 rW5 p w100 mt20 f18">
							In November 2022, NASA officially launched the Artemis program, which began with an unmanned flight of the Orion spacecraft around the moon. He successfully went into space using the Space Launch System (SLS) launch vehicle and set off on his journey. In an article about this event, we noted that Orion should return to Earth on December 11 - expectations were justified. On Sunday, the spacecraft splashed down safely in the waters of the Pacific Ocean. Helicopters immediately surrounded him, and a warship arrived at the scene to transport cargo to land. However, the space "Orion" was in no hurry to pull out of the water - there were good reasons for this. A couple of interesting facts can be told about the completion of the Artemis-1 mission, which we will now do.
						</div>
					<!--Content Nr1-->
				</div>
			<!--END-->
			<!--START-->
				<!--Content Nr2-->
					<div class="rcontentArticleNr2 bgw W5 p l w100 mt20 f18 pa sh2 canr2">
						In November 2022, NASA officially launched the Artemis program, which began with an unmanned flight of the Orion spacecraft around the moon. He successfully went into space using the Space Launch System (SLS) launch vehicle and set off on his journey. In an article about this event, we noted that Orion should return to Earth on December 11 - expectations were justified. On Sunday, the spacecraft splashed down safely in the waters of the Pacific Ocean. Helicopters immediately surrounded him, and a warship arrived at the scene to transport cargo to land. However, the space "Orion" was in no hurry to pull out of the water - there were good reasons for this. A couple of interesting facts can be told about the completion of the Artemis-1 mission, which we will now do.
						In November 2022, NASA officially launched the Artemis program, which began with an unmanned flight of the Orion spacecraft around the moon. He successfully went into space using the Space Launch System (SLS) launch vehicle and set off on his journey. In an article about this event, we noted that Orion should return to Earth on December 11 - expectations were justified. On Sunday, the spacecraft splashed down safely in the waters of the Pacific Ocean. Helicopters immediately surrounded him, and a warship arrived at the scene to transport cargo to land. However, the space "Orion" was in no hurry to pull out of the water - there were good reasons for this. A couple of interesting facts can be told about the completion of the Artemis-1 mission, which we will now do.
						In November 2022, NASA officially launched the Artemis program, which began with an unmanned flight of the Orion spacecraft around the moon. He successfully went into space using the Space Launch System (SLS) launch vehicle and set off on his journey. In an article about this event, we noted that Orion should return to Earth on December 11 - expectations were justified. On Sunday, the spacecraft splashed down safely in the waters of the Pacific Ocean. Helicopters immediately surrounded him, and a warship arrived at the scene to transport cargo to land. However, the space "Orion" was in no hurry to pull out of the water - there were good reasons for this. A couple of interesting facts can be told about the completion of the Artemis-1 mission, which we will now do.
					</div>
				<!--Content Nr2-->
			<!--END-->
			<!--START-->
				<div class="pf r0 t0 vh100 dg alc">
					<div class="p pa10 br12 sh2" style="margin-right: 20px; background-color: rgba(255, 255, 255, .9); backdrop-filter: blur(20px);">
						<!--START-->
							<div class="p br12 u" style="width: 120px; background-color: dimgrey;">
								<div class="p w100 h100 shadowIn1 br12">
									<div class="w100">
									
									</div>
									<div class="w100 pa10 f18 cw t">
										Block user
									</div>
								</div>
							</div>
						<!--END-->
						<!--START-->
							<div class="p mt20 br12 u" style="width: 120px; background-color: crimson;">
								<div class="p w100 h100 shadowIn1 br12">
									<div class="w100">
									
									</div>
									<div class="w100 pa10 f18 cw t">
										Delete
									</div>
								</div>
							</div>
						<!--END-->
						<!--START-->
							<div class="p mt20 br12 u" style="width: 120px; background-color: yellowgreen;">
								<div class="p w100 h100 shadowIn1 br12">
									<div class="w100">
									
									</div>
									<div class="w100 pa10 f18 cw t">
										Reject
									</div>
								</div>
							</div>
						<!--END-->
						<!--START-->
							<div class="p mt20 br12 u" style="width: 120px; background: mediumpurple;">
								<div class="p w100 h100 shadowIn1 br12">
									<div class="w100">
									
									</div>
									<div class="w100 pa10 f18 cw t">
										Accept
									</div>
								</div>
							</div>
						<!--END-->
					</div>
				</div>
			<!--END-->
			<!--START-->
				<div class="pf w72 h72 btnControlPaneljs u br50 sh2 dg alc jcc  cs" onclick="openControlPanel()">
					❮
				</div>
			<!--END-->
			<!--START-->
				<div class="pf w72 h72 btnHelpNewArticlejs u br50 sh2 dg alc jcc  cs">
					?
				</div>
			<!--END-->
		</div>
	';

	if($item_001 == '0'){
		echo $DOM_article;
	}
?>