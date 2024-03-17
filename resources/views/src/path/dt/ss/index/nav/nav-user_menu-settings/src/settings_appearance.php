<?php
	#Required
		require_once "src/languages_settings_appearance.php";
		$sarlmLight = $sarlmDark = $sarlmAuto = '';
	#Defined var
		$nicknameSA = $_SESSION["user"]["nickname"];
	#Connect to BD
		require($_SERVER['DOCUMENT_ROOT'] . "/src/path/dt/sy/connectDB.php");
	#Query: Get value of selected Appearance from table : users
		$sql    = "SELECT Appearance FROM users WHERE nickname='$nicknameSA';";
		$result = mysqli_query($connect, $sql);
		if($result){
		    if(mysqli_num_rows($result) > 0) {
		        $row             = mysqli_fetch_assoc($result);
		        $appearanceValue = $row["Appearance"];
		        #Settings : Appearance. 0 : Light; 1 : Dark; 2 : Auto;
		        	#Light
			        	if($appearanceValue == "0"){
			        		$appearanceMode = "light";
			        		$sarlmLight     = $ap_was_checked = "checked";
			        	}
			        #Dark
			        	else if($appearanceValue == "1"){
			        		$appearanceMode = "dark";
			        		$sarlmDark      = $ap_was_checked = "checked";
			        	}
			        #Auto
			        	else if($appearanceValue == "2"){
			        		$appearanceMode = "Auto";
			        		$sarlmAuto      = $ap_was_checked = "checked";
			        	}
		    } else {
		        echo "No data found for the user.";
		    }
		} else {
		    echo "Error: " . mysqli_error($connect);
		}
	#Close the database connection
		mysqli_close($connect);
?>
<!--START : Appearance : Settings-->
	<div class="swppw-1">
		<!--START : Title-->
			<div class="swppw-1-1">
				<div class="p l">
					<div class="p l f16">
						<?= $languagesSettingsAppearance[$selectedLanguage]['appearance'];?>
					</div>
					<div class="ab w100 spsinni"><!--icon--></div>
				</div>
			</div>
		<!--END-->
		<!--START : Light-->
			<label for="swppw-1-2-ch-1-app">
				<div class="swppw-1-2 f14">
					<?= $languagesSettingsAppearance[$selectedLanguage]['light'];?>
					<input type="radio" class="id_se_radio_app_light_js s12ch1" id="swppw-1-2-ch-1-app" name="swppw-1-2-ch-1-app" onclick="set_app_radio_light_mode()"<?= $sarlmLight;?>>
				</div>	
			</label>
		<!--END-->
		<!--START : Dark-->
			<label for="swppw-1-2-ch-2-app">
				<div class="swppw-1-3 f14">
					<?= $languagesSettingsAppearance[$selectedLanguage]['dark'];?>
					<input type="radio" class="id_se_radio_app_dark_js s12ch1" id="swppw-1-2-ch-2-app" name="swppw-1-2-ch-1-app" onclick="set_app_radio_dark_mode()"<?= $sarlmDark;?>>
				</div>	
			</label>
		<!--END-->
		<!--START : Auto-->
			<label for="swppw-1-2-ch-3-app">
				<div class="swppw-1-3 f14">
					<?= $languagesSettingsAppearance[$selectedLanguage]['auto'];?>
					<input type="radio" class="id_se_radio_app_auto_js s12ch1" id="swppw-1-2-ch-3-app" name="swppw-1-2-ch-1-app" onclick="set_app_radio_auto()"<?= $sarlmAuto;?>>
				</div>	
			</label>
		<!--END-->
	</div>
	<script>
		localStorage.setItem("appearance_mode", "<?= $appearanceMode;?>");
	</script>
<!--END-->