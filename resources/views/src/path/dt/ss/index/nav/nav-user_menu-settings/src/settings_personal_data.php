<?php
	require_once "src/languages_settings_personal_data.php";
?>
<!--START : Personal data : Settings-->
	<div class="swppw0 p l">
		<!--START : Title-->
			<div class="swppw-0-1">
				<div class="p l">
					<div class="p l f16">
						<?= $languagesSettingsPersonalData[$selectedLanguage]['personal_data'];?>
					</div>
					<div class="ab w100 spsinni spsinni_color"><!--icon--></div>
				</div>
				<!--START : Mobile-->
					<div class="ab r0 t0 dg alc jcc desktop_none" style="width: 33px; height: 33px; margin-right: -8px;">
						<div class="p l w16">
							<div class="cadn41 p w16 h16 c" title="Close" onclick="uMWPU('0')"></div>
						</div>
					</div>
				<!--END-->
			</div>
		<!--END-->
		<div class="swppw-0-1-1">
			<!--START : Upload avatar-->
				<div class="swppw011-1">
					<!--START : Title-->
						<span class="swppw0111-s">
							<?= $languagesSettingsPersonalData[$selectedLanguage]['profile_picture'];?>
						</span>
					<!--END-->
					<!--START : Avatar-->
						<label for="avatarInput">
							<div class="swppw-0-1-1-1">
								<?php
									#Get avatar, background, and nickname using ID
									    $query = mysqli_query($connect, "
									        SELECT avatar, background, nickname
									        FROM users
									        WHERE nickname = '".$_SESSION['user']['nickname']."'
									    ");
									#Check
									    if($profile_user = mysqli_fetch_assoc($query)){
									        $isp_Avatar = $profile_user['avatar'];
									    }
									#Check if image is NOT stored in BD
									    if($isp_Avatar == ""){
									    	$Show_Avatar = substr($_SESSION['user']['nickname'], 0, 1);
									    } 
									#Check if image is stored in BD
										else if($isp_Avatar != "" && $isp_Avatar != NULL){
											#START : Obtain image_name.png from bd
												/*Query->*/ $query_image_name = mysqli_query($connect, "SELECT avatar FROM users WHERE nickname='".$_SESSION['user']['nickname']."'");
												/*Result->*/$query_image_name = $query_image_name->fetch_row();
										        #Check if query was successfull
										            if($query_image_name){
										                #Запрос выполнен успешно 
									    					$Show_Avatar = "<img class='swppw0111-img' id='result_crop' draggable='false' src='src/du/avatar/". $query_image_name[0] ."'/>";
										            } else {
										                #В случае ошибки
										            }
											#END
									    }
									#Show avatar
									    echo "<div class='swpp_temporary_js swppw0111-img dg alc jcc' style='background: blue; font-size: 40px; color: white;'>".$Show_Avatar."</div>";
								?>
								<img class='swppw0111-img' id='result_crop' draggable='false' src=''/>
								<div class="hover_avatar_upload"></div>
							</div>
						</label>
					<!--END-->
					<!--START : Edit : Button-->
						<div class="mobile_wrapp_avatar_input">
							<label for="avatarInput">
								<div class="swppw0111-btn br12 c u">
									<?= $languagesSettingsPersonalData[$selectedLanguage]['edit'];?>
								</div>
							</label>
						</div>
						<input type="file" id="avatarInput" name="avatar" accept="image/*" style="width: 0px; height: 0px; opacity: 0;">
					<!--END-->
				</div>
			<!--END-->
			<!--START : Form : City, Education, Work, Gen, Save, Cancel, Customize avatar-->
				<?php
					#Query
						$query_get_personal_data = mysqli_query($connect, "SELECT nationality, city, studies, gen FROM users WHERE nickname='".$_SESSION['user']['nickname']."'");
				        $query_get_personal_data = $query_get_personal_data->fetch_row();
				    #Check : Gen : 0 : Undefined; 1 : Female; 2 : Male;
				        	$query_get_personal_data_gen_female = ""; //инициализация переменной
							$query_get_personal_data_gen_male   = ""; //инициализация переменной
				        #0 : Undefined
					        if($query_get_personal_data[3] == "0"){
					        	$query_get_personal_data_gen_female = "";
					        	$query_get_personal_data_gen_male   = "";
					        }
				        #1 : Female
					        elseif($query_get_personal_data[3] == "1"){
					        	$query_get_personal_data_gen_female = "checked";
					        	$query_get_personal_data_gen_male   = "";
					        }
				        #2 : Male
					        elseif($query_get_personal_data[3] == "2"){
					        	$query_get_personal_data_gen_female = "";
					        	$query_get_personal_data_gen_male   = "checked";
					        }
				?>
				<div class="swppw011-2">
					<div class="csw02">
						<!--START : Input-->
							<span>
								Nationality
							</span>
							<input class="nationality_personal_data_js csw02input f14" type="text" placeholder="Enter your nationality" value="<?= $query_get_personal_data[0];?>" onclick="clear_error_update_personal_data()">
							<div class="mt10 mb10 w100 f14 cr err_c_nationality none"></div>
						<!--END-->
						<!--START : Input-->
							<span class="mt10 p l">
								Town/city
							</span>
							<input class="town_city_personal_data_js csw02input f14" type="text" placeholder="Enter your city" value="<?= $query_get_personal_data[1];?>">
						<!--END-->
						<!--START : Input-->
							<span class="mt10 p l">
								Education
							</span>
							<input class="education_personal_data_js csw02input f14" type="text" placeholder="Enter your education level" value="<?= $query_get_personal_data[2];?>">
						<!--END-->
						<!--START : Gen : Radio-->
							<!--START : Title-->
								<span class="mt10 p l w100">
									Gen
								</span>
							<!--END-->
							<!--START : Female-->
								<div class="p l">
									<div class="cbsgcss p l dg alc jcc">
										<input type="radio" id="girl" class="gen_personal_data_female_js checkbox_set_gen" name="gen" <?= $query_get_personal_data_gen_female;?> >
									</div>
									<div class="cbsgcss p l ml10 dg alc jcc f14">
										<label for="girl">
											Female
										</label>
									</div>
								</div>
							<!--END-->
							<!--START : Male-->
								<div class="p l ml20">
									<div class="cbsgcss p l dg alc jcc">
										<input type="radio" id="men" class="gen_personal_data_male_js checkbox_set_gen" name="gen" <?= $query_get_personal_data_gen_male;?> >
									</div>
									<div class="cbsgcss p l ml10 dg alc jcc f14">
										<label for="men">
											Male
										</label>
									</div>
								</div>
							<!--END-->
						<!--END-->
						<!--START : Save : Settings-->
							<div class="cdob-1">
								<!--START : Cancel : Button-->
									<div class="cdbob_cancel u p r c pa10 br12" onclick="cancel_personal_data()" title="">
										<div class="h16 lh16 p l f14">
											Cancel
										</div>
									</div>
								<!--END-->
								<!--START : Apply : Button-->
									<div class="tfccb2s_apply_js u p r c pa10 br12 tfccb2s_apply_light_mode_js mr10" onclick="update_personal_data()" title="">
										<div class="h16 lh16 p l f14">
											<?= $languagesSettingsPersonalData[$selectedLanguage]['apply'];?>
										</div>
									</div>
								<!--END-->
							</div>
						<!--END-->
						<!--START : Crop : PopUp-->
							<div class="cadn1_crap_js pf w100 h100 dg alc jcc l0 t0 wrapp_crop_avatar_image none">
						        <div class="wrapp_crop">
						            <div class="wrapp_crop_1 f18">
						                Customize picture
						            </div>
						            <div class="wrapp_crop_2">
						                <div id="preview"></div>
						            </div>
						            <div class="wrapp_crop_3">
						                <input type="submit" class="appearance_RIS_js w100 br4 f14 c rN_dark_mode" value="Set new profile picture" id="crop" onclick="">
						                <input type="submit" class="cOr mt10 w100 br4 bgw f14 c" value="Cancel" onclick="close_crop()">
						            </div>
						        </div>
						    </div>
						<!--END-->
					</div>
				</div>
			<!--END-->
		</div>
	</div>
	<script>
		var data_nationality = "<?= $query_get_personal_data[0];?>",
			data_city        = "<?= $query_get_personal_data[1];?>",
			data_education   = "<?= $query_get_personal_data[2];?>",
			gen_female  = "<?= $query_get_personal_data_gen_female;?>",
			gen_male    = "<?= $query_get_personal_data_gen_male;?>";
	</script>
<!--END-->