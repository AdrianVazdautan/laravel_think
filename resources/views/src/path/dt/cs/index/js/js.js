//authorizeUser.js
//category.js
//filter-for-articles.js
//forgot-password.js
//hide-post-complain.js
//like-share.js
//likes.js
//login-or-registration.js
//menu-categoryes-with-session.js
//menu-categoryes-without-session.js
//message.js
//notify.js
//observer_feed.js
//rowup-3-1-user-profile.js
//show-avatar-window.js
//show-comments.js
//sidebar-without-session.js
//subscriptions.js
//w-user-profile-without-session.js
//show-all.js
//pop-up-window-language.js
//rowWindowPopUp.js
//unauthorized.js
//categoryes_observer.js
//categoryesAjax.js
//user-menu.js
//btn-btnTrend.js
//showPopUpInterfaceHistory.js
//add-upload-miniature.js
//publish-the-article.js
//send-commentary-to-server.js
//site-feed/jump2.js
//login.js
//site-feed/search_observer.js
//site-feed/search.js
//site-feed/search_list_observer.js
//site-index/search_observer.js
//site-index/search.js
//site-index/search_list_observer.js
//aNa_2.js

//Domain
		var domain_name;
	//Проверяем, находится ли сайт на локальном сервере
		if(window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1'){
			//Local server
			    domain_name = 'http://localhost:8888/';
			    //domain_name = 'http://localhost/';
		} else {
		    //Public server
		    	domain_name = 'https://think.ceo/';
		}

{//	authorizeUser.js
	//START
		function signInhandleKeyPress(event, id){
		    if(event.keyCode === 13){ //Проверяем код клавиши, если это Enter (код 13)
		        event.preventDefault(); //Предотвращаем стандартное действие Enter в поле ввода
		        authorizeUser(id); //Вызываем функцию поиска
		    }
		}
	//END
	/*START PopUp->ConnectOrRegister->Button(SignIn)*/
		//Session : false
			if(localStorage.getItem("session") == "false"){
				//Appearance
					//Light Mode
						if(localStorage.getItem("appearance") == "light_mode"){
							ap_spucorbsi_light_mode();
						}
					//Dark Mode
						else if(localStorage.getItem("appearance") == "dark_mode"){
							ap_spucorbsi_dark_mode();
						}
			}
		//Appearance : functions
			function ap_spucorbsi_light_mode(){
				/*Remove dark mode*/document.getElementsByClassName("btn_PUWC_signin_nr_2_js")[0].classList.remove("signin_appearance_nr_2_dark");
				/*Add light mode*/  document.getElementsByClassName("btn_PUWC_signin_nr_2_js")[0].classList.add("signin_appearance_light_nr_2");
			}
			function ap_spucorbsi_dark_mode(){
				/*Add dark mode*/    document.getElementsByClassName("btn_PUWC_signin_nr_2_js")[0].classList.add("signin_appearance_nr_2_dark");
				/*Remove light mode*/document.getElementsByClassName("btn_PUWC_signin_nr_2_js")[0].classList.remove("signin_appearance_light_nr_2");
			}
	/*END*/
	function authorizeUser(id){
		//Define var
			history.pushState({'page_id': 1}, '', domain_name + 'feed.php');
			let c_l_usernamejs = document.getElementsByClassName("c_l_usernamejs")[id].value,
				c_k_passwordjs = document.getElementsByClassName("c_k_passwordjs")[id].value;
		//Check if username is NOT writted
			if(c_l_usernamejs == ""){
				//ERROR NR.1
					document.getElementsByClassName("err_c_usernamejs")[id].innerHTML = field_is_required;
					document.getElementsByClassName("err_c_usernamejs")[id].classList.remove("none");
					document.getElementsByClassName("c_l_usernamejs")[id].classList.add("redisbs");
					document.getElementsByClassName("c_l_usernamejs")[id].classList.remove("greenisbs");
					cpcp(id);
			}
		//If username is writted
			else if(c_l_usernamejs != ""){
				cpcp(id);
			}
		//Check password
			function cpcp(id){
				//Check if password is NOT writted
					if(c_k_passwordjs == ""){
						//ERROR NR.2
							document.getElementsByClassName("err_c_passwordjs")[id].innerHTML = field_is_required;
							document.getElementsByClassName("err_c_passwordjs")[id].classList.remove("none");
							document.getElementsByClassName("c_k_passwordjs")[id].classList.add("redisbs");
							document.getElementsByClassName("c_k_passwordjs")[id].classList.remove("greenisbs");
					}
				//If password is writted and if is writted username
					else if(c_k_passwordjs != "" && c_l_usernamejs != ""){
						stslap(id);
					}
			}
		//Send to server login and password
			function stslap(id){
				request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						//Define var
							var response = request.responseText;
	 					//1 : Username or email is NOT writted
							if(response == "1"){
								//ERROR NR.1
									document.getElementsByClassName("err_c_usernamejs")[id].innerHTML = field_is_required;
									document.getElementsByClassName("err_c_usernamejs")[id].classList.remove("none");
									document.getElementsByClassName("c_l_usernamejs")[id].classList.add("redisbs");
									document.getElementsByClassName("c_l_usernamejs")[id].classList.remove("greenisbs");
							}
						//2 : Password is NOT writted
							else if(response == "2"){
								//ERROR NR.2
									document.getElementsByClassName("err_c_passwordjs")[id].innerHTML = field_is_required;
									document.getElementsByClassName("err_c_passwordjs")[id].classList.remove("none");
									document.getElementsByClassName("c_k_passwordjs")[id].classList.add("redisbs");
									document.getElementsByClassName("c_k_passwordjs")[id].classList.remove("greenisbs");
							}
						//3 : Username is NOT registered
							else if(response == "3"){
								//ERROR NR.3
									document.getElementsByClassName("err_c_usernamejs")[id].innerHTML = "Couldn't find you account";
									document.getElementsByClassName("err_c_usernamejs")[id].classList.remove("none");
									document.getElementsByClassName("c_l_usernamejs")[id].classList.add("redisbs");
									document.getElementsByClassName("c_l_usernamejs")[id].classList.remove("greenisbs");
							}
						//4 : Email is NOT registered
							else if(response == "4"){
								//ERROR NR.4
									document.getElementsByClassName("err_c_usernamejs")[id].innerHTML = "Couldn't find you account";
									document.getElementsByClassName("err_c_usernamejs")[id].classList.remove("none");
									document.getElementsByClassName("c_l_usernamejs")[id].classList.add("redisbs");
									document.getElementsByClassName("c_l_usernamejs")[id].classList.remove("greenisbs");
							}
						//5 : Successfull authorization
							else if(response == "5"){
								//Redirect to
									window.location.replace("feed.php");
							}
						//6 : Invalid password
							else if(response == "6"){
								//ERROR NR.2
									document.getElementsByClassName("err_c_passwordjs")[id].innerHTML = "Invalid password";
									document.getElementsByClassName("err_c_passwordjs")[id].classList.remove("none");
									document.getElementsByClassName("c_k_passwordjs")[id].classList.add("redisbs");
									document.getElementsByClassName("c_k_passwordjs")[id].classList.remove("greenisbs");
							}
						//7 : Successfull authorization for Locked users.
							else if(response == "7"){
								window.location.replace("../../signin.php");
							}
					}
				}
				request.open('POST', '../../src/path/dt/ss/index/nav/nav-sign_in/auth.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send("inputUsername=" + c_l_usernamejs + "&" + "inputPassword=" + c_k_passwordjs);
			}
	}
	//Remove Error (username or email)
		function redisbs_c_username(id){
			document.getElementsByClassName("c_l_usernamejs")[id].classList.remove("redisbs");
			document.getElementsByClassName("c_l_usernamejs")[id].classList.remove("greenisbs");
			document.getElementsByClassName("err_c_usernamejs")[id].innerHTML = "";
			document.getElementsByClassName("err_c_usernamejs")[id].classList.remove("none");
		}
	//Remove Error (password)
		function redisbs_c_password(id){
			document.getElementsByClassName("c_k_passwordjs")[id].classList.remove("redisbs");
			document.getElementsByClassName("c_k_passwordjs")[id].classList.remove("greenisbs");
			document.getElementsByClassName("err_c_passwordjs")[id].innerHTML = "";
			document.getElementsByClassName("err_c_passwordjs")[id].classList.remove("none");
		}
}

{//	MENU || Categoryes
	function menu(){
		//Enabled version
			//mobile
				if(localStorage.getItem("enabled_version") == "mobile"){
					/*Disable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.add("ovysi_2");
				}
			//desktop
				else if(localStorage.getItem("enabled_version") == "desktop"){
					/*Enable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi_2");
				}
		/*
			state 0 means that menu is closed
			state 1 means that menu is opened
		*/
		//Get state
			let menuState = document.getElementsByClassName("menujs")[0].dataset.state;
		//Check if menu is closed
			if(menuState == 0){
				/*Hide menu*/fwwhm();
			}
		//Check if menu is opened
			else if(menuState == 1){
				/*Show menu*/fwwsm();
			} 
		//Cant obtain state
			else {
				//ERROR NR.1
					alert("ERROR NR.1: Cant obtain state");
			}
	}
	//Function which will: hide MENU
		function fwwsm(){
			//UPDATE State to 0
				document.getElementsByClassName("menujs")[0].dataset.state = 0;
			//Show button MENU: open
				document.getElementsByClassName("openmenu")[0].classList.remove("none");
				document.getElementsByClassName("closemenu")[0].classList.add("none");
			//Hide menu
				document.getElementsByClassName("c1js")[0].classList.add("none");
			/*Enable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi_2");
		}
	//Function which will: show MENU
		function fwwhm(){
			//UPDATE State to 1
				document.getElementsByClassName("menujs")[0].dataset.state = 1;
			//Show button MENU: close
				document.getElementsByClassName("openmenu")[0].classList.add("none");
				document.getElementsByClassName("closemenu")[0].classList.remove("none");
			//Show menu
				document.getElementsByClassName("c1js")[0].classList.remove("none");
		}
	//Active function fwwhm() which will hide MENU when making click outside menu or button
		document.addEventListener('click', function(event){
			let button = event.target.closest(".menujs"),
				menu   = event.target.closest(".c1js");
			if(button || menu){
				return;
			}
			/*Hide menu*/fwwsm();
		});
}

{//	Menu auto
		localStorage.setItem("filter__menu", 'all_topics');
		//Sorting category by letter from alphabet array
		  for(let it = 0; it < alphabet.length; it++){
		    for(let it2 = 0; it2 < category_all_topics.length; it2++){
		      if(category_all_topics[it2][0][0] == alphabet[it]){
				/*START WRITE->*/document.getElementsByClassName("innerHTML_sorted_bottoms_js")[0].innerHTML = `
		            <!--START Button-->
		              <div class="ccbwnr2 p l mb10">
		                <div class="ccbwnr3 p l u mb10">
		                  <div class="ccbwnr4 p l fw ml20 for_removing_dublicates_js">` + alphabet[it] + `</div>
		                  <div class="mobile_ccbwnr">
			                  <div class="ccbwnr5js ccbwnr5hovjs ffcbjs p l c royalbluejs cwjs br4" onclick="fFCB(`+ 0 +`); categoryes_code('` + category_all_topics[1] + `')">
			                    <div class="p l hi ccbww1">` + category_all_topics[0] + `</div>
			                  </div>
		                  </div>
		                </div>
		              </div>
		            <!--END-->
		          `;
		        /*<-END WRITE*/
		      }
		    }
		  }
	//Defined var
	var itplus = 1;
	//Sorting category by letter from alphabet array
	  for(let it = 0; it < alphabet.length; it++){
	    for(let it2 = 0; it2 < categoryes.length; it2++){
	      if(categoryes[it2][0][0] == alphabet[it]){
	        //START
	          //Count buttons in innerHTML_sorted_bottoms_js
	            //Max 15 buttons for one box
	              if(itplus <= 14){
	                CBIIHSBN = 0;
	              } else if(itplus <= 20){
	                CBIIHSBN = 1;
	              } else if(itplus > 29){
	                CBIIHSBN = 2;
	              }
	          	/*START WRITE->*/document.getElementsByClassName("innerHTML_sorted_bottoms_js")[CBIIHSBN].innerHTML += `
		            <!--START Button-->
		              <div class="ccbwnr2 p l mb10">
		                <div class="ccbwnr3 p l u mb10">
		                  <div class="ccbwnr4 p l fw ml20 for_removing_dublicates_js">` + alphabet[it] + `</div>
		                  <div class="mobile_ccbwnr">
			                  <div class="ccbwnr5js ccbwnr5hovjs ffcbjs p l c royalbluejs cwjs br4" onclick="fFCB(`+ itplus++ +`); categoryes_code('` + categoryes[it2][1] + `')">
			                    <div class="p l hi ccbww1">` + categoryes[it2][0] + `</div>
			                  </div>
		                  </div>
		                </div>
		              </div>
		            <!--END-->
		          `;
		        /*<-END WRITE*/
	        //END
	      }
	    }
	  }
	  cishsllaparifsie();
	//Check if successor have similar letter like a predecesor and remove it for successor if exist
	  function cishsllaparifsie(){
	    let FRDJ  = document.getElementsByClassName("for_removing_dublicates_js").length,
	        FRDJA = [];
	    for(let it = 0; it < FRDJ; it++){
	      FRDJA[it] = document.getElementsByClassName("for_removing_dublicates_js")[it].innerHTML;
	    }
	    //Create another array which dont have letters thats repeated
	      let result = [];
	      for(let i = 0; i < FRDJA.length; i++){
	        if(i === 0 || FRDJA[i] !== FRDJA[i - 1]){
	          result.push(FRDJA[i]);
	        } else{
	          result.push("");
	        }
	      }
	    //Rewrite first letters in buttons
	      for(let it = 0; it < FRDJ; it++){
	        FRDJA[it] = document.getElementsByClassName("for_removing_dublicates_js")[it].innerHTML = result[it];
	      }
	    
	  }
	//Save categoryes code in localStorage
		function categoryes_code(code){
			localStorage.setItem("filter__menu", code);
			/*Run->*/filter_nr_2_ajax_load();
			menu();
		}
}

{//	filter-for-articles.js
	{	
		//START When site is loaded
			//Light Mode
				if(localStorage.getItem("appearance") == "light_mode"){
					ap_ffaswsil_light_mode();
				}
			//Dark Mode
				else if(localStorage.getItem("appearance") == "dark_mode"){
					ap_ffaswsil_dark_mode();
				}
			//Appearance : functions
				function ap_ffaswsil_light_mode(){
					//New
						/*Remove dark mode*/document.getElementsByClassName("id_btn_nr_001_filter_by_new_js")[0].classList.remove("btn1_dark_mode_js");
						/*Add light mode*/  document.getElementsByClassName("id_btn_nr_001_filter_by_new_js")[0].classList.add("btn1_light_mode_js");
					//END
					//Day
						/*Remove dark mode*/document.getElementsByClassName("id_btn_filter_by_nr_3_from_8_js")[0].classList.remove("btn3_dark_mode_js");
						/*Add light mode*/  document.getElementsByClassName("id_btn_filter_by_nr_3_from_8_js")[0].classList.add("btn3_light_mode_js");
					//END
					//Set css: hover,active for all buttons (New/The best, Day/Week/Month/Year/All time, More filters)
						for(let it = 0; it <= 7; it++){
							/*Remove dark mode->*/document.getElementsByClassName("id_btn_f_js")[it].classList.remove("id_btn_filter_dark_mode_css");
							/*Add light mode->*/document.getElementsByClassName("id_btn_f_js")[it].classList.add("id_btn_filter_light_mode_css");
						}
				}
				function ap_ffaswsil_dark_mode(){
					//New
						/*Remove light mode*/document.getElementsByClassName("id_btn_nr_001_filter_by_new_js")[0].classList.remove("btn1_light_mode_js");
						/*Add dark mode*/    document.getElementsByClassName("id_btn_nr_001_filter_by_new_js")[0].classList.add("btn1_dark_mode_js");
					//END
					//Day
						/*Add dark mode*/    document.getElementsByClassName("id_btn_filter_by_nr_3_from_8_js")[0].classList.add("btn3_dark_mode_js");
						/*Remove light mode*/document.getElementsByClassName("id_btn_filter_by_nr_3_from_8_js")[0].classList.remove("btn3_light_mode_js");
					//END
					//Set css: hover,active for all buttons (New/The best, Day/Week/Month/Year/All time, More filters)
						for(let it = 0; it <= 7; it++){
							/*Add dark mode->*/document.getElementsByClassName("id_btn_f_js")[it].classList.add("id_btn_filter_dark_mode_css");
							/*Remove light mode->*/document.getElementsByClassName("id_btn_f_js")[it].classList.remove("id_btn_filter_light_mode_css");
						}
				}
		//END
		/*START*/
				localStorage.setItem("filter__new_the_best", 'new');
			let filter_nr_1_status_0 = 1;
			function filter_nr_1(nr){
				if(nr == '1'){
						localStorage.setItem("filter__new_the_best", 'new');
					//SHOW : selected background for button nr 1
						//Light_Mode
							if(localStorage.getItem("appearance") == "light_mode"){
								ap_ssbfbn1_light_mode();
							}
						//Dark_Mode
							else if(localStorage.getItem("appearance") == "dark_mode"){
								ap_ssbfbn1_dark_mode();
							}
							//UPDATE status
								document.getElementsByClassName("id_btn_nr_001_filter_by_new_js")[0].dataset.status = 1;
								document.getElementsByClassName("id_btn_nr_002_filter_by_best_js")[0].dataset.status = 0;
								//UPDATE value
									filter_nr_1_status_0 = 1;
				} else if(nr == '2'){
						localStorage.setItem("filter__new_the_best", 'the_best');
					//SHOW : selected background for button nr 2
						//Light_Mode
							if(localStorage.getItem("appearance") == "light_mode"){
								ap_ssbfbn2_light_mode();
							}
						//Dark_Mode
							else if(localStorage.getItem("appearance") == "dark_mode"){
								ap_ssbfbn2_dark_mode();
							}
							//UPDATE status
								document.getElementsByClassName("id_btn_nr_001_filter_by_new_js")[0].dataset.status = 0;
								document.getElementsByClassName("id_btn_nr_002_filter_by_best_js")[0].dataset.status = 1;
								//UPDATE value
									filter_nr_1_status_0 = 2;
				}
				//f_whoIsChecked();
			}
			//Appearance : functions
				function ap_ssbfbn1_light_mode(){
					/*Add*/ document.getElementsByClassName("id_btn_nr_001_filter_by_new_js")[0].classList.add("btn1_light_mode_js");
					/*Hide*/document.getElementsByClassName("id_btn_nr_002_filter_by_best_js")[0].classList.remove("btn1_light_mode_js");
				}
				function ap_ssbfbn1_dark_mode(){
					/*Add*/ document.getElementsByClassName("id_btn_nr_001_filter_by_new_js")[0].classList.add("btn1_dark_mode_js");
					/*Hide*/document.getElementsByClassName("id_btn_nr_002_filter_by_best_js")[0].classList.remove("btn1_dark_mode_js");
				}
			//Appearance : functions
				function ap_ssbfbn2_light_mode(){
					/*Hide*/document.getElementsByClassName("id_btn_nr_001_filter_by_new_js")[0].classList.remove("btn1_light_mode_js");
					/*Add*/ document.getElementsByClassName("id_btn_nr_002_filter_by_best_js")[0].classList.add("btn1_light_mode_js");
				}
				function ap_ssbfbn2_dark_mode(){
					/*Add*/ document.getElementsByClassName("id_btn_nr_001_filter_by_new_js")[0].classList.remove("btn1_dark_mode_js");
					/*Hide*/document.getElementsByClassName("id_btn_nr_002_filter_by_best_js")[0].classList.add("btn1_dark_mode_js");
				}
		/*END*/

		let filter_nr_2_status_0 = 3;
			localStorage.setItem("filter__day_week_month_year_all_time", 'Day');
		function filter_nr_2(nr){
			//START
				if(nr == 3){
					localStorage.setItem("filter__day_week_month_year_all_time", 'All_time');
				} else if(nr == 4){
					localStorage.setItem("filter__day_week_month_year_all_time", 'Day');
				} else if(nr == 5){
					localStorage.setItem("filter__day_week_month_year_all_time", 'Week');
				} else if(nr == 6){
					localStorage.setItem("filter__day_week_month_year_all_time", 'Month');
				} else if(nr == 7){
					localStorage.setItem("filter__day_week_month_year_all_time", 'Year');
				}
			//END
			let	btn1 = document.getElementsByClassName("id_btn_filter_by_nr_" + nr + "_from_8_js")[0];
			for(let nob = 3; nob <= 7; nob++){
				document.getElementsByClassName("id_btn_filter_by_nr_" + nob + "_from_8_js")[0].dataset.status = 0;
			}
			for(let nrOfbtns = 3; nrOfbtns <= 7; nrOfbtns++){
				//Light_Mode
					if(localStorage.getItem("appearance") == "light_mode"){
						/*Hide background*/document.getElementsByClassName("id_btn_filter_by_nr_" + nrOfbtns + "_from_8_js")[0].classList.remove("btn3_light_mode_js");
					}
				//Dark_Mode
					else if(localStorage.getItem("appearance") == "dark_mode"){
						/*Hide background*/document.getElementsByClassName("id_btn_filter_by_nr_" + nrOfbtns + "_from_8_js")[0].classList.remove("btn3_dark_mode_js");
					}
				if(nrOfbtns == nr){
					//Light_Mode
						if(localStorage.getItem("appearance") == "light_mode"){
							/*Add background*/document.getElementsByClassName("id_btn_filter_by_nr_" + nr + "_from_8_js")[0].classList.add("btn3_light_mode_js");
						}
					//Dark_Mode
						else if(localStorage.getItem("appearance") == "dark_mode"){
							/*Add background*/document.getElementsByClassName("id_btn_filter_by_nr_" + nr + "_from_8_js")[0].classList.add("btn3_dark_mode_js");
						}
					//UPDATE value
						filter_nr_2_status_0 = nr;
				}
			}
			document.getElementsByClassName("id_btn_filter_by_nr_" + nr + "_from_8_js")[0].dataset.status = 1;
			//f_whoIsChecked();
		}

		function filter_nr_2_ajax_load(){
			//Any time / Day / Week / Month / Year
				let	filter__menu                         = localStorage.getItem("filter__menu"),
					filter__new_the_best                 = localStorage.getItem("filter__new_the_best"),
					filter__day_week_month_year_all_time = localStorage.getItem("filter__day_week_month_year_all_time"),
					filter__search                       = document.getElementById("input-search").value,
					request                              = new XMLHttpRequest();
				//START
					request.onreadystatechange = function(){
						if(request.readyState == 4 && request.status == 200){
							//Upload articles
								//Article NOT found
									if(request.responseText.length < 5000){
										/*Show : articles not found->*/document.getElementsByClassName("srnw0js")[0].classList.remove("none");
										/*Hide : articles->*/document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.add("none");
									}
								//Article existed
									if(request.responseText.length > 5000){
										document.getElementsByClassName("feed-wrapp-articles-0")[0].innerHTML = request.responseText;
										/*Show : articles->*/document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.remove("none");
										/*Hide : articles not found->*/document.getElementsByClassName("srnw0js")[0].classList.add("none");
										//START : Restart observer for correctly work
											current_page = 1;
											startObserver();
										//END
									}
						}
					}
					request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/home.php');
					request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					request.send('filter__menu=' + filter__menu + "&" + "filter__new_the_best=" + filter__new_the_best + "&" + "filter__day_week_month_year_all_time=" + filter__day_week_month_year_all_time + "&" + "filter__search=" + filter__search);
				//END
		}

		function f_whoIsChecked(){
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					for(let nB = 0; nB <= 6; nB++){
						//document.getElementsByClassName("filtLdjs")[nB].classList.add("none");
						//document.getElementsByClassName("bcijs")[nB].classList.remove("btc");
					}
					document.getElementsByClassName("feed-wrapp-articles-0")[0].innerHTML = request.responseText;
				}
			}
			request.open('POST', '../src/path/dt/ss/index/filter/get-v1-v2.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("v1=" + filter_nr_1_status_0 + "&" + "v2=" + filter_nr_2_status_0);
		}
	}

	function chooseAdate(){
		//Enabled version
			//mobile
				if(localStorage.getItem("enabled_version") == "mobile"){
					/*Disable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.add("ovysi_4");
				}
			//desktop
				else if(localStorage.getItem("enabled_version") == "desktop"){
					/*Enable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi_4");
				}
		document.getElementsByClassName("cadn1js")[0].dataset.status     = "open";
		document.getElementsByClassName("cadn1js")[0].style.display      = "";
		document.getElementsByClassName("overflowjs")[0].style.overflowY = "hidden";
	}

	function cadclose(){
		document.getElementsByClassName("cadn1js")[0].style.display      = "none";
		document.getElementsByClassName("overflowjs")[0].style.overflowY = "scroll";
		document.getElementsByClassName("cadn1js")[0].dataset.status     = "hidden";
		/*Enable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi_4");
	}

	{
		document.addEventListener('click', function(event){
			if(document.getElementsByClassName("cadn1js")[0].dataset.status == "open"){
				let articleInformation = event.target.closest(".aIjs"),
					cadn2              = event.target.closest(".cadn2js"),
					wfss0              = event.target.closest(".wfss0");
				if(articleInformation || cadn2 || wfss0){
					return;
				}
				cadclose();
			}
		});
	}

	{
		let otherFiltersBtn      = document.getElementsByClassName("oFBjs")[0],
			otherFiltersPopUp    = document.getElementsByClassName("oFPUjs")[0],
			otherFiltersSwitcher = 1;
		function otherFiltersBtnF(){
			if(otherFiltersSwitcher == 1){
				//Light_Mode
					if(localStorage.getItem("appearance") == "light_mode"){
						/*Add light mode*/document.getElementsByClassName("id_btn_filter_by_nr_8_from_8_js")[0].classList.add("btn8_light_mode_js");
					}
				//Dark_Mode
					else if(localStorage.getItem("appearance") == "dark_mode"){
						/*Add Dark mode*/document.getElementsByClassName("id_btn_filter_by_nr_8_from_8_js")[0].classList.add("btn8_dark_mode_js");
					}
				//Hide
					otherFiltersPopUp.classList.remove("none");
				//UPDATE
					otherFiltersSwitcher = 0;	
			} else if(otherFiltersSwitcher == 0){
				//Light_Mode
					if(localStorage.getItem("appearance") == "light_mode"){
						/*Remove light mode*/document.getElementsByClassName("id_btn_filter_by_nr_8_from_8_js")[0].classList.remove("btn8_light_mode_js");
					}
				//Dark_Mode
					else if(localStorage.getItem("appearance") == "dark_mode"){
						/*Remove Dark mode*/document.getElementsByClassName("id_btn_filter_by_nr_8_from_8_js")[0].classList.remove("btn8_dark_mode_js");
					}
				//Hide
					otherFiltersPopUp.classList.add("none");
				//UPDATE
					otherFiltersSwitcher = 1;
			}

			document.addEventListener('click', function(event){
		  		let otherFiltersPopUpWindow = event.target.closest(".oFPUjs"),
		  			otherFiltersBtnWindow   = event.target.closest(".oFBjs"),
		  			cadn1                   = event.target.closest(".cadn1js"),
		  			deofnr1                 = event.target.closest(".deofn1js");

		  		if(otherFiltersPopUpWindow || otherFiltersBtnWindow || cadn1 || deofnr1){
		  			return;
		  		}

		  		document.querySelector('.oFPUjs').classList.add("none");
				/*Remove Light_Mode->*/ document.getElementsByClassName("id_btn_filter_by_nr_8_from_8_js")[0].classList.remove("btn8_light_mode_js");
				/*Remove Dark_Mode->*/ document.getElementsByClassName("id_btn_filter_by_nr_8_from_8_js")[0].classList.remove("btn8_dark_mode_js");
		  		otherFiltersSwitcher = 1;
			});	
		}
	}
}

{//	forgot-password.js
	if(localStorage.getItem("session") == "false"){
		function forgotPasswordWindow(){
			document.getElementsByClassName("fPISjs")[0].style.display       = "";
			document.getElementsByClassName("overflowjs")[0].style.overflowY = "hidden";
			document.getElementsByClassName("sjs")[0].style.opacity          = "1";
			document.getElementsByClassName("fPISjs")[0].dataset.status      = "open";
			cuunr1();
		}

		function closeforgotPasswordWindow(){
			document.getElementsByClassName("fPISjs")[0].style.display       = "none";
			document.getElementsByClassName("overflowjs")[0].style.overflowY = "scroll";
			document.getElementsByClassName("sjs")[0].style.opacity          = "0";
			document.getElementsByClassName("fPISjs")[0].dataset.status      = "hidden";
		}

		{
			document.addEventListener('click', function(event){
				if(document.getElementsByClassName("fPISjs")[0].dataset.status == "open"){
					let wNFPIS = event.target.closest(".wNfPISjs");
						wpfp   = event.target.closest(".pfpjs");
					if(wNFPIS || wpfp){
						return;
					}
					document.getElementsByClassName("fPISjs")[0].dataset.status      = "hidden";
					document.getElementsByClassName("fPISjs")[0].style.display       = "none";
					document.getElementsByClassName("overflowjs")[0].style.overflowY = "scroll";
				}
			});
		}
	}
}

{//	hide-post-complain.js
	function hidePost(id){
		if(localStorage.getItem("session") == "true"){
				document.getElementsByClassName("mobile_hpID"+id)[0].classList.add("none");
				document.getElementsByClassName("tosrID"+id)[0].classList.remove("none");
				document.getElementsByClassName("tosaID"+id)[0].classList.add("none");
				document.getElementsByClassName("rwpuID"+id)[0].classList.add("none");
			//START : Query : send id of article which should be hided
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						
					}
				}
				request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-hide/hide.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send("id=" + String(id).slice(0, -3));
			//END
		}
	}

	function hidePost_extended(){
		if(localStorage.getItem("session") == "true"){
				document.getElementsByClassName("tosrIDextended")[0].classList.remove("none");
				document.getElementsByClassName("tosaIDextended")[0].classList.add("none");
				document.getElementsByClassName("rwpuIDextended")[0].classList.add("none");
				document.getElementsByClassName("aer_extendedjs")[0].classList.add("none");
				document.getElementsByClassName("aerre_extendedjs")[0].classList.add("none");
				document.getElementsByClassName("article_extended_removed_hide_js")[0].classList.remove("none");
				document.getElementsByClassName("article_extended_undo_hide_js")[0].classList.remove("none");
			//START : Query : send id of article which should be hided
				let id      = localStorage.getItem("extended_article_id");
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						
					}
				}
				request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-hide/hide.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send("id=" + String(id).slice(0, -3));
			//END
		}
	}

	/*START feed->article->hide post->undo*/
		//Session : true
			if(localStorage.getItem("session") == "true"){
				//Appearance
					//Light Mode
						if(localStorage.getItem("appearance") == "light_mode"){
							/*Remove Dark Mode*/document.getElementsByClassName("id_undo_appearance_js")[0].classList.remove("rw2b_dark_mode");
							/*Add Light Mode*/  document.getElementsByClassName("id_undo_appearance_js")[0].classList.add("rw2b");
						}
					//Dark Mode
						else if(localStorage.getItem("appearance") == "dark_mode"){
							/*Add Dark Mode*/    document.getElementsByClassName("id_undo_appearance_js")[0].classList.add("rw2b_dark_mode");
							/*Remove Light Mode*/document.getElementsByClassName("id_undo_appearance_js")[0].classList.remove("rw2b");
						}
			}
	/*END*/
	
	function rw2bUndo(id){
			document.getElementsByClassName("tosrID"+id)[0].classList.add("none");
			document.getElementsByClassName("tosaID"+id)[0].classList.remove("none");
		//START : Query : send id of article which should be recovered
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					handleLikeF(id);
				}
			}
			request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-undo/undo.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("id=" + String(id).slice(0, -3));
		//END
	}

	/*START feed->article->hide post->tell us why*/
		//Session : true
			if(localStorage.getItem("session") == "true"){
				//Appearance
					//Light Mode
						if(localStorage.getItem("appearance") == "light_mode"){
							//*Remove Dark Mode*/document.getElementsByClassName("id_tellUsWhy_appearance_js")[0].classList.remove("rw3b_dark_mode");
							//*Add Light Mode*/  document.getElementsByClassName("id_tellUsWhy_appearance_js")[0].classList.add("rw3b");
						}
					//Dark Mode
						else if(localStorage.getItem("appearance") == "dark_mode"){
							//*Add Dark Mode*/    document.getElementsByClassName("id_tellUsWhy_appearance_js")[0].classList.add("rw3b_dark_mode");
							//*Remove Light Mode*/document.getElementsByClassName("id_tellUsWhy_appearance_js")[0].classList.remove("rw3b");
						}
			}
	/*END*/
	/*START*/
		function complain(nr){
			if(localStorage.getItem("session") == "true"){
					localStorage.setItem("temporary_nr_id_complain", nr);
					document.getElementsByClassName("coar0js")[0].style.display      = "";
					document.getElementsByClassName("overflowjs")[0].style.overflowY = "hidden";
					document.getElementsByClassName("coar0js")[0].dataset.status     = "open";
				//Prevent send
					if(document.getElementsByClassName("complain_article_js")[0].value != ""){
						send_complain_to_server();
					}
			}
		}

		function send_complain_to_server(){
			//START : Query : send complain
				let id      = localStorage.getItem("temporary_nr_id_complain");
				let message = document.getElementsByClassName("complain_article_js")[0].value;
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						//If complain/message was successully send
							if(request.responseText == "1"){
								//alert("Works");
								/*close : complain window->*/ccancel_0();
								/*show : message was message was delivered->*/warning_alert('The complaint was sent successfully!');
								/*clear : textarea*/document.getElementsByClassName("complain_article_js")[0].value = "";
							}
					}
				}
				request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-complain/src/sidebar-home-articles-complaints.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send("id=" + String(id).slice(0, -3) + "&" + "message=" + message);
			//END
		}
	/*END*/

	/*START feed->article->Complain->Button(Complain)*/
		//Session : true
			if(localStorage.getItem("session") == "true"){
				//Appearance
					//Light Mode
						if(localStorage.getItem("appearance") == "light_mode"){
							/*Remove Dark Mode*/document.getElementsByClassName("id_btn_complain_js")[0].classList.remove("sendco0_dark_mode");
							/*Add Light Mode*/  document.getElementsByClassName("id_btn_complain_js")[0].classList.add("sendco0");
						}
					//Dark Mode
						else if(localStorage.getItem("appearance") == "dark_mode"){
							/*Add Dark Mode*/    document.getElementsByClassName("id_btn_complain_js")[0].classList.add("sendco0_dark_mode");
							/*Remove Light Mode*/document.getElementsByClassName("id_btn_complain_js")[0].classList.remove("sendco0");
						}
			}
	/*END*/

	function ccancel_0(){
		document.getElementsByClassName("coar0js")[0].style.display      = "none";
		document.getElementsByClassName("overflowjs")[0].style.overflowY = "scroll";
		document.getElementsByClassName("coar0js")[0].dataset.status     = "hidden";
	}

	{
		if(localStorage.getItem("session") == "true"){
			document.addEventListener('click', function(event){
				if(document.getElementsByClassName("coar0js")[0].dataset.status == "open"){
					let coar3   = event.target.closest(".coar3js"),
						cW4SRTM = event.target.closest(".cW4SRTMjs");
						buufjs  = event.target.closest(".buufjs");
					if(coar3 || cW4SRTM || buufjs){
						return;
					}
					ccancel_0();
				}
			});
		}
	}
}

{//	likes.js
	/*status : likes->*/localStorage.setItem("likes_status", "closed");
	function showPopUpInrerfaceLikes(){
		//Enabled version
			//mobile
				if(localStorage.getItem("enabled_version") == "mobile"){
					/*Disable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.add("ovysi");
				}
			//desktop
				else if(localStorage.getItem("enabled_version") == "desktop"){
					/*Enable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi");
				}
		//Check
			if(localStorage.getItem("likes_status") == "closed"){
				/*status : likes->*/localStorage.setItem("likes_status", "open");
			} else if(localStorage.getItem("likes_status") == "open"){
				/*status : likes->*/localStorage.setItem("likes_status", "closed");
			}
		document.getElementsByClassName("pUWLijs")[0].classList.toggle("none");
		document.getElementsByClassName("bLjs")[0].style.backgroundColor = "#F5F6F7";
		document.getElementsByClassName("bLjs")[0].style.borderTop       = "1px solid #DDDFE2";
		document.getElementsByClassName("bLjs")[0].style.borderBottom    = "1px solid #DDDFE2";
		document.getElementsByClassName("bLjs")[0].style.marginTop       = "-1px";
		document.getElementsByClassName("bLjs")[0].style.cursor          = "pointer";
		document.getElementsByClassName("bLjs")[0].classList.remove("btnHistorHover");
		document.getElementsByClassName("sjs")[0].style.opacity = "1";
		switch(document.getElementsByClassName("pUWLijs")[0].classList.contains("none")){
			case true:
			document.getElementsByClassName("bLjs")[0].style.backgroundColor      = "";
			document.getElementsByClassName("bLjs")[0].style.borderTop            = "";
			document.getElementsByClassName("bLjs")[0].style.borderBottom         = "";
			document.getElementsByClassName("bLjs")[0].style.marginTop            = "";
			document.getElementsByClassName("bLjs")[0].style.cursor               = "";
			document.getElementsByClassName("bLjs")[0].classList.add("btnHistorHover");
			/*Enable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi");
		}
		document.addEventListener('click', function(event){
	  		let popUpWindowHistory = event.target.closest(".pUWLijs"),
	  			btnHistr           = event.target.closest(".bLjs");
	  		if(popUpWindowHistory || btnHistr){
	  			return;
	  		}
	  		document.getElementsByClassName("bLjs")[0].style.backgroundColor      = "";
			document.getElementsByClassName("bLjs")[0].style.borderTop            = "";
			document.getElementsByClassName("bLjs")[0].style.borderBottom         = "";
			document.getElementsByClassName("bLjs")[0].style.marginTop            = "";
			document.getElementsByClassName("bLjs")[0].style.cursor               = "";
			document.getElementsByClassName("bLjs")[0].classList.add("btnHistorHover");
	  		document.querySelector('.pUWLijs').classList.add("none");
			/*status : chat->*/localStorage.setItem("likes_status", "closed");
		});
		//session : true
			if(localStorage.getItem("session") == "true"){
				show_article_which_was_liked();
			}
	}

	function show_article_which_was_liked(){
		/*Hide: Title->*/document.getElementsByClassName("likes_title_js")[0].classList.add("none");
		/*Show: loading->*/document.getElementsByClassName("loading_for_liked_articlesjs")[0].classList.remove("none");
		//Send ajax request
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
						var response = request.responseText;
					//Nothing not was found
						if(response.length <= 2000){
							document.getElementsByClassName("puwsulikaujs")[0].classList.remove("pat37");
							/*Hide: Title->*/document.getElementsByClassName("likes_title_js")[0].classList.add("none");
							/*Hide: loading->*/document.getElementsByClassName("loading_for_liked_articlesjs")[0].classList.add("none");
							/*Show: when nothing not found->*/document.getElementsByClassName("puwsulikjs")[0].classList.remove("none");
						} 
					//Exists
						else {
							document.getElementsByClassName("puwsulikaujs")[0].classList.add("pat37");
							/*Remove: loading->*/document.getElementsByClassName("loading_for_liked_articlesjs")[0].classList.add("none");
							/*Hide  : when nothing not found->*/document.getElementsByClassName("puwsulikjs")[0].classList.add("none");
							/*Show  : Title->*/document.getElementsByClassName("likes_title_js")[0].classList.remove("none");
							/*innerHTML->*/document.getElementsByClassName("puwsulikaujs")[0].innerHTML = response;
						}
				}
			}
			request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-likes/src/likes.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send('load=' + "1");
	}
}

{//	login-or-registration.js
	if(localStorage.getItem("session") == "false"){
		//Light mode
			if(localStorage.getItem("appearance") == "light_mode"){ 
				ap_lorlmltlm_light_mode();
			}
		//Dark mode
			else if(localStorage.getItem("appearance") == "dark_mode"){
				ap_lorlmltlm_dark_mode();
			}
		//Appearance : functions
			function ap_lorlmltlm_light_mode(){
				/*Light theme*/      document.getElementsByClassName("tcjs")[0].classList.add("appearance_PUWC_2_light");
				/*Remove Dark theme*/document.getElementsByClassName("tcjs")[0].classList.remove("appearance_PUWC_2_dark");
			}
			function ap_lorlmltlm_dark_mode(){
				/*Dark theme*/        document.getElementsByClassName("tcjs")[0].classList.add("appearance_PUWC_2_dark");
				/*Remove Light theme*/document.getElementsByClassName("tcjs")[0].classList.remove("appearance_PUWC_2_light");
			}
		let alterntiveText = true;
		function showPopUpConect(){
			document.getElementsByClassName("pUWCjs")[0].classList.toggle("none");
			let thnkcnct = document.getElementsByClassName("thcjs")[0];

			if(alterntiveText == true){
				document.getElementsByClassName("tcjs")[0].innerHTML = tslf_Cancel;
				alterntiveText   = false;
			} else if(alterntiveText == false){
				document.getElementsByClassName("tcjs")[0].innerHTML   = tslf_SignIn;
				alterntiveText   = true;
			}

			document.getElementsByClassName("pUWCjs")[0].classList.toggle("none");
			document.getElementsByClassName("pUWCjs")[0].classList.toggle("none");
			document.addEventListener('click', function(event){
				let popUpWindowCnct = event.target.closest(".pUWCjs"),
					thnkcnct        = event.target.closest(".thcjs");
					rIS_2           = event.target.closest(".rISjs");
					fPIS            = event.target.closest(".fPISjs");

		  		if(popUpWindowCnct || thnkcnct || rIS_2 || fPIS){
		  			return;
		  		}
		  			
		  		let text = document.getElementsByClassName("thcjs")[0];
				text.innerHTML   	  = tslf_SignIn;
				alterntiveText        = true;		
				document.querySelector('.pUWCjs').classList.add("none");
			});
		}

		function registrationWindow(){
			document.getElementsByClassName("rISjs")[0].dataset.status = "open";
			let rIS               = document.getElementsByClassName("rISjs")[0];
				rIS.style.display = "";
			cuunr1();
			document.getElementsByClassName("overflowjs")[0].style.overflowY = "hidden";
			document.getElementsByClassName("sjs")[0].style.opacity          = "1";
			if(document.getElementsByClassName("pUWHjs")[0].classList.contains("true") == true){
				document.getElementsByClassName("pUWHjs")[0].classList.add("none");
				document.getElementsByClassName("bHjs")[0].style.backgroundColor = "";
			}
		}

		function rcrw(){
			document.getElementsByClassName("rISjs")[0].style.display        = "none";
			document.getElementsByClassName("overflowjs")[0].style.overflowY = "scroll";
			document.getElementsByClassName("sjs")[0].style.opacity          = "0";
			document.getElementsByClassName("rISjs")[0].dataset.status       = "hidden";	
		}

		{
			document.addEventListener('click', function(event){
				if(document.getElementsByClassName("rISjs")[0].dataset.status == "open"){
					let wSRIS  = event.target.closest(".wSRIS");
						wSRIS2 = event.target.closest(".prjs");

					if(wSRIS || wSRIS2){
						return;
					}

					rcrw();
				}
			});
		}
	}
}

{//	Registration
	function register(){
		var	r_emailjs    = document.getElementsByClassName("r_emailjs")[0].value,
			r_usernamejs = document.getElementsByClassName("r_usernamejs")[0].value,
			r_passwordjs = document.getElementsByClassName("r_passwordjs")[0].value;

		//Check (r_emailjs)
			if(r_emailjs == ""){
				//If field is with empty email then register without email. Next check
				/*Run function which check username->*/reucuch();
			} else if(r_emailjs != ""){
				//Check if email is writted corectly
					function isValidEmail(email){
						var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
						return emailRegex.test(email);
					}
				//Check the result of function isValidEmail
					if(isValidEmail(r_emailjs)){
						//Email is writted corectly
						/*Run function which check username->*/reucuch();
					} else {
						//Email is NOT writted corectly
						//ERROR NR.1
							document.getElementsByClassName("err_r_emailjs")[0].innerHTML = "Invalid email address";
							document.getElementsByClassName("r_emailjs")[0].classList.add("redisbs");
					}
			}
		//Check (r_usernamejs)
			function reucuch(){
				//Check if input field of username is empty
					if(document.getElementsByClassName("r_usernamejs")[0].value == ""){
						//ERROR NR.2
							document.getElementsByClassName("err_r_usernamejs")[0].innerHTML = field_is_required;
							document.getElementsByClassName("r_usernamejs")[0].classList.add("redisbs");
					}
				//Check if input field of username is NOT empty
					else if(document.getElementsByClassName("r_usernamejs")[0].value != ""){
						//Username is writted. Next check
						/*Run function which check password->*/rfwcp();
					}
			}
		//Check (r_passwordjs)
			function rfwcp(){
				//Check if input field of password is empty
					if(document.getElementsByClassName("r_passwordjs")[0].value == ""){
						//ERROR NR.3
							document.getElementsByClassName("err_r_passwordjs")[0].innerHTML = field_is_required;
							document.getElementsByClassName("r_passwordjs")[0].classList.add("redisbs");
					}
				//Check if input field of password is NOT empty
				else if(document.getElementsByClassName("r_passwordjs")[0].value != ""){
					//Password is writted. Next check
					//Check if password is not very shortly
						if(document.getElementsByClassName("r_passwordjs")[0].value.length < 5){
							//Error (password)
								document.getElementsByClassName("err_r_passwordjs")[0].innerHTML = minimum_length_5_characters;
								document.getElementsByClassName("r_passwordjs")[0].classList.add("redisbs");
						} else if(document.getElementsByClassName("r_passwordjs")[0].value.length > 5){
							//Password is writted corectly. Next
							/*Run function which send data to server->*/rfwsdts();
						}
				}
			}
		//Fields is completed. Next. Send to server
			function rfwsdts(){
				var request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						//Define var
							var response = request.responseText;
						//1 : Username is not written
							if(response == "1"){
								document.getElementsByClassName("err_r_usernamejs")[0].innerHTML = field_is_required;
								document.getElementsByClassName("r_usernamejs")[0].classList.add("redisbs");
							}
						//2 : Password is not written
							else if(response == "2"){
								document.getElementsByClassName("err_r_passwordjs")[0].innerHTML = field_is_required;
								document.getElementsByClassName("r_passwordjs")[0].classList.add("redisbs");
							}
						//3 : Password is too short
							else if(response == "3"){
								document.getElementsByClassName("err_r_passwordjs")[0].innerHTML = minimum_length_5_characters;
								document.getElementsByClassName("r_passwordjs")[0].classList.add("redisbs");
							}
						//4 : Email is already used
							else if(response == "4"){
								document.getElementsByClassName("err_r_emailjs")[0].innerHTML = email_is_already_used;
								document.getElementsByClassName("r_emailjs")[0].classList.add("redisbs");
							}
						//5 : Username is already used
							else if(response == "5"){
								document.getElementsByClassName("err_r_usernamejs")[0].innerHTML = this_username_is_already_used;
								document.getElementsByClassName("r_usernamejs")[0].classList.add("redisbs");
							}
						//6 : Registration successful
							else if(response == "6"){
								window.location.replace("feed.php");
							}
						//7 : Registration failed
							else if(response == "7"){
								ERMESSAGE("Registration failed");
							}
					}
				}
				request.open('POST', '../src/path/dt/ss/index/nav/nav-sign_in-create_account/src/check_in/check_in.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send('r_emailjs=' + r_emailjs + '&' + 'r_usernamejs=' + r_usernamejs + "&" + 'r_passwordjs=' + r_passwordjs);
			}
	}

	//Remove Error (r_emailjs)
		function redisbs_r_email(){
			document.getElementsByClassName("r_emailjs")[0].classList.remove("redisbs");
			document.getElementsByClassName("r_emailjs")[0].classList.remove("greenisbs");
			document.getElementsByClassName("err_r_emailjs")[0].innerHTML = "";
		}
	//Remove Error (r_usernamejs)
		function r_err_r_username(){
			document.getElementsByClassName("err_r_usernamejs")[0].innerHTML = "";
			document.getElementsByClassName("r_usernamejs")[0].classList.remove("redisbs");
			document.getElementsByClassName("r_usernamejs")[0].classList.remove("greenisbs");
		}
	//Remove Error (r_passwordjs)
		function rer_r_password(){
			document.getElementsByClassName("err_r_passwordjs")[0].innerHTML = "";
			document.getElementsByClassName("r_passwordjs")[0].classList.remove("redisbs");
			document.getElementsByClassName("r_passwordjs")[0].classList.remove("greenisbs");
		}
}

{//	menu-categoryes-with-session.js
	function menuCwithS(title){
		/*show filter*/document.getElementsByClassName("rffanr1js")[0].classList.remove("none");
		/*START if response text 200 and loaded*/
			document.getElementsByClassName("feed-wrapp-articles-0")[0].innerHTML = title;
		/*END*/
		goToFeed();
	}
}

{//	menu-categoryes-without-session.js
	function menuCwOs(title){
		/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.add("bhn1ojs");
		/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.remove("btn-home-hover");
		/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.remove("btn-home-style-2");
		/*Hide search null window*/document.getElementsByClassName("srnw0js")[0].classList.add("none");
		/*show feed articles*/document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.remove("none");
		/*START if response text 200 and loaded*/
			var request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){	
					document.getElementsByClassName("feed-wrapp-articles-0")[0].innerHTML = request.responseText;
				}
			}
			request.open('POST', '../src/path/dt/sy/menu-categoryes/without-session/get-title.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("title=" + title);
		/*END*/
	}
}

{//	notify.js
	if(localStorage.getItem("session") == "true"){
		var thnkBell    = document.getElementsByClassName("tBmjs")[0],
			bellPopUp   = document.getElementsByClassName("bPUjs")[0],
			bellBgColor = 1;
		thnkBell.onclick = function(){
			if(bellBgColor == 1){
				/*Window is opened*/
					//START Light mode
						if(localStorage.getItem("appearance") == "light_mode"){
							ap_nwislmlm_light_mode();
							notifications_f();
						} 
					//END
					//START Dark mode
						else if(localStorage.getItem("appearance") == "dark_mode"){
							ap_nwislmlm_dark_mode();
							notifications_f();
						}
					//END
					thnkBell.style.borderRadius    = "2px";
					bellPopUp.classList.remove("none");
					bellBgColor                    = 0;	
			} else if(bellBgColor == 0){
				/*Window is closed*/
					//START Light theme
						if(localStorage.getItem("appearance") == "light_mode"){
							ap_nwislmlmwislm_light_mode();
						}
					//END
					//START Dark theme
						else if(localStorage.getItem("appearance") == "dark_mode"){
							ap_nwislmlmwislm_dark_mode();
						}
					//END
					bellPopUp.classList.add("none");
					bellBgColor = 1;
					hide_notifyes();
			}

			document.addEventListener('click', function(event){
				var userMenu    = event.target.closest(".bPUjs"),
					avatarImage = event.target.closest(".tBmjs");
				if(userMenu || avatarImage){
					return;
				}
				document.querySelector('.bPUjs').classList.add("none");
				//START Light theme
					if(localStorage.getItem("appearance") == "light_mode"){
						thnkBell.classList.remove("notify_activejs");
					}
				//END
				//START Dark theme
					else if(localStorage.getItem("appearance") == "dark_mode"){
						thnkBell.classList.remove("dark_appearance_color_nr_3");
						thnkBell.classList.remove("notify_active_dark_mode_opened_js");
					}
				//END
				bellBgColor = 1;
				hide_notifyes();
			});

			function hide_notifyes(){
				/*Hide : Title->*/document.getElementsByClassName("notify_title_js")[0].classList.add("none");
				/*Hide : Notifiyes->*/document.getElementsByClassName("innerHTML_notifications_was_found_js")[0].classList.add("none");
				/*Hide : Counts->*/document.getElementsByClassName("tBm_count_js")[0].classList.add("none");
			}
		}
		//Appearance : functions
			function ap_nwislmlm_light_mode(){
				thnkBell.classList.add("notify_activejs");
			}
			function ap_nwislmlm_dark_mode(){
				thnkBell.classList.add("notify_active_dark_mode_js");
				thnkBell.classList.add("notify_active_dark_mode_opened_js");
			}
		//Appearance : When closed
			function ap_nwislmlmwislm_light_mode(){
				thnkBell.classList.remove("notify_activejs");
			}
			function ap_nwislmlmwislm_dark_mode(){
				thnkBell.classList.remove("notify_active_dark_mode_js");
				thnkBell.classList.remove("notify_active_dark_mode_opened_js");
			}
	}
}

/*{//	observer_feed.js
	(()=>{
		let maxActive1 = new XMLHttpRequest();
			maxActive1.onreadystatechange = function(){	
				if(maxActive1.status == 200 && maxActive1.readyState == 4){
					let	maxActive = maxActive1.responseText;

					const createObserver = function(){
						let options = {
							root      : null,
							rootMargin: "100px",
							threshold : 1.0
						};

						let observer = new IntersectionObserver(
							function (entries, observer){
								handleIntersect(entries, observer); 
							}, options);

						let targetElements = document.querySelectorAll(".observer_feed");
						targetElements.forEach((targetElement) => {
							observer.observe(targetElement);
						});
					};

					let active = -1,
						nrSend = 0;

					const handleIntersect = function(entries, observer){
						entries.forEach((entry) =>{
						if(entry.isIntersecting){
								if(active <= maxActive / 10){
									active++;
									nrSend += 10;
								} else {
									return;
								}

								document.getElementsByClassName("observer_feed")[active].style.display = "none";
								let ajaxUploadArticles = new XMLHttpRequest();
								ajaxUploadArticles.onreadystatechange = function(){	
									if(ajaxUploadArticles.status == 200 && ajaxUploadArticles.readyState == 4){
										document.getElementsByClassName("loading-rowWindowWrapper")[0].style.display = "none";
										document.getElementsByClassName("observerAutoUploadArticleFeed")[0].innerHTML += ajaxUploadArticles.responseText;
										createObserver();
									}
								}
								ajaxUploadArticles.open("POST", "../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/ajaxUploadArticles.php");
								ajaxUploadArticles.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
								ajaxUploadArticles.send("ajaxUploadArticles=" + nrSend);
							}
						});
					};
					createObserver();
				}
			}
			maxActive1.open("POST", "../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/maxActive.php");
			maxActive1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			maxActive1.send("maxActive=" + 1);
	})();
}*/

{//	rowup-3-1-user-profile.js
	//Handle profile buttons
		function rowup_3_1_change_window(name, id){
			//Clear 1 : articles
				document.getElementsByClassName("window_profile_content")[0].innerHTML = "";
				//Clear 2 : likes
					document.getElementsByClassName("window_profile_content")[0].innerHTML = "";
			//Handle buttons nav
				//if(document.getElementsByClassName(name)[0].classList.contains("none")){
					//if(document.getElementsByClassName(name)[0].classList.contains("none")){
						document.getElementsByClassName("ru31bb21js")[0].classList.remove("none");
						//document.getElementsByClassName(name)[0].classList.remove("none");
						//document.getElementsByClassName("ru31bb")[id].classList.add("ru31bb-co-changed");
						document.getElementsByClassName("ri41wjs")[0].classList.remove("none");
					//}
				//}
			//Send ajax for upload data in profile window
				f_article();
			//Send ajax
				upload_avatar_ajax(document.getElementsByClassName("user_pagejs")[0].dataset.idOfUserWhichAlreadyIsOpened);
		}
	//Upload avatar
		function upload_avatar_ajax(id){
			//START : send ajax : upload avatar photo
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
							let response = request.responseText;
						//1 : Avatar is not found
							if(response == "1"){
								/*Show : avatar-not-found->*/document.getElementsByClassName("avatar_not_found_js")[0].classList.remove("none");
								/*Hide : img->*/document.getElementsByClassName("ru2111i")[0].classList.add("none");
							}
						//2 : Error in the query
							else if(response == "2"){
								console.log("Error in the query");
							}
						//Else : Image was found
							else {
								/*Hide : avatar-not-found->*/document.getElementsByClassName("avatar_not_found_js")[0].classList.add("none");
								/*Show : avatar->*/document.getElementsByClassName("ru2111i")[0].classList.remove("none");
								/*UPDATE : SRC->*/document.getElementsByClassName("ru2111i")[0].src = "src/du/avatar/" + response;
							}
					}
				}
				request.open('POST', '../src/path/dt/ss/index/user/user-profile/src/user-profile-upload-avatar.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send("id=" + id);
			//END
		}
	//Timeline
		function f_timeline(){
			/*InnerHTML->*/document.getElementsByClassName("window_profile_content")[0].innerHTML = "";
			/*SHOW : Loading->*/document.getElementsByClassName("window_profile_loading_js")[0].classList.remove("none");
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					//1 : ERROR
						if(request.responseText == "2"){
							alert("ERROR");
						} 
					//2 : SUCCESS
						else {
							/*InnerHTML->*/document.getElementsByClassName("window_profile_content")[0].innerHTML = request.responseText;
							/*Hide : Loading->*/document.getElementsByClassName("window_profile_loading_js")[0].classList.add("none");
						}
				}
			}
			request.open('POST', '../src/path/dt/ss/index/user/user-profile/src/profile_windows/0_timeline/src/0_timeline_AJAX.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("timeline=" + "1");
		}
	//Article
		function f_article(){
			/*InnerHTML->*/document.getElementsByClassName("window_profile_content")[0].innerHTML = "";
			/*SHOW : Loading->*/document.getElementsByClassName("window_profile_loading_js")[0].classList.remove("none");
			/*ID of user profile which is opened->*/ let user_profile_id = document.getElementsByClassName("user_pagejs")[0].dataset.idOfUserWhichAlreadyIsOpened;
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					//1 : ERROR
						if(request.responseText == "2"){
							alert("ERROR");
						} 
					//2 : SUCCESS
						else {
							/*InnerHTML->*/document.getElementsByClassName("window_profile_content")[0].innerHTML = request.responseText;
							/*Hide : Loading->*/document.getElementsByClassName("window_profile_loading_js")[0].classList.add("none");
						}
				}
			}
			request.open('POST', '../src/path/dt/ss/index/user/user-profile/src/profile_windows/1_articles/src/1_article_AJAX.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("article=" + "1" + "&" + "user_profile_id=" + user_profile_id + "&" + "IDWWRA=" + whichPageIsOpened_f());
		}
	//Likes
		function f_likes(){
			/*InnerHTML->*/document.getElementsByClassName("window_profile_content")[2].innerHTML = "";
			/*SHOW : Loading->*/document.getElementsByClassName("window_profile_loading_js")[2].classList.remove("none");
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					//1 : ERROR
						if(request.responseText == "2"){
							alert("ERROR");
						} 
					//2 : SUCCESS
						else {
							/*InnerHTML->*/document.getElementsByClassName("window_profile_content")[2].innerHTML = request.responseText;
							/*Hide : Loading->*/document.getElementsByClassName("window_profile_loading_js")[2].classList.add("none");
						}
				}
			}
			request.open('POST', '../src/path/dt/ss/index/user/user-profile/src/profile_windows/2_likes/src/2_likes_AJAX.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("likes=" + "1");
		}
	//Comments
		function f_comments(){
			/*InnerHTML->*/document.getElementsByClassName("window_profile_content")[3].innerHTML = "";
			/*SHOW : Loading->*/document.getElementsByClassName("window_profile_loading_js")[3].classList.remove("none");
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					//1 : ERROR
						if(request.responseText == "2"){
							alert("ERROR");
						} 
					//2 : SUCCESS
						else {
							/*InnerHTML->*/document.getElementsByClassName("window_profile_content")[3].innerHTML = request.responseText;
							/*Hide : Loading->*/document.getElementsByClassName("window_profile_loading_js")[3].classList.add("none");
						}
				}
			}
			request.open('POST', '../src/path/dt/ss/index/user/user-profile/src/profile_windows/3_comments/src/3_comments_AJAX.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("comments=" + "1");
		}
}

{//	Which page is opened (wpio)
	function whichPageIsOpened_f(){
		//Get item from localStorage
			var IDWWRA = localStorage.getItem("whichPageIsOpened");
		//Set id for page
			//1 : feed -> 001
				if(IDWWRA == "feed"){
					return "001";
				}
			//2 : profile -> 002
				if(IDWWRA == "profile"){
					return "002";
				}
			//3 : extended_article -> 003
				if(IDWWRA == "extended_article"){
					return "003";
				}
	}
}

{//	show-comments.js
	function showComments(id, type_of_article){
		//Show/Hide leave a comment form
			function slacf(id){
				document.getElementsByClassName("LeaveAcommentID"+id)[0].classList.toggle("none");
			}
		/*Run function for getting comments and replyes from bd->*/scarfb(id, type_of_article);
		//Show comments and replyes from bd
			function scarfb(id, type_of_article){
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.status == 200 && request.readyState == 4){
						//GET AND SHOW COMMENTARY
							document.getElementsByClassName("decorID"+id)[0].classList.toggle("cWCDjs");
							/*Run function for showing/hiding form->*/slacf(id);
							document.getElementsByClassName("innerCommentsAndReplyesID"+id)[0].innerHTML = request.responseText;
						//START : reset value for : Button (View more comments)
							if(whichPageIsOpened_f() == "001" || whichPageIsOpened_f() == "002"){
								//START
									let vcmcsdfcspancountElement = document.getElementsByClassName("vcmcsdfcspancountID"+id)[0];
									let countofcommentsElement = document.getElementsByClassName("countofcommentsID"+id)[0];
									if (vcmcsdfcspancountElement && countofcommentsElement) {
									    vcmcsdfcspancountElement.innerHTML = parseInt(countofcommentsElement.innerHTML) - 5;
									}
								//END
								//START
									let countOfCommentsvcElement = document.getElementsByClassName("countOfCommentsvcID"+id)[0];
									if (countOfCommentsvcElement) {
									    countOfCommentsvcElement.classList.remove("none");
									}
								//END
							}
						//END
					}
				}
				request.open("POST", "../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-commentary/showComments.php");
				request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				request.send("id=" + String(id).slice(0, -3) + "&" + "type_of_article=" + type_of_article + "&" + "IDWWRA=" + whichPageIsOpened_f());
			}
	}

	//For extended articles
		function showCommentsToggle(id){
			//Show/Hide leave a comment form
				document.getElementsByClassName("LeaveAcommentID"+id)[0].classList.toggle("none");
				document.getElementsByClassName("decorID"+id)[0].classList.toggle("cWCDjs");
		}
}

{//	sidebar-without-session.js
	function __goToFeedBtnHomeWithoutSession(){
		history.pushState({'page_id': 1}, '', domain_name + 'feed.php');
		window.scrollTo(0,0);
		document.getElementById("mstjs").innerHTML = "Think: All new articles";
		/*hide filter*/document.getElementsByClassName("rffanr1js")[0].classList.remove("none");
		/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.add("bhn1ojs");
		/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.remove("btn-home-hover");
		/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.remove("btn-home-style-2");
		/*show feed articles*/document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.remove("none");
		/*show sidebar*/document.getElementsByClassName("sijs")[0].classList.remove("none");
		/*Hide : Not found nothing (Page)->*/document.getElementsByClassName("srnw0js")[0].classList.add("none");
		if(localStorage.getItem("session") == "true"){
			/*hide user-page*/document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
			/*hide add article*/document.getElementsByClassName("a0tajs")[0].classList.add("none");
			/*remove history window*/document.getElementsByClassName("srnw0js")[0].classList.add("none");
			document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
		}
		//START Hide : Extended article
			//Hide article WITH extended mode
				/*Hide->*/document.getElementsByClassName("feed-wrapp-articles-0-item-001")[0].classList.add("none");
				/*Hide extended->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].classList.add("none");
				//Show : Sidebar->Button(Home)
					show_sidebar_button_home();
		//END
	}
}

{//	subscriptions.js
	function showPopUpInrerfaceSubscrb(){
		document.getElementsByClassName("pUWSjs")[0].classList.toggle("none");
		document.getElementsByClassName("bSjs")[0].style.backgroundColor = "#F5F6F7";
		document.getElementsByClassName("bSjs")[0].style.borderTop       = "1px solid #DDDFE2";
		document.getElementsByClassName("bSjs")[0].style.borderBottom    = "1px solid #DDDFE2";
		document.getElementsByClassName("bSjs")[0].style.marginTop       = "-1px";
		document.getElementsByClassName("bSjs")[0].style.cursor          = "pointer";
		document.getElementsByClassName("bSjs")[0].classList.remove("btnHistorHover");
		document.getElementsByClassName("sjs")[0].style.opacity = "1";
		switch(document.getElementsByClassName("pUWSjs")[0].classList.contains("none")){
			case true:
			document.getElementsByClassName("bSjs")[0].style.backgroundColor      = "";
			document.getElementsByClassName("bSjs")[0].style.borderTop            = "";
			document.getElementsByClassName("bSjs")[0].style.borderBottom         = "";
			document.getElementsByClassName("bSjs")[0].style.marginTop            = "";
			document.getElementsByClassName("bSjs")[0].style.cursor               = "";
			document.getElementsByClassName("bSjs")[0].classList.add("btnHistorHover");
		}

		document.addEventListener('click', function(event){
	  		let popUpWindowHistory = event.target.closest(".pUWSjs"),
	  			btnHistr           = event.target.closest(".bSjs");
	  		
	  		if(popUpWindowHistory || btnHistr){
	  			return;
	  		}

	  		document.getElementsByClassName("bSjs")[0].style.backgroundColor      = "";
			document.getElementsByClassName("bSjs")[0].style.borderTop            = "";
			document.getElementsByClassName("bSjs")[0].style.borderBottom         = "";
			document.getElementsByClassName("bSjs")[0].style.marginTop            = "";
			document.getElementsByClassName("bSjs")[0].style.cursor               = "";
			document.getElementsByClassName("bSjs")[0].classList.add("btnHistorHover");
	  		document.querySelector('.pUWSjs').classList.add("none");
		});
	}
}

{//	w-user-profile-without-session.js
	//
		function wshowUserProfile(id, username){
			if(localStorage.getItem("session") == "true"){
				//Which page is opened
					localStorage.setItem("whichPageIsOpened", "profile");
				//Update URL address
					history.pushState({'page_id': 2}, '', domain_name + 'profile.php?id' + id);
				//Check which user is opened already in profile
					//Profile data is already loaded
						if(document.getElementsByClassName("user_pagejs")[0].dataset.idOfUserWhichAlreadyIsOpened == id){
							//Data of user profile is already loaded
								//alert('Data is already loaded');
						}
					//Load profile data
						else if(document.getElementsByClassName("user_pagejs")[0].dataset.idOfUserWhichAlreadyIsOpened != id){
							/*Run function which will load data profile using ajax*/lpdua(id, username);
							/*Run button timeline*/rowup_3_1_change_window('iru31bb21ar',id);
						}
				//Update view point of site
					window.scrollTo(0,0);
					/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.remove("bhn1ojs");
					/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.add("btn-home-hover");
					/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.add("btn-home-style-2");
					document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.add("none");
					document.getElementsByClassName("mwupwsnjs")[0].classList.remove("none");
					/*Show profile of user->*/spou(id, username);
			} else if(localStorage.getItem("session") == "false"){
				unauthorized();
			}
		}
	//Show profile of user
		function spou(id, username){
			//Update url
				var profileUrl = domain_name + 'profile.php?id' + id;
		   		history.pushState(null, null, profileUrl);
			//Insert username to profile page
				document.getElementsByClassName("proniusjs")[0].innerHTML = username;
		}
}

{//	show-all.js
	function showAll(id, code){
		/*Rest 70p article->*/document.getElementsByClassName("article_text_" + id)[0].classList.remove("article_text_hidden_js");
		/*Hide : Button(continue_reading)->*/document.getElementsByClassName("wgtrbtnID" + id)[0].classList.add("none");
		/*Show : Button(Show less)->*/document.getElementsByClassName("watShowLessID" + id)[0].classList.remove("none");
		/*Hide : shadow for text->*/document.getElementsByClassName("asft_id_" + id)[0].classList.remove("article_shadow_for_text_js");
		/*Save : view in history->*/save_view_in_history(id);
	}

	function save_view_in_history(id_of_article){
		let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){	
					
				}
			}
			request.open('POST', 'src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/src/saveViewInHistory/saveViewInHistory.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("id_of_article=" + id_of_article);
	}

	function recoverButtonShowAll(id){
		/*Remove : Rest 70p article->*/document.getElementsByClassName("article_text_" + id)[0].classList.add("article_text_hidden_js");
		/*Show : Button(continue_reading)->*/document.getElementsByClassName("wgtrbtnID" + id)[0].classList.remove("none");
		/*Hide : Button(Show less)->*/document.getElementsByClassName("watShowLessID" + id)[0].classList.add("none");
		/*Show : shadow for text->*/document.getElementsByClassName("asft_id_" + id)[0].classList.add("article_shadow_for_text_js");
	}
}

{//	rowWindowPopUp.js
	function rowWindowPopUpFunction(id){
		document.getElementsByClassName("mobile_hpID"+id)[0].classList.remove("none");
		document.getElementsByClassName("rwpuID"+id)[0].classList.toggle("none");
		document.addEventListener('click', function(event){
			let articlePopUp          = event.target.closest(".rWPUjs"),
				articleThreeSmallDots = event.target.closest(".cw4srtmnr" + id);
				uunr1                 = event.target.closest(".uunr1js");
				coar0                 = event.target.closest(".coar0js");
			if(articlePopUp || articleThreeSmallDots || uunr1 || coar0){
				return;
			}
			document.getElementsByClassName("rwpuID"+id)[0].classList.add("none");
			document.getElementsByClassName("mobile_hpID"+id)[0].classList.add("none");
		});
	}
}

{//	user-menu.js
	var avatar          = document.getElementsByClassName("ajs")[0],
		avatarPopUpMenu = document.getElementsByClassName("aPUMjs")[0],
		avatarBgColor   = 1;
	function show_aua_0(){
		//When open
			if(avatarBgColor == 1){
				//START Light theme
					if(localStorage.getItem("appearance") == "light_mode"){
						avatar.classList.add("avatar_activejs");
					}
				//END
				//START Dark theme
					else if(localStorage.getItem("appearance") == "dark_mode"){
						avatar.classList.remove("avatar_activejs");
						avatar.classList.remove("light_mode_style_001");
						avatar.classList.add("dark_appearance_color_nr_2");
					}
				//END
				avatar.style.borderRadius    = "2px";
				avatarPopUpMenu.classList.remove("none");
				avatarBgColor = 0;	
			}
		//When closed
			else if(avatarBgColor == 0){
				//START Light theme
					avatar.classList.remove("avatar_activejs");
				//END
				//START Dark theme
					avatar.classList.remove("dark_appearance_color_nr_2");
				//END
				avatarPopUpMenu.classList.add("none");
		  		document.querySelector('.sWPUjs').classList.add("none");
		  		/*Remove selected focus from button*/document.getElementsByClassName("wPPcjs")[0].classList.remove("uMWPUV");
				avatarBgColor = 1;
			}

		document.addEventListener('click', function(event){
			let userMenu            = event.target.closest(".aPUMjs"),
				avatarImage         = event.target.closest(".ajs"),
				settingsWindowPopUp = event.target.closest(".sWPUjs"),
				changeusernamejs    = event.target.closest(".changeusernamejs"),
				changepaswjs        = event.target.closest(".changepaswjs"),
				changeemailjs       = event.target.closest(".changeemailjs");

			if(userMenu || avatarImage || settingsWindowPopUp || changepaswjs || changeemailjs || changeusernamejs){
				return;
			}

			//Remove color from 3 buttoms
				document.getElementsByClassName("wPPcjs")[0].classList.remove("uMWPUV");
				document.getElementsByClassName("wPPcjs")[1].classList.remove("uMWPUV");
			//Update
			document.querySelector('.aPUMjs').classList.add("none");
			document.querySelector('.sWPUjs').classList.add("none");
			document.getElementsByClassName("se")[0].classList.remove("userMenuWindowPopUpVisited");
			document.getElementsByClassName("he")[0].classList.remove("userMenuWindowPopUpVisited");
			avatar.classList.remove("avatar_activejs");

			//START Remove Dark theme
				avatar.classList.remove("dark_appearance_color_nr_2");
			//END

			avatarBgColor = 1;
		});
	}

	function logOut(){
		let logOut = new XMLHttpRequest();
		logOut.onreadystatechange = function(){
			if(logOut.status == 200 && logOut.readyState == 4){
				localStorage.setItem("session", "false");
				location.href = "index.php";
			}
		}
		logOut.open("POST", "src/path/dt/ss/index/nav/nav-user_menu-log_out/log-out.php");
		logOut.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		logOut.send("logOut=" + "1");
	}
}

{//	btn-btnTrend.js
	function showPopUpInrerfaceTrend(){
		document.getElementsByClassName("popUpWindowTrend")[0].classList.toggle("none");
		document.getElementsByClassName("btnTrend")[0].style.backgroundColor = "#F5F6F7";
		document.getElementsByClassName("btnTrend")[0].style.borderTop       = "1px solid #DDDFE2";
		document.getElementsByClassName("btnTrend")[0].style.borderBottom    = "1px solid #DDDFE2";
		document.getElementsByClassName("btnTrend")[0].style.marginTop       = "-1px";
		document.getElementsByClassName("btnTrend")[0].style.cursor          = "pointer";
		document.getElementsByClassName("btnTrend")[0].classList.remove("btnHistorHover");
		document.getElementsByClassName("sjs")[0].style.opacity = "1";
		switch(document.getElementsByClassName("popUpWindowTrend")[0].classList.contains("none")){
			case true:
			document.getElementsByClassName("btnTrend")[0].style.backgroundColor      = "";
			document.getElementsByClassName("btnTrend")[0].style.borderTop            = "";
			document.getElementsByClassName("btnTrend")[0].style.borderBottom         = "";
			document.getElementsByClassName("btnTrend")[0].style.marginTop            = "";
			document.getElementsByClassName("btnTrend")[0].style.cursor               = "";
			document.getElementsByClassName("btnTrend")[0].classList.add("btnHistorHover");
		}

		document.addEventListener('click', function(event){
		let popUpWindowHistory = event.target.closest(".popUpWindowTrend"),
			btnHistr           = event.target.closest(".btnTrend");

			if(popUpWindowHistory || btnHistr){
				return;
			}

			document.getElementsByClassName("btnTrend")[0].style.backgroundColor      = "";
			document.getElementsByClassName("btnTrend")[0].style.borderTop            = "";
			document.getElementsByClassName("btnTrend")[0].style.borderBottom         = "";
			document.getElementsByClassName("btnTrend")[0].style.marginTop            = "";
			document.getElementsByClassName("btnTrend")[0].style.cursor               = "";
			document.getElementsByClassName("btnTrend")[0].classList.add("btnHistorHover");
	  		document.querySelector('.popUpWindowTrend').classList.add("none");
		});
	}
}

{//	publish-the-article.js
	//Check data before will be sended
		/*START Appearance*/
			//Session true
				if(localStorage.getItem("session") == "true"){
					//Light Mode
						if(localStorage.getItem("appearance") == "light_mode"){
							ap_ptacdbwbssastlm_light_mode();
						}
					//Dark Mode
						else if(localStorage.getItem("appearance") == "dark_mode"){
							ap_ptacdbwbssastlm_dark_mode();
						}
					//Appearance : functions
						function ap_ptacdbwbssastlm_light_mode(){
							/*Add light mode*/document.getElementsByClassName("btn_appearance_publish_article_js")[0].classList.add("ptaa");
							/*Remove Dark mode*/document.getElementsByClassName("btn_appearance_publish_article_js")[0].classList.remove("ptaa_dark_mode");
						}
						function ap_ptacdbwbssastlm_dark_mode(){
							/*Remove light mode*/document.getElementsByClassName("btn_appearance_publish_article_js")[0].classList.remove("ptaa");
							/*Add Dark mode*/document.getElementsByClassName("btn_appearance_publish_article_js")[0].classList.add("ptaa_dark_mode");
						}
				}
		/*END*/
		function publishTheArticle(){
			//Defined var from add new article
				let title         = document.getElementsByClassName("aitc")[0].value,
					text          = encodeURIComponent(document.getElementsByClassName("sun-editor-id-wysiwyg")[0].contentWindow.document.body.innerHTML),
					category      = localStorage.getItem("button_publish_new_article_category_list");
					notifications = document.getElementsByClassName("asscbjs")[0].checked;
			//Check if title is empty
				if(title == ""){
					//ERROR NR.1
						document.getElementsByClassName("aitc")[0].classList.add("redisbs");
						document.getElementsByClassName("titleErrorjs")[0].classList.remove("none");
						document.getElementsByClassName("titleErrorjs")[0].innerHTML = field_is_required;
				}
			//Check if title is NOT empty
				else if(title != ""){
					//Check if text editor is empty
						if(text.trim().length == 25 || text.trim().length == 26){
							//ERROR NR.2
								document.getElementsByClassName("error_textjs")[0].classList.remove("none");
								document.getElementsByClassName("error_textjs")[0].innerHTML = field_is_required;
								document.getElementsByClassName("sun-editor")[0].classList.add("redisbs");
								document.getElementsByClassName("sun-editor-id-editorArea")[0].classList.add("redisbsh");
								document.getElementsByClassName("sun-editor-id-editorArea")[0].classList.add("redisbsto");
								document.getElementsByClassName("sun-editor-id-editorArea")[0].classList.add("redisbsbo");
						}
					//Check if text editor is NOT empty
						else if(text.trim().length > 25 || text.trim().length > 26){
							//Check if text is NOT enough
								if(text.trim().length < 600){
									//ERROR NR.3
										document.getElementsByClassName("error_textjs")[0].classList.remove("none");
										document.getElementsByClassName("error_textjs")[0].innerHTML = "Too little text";
										document.getElementsByClassName("sun-editor")[0].classList.add("redisbs");
										document.getElementsByClassName("sun-editor-id-editorArea")[0].classList.add("redisbsh");
										document.getElementsByClassName("sun-editor-id-editorArea")[0].classList.add("redisbsto");
										document.getElementsByClassName("sun-editor-id-editorArea")[0].classList.add("redisbsbo");
								}
							//Check if text is enough
								else if(text.trim().length > 600){
									//Check if category is NOT selected
										if(document.getElementsByClassName("ascb0js")[0].dataset.selected == "0"){
											//ERROR NR.4
												document.getElementsByClassName("categoryErrorjs")[0].classList.remove("none");
												document.getElementsByClassName("categoryErrorjs")[0].innerHTML = "Category is not selected";
										}
									//Check if category is selected
										else if(document.getElementsByClassName("ascb0js")[0].dataset.selected == "1"){
											//Check if category froom list is empty
												if(category == ""){
													//ERROR NR.5
														document.getElementsByClassName("categoryErrorjs")[0].classList.remove("none");
														document.getElementsByClassName("categoryErrorjs")[0].innerHTML = "Category is not selected";
												}
											//Check if category froom list is NOT empty
												else if(category != ""){
													//Check if notifications is allowed
														if(notifications == true){
															/*Send article to server->*/ sats(title, text, category, '1');
														}
													//Check if notifications is NOT allowed
														else if(notifications == false){
															/*Send article to server->*/ sats(title, text, category, '0');
														}
												}
										}
								}
						}
				}
		}
	//Remove title error
		function removeTitleError(){
			document.getElementsByClassName("aitc")[0].classList.remove("redisbs");
			document.getElementsByClassName("titleErrorjs")[0].classList.add("none");
		}
	//Send article to server
		function sats(title, text, category, notifications){	
			/*
				AJAX SEND
					article_title
					article_text
					article_category
					article_notifications
			*/
			//AJAX
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.status == 200 && request.readyState == 4){
						//Defined var
							let response     = request.responseText,
								responseJSON = JSON.parse(response);
						//1 : Title is empty
							if(response == "1"){
								alert("Title is empty");
							}
						//2 : Editor is empty
							else if(response == "2"){
								alert("Editor is empty");
							}
						//3 : ERROR NR.3
							else if(response == "3"){
								alert("ERROR NR.3");
							}
						//4 : ERROR NR.4
							else if(response == "4"){
								alert("ERROR NR.4");
							}
						//5 : ERROR NR.5
							else if(response == "5"){
								alert("ERROR NR.5");
							}
						//6 : ERROR NR.6
							else if(response == "6"){
								alert("ERROR NR.6");
							}
						//7 : ERROR NR.7
							else if(response == "7"){
								alert("ERROR NR.7");
							}
						//8 : ERROR NR.8
							else if(response == "8"){
								alert("ERROR NR.8");
							}
						//9 : Redirect author to yourself new added article
							else if(responseJSON.status == "9"){
								window.location.replace("article.php?id=" + responseJSON.id);
							}
					}
				}
				request.open("POST", "../src/path/dt/ss/index/nav/nav-add_article/publish-now/publish-the-article.php");
				request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				request.send("article_title=" + title + "&" + "article_text=" + text + "&" + "article_category=" + category + "&" + "article_notifications=" + notifications);
		}
}

{//	site-feed/jump2.js
	function goToFeed(){
		//START : enabled_version : mobile
			if(localStorage.getItem("enabled_version") == "mobile"){
				/*show : advertising->*/document.getElementsByClassName("mobile_baner")[0].classList.remove("none");
				/*show : filter->*/document.getElementsByClassName("wfs")[0].classList.remove("none");
			}
		//END
		/*Enable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi");
		//Which page is opened
			localStorage.setItem("whichPageIsOpened", "feed");
		history.pushState({'page_id': 1}, '', domain_name + 'feed.php');
		window.scrollTo(0,0);
		document.getElementById("mstjs").innerHTML = "Think: All new articles";

		if(localStorage.getItem("session") == "true"){
			document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
			document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
		}

		/*show filter*/document.getElementsByClassName("rffanr1js")[0].classList.remove("none");
		/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.add("bhn1ojs");
		/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.remove("btn-home-hover");
		/*this remove*/document.getElementsByClassName("bhn1o")[0].classList.remove("btn-home-style-2");

		/*show sidebar window*/document.getElementsByClassName("sijs")[0].classList.remove("none");
		if(localStorage.getItem("session") == "true"){
			/*hide add-articles window*/document.getElementsByClassName("a0tajs")[0].classList.add("none");
		}
		/*Hide search null window*/document.getElementsByClassName("srnw0js")[0].classList.add("none");
		/*show feed articles*/document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.remove("none");
		//START hide extended version
			/*Hide extended*/document.getElementsByClassName("feed-wrapp-articles-0-item-001")[0].classList.add("none");
			//Hide : Sidebar->Button(Home)
				var home_sb_button_id_js = document.getElementsByClassName("home_sb_button_id_js")[0];
				home_sb_button_id_js.classList.add("bhn1ojs");
				home_sb_button_id_js.classList.add("bhs1");
				home_sb_button_id_js.classList.remove("btn-home-hover");
				home_sb_button_id_js.classList.remove("btn-home-style-2");
		//END
		/*Hide "Hide article for extended->"*/document.getElementsByClassName("tosrIDextended")[0].classList.add("none");
		//START
			/*Clear : input-search->*/document.getElementById("input-search").value = "";
			/*Upload : articles->*/filter_nr_2_ajax_load();
		//END
	}

	function goToFeedCategory(nr, category){
		history.pushState({'page_id': nr}, '', domain_name + category);
		window.scrollTo(0,0);

		document.getElementsByClassName("sijs")[0].classList.remove("none");

		if(localStorage.getItem("session") == "true"){
			document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
			document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
			document.getElementsByClassName("a0tajs")[0].classList.add("none");
		}
	}

	function goToArticle(nrAtArticle){
		var urlAtArticle = domain_name + "article.php?=" + nrAtArticle;
		history.pushState({'page_id': 4}, '', urlAtArticle);
		window.scrollTo(0,0);

		document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.add("none");
		document.getElementsByClassName("thnkArticleWrapp")[0].classList.remove("none");
		document.getElementsByClassName("sijs")[0].classList.remove("none");

		if(localStorage.getItem("session") == "true"){
			document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
			document.getElementsByClassName("a0tajs")[0].classList.add("none");
		}
	}

	function addTheArticle(){
		if(localStorage.getItem("session") == "true"){
			history.pushState({'page_id': 3}, '', domain_name + 'add.php');
			window.scrollTo(0,0);
			document.getElementById("mstjs").innerHTML = "Think: Add article";

			document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.add("none");
			document.getElementsByClassName("sijs")[0].classList.add("none");

		
			document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
			document.getElementsByClassName("a0tajs")[0].classList.remove("none");
			document.getElementsByClassName("a0tajs")[0].classList.remove("hidden");
		} else if(localStorage.getItem("session") == "false"){
			unauthorized();
		}
		unauthorized();
	}

	window.onpopstate = function(){
		if(window.location.href == domain_name + "feed.php" || window.location.href == domain_name + "index.php" || window.location.href == domain_name){
			goToFeed2();
		} else if(window.location.href == domain_name + "profile.php"){
			goToProfile2();
		} else if(window.location.href == domain_name + "add.php"){
			addTheArticle2();
		} 
		//extended article (article.php) is opened
			else if(window.location.href.substr(0, 37) == domain_name + "article.php?id="){
				extended_article_is_opened();
				//Hide : Sidebar->Button(Home)
					hide_sidebar_button_home();
			} 
		//Nothing not found
			else if(window.location.href.substr(0, 33) == domain_name + "article.php"){
				//console.log("Nothing not found");
				//Session : true
					if(localStorage.getItem("session") == "true"){
						/*Hide : Add article (Page)->*/document.getElementsByClassName("a0tajs")[0].classList.add("none");
						/*Show : "ARTICLES"->*/document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
						/*Hide : "User-profile"->*/document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
					}
				/*Show : Sidebar-left (Menu)->*/document.getElementsByClassName("sijs")[0].classList.remove("none");
				/*Show : "Not found page"->*/document.getElementsByClassName("srnw0js")[0].classList.remove("none");
				/*Hide : "Hide filter"->*/document.getElementsByClassName("rffanr1js")[0].classList.add("none");
				/*Hide : "Articles"->*/document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.add("none");
			}
	}

	//article.php is opened. EXTENDED ARTICLE IS OPENED
		function extended_article_is_opened(){
			//Session : true
				if(localStorage.getItem("session") == "true"){
					/*Show "ARTICLES"->*/document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
					/*Hide "MY PROFILE"->*/document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
					/*Hide : Add article->*/document.getElementsByClassName("a0tajs")[0].classList.add("none");
				}
			//Hide article WITHOUT extended mode
				/*Hide*/document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.add("none");
			//Show article WITH extended mode
				/*Show->*/document.getElementsByClassName("feed-wrapp-articles-0-item-001")[0].classList.remove("none");
				/*Show extended->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].classList.remove("none");
			//Hide : Filter (New/The best, Day/Week/Month/Year/All time, More filters)
				/*Hide*/document.getElementsByClassName("rffanr1js")[0].classList.add("none");
			/*SHOW Sidebar-left->*/document.getElementsByClassName("sijs")[0].classList.remove("none");
			/*Hide : Search null->*/document.getElementsByClassName("srnw0js")[0].classList.add("none");
		}

	function goToFeedCategory2(){
		document.getElementsByClassName("sijs")[0].classList.remove("none");

		if(localStorage.getItem("session") == "true"){
			document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
			document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
			document.getElementsByClassName("a0tajs")[0].classList.add("none");
		}
	}

	function addTheArticle2(){
		document.getElementById("mstjs").innerHTML = "Think: Add article";
		document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.add("none");
		document.getElementsByClassName("sijs")[0].classList.add("none");

		if(localStorage.getItem("session") == "true"){
			document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
			document.getElementsByClassName("a0tajs")[0].classList.remove("none");
		}
	}

	function goToProfile2(){
		if(localStorage.getItem("session") == "true"){
			document.getElementsByClassName("a0tajs")[0].classList.add("none");
		}
		document.getElementsByClassName("sijs")[0].classList.remove("none");
		document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.add("none");
		document.getElementsByClassName("mwupwsnjs")[0].classList.remove("none");
	}

	function goToFeed2(){
		document.getElementsByClassName("sijs")[0].classList.remove("none");
		/*Hide : Search null->*/document.getElementsByClassName("srnw0js")[0].classList.add("none");
		//START hide extended article
			//Show article WITHOUT extended mode
				/*show*/document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.remove("none");
			//Hide article WITH extended mode
				/*Hide->*/document.getElementsByClassName("feed-wrapp-articles-0-item-001")[0].classList.add("none");
				/*Hide extended->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].classList.add("none");
				//Show : Filter (New/The best, Day/Week/Month/Year/All time, More filters)
					/*Show*/document.getElementsByClassName("rffanr1js")[0].classList.remove("none");
		//END
		if(localStorage.getItem("session") == "true"){
			document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
			document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
			document.getElementsByClassName("a0tajs")[0].classList.add("none");
		}
		//Show : Sidebar->Button(Home)
			show_sidebar_button_home();
	}
}

{
	//User menu. For youself
		function goToProfile(id, username){
			//Which page is opened
				localStorage.setItem("whichPageIsOpened", "profile");
			//Update URL address
				history.pushState({'page_id': 2}, '', domain_name + 'profile.php?id' + id);
			//Check which user is opened already in profile
				//Profile data is already loaded
					if(document.getElementsByClassName("user_pagejs")[0].dataset.idOfUserWhichAlreadyIsOpened == id){
						//Data of user profile is already loaded
							//alert('Data is already loaded');
					}
				//Load profile data
					else if(document.getElementsByClassName("user_pagejs")[0].dataset.idOfUserWhichAlreadyIsOpened != id){
						/*Run function which will load data profile using ajax*/lpdua(id, username);
						/*Run button timeline*/rowup_3_1_change_window('iru31bb21ar',id); 
					}
			//Update view point of site
				window.scrollTo(0,0);
				document.getElementById("mstjs").innerHTML = "Think: User profile";
				/*this remove active btn home*/document.getElementsByClassName("bhn1o")[0].classList.remove("bhn1ojs");
				/*this remove active btn home*/document.getElementsByClassName("bhn1o")[0].classList.add("btn-home-hover");
				/*this remove active btn home*/document.getElementsByClassName("bhn1o")[0].classList.add("btn-home-style-2");
				document.getElementsByClassName("sijs")[0].classList.remove("none");
				//document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.add("none");
				document.getElementsByClassName("mwupwsnjs")[0].classList.remove("none");
				if(localStorage.getItem("session") == "true"){
					document.getElementsByClassName("a0tajs")[0].classList.add("none");
					/*Hide "Articles"->*/document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.add("none");
				}
			//Close user-menu
				show_aua_0();
		}

	//Load my profile data using ajax
		function lpdua(id, username){
			//1. UPDATE data-id-of-user-which-already-is-opened
				document.getElementsByClassName("user_pagejs")[0].dataset.idOfUserWhichAlreadyIsOpened = id;
			//2. UPDATE username
				document.getElementsByClassName("proniusjs")[0].innerHTML = username;
			//3. UPDATE avatar-not-found
				document.getElementsByClassName("avatar_not_found_js")[0].innerHTML = username.substring(0, 1);
		}
}

{//	login.js
	function login(){
		var col_a_2_2_input = document.getElementsByClassName("col_a_2_2_input")[0].value;
		var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				if(request.responseText == "1"){
					window.location.replace("admin.php");
				}
			}
		}
		request.open('POST', 'src/path/dt/ss/index/nav/nav-sign_in/login_2.php');
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		request.send("col_a_2_2_input=" + col_a_2_2_input);
	}
}

{//	site-index/search.js
	function handleKeyPressSearch(event) {
	    if (event.keyCode === 13) { // Проверяем код клавиши, если это Enter (код 13)
	        event.preventDefault(); // Предотвращаем стандартное действие Enter в поле ввода
	        search(); // Вызываем функцию поиска
	    }
	}
	//Index site
	function search(){
		//START
			history.pushState({'page_id': 1}, '', domain_name + 'feed.php');
			window.scrollTo(0,0);
			document.getElementById("mstjs").innerHTML = "Think: Search";
			/*hide home-btn remove*/document.getElementsByClassName("bhn1o")[0].classList.remove("bhn1ojs");
			/*hide home-btn remove*/document.getElementsByClassName("bhn1o")[0].classList.add("btn-home-hover");
			/*hide home-btn remove*/document.getElementsByClassName("bhn1o")[0].classList.add("btn-home-style-2");
			if(localStorage.getItem("session") == "true"){
				/*hide Add article->*/document.getElementsByClassName("a0tajs")[0].classList.add("none");
				/*hide user window*/document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
				/*show article window*/document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
			}
			/*show sidebar window*/document.getElementsByClassName("sijs")[0].classList.remove("none");
		//END
		//START : Search(Button : click)
			var search = document.getElementById("input-search").value;
			if(search !== ""){
				/*Run->*/filter_nr_2_ajax_load();
			} else {
				searchNULL();
			}
		//END

		function searchNULL(){
			window.scrollTo(0,0);
			document.getElementsByClassName("srnw0js")[0].classList.remove("none");
			document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.add("none");

			/*hide home-btn remove*/document.getElementsByClassName("bhn1o")[0].classList.remove("bhn1ojs");
			/*hide home-btn remove*/document.getElementsByClassName("bhn1o")[0].classList.add("btn-home-hover");
			/*hide home-btn remove*/document.getElementsByClassName("bhn1o")[0].classList.add("btn-home-style-2");

			if(localStorage.getItem("session") == "true"){
				/*hide user profile page*/document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
				/*hide add-article window*/document.getElementsByClassName("a0tajs")[0].classList.add("hidden");
				/*show article window*/document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
			}

			/*show sidebar window*/document.getElementsByClassName("sijs")[0].classList.remove("none");
		}
		/*START Hide extended article*/
			/*hide extended article->*/document.getElementsByClassName("feed-wrapp-articles-0-item-001")[0].classList.add("none");
		/*END*/
	}

	function searchL(){
		let search 								 = document.getElementById("input-search").value,
			filter__menu                         = localStorage.getItem("filter__menu"),
			filter__new_the_best                 = localStorage.getItem("filter__new_the_best"),
			filter__day_week_month_year_all_time = localStorage.getItem("filter__day_week_month_year_all_time");
		if(search !== ""){
			let	request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.status == 200 && request.readyState == 4){
					document.getElementById("listjs").innerHTML = request.responseText;
					if(document.getElementById("listjs").innerHTML == ""){
						document.getElementById("cSLjs").classList.add("none");
					} else {
						document.getElementById("cSLjs").classList.remove("none");
					}
				}
			}
			request.open("POST", "../src/path/dt/ss/index/nav/nav-search/search_onkeyup_input-text.php");
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.send("search=" + search + "&" + "filter__menu=" + filter__menu + "&" + "filter__new_the_best=" + filter__new_the_best + "&" + "filter__day_week_month_year_all_time=" + filter__day_week_month_year_all_time);
		} else {
			document.getElementById("cSLjs").classList.add("none");			
		}
	}
}

{//	aNa_2.js
	function aNa_2(){
		history.pushState({'page_id': 3}, '', domain_name + 'add.php');
		window.scrollTo(0,0);
		document.getElementById("mstjs").innerHTML = "Think: Add article";
		document.getElementsByClassName("a0tajs")[0].classList.remove("none");
		document.getElementsByClassName("a0tajs")[0].classList.remove("hidden");
		document.getElementsByClassName("sijs")[0].classList.add("none");
		document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.add("none");

		if(localStorage.getItem("session") == "true"){
			document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
		}
		/*Show : Add article->*/document.getElementsByClassName("a0tajs")[0].classList.remove("hidden");
		document.getElementsByClassName("sun-editor")[0].style.width                = "780px";
		document.getElementsByClassName("sun-editor-id-editorArea")[0].style.height = "498px";
	}
}

{
	window.onload = ()=>{
		setTimeout(()=>{document.getElementsByClassName("lojs")[0].classList.add("none");},240);
	}
}

{
	function uMWPU(nr){
		document.getElementsByClassName("wPPcjs")[0].classList.toggle("uMWPUV");
		document.getElementsByClassName("wPPidjs")[0].classList.toggle("none");
		
	}
}

{
	window.addEventListener("online", ()=>{ofc('onl');});
	window.addEventListener("offline", ()=>{ofc('off');});

	function ofc(net){
		if(net == 'off'){
			document.getElementsByClassName("ofjs")[0].classList.remove("none");
		} else if(net == 'onl'){
			document.getElementsByClassName("ofjs")[0].classList.add("none");
		}
	}
}

{//	unauthorized.js
	function unauthorized(){
		if(localStorage.getItem("session") == "false"){
			document.getElementsByClassName("uunr1js")[0].dataset.status     = "open";
			document.getElementsByClassName("overflowjs")[0].style.overflowY = "hidden";
			document.getElementsByClassName("uunr1js")[0].style.display      = "";
		}
	}

	function cuunr1(){
		document.getElementsByClassName("overflowjs")[0].style.overflowY = "scroll";
		document.getElementsByClassName("uunr1js")[0].style.display      = "none";
	}

	document.addEventListener('click', function(event){
		if(localStorage.getItem("session") == "false"){
			let ranawjs  = event.target.closest(".ranawjs"),
				cwcpi3js = event.target.closest(".cwcpi3js"),
				wGTRjs   = event.target.closest(".wGTRjs"),
				uunr2js  = event.target.closest(".uunr2js"),
				buufjs   = event.target.closest(".buufjs"),
				tfccb1   = event.target.closest(".tfccb1"),
				wwctit4  = event.target.closest(".wwctit4"),
				cwcpi3   = event.target.closest(".cwcpi3"),
				ccrsb12  = event.target.closest(".ccrsb12"),
				wsupjs   = event.target.closest(".wsupjs"),
				rwbajs   = event.target.closest(".rwbajs"),
				rwrnjs   = event.target.closest(".rwrnjs"),
				ccr4     = event.target.closest(".ccr4"),
				wangjs   = event.target.closest(".wangjs"),
				sapwjs   = event.target.closest(".sapwjs"),
				chat_lnc = event.target.closest(".chat_left_nickname_css"),
				m12si    = event.target.closest(".m12si"),
				bhmana   = event.target.closest(".bh_mobile_add_new_article"),
				id_aarjs = event.target.closest(".id_add_article_js");

			if(uunr2js || wGTRjs || ranawjs || cwcpi3js || buufjs || tfccb1 || 
				cwcpi3 || ccrsb12 || wsupjs || rwbajs || rwrnjs 
				|| ccr4 || sapwjs || wangjs || id_aarjs || wwctit4 || chat_lnc || m12si || bhmana){
				return;
			}

			cuunr1();
		}
	});
}

{
	document.addEventListener('click', function(event){
		let input_search = event.target.closest("#input-search"),
			cSList       = event.target.closest("#cSLjs");
		if(input_search || cSList){
			return;
		}
		document.getElementById("cSLjs").classList.add("none");
	});
}

{//	likes.php
	if(localStorage.getItem("session") == "true"){
		document.getElementsByClassName("puwsulikjs")[0].classList.add("none");
		document.getElementsByClassName("puwsulikaujs")[0].classList.remove("none");
	}
}

{//	src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/article.php
	function setLS(id){
		if(localStorage.getItem("session") == "true"){
			setLikeStatus(id);
		} else if(localStorage.getItem("session") == "false"){
			unauthorized();
		}
	}

	function setLikeStatus(id){
		handleLikeF(id);
		let request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){	
				if(request.responseText == "ERTmliaiot"){
					//Error ERTmliaiot: Too much like in an interval of time
						ERMESSAGE("Too often you put likes for the time interval");
					//Abort setting because violate rule
						handleLikeF(id);
				}
			}
		}
		request.open('POST', 'src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/src/setLikeStatus/setLikeStatus-Ajax-1.php');
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		request.send("id=" + String(id).slice(0, -3));
	}

	//Set like
	function handleLikeF(id){
		if(document.getElementsByClassName("hdsjsID"+id)[0].dataset.status == 0){
			//Replace icon like with liked
				document.getElementsByClassName("hlikeStatusjsID"+id)[0].innerHTML      = "<div class='cwcpi31 bgsz16 w16 h16 hdsjsID"+id+"' data-status='1'><!--liked-1--></div>";
			//Increment with one
				document.getElementsByClassName("counthlikeStatusjsID"+id)[0].innerHTML = Number(document.getElementsByClassName("counthlikeStatusjsID"+id)[0].innerHTML)+1;
		} else if(document.getElementsByClassName("hdsjsID"+id)[0].dataset.status == 1){
			//Replace icon like with not liked
				document.getElementsByClassName("hlikeStatusjsID"+id)[0].innerHTML      = "<div class='cwcpi3 bgsz16 w16 h16 hdsjsID"+id+"' data-status='0'><!--liked-0--></div>";
			//decrement with one
				document.getElementsByClassName("counthlikeStatusjsID"+id)[0].innerHTML = Number(document.getElementsByClassName("counthlikeStatusjsID"+id)[0].innerHTML)-1;
		}
	}
}

{//	Choose a date
	function daceljsELC(){
		//Onchage event listener in selected input
			sdfi();
	}
	/*START update appearance when loaded*/
		//Light Mode
			if(localStorage.getItem("appearance") == "light_mode"){
				ap_suawllmcad_light_mode();
			}
		//Dark Mode
			else if(localStorage.getItem("appearance") == "dark_mode"){
				ap_suawllmcad_dark_mode();
			}
		//Appearance : functions
			function ap_suawllmcad_light_mode(){
				/*Add Light Mode*/  document.getElementsByClassName("daceljs")[1].classList.add("checkedBluejs");
				/*Remove Dark Mode*/document.getElementsByClassName("daceljs")[1].classList.remove("checked_dark_mode_js");
			}
			function ap_suawllmcad_dark_mode(){
				/*Remove Light Mode*/document.getElementsByClassName("daceljs")[1].classList.remove("checkedBluejs");
				/*Add Dark Mode*/    document.getElementsByClassName("daceljs")[1].classList.add("checked_dark_mode_js");
			}
	/*END*/
	function sifcad(id){
		//Who is checked
			(()=>{
				//Hide all checkedBluejs after onclick
					for(let it = 0; it <= 1; it++){
						document.getElementsByClassName("daceljs")[it].classList.remove("checkedBluejs");
						document.getElementsByClassName("daceljs")[it].classList.remove("checked_dark_mode_js");
					}
				//Show checkedBluejs/checked_dark_mode_js on one input knowing id for class
					//Light Mode
						if(localStorage.getItem("appearance") == "light_mode"){
							document.getElementsByClassName("daceljs")[id].classList.add("checkedBluejs");
						} else if(localStorage.getItem("appearance") == "dark_mode"){
							document.getElementsByClassName("daceljs")[id].classList.add("checked_dark_mode_js");
						}
					sdfi();
			})();
	}
	function whoIsChecked(){
		//Which input is checked
			if(document.getElementsByClassName("daceljs")[0].classList.contains("checkedBluejs") || document.getElementsByClassName("daceljs")[0].classList.contains("checked_dark_mode_js")){
				return 0;
			} else if(document.getElementsByClassName("daceljs")[1].classList.contains("checkedBluejs") || document.getElementsByClassName("daceljs")[1].classList.contains("checked_dark_mode_js")){
				return 1;
			}
	}
	//Get value from checked
		function gvfc(){
			return document.getElementsByClassName("daceljs")[whoIsChecked()].value;
		}
	//Show calendar dates
		function sdfi(){
			const datei = gvfc(); //Date from input-1. FROM
			const calda = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];//Count of dates of months of calendar
			const ca10e = [6, 0, 1, 2, 3, 4, 5];                           //Data for space before 1 day. Function isbd
			const datym = datei.substr(0, 7);                              //Get Year and Month
			caldn(Number(datym.substr(5, 7))-1, datym.substr(0, 4));

			function gcnd(){
				//Get day knowing month and year. Date only 1
					var gcnd = new Date(datym);
					return gcnd.getDay();
			}

			(function isbd(){
				//Insert space before 1 day
					//Hide all 7 ca10js 
						for(let el = 0; el <= 6; el++){document.getElementsByClassName("ca10js")[el].classList.add("none");}
					for(let el = 1; el <= ca10e[gcnd()]; el++){
						document.getElementsByClassName("ca10js")[el].classList.remove("none");
					}
				//Hide all 35 ca9js
					for(let el = 0; el < 35; el++){document.getElementsByClassName("ca9js")[el].classList.add("none");}
				//Insert days after space
					for(let el = 0; el < calda[Number(datei.substr(5, 2))-1]; el++){
						document.getElementsByClassName("ca9js")[el].classList.remove("none");
						document.getElementsByClassName("ca9js")[el].innerHTML = el+1;
					}
				fwcd(Number(datei.substr(8, 2))-1);//Show blue focus on date which is in input
			})();
		}
	sdfi();
	//Blue focus throught
		/*START When Site are loaded. Button : Apply*/
			//Light Mode
				if(localStorage.getItem("appearance") == "light_mode"){
					ap_bftswsalba_light_mode();
				}
			//Dark Mode
				else if(localStorage.getItem("appearance") == "dark_mode"){
					ap_bftswsalba_dark_mode();
				}
			//Appearance : functions
				function ap_bftswsalba_light_mode(){
					/*Add Light Mode*/  document.getElementsByClassName("btn_filter_id_apply_js")[0].classList.add("cadn101");
					/*Remove Dark Mode*/document.getElementsByClassName("btn_filter_id_apply_js")[0].classList.remove("cadn101_dark_mode");
				}
				function ap_bftswsalba_dark_mode(){
					/*Remove Light Mode*/document.getElementsByClassName("btn_filter_id_apply_js")[0].classList.remove("cadn101");
					/*Add Dark Mode*/    document.getElementsByClassName("btn_filter_id_apply_js")[0].classList.add("cadn101_dark_mode");
				}
		/*END*/
		function fwcd(day){
			//Remove style for all buttons/dates
				for(let it = 0; it <= 34; it++){
					document.getElementsByClassName("ca9js")[it].style.background = "white";
					document.getElementsByClassName("ca9js")[it].style.color      = "#696A6C";
					document.getElementsByClassName("ca9js")[it].classList.add("ca9hjs");
				}
			//Set style for one button/date
				//Light Mode
					if(localStorage.getItem("appearance") == "light_mode"){
						document.getElementsByClassName("ca9js")[day].style.background = "royalblue";
					}
				//Dark Mode
					else if(localStorage.getItem("appearance") == "dark_mode"){
						document.getElementsByClassName("ca9js")[day].style.background = "#4B4F56";
					}
				//UPDATE
					document.getElementsByClassName("ca9js")[day].style.color      = "white";
					document.getElementsByClassName("ca9js")[day].classList.remove("ca9hjs");
			//Update date from selected input
				(()=>{
					let itm   = document.getElementsByClassName("daceljs")[whoIsChecked()].value,
						year  = itm.substr(0, 4),
						month = itm.substr(5, 2),
						dayp  = day + 1;
					if(dayp <= 9 && dayp > 0){dayp = "0" + dayp}
					document.getElementsByClassName("daceljs")[whoIsChecked()].value = year + "-" + month + "-" + dayp;
				})();
		}
	//Show date from array which stay in script in index/feed file
		function caldn(month, year){
			document.getElementsByClassName("cadn72a")[0].innerHTML = caldd[month] + '\xa0' + year;
		}
	//Calendar switch back or next
		function swcalda(nr){
			//Blue select on input. Right input is selected by default
				let dateL = document.getElementsByClassName("daceljs")[whoIsChecked()].value,
					year  = Number(dateL.substr(0, 4)),
					month = Number(dateL.substr(5, 2)),
					day   = dateL.substr(8, 2);

			if(nr == 0){
				//Back
					month -=1;
					if(month == 0){month = 12;year = year -1;} else if(month > 0 && month <= 9){month = "0" + month;}
					document.getElementsByClassName("daceljs")[whoIsChecked()].value = year + "-" + month + "-" + day;
					sdfi();
			} else if(nr == 1){
				//Next
					month = Number(month)+1;
					if(month == 13){month = "01";year = year +1;} else if(month > 0 && month <= 9){month = "0" + month;}
					document.getElementsByClassName("daceljs")[whoIsChecked()].value = year + "-" + month + "-" + day;
					sdfi();
			}
		}
	//Send selected dates to server. CALENDAR
		function ssdts(){
			let from    			 = document.getElementsByClassName("daceljs")[0].value,
				upto    			 = document.getElementsByClassName("daceljs")[1].value,
				filter__menu         = localStorage.getItem("filter__menu"),
				filter__new_the_best = localStorage.getItem("filter__new_the_best"),
				request 			 = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					//Show loading
					//Upload articles
						document.getElementsByClassName("feed-wrapp-articles-0")[0].innerHTML = request.responseText;
					//Show articles
						document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.remove("none");
					//Hide : articles not found
						document.getElementsByClassName("srnw0js")[0].classList.add("none");
					//Close : Calendar
						cadclose();
					//Deactivate button : more_filters
						otherFiltersBtnF();
					//Deactivation of buttons day/week/month/year
						for(let nob = 3; nob <= 7; nob++){
							document.getElementsByClassName("id_btn_filter_by_nr_" + nob + "_from_8_js")[0].dataset.status = 0;
						}
						for(let nrOfbtns = 3; nrOfbtns <= 7; nrOfbtns++){
							//Light_Mode
								if(localStorage.getItem("appearance") == "light_mode"){
									/*Hide background*/document.getElementsByClassName("id_btn_filter_by_nr_" + nrOfbtns + "_from_8_js")[0].classList.remove("btn3_light_mode_js");
								}
							//Dark_Mode
								else if(localStorage.getItem("appearance") == "dark_mode"){
									/*Hide background*/document.getElementsByClassName("id_btn_filter_by_nr_" + nrOfbtns + "_from_8_js")[0].classList.remove("btn3_dark_mode_js");
								}
						}
				}
			}
			request.open("POST", "src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/home.php");
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send('filter__menu=' + filter__menu + "&" + "filter__new_the_best=" + filter__new_the_best + "&" + "from=" + from + "&" + "upto=" + upto);
		}
}

{//	Menu from nav
	//Focus for checked button
		function fFCB(id){
			//Remove focus for all buttons
				for(let it = 0; it <= 36; it++){
					/*Light_mode*/document.getElementsByClassName("ffcbjs")[it].classList.remove("royalbluejs");
					/*Dark_mode*/document.getElementsByClassName("ffcbjs")[it].classList.remove("dark_appearance_color_menu");
					document.getElementsByClassName("ffcbjs")[it].classList.remove("cwjs");
					document.getElementsByClassName("ffcbjs")[it].classList.add("ccbwnr5hjs");
					document.getElementsByClassName("ffcbjs")[it].classList.remove("br4");

					if(it != id){
						document.getElementsByClassName("ffcbjs")[it].classList.add("ccbwnr5hovjs");
					}
				}
				if(localStorage.getItem("appearance") == "light_mode"){
					/*Light_mode*/document.getElementsByClassName("ffcbjs")[id].classList.add("royalbluejs");
				} else if(localStorage.getItem("appearance") == "dark_mode"){
					/*Dark_mode*/document.getElementsByClassName("ffcbjs")[id].classList.add("dark_appearance_color_menu");
				}
				document.getElementsByClassName("ffcbjs")[id].classList.add("cwjs");
				document.getElementsByClassName("ffcbjs")[id].classList.remove("ccbwnr5hjs");
				document.getElementsByClassName("ffcbjs")[id].classList.add("br4");
		}
}

{//	popUpWindowLanguage
	function puwlc(id, choosed_language){
		//Clear all styles
			for(let it = 0; it <= 8; it++){
				/*Light mode*/document.getElementsByClassName("tai2js")[it].classList.remove("aIGreenjs");
				/*Dark mode*/ document.getElementsByClassName("tai2js")[it].classList.remove("aIGreen_dark_mode_js");
				document.getElementsByClassName("tai2js")[it].classList.add("aI2js");
			}
		//Set style for clicked button
			if(localStorage.getItem("appearance") == "light_mode"){
				/*Light mode*/      document.getElementsByClassName("tai2js")[id].classList.add("aIGreenjs");
				/*Remove Dark mode*/document.getElementsByClassName("tai2js")[id].classList.remove("aIGreen_dark_mode_js");
			} else if(localStorage.getItem("appearance") == "dark_mode"){
				/*Dark mode*/        document.getElementsByClassName("tai2js")[id].classList.add("aIGreen_dark_mode_js");
				/*Remove Light mode*/document.getElementsByClassName("tai2js")[id].classList.remove("aIGreenjs");
			}
			document.getElementsByClassName("tai2js")[id].classList.remove("aI2js");
		//Send choosed_language to server
			stolts(choosed_language);
	}

	if(localStorage.getItem("session") == "false"){
		(()=>{
			//chooseStyleForSelectedLanguage
				for(let it = 0; it <= 8; it++){
					if(document.getElementsByClassName("tljs")[0].innerHTML == document.getElementsByClassName("cSFSLjs")[it].innerHTML){
						if(localStorage.getItem("appearance") == "light_mode"){
							/*Light mode*/document.getElementsByClassName("tai2js")[it].classList.add("aIGreenjs");
						} else if(localStorage.getItem("appearance") == "dark_mode"){
							/*Dark mode*/ document.getElementsByClassName("tai2js")[it].classList.add("aIGreen_dark_mode_js");
						}
						document.getElementsByClassName("tai2js")[it].classList.remove("aI2js");
					}
				}
		})();
	}

	function tljsb(){
		document.getElementsByClassName("tlpojs")[0].classList.toggle("none");
		document.addEventListener('click', function(event){
			let button = event.target.closest(".tljs"), list = event.target.closest(".tlpojs");
			if(button || list){return;}
			document.getElementsByClassName("tlpojs")[0].classList.add("none");
		});
	}

	//Send type of language to server
		function stolts(choosed_language){
			let request = new XMLHttpRequest();
			request.open("POST", "src/path/dt/ss/index/nav/nav-region/src/choose_language/choosed_language.php");
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.onreadystatechange = function(){
				//Check request status
					if(request.readyState === 4){
						if(request.status === 200){
							window.location.replace("index.php");
						} else {ERMESSAGE('Error');}
					}
			}
			request.send("choosed_language=" + choosed_language);
		}
}

{//	ERROR Message. Error handler
	function ERMESSAGE(message){
		document.getElementsByClassName("ERMESSAGEjs")[0].classList.remove("none");
		document.getElementsByClassName("overflowjs")[0].classList.add("ovys");
		document.getElementsByClassName("innerTextERMESSAGEjs")[0].innerHTML = message;
	}

	function closeERMESSAGE(){
		document.getElementsByClassName("ERMESSAGEjs")[0].classList.add("none");
		document.getElementsByClassName("overflowjs")[0].classList.remove("ovys");
	}
}

{//	Leave commment in article
	function lciaF(articleAuthor, nr, articleTitle){
		if(localStorage.getItem("session") == "true"){
			sendCommentaryToServer(articleAuthor, nr, articleTitle);
		} else if(localStorage.getItem("session") == "false"){
			unauthorized();
		}
	}
}

{//	Set/Remove like for Comment from article
	//Update markup like comment
		function giveLikeForComment(id){
			if(localStorage.getItem("session") == "true"){
				let glfc1ID            = document.getElementsByClassName("glfc1ID"+id)[0],                             //Is liked
					glfc0ID            = document.getElementsByClassName("glfc0ID"+id)[0],                             //Not liked
					glfcID             = document.getElementsByClassName("glfcID"+id)[0],                              //Like wrapp
					glfcCommentCountID = Number(document.getElementsByClassName("glfcCommentCountID"+id)[0].innerHTML);//Update count like
				//Set like or Remove like, like toggle
					//If is NOT liked. Then set like
						if(glfcID.dataset.status == "0"){
							glfcID.dataset.status = "1";
							glfcCommentCountID += 1;
							document.getElementsByClassName("glfcCommentCountID"+id)[0].innerHTML = glfcCommentCountID;
							glfc0ID.classList.add("none");
							glfc1ID.classList.remove("none");
							slctb(1, id);
						}
					//If is liked. Then remove like
						else if(glfcID.dataset.status == "1"){
							glfcID.dataset.status = "0";
							glfcCommentCountID -= 1;
							document.getElementsByClassName("glfcCommentCountID"+id)[0].innerHTML = glfcCommentCountID;
							glfc0ID.classList.remove("none");
							glfc1ID.classList.add("none");
							slctb(0, id);
						}
			} else if(localStorage.getItem("session") == "false"){
				unauthorized();
			}
		}
	//Send like-comment to bd
		function slctb(likeZeroOrOne, id){
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){	
						var response = request.responseText;
					//1 : Commentary is empty
						if(response == "1"){
							//ERROR NR.1
								alert("1 : glfcCommentCountID is empty");
						}
					//2 : Error uouwcie
						else if(response == "2"){
							//ERROR NR.2
								alert("2 : id is empty");
						}
					//3 : if is NOT equal with 0 or 1
						else if(response == "2"){
							//ERROR NR.3
								alert("3 : is NOT equal with 0 or 1");
						}
					//0 : server error
						else if(response == "0"){
							//ERROR NR.0
								alert("0 : server error");
						}
				}
			}
			request.open('POST', '../../../../../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-commentary/src/src/like/comment/like_for_leave-a-comment.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("glfcCommentReplyCountID=" + likeZeroOrOne + "&" + "id=" + String(id).slice(0, -3) + "&" + "type=" + "0");
		}
}

{//	Set/Remove like for Reply from article
	//Update markup like reply
		function giveLikeForReply(id){
			if(localStorage.getItem("session") == "true"){
				let glfcReply1ID     = document.getElementsByClassName("glfcReply1ID"+id)[0],                      //Is liked
					glfcReply0ID     = document.getElementsByClassName("glfcReply0ID"+id)[0],                      //Not liked
					glfcReplyID      = document.getElementsByClassName("glfcReplyID"+id)[0],                       //Like wrapp
					glfcReplyCountID = Number(document.getElementsByClassName("glfcReplyCountID"+id)[0].innerHTML);//Update count like
				//Set like or Remove like, like toggle
					//If is NOT liked
						if(glfcReplyID.dataset.status == "0"){
							glfcReplyID.dataset.status = "1";
							glfcReplyCountID += 1;
							document.getElementsByClassName("glfcReplyCountID"+id)[0].innerHTML = glfcReplyCountID;
							glfcReply0ID.classList.add("none");
							glfcReply1ID.classList.remove("none");
							slrtb(1, id);
						}
					//If is liked
						else if(glfcReplyID.dataset.status == "1"){
							glfcReplyID.dataset.status = "0";
							glfcReplyCountID -= 1;
							document.getElementsByClassName("glfcReplyCountID"+id)[0].innerHTML = glfcReplyCountID;
							glfcReply0ID.classList.remove("none");
							glfcReply1ID.classList.add("none");
							slrtb(0, id);
						}
			} else if(localStorage.getItem("session") == "false"){
				unauthorized();
			}
		}
	//Send like-reply to bd
		function slrtb(likeZeroOrOne, id){
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){	
					var response = request.responseText;
					//1 : Commentary is empty
						if(response == "1"){
							//ERROR NR.1
								alert("1 : glfcReplyCountID is empty");
						}
					//2 : Error uouwcie
						else if(response == "2"){
							//ERROR NR.2
								alert("2 : id is empty");
						}
					//3 : if is NOT equal with 0 or 1
						else if(response == "2"){
							//ERROR NR.3
								alert("3 : is NOT equal with 0 or 1");
						}
					//0 : server error
						else if(response == "0"){
							//ERROR NR.0
								alert("0 : server error");
						}
				}
			}
			request.open('POST', '../../../../../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-commentary/src/src/like/comment/like_for_leave-a-comment.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("glfcCommentReplyCountID=" + likeZeroOrOne + "&" + "id=" + String(id).slice(0, -3) + "&" + "type=" + "1");
		}
}

{//	Pop Up window with options for comment
	function optionsForComment(id){
			document.getElementsByClassName("sdfcccomID"+id)[0].classList.toggle("none");
		//Close when is clicked outside
			document.addEventListener('click', function(event){
				let btncID     = event.target.closest(".btncID"+id),
					sdfcccomID = event.target.closest(".sdfcccomID"+id);
				if(btncID || sdfcccomID){
					return;
				}
				//START : Check if class exist
					let element = document.getElementsByClassName("sdfcccomID" + id)[0];
					if(element && element.classList.contains("sdfcccomID" + id)){
						element.classList.add("none");
					}
				//END
			});
	}
}

{//	Subscribe to author of article from widget of article
	function staoafwoa(){
		if(localStorage.getItem("session") == "true"){
			alert()
		} else if(localStorage.getItem("session") == "false"){
			unauthorized();
		}
	}
}

{//	Restore access. Forgot password.php
	//Check email address
		function rafp(){
				var	recover_access_email = document.getElementsByClassName("fprmtijs")[0].value;
			//If email is NOT writted
				if(recover_access_email == ""){
					//ERROR NR.1
						document.getElementsByClassName("err_f_accessjs")[0].innerHTML = field_is_required;
						document.getElementsByClassName("fprmtijs")[0].classList.add("redisbs");
				}
			//If email is writted
				else if(recover_access_email != ""){
					//If field is NOT empty then check if email is writted corectly
						function isValidEmail(fprmtijs){
							var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
							return emailRegex.test(recover_access_email);
						}
						//Check the result of function isValidEmail
							if(isValidEmail(recover_access_email)){
								//Email is writted corectly
								/*Run function which send email to server->*/setsfrafawsltsefra(recover_access_email);
							} else {
								//ERROR NR.2
									//Email is NOT writted corectly
									document.getElementsByClassName("err_f_accessjs")[0].innerHTML = "Invalid email address";
									document.getElementsByClassName("fprmtijs")[0].classList.add("redisbs");
							}
				}
		}
	//Remove Error (email)
		function redisbs_f_access(){
			document.getElementsByClassName("fprmtijs")[0].classList.remove("redisbs");
			document.getElementsByClassName("fprmtijs")[0].classList.remove("greenisbs");
			document.getElementsByClassName("err_f_accessjs")[0].innerHTML = "";
		}
	//Send email to server for recover access from account. Will send letter to specified email for recover access
		function setsfrafawsltsefra(recover_access_email){
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){	
						var response = request.responseText;
					//1 : Email is NOT written
						if(response == "1"){
							//ERROR NR.1
								document.getElementsByClassName("err_f_accessjs")[0].innerHTML = field_is_required;
								document.getElementsByClassName("fprmtijs")[0].classList.add("redisbs");
						}
					//2 : Email is NOT written corectly
						else if(response == "2"){
							//ERROR NR.2
								document.getElementsByClassName("err_f_accessjs")[0].innerHTML = "Invalid email address";
								document.getElementsByClassName("fprmtijs")[0].classList.add("redisbs");
						}
					//3 : Email is NOT registered
						else if(response == "3"){
							//ERROR NR.3
								document.getElementsByClassName("err_f_accessjs")[0].innerHTML = "Email address not found";
								document.getElementsByClassName("fprmtijs")[0].classList.add("redisbs");
						}
					//4 : Email sent successfully
						else if(response == "4"){
							var message = "Check your email to regain access";
							//SUCCESS NR.4
								document.getElementsByClassName("err_f_accessjs")[0].innerHTML = "<p style='color:green;'>" + message + "</p>";
								document.getElementsByClassName("fprmtijs")[0].classList.add("greenisbs");
						}
					//5 : Failed to send email
						else if(response == "5"){
							//ERROR NR.5
								document.getElementsByClassName("err_f_accessjs")[0].innerHTML = "Failed to send email";
								document.getElementsByClassName("fprmtijs")[0].classList.add("redisbs");
						}
				}
			}
			request.open('POST', '../../../../../src/path/dt/ss/index/nav/nav-sign_in-recover_access/src/recover_access.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("recover_access_email=" + recover_access_email);
		}
}

{//	Add new article. Categoryes of topics
	if(localStorage.getItem("session") == "true"){
		//Move scroll TOP from content from .mstdtcjs
			function moveScrollTop(){
				var contentDiv = document.querySelector('.mstdtcjs');
				contentDiv.classList.add('scroll-down');
				contentDiv.scrollTop -= 68;
				contentDiv.classList.remove('scroll-down');
			}
		//Move scroll BOTTOM from content from .mstdtcjs
			function moveScrollDown(){
				var contentDiv = document.querySelector('.mstdtcjs');
				contentDiv.classList.add('scroll-down');
				contentDiv.scrollTop += 68;
				contentDiv.classList.remove('scroll-down');
			}
		//Get topic and move it to main button for select topics
			function cosajs(element, categoryes){
				/*Save : category->*/localStorage.setItem("button_publish_new_article_category_list", categoryes)
				/*UPDATE*/ document.getElementsByClassName("ascb0js")[0].dataset.selected = "1";
				var buttons = document.getElementsByClassName('cosajs');
				for(var i = 0; i < buttons.length; i++){
					buttons[i].classList.remove('cosac');
				}
				element.classList.add('cosac');
				var text            = element.textContent.trim();
				var cosabjs         = document.querySelector('.cosabjs');
				cosabjs.textContent = text;
				document.getElementsByClassName("acswejs")[0].classList.add("none");
				document.getElementsByClassName("iadiconjs")[0].classList.remove("trar180deg");
			}
		//Show button
			function ascb0(){
				document.getElementsByClassName("acswejs")[0].classList.toggle("none");
				//Rotate icon to 180deg
					document.getElementsByClassName("iadiconjs")[0].classList.toggle("trar180deg");
				//Remove category error
					//REMOVE ERROR NR.4
						document.getElementsByClassName("categoryErrorjs")[0].classList.add("none");
						document.getElementsByClassName("categoryErrorjs")[0].innerHTML = "";
				//START
					//Если scrollTop равен 0, то скролл находится вверху
					    var scrollTop = element.scrollTop;
					    if(scrollTop == 0){
					        //console.log('Скролл находится вверху (0 px)');
					        /*hide icon arrow->*/document.getElementsByClassName("id_pumwtms_top_js")[0].classList.remove("adi");
					    } else if(scrollTop > 0){
					    	/*Show icon arrow->*/document.getElementsByClassName("id_pumwtms_top_js")[0].classList.add("adi");
					    }
				//END
			}
		//Close PopUpMenuWithTopics if click after border from element
			document.addEventListener('click', function(event){
				let ascb0js = event.target.closest(".ascb0js"),
					acswejs = event.target.closest(".acswejs");
				if(ascb0js || acswejs){
					return;
				}
				//Close PopUpMenuWithTopics
					document.getElementsByClassName("acswejs")[0].classList.add("none");
				//Remove class wich rotate icon to 180deg
					document.getElementsByClassName("iadiconjs")[0].classList.remove("trar180deg");
			});
		//START Determine when window are scrolled to maxim height for top
			//Находим элемент, в котором вы хотите отслеживать скролл
				var element = document.querySelector('.mstdtcjs');
				//Добавляем обработчик события прокрутки
					element.addEventListener('scroll', function(){
					    //Текущее положение скролла
					    	var scrollTop = element.scrollTop;
					    //Высота контента в элементе
					    	var contentHeight = element.scrollHeight;
					    //Высота видимой области элемента
					    	var clientHeight = element.clientHeight;
					    //Если scrollTop равен 0, то скролл находится вверху
						    if(scrollTop == 0){
						        //console.log('Скролл находится вверху (0 px)');
						        /*hide icon arrow->*/document.getElementsByClassName("id_pumwtms_top_js")[0].classList.remove("adi");
						    } else if(scrollTop > 0){
						    	/*Show icon arrow->*/document.getElementsByClassName("id_pumwtms_top_js")[0].classList.add("adi");
						    }
					    //Если scrollTop + clientHeight равно contentHeight, то скролл внизу
						    if(scrollTop + clientHeight === contentHeight){
						        //console.log('Скролл находится внизу (максимальное положение)');
						        /*hide icon arrow->*/document.getElementsByClassName("id_pumwtms_bottom_js")[0].classList.remove("adi");
						    } else if(scrollTop + clientHeight != contentHeight){
						    	 /*Show icon arrow->*/document.getElementsByClassName("id_pumwtms_bottom_js")[0].classList.add("adi");
						    }
					    //Выводим текущее положение скролла
					    	//console.log('Текущее положение скролла: ' + scrollTop + ' px');
					});
		//END
	}
}

{// Leave a comment for article
	//Check if user is authorized
		function c_lacfac(id){
			if(localStorage.getItem("session") == "true"){
				/*Run function which allow user to comment*/lacfa(id);
			} else if(localStorage.getItem("session") == "false"){
				unauthorized();
			}
		}
	//Leave a comment for article
		function lacfa(id){
			var commentID = document.getElementsByClassName("commentID"+id)[0].value;
			//Check if commentary is empty
				if(commentID == ""){
					//ERROR NR.1
						document.getElementsByClassName("commentID"+id)[0].classList.add("redisbs");
						document.getElementsByClassName("commentID"+id)[0].classList.add("crp");
						document.getElementsByClassName("commentID"+id)[0].placeholder = "You can not send empty commentary";
				}
			//Check if commentary is NOT empty
				else if(commentID != ""){
					/*Define type of thought*/isCommentOrReply = "0"; //0 (Zero) means which is commentary
					/*Send commentary to server->*/lacfascts(commentID, isCommentOrReply, id);
				}
		}
	//Remove error from input
		function removeErrorInput(id){
			document.getElementsByClassName("commentID"+id)[0].classList.remove("redisbs");
			document.getElementsByClassName("commentID"+id)[0].classList.remove("crp");
			document.getElementsByClassName("commentID"+id)[0].placeholder = "Write anything...";
		}
	//Send commentary to server
		function lacfascts(commentID, isCommentOrReply, id){
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){	
					var response     = request.responseText,
						responseJSON = JSON.parse(response);
					//1 : Commentary is empty
						if(response == "1"){
							//ERROR NR.1
								alert("1 : Commentary is empty");
						}
					//2 : Error uouwcie
						else if(response == "2"){
							//ERROR NR.2
								alert("2 : Error uouwcie");
						}
					//3 : Error tfaie
						else if(response == "3"){
							//ERROR NR.3
								alert("3 : Error tfaie");
						}
					//4 : Error uoawpaie
						else if(response == "4"){
							//ERROR NR.4
								alert("4 : Error uoawpaie");
						}
					//5 : Comment added successfully
						else if(responseJSON.status == "5"){
							//alert("5 : Comment added successfully");
							//Insert received commentary in markup
								document.getElementsByClassName("innerCommentsAndReplyesID"+id)[0].innerHTML += responseJSON.markup;
						}
					//6 : Error eac
						else if(response == "6"){
							//ERROR NR.6
								alert("6 : Error eac");
						}
					//7 : empty variable isCommentOrReply
						else if(response == "7"){
							//ERROR NR.7
								alert("7 : isCommentOrReply is empty");
						}
					//8 : Error artID is empty
						else if(response == "8"){
							//ERROR NR.8
								alert("8 : ArtID is empty");
						}
				}
			}
			request.open('POST', '../../../../../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-commentary/src/src/leave-a/comment/leave-a-comment.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			/*
				"commentID="          + commentID          : value of commentary
			*/
			request.send("commentID=" + commentID + "&" + "isCommentOrReply=" + isCommentOrReply + "&" + "artID=" + String(id).slice(0, -3) + "&" + "IDWWRA=" + whichPageIsOpened_f());
		}
}

{//	Leave a reply for commentary
	//Check
		function respond(id, commentatorNickname){
			/*Show->*/ larfcmocr(id, commentatorNickname);
		}
	//Markup of comment-reply
		function larfcmocr(id, commentatorNickname){
			//Show reply if is closed
				if(document.getElementById("ccr" + id).dataset.status == 0){
					/*UPDATE->*/ document.getElementById("ccr" + id).dataset.status = "1";
					document.getElementsByClassName("cmrp"+id)[0].innerHTML += `
						<div class='cmc22js p l br12 pa10 cmc1js cmc`+id+`'>
							<div class='tfcc0js p l w100 f14 tfccInner`+id+`'></div>	
							<div class='cmc'>
								<div class='p l w100'>
									<div class='p l w100' style='height: 46px;'>
										<!--Textarea-->
											<input type='text' class='reval`+id+` wwctit2Input w100 br50 sh pal' placeholder='`+tslf_AddAreply+`...' onclick='r_err_reply(`+id+`)' data-status='0'>
										<!--Textarea-->
										<!--START-->
											<div class='wwctit3 ab dg jcc alc'><div class='wwctit4 br50 c'  onclick='cPublishReply(`+id+`)'><!--Button--></div>
										<!--END-->
									</div>
								</div>
							</div>
						</div>
					`;
				}
				document.getElementsByClassName("reval"+id)[0].value = commentatorNickname + ", ";
				let input = document.getElementsByClassName("reval"+id)[0];
				input.focus();//Set focus on the input element
				input.setSelectionRange(input.value.length, input.value.length);
		}
}

{//	Show replyes
	function whrID(id){
		//When Replyes is Showed
			if(document.getElementsByClassName("whrID"+id)[0].classList.contains("none") == true){
				//Show replyes box
					document.getElementsByClassName("whrID"+id)[0].classList.remove("none");
				//Turn up arrow
					document.getElementsByClassName("sdfrhrspanID"+id)[0].classList.add("trar180deg");//to top
				//Check if replyes is more than 5
					if(document.getElementsByClassName("resultRRCIeID"+id)[0].innerHTML > 5 && document.getElementsByClassName("whrID"+id)[0].getElementsByClassName("ccrReplyID"+id).length != document.getElementsByClassName("resultRRCIeID"+id)[0].innerHTML){
						document.getElementsByClassName("cmr7pReplyShowMoreID"+id)[0].classList.remove("none");
					}
			}
		//When Replyes is Closed
			else if(document.getElementsByClassName("whrID"+id)[0].classList.contains("none") == false){
				//Show replyes box
					document.getElementsByClassName("whrID"+id)[0].classList.add("none");
				//Turn down arrow
					document.getElementsByClassName("sdfrhrspanID"+id)[0].classList.remove("trar180deg");//to bottom
				//Close show more replyes
					document.getElementsByClassName("cmr7pReplyShowMoreID"+id)[0].classList.add("none");
			}
	}
}

{//	Show more replyes
	//Show more replyes using ajax
		function smrfShowMoreReplyes(id){
			//Count of replyes in block
				let showedAlreadyCountOfReplyes = document.getElementsByClassName('whrID'+id)[0].getElementsByClassName('ccrReplyID'+id).length,
					dataCountReplyes            = document.getElementsByClassName("sdfrhrID"+id)[0];
			//Check if is showed all replyes
				if(showedAlreadyCountOfReplyes < document.getElementsByClassName("resultRRCIeID"+id)[0].innerHTML){
					/*Run function for showing replyes from bd*/srfsnr(id);
				}
			//Send request for showing new replyes
				function srfsnr(id){
					let	request = new XMLHttpRequest();
					request.onreadystatechange = function(){
						if(request.readyState == 4 && request.status == 200){
								document.getElementsByClassName("whrID"+id)[0].innerHTML += request.responseText;
							//Delete button "show more replyes" if count of replyes is already equal with count of replyes in bd
								if(document.getElementsByClassName("resultRRCIeID"+id)[0].innerHTML == document.getElementsByClassName('whrID'+id)[0].getElementsByClassName('ccrReplyID'+id).length){
									document.getElementsByClassName("sdfrhrID"+id)[1].classList.add("none");
								}
							//START : Check if all replyes was showed
								//If is equal
								    if(document.getElementsByClassName("whrID"+id)[0].getElementsByClassName("ccrReplyID"+id).length == document.getElementsByClassName("resultRRCIeID"+id)[0].innerHTML){
								    	/*Hide : Button (Show more replyes)->*/document.getElementsByClassName("cmr7pReplyShowMoreID"+id)[0].classList.add("none");
								    }
							//END
						}
					}
					request.open('POST', '../../../../../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-commentary/src/showReplyes.php');
					request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					request.send("showedAlreadyCountOfReplyes=" + showedAlreadyCountOfReplyes + "&" + "id=" + id + "&" + "IDWWRA=" + whichPageIsOpened_f());
				}
		}
}

{//	showComments.php
	//View count more comments
		function vcmcsdfc(id){
				id = id + whichPageIsOpened_f();
			//UPDATE "Show more comments"
				let countofcommentsID   = document.getElementsByClassName("countofcommentsID"+id)[0],            //Text before NR of comments
					vcmcsdfcspancountID = document.getElementsByClassName("vcmcsdfcspancountID"+id)[0].innerHTML;//Count of comments for textShowMoreComments
			//Count of comments which is stored already
				var showedAlreadyCountOfComments = document.getElementsByClassName("innerCommentsAndReplyesID"+id)[0].getElementsByClassName("cc1ID"+id).length;
				scarfb2(id, showedAlreadyCountOfComments);
		}
	//Show comments and replyes from bd
		function scarfb2(id, showedAlreadyCountOfComments){
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.status == 200 && request.readyState == 4){
					//GET AND SHOW COMMENTARY
						document.getElementsByClassName("innerCommentsAndReplyesID"+id)[0].innerHTML += request.responseText;
					//Update show more comments
						document.getElementsByClassName("vcmcsdfcspancountID"+id)[0].innerHTML = document.getElementsByClassName("vcmcsdfcspancountID"+id)[0].innerHTML-5;
					//Hide show more comments after loading comments
						if(document.getElementsByClassName("vcmcsdfcspancountID"+id)[0].innerHTML <= 0){
							document.getElementsByClassName("countOfCommentsvcID"+id)[0].classList.add("none");
						}
				}
			}
			request.open("POST", "../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-commentary/showComments.php");
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send("id=" + String(id).slice(0, -3) + "&" + "showedAlreadyCountOfComments=" + showedAlreadyCountOfComments + "&" + "IDWWRA=" + whichPageIsOpened_f() + "&" + "type_of_article=" + '1');
		}
}

{//	Handle reply event
	//Check if user is authorized
		function cPublishReply(id){
			if(localStorage.getItem("session") == "true"){
				//Check if reply input is empty
					if(document.getElementsByClassName("reval"+id)[0].value == ""){
						//ERROR NR.1
							document.getElementsByClassName("reval"+id)[0].value = field_is_required;
							document.getElementsByClassName("reval"+id)[0].classList.add("redisbs");
							document.getElementsByClassName("reval"+id)[0].classList.add("cr");
							/*UPDATE*/ document.getElementsByClassName("reval"+id)[0].dataset.status = "1";//Active error
					}
				//Check if reply input is NOT empty
					else if(document.getElementsByClassName("reval"+id)[0].value != ""){
						/*Send reply to server->*/srts(id);
					}
			} else if(localStorage.getItem("session") == "false"){
				unauthorized();
			}
		}
	//Send reply to server
		function srts(id){
			/*Define type of thought*/isCommentOrReply = "1";//1(One) means which is reply
			let replyID = document.getElementsByClassName("reval"+id)[0].value,
			    request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){	
					var response     = request.responseText,
						responseJSON = JSON.parse(response);
					//1 : Commentary is empty
						if(response == "1"){
							//ERROR NR.1
								alert("1 : Commentary is empty");
						}
					//2 : Error uouwcie
						else if(response == "2"){
							//ERROR NR.2
								alert("2 : Error uouwcie");
						}
					//3 : Error tfaie
						else if(response == "3"){
							//ERROR NR.3
								alert("3 : Error tfaie");
						}
					//4 : Error uoawpaie
						else if(response == "4"){
							//ERROR NR.4
								alert("4 : Error uoawpaie");
						}
					//5 : Comment added successfully
						else if(responseJSON.status == "5"){
							//Insert received commentary in markup
								document.getElementsByClassName("cmr7pReplyID"+id)[0].innerHTML += responseJSON.markup;
						}
					//6 : Error eac
						else if(response == "6"){
							//ERROR NR.6
								alert("6 : Error eac");
						}
					//7 : empty variable isCommentOrReply
						else if(response == "7"){
							//ERROR NR.7
								alert("7 : isCommentOrReply is empty");
						}
					//8 : Error artID is empty
						else if(response == "8"){
							//ERROR NR.8
								alert("8 : ArtID is empty");
						}
				}
			}
			request.open('POST', '../../../../../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-commentary/src/src/leave-a/comment/leave-a-comment.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("commentID=" + replyID + "&" + "isCommentOrReply=" + isCommentOrReply + "&" + "artID=" + String(id).slice(0, -3) + "&" + "IDWWRA=" + whichPageIsOpened_f());
		}
	//Remove Error message from reply input
		function r_err_reply(id){
			if(document.getElementsByClassName("reval"+id)[0].dataset.status == "1"){
				document.getElementsByClassName("reval"+id)[0].value = "";
				document.getElementsByClassName("reval"+id)[0].classList.remove("redisbs");
				document.getElementsByClassName("reval"+id)[0].classList.remove("cr");
				/*UPDATE*/ document.getElementsByClassName("reval"+id)[0].dataset.status = "0";//Removed error
			}
		}
}

{
	function share_this(id){
		//Show Form
			document.getElementsByClassName("sharejs")[0].classList.remove("none");
			document.getElementsByClassName("overflowjs")[0].classList.add("ovys");
		//Create URL
			/*UPDATE URL->*/document.getElementsByClassName("share_input_js")[0].innerHTML = domain_name + "article.php?id=" + id;
	}

	function closeShare(){
		document.getElementsByClassName("sharejs")[0].classList.add("none");
		document.getElementsByClassName("overflowjs")[0].classList.remove("ovys");
	}

	function copy_shared_link(){
		//Находим элемент div по классу
        	var divElement = document.querySelector('.share_input_js');
        //Создаем объект Range
       		var range = document.createRange();
        	range.selectNode(divElement);
        //Выбираем текст внутри div
        	window.getSelection().removeAllRanges();
        	window.getSelection().addRange(range);
        //Копируем текст в буфер обмена
        	document.execCommand('copy');
        //Снимаем выделение
        	window.getSelection().removeAllRanges();
        //Ваш код для обработки копирования
        	//alert('Ссылка скопирована: ' + divElement.innerText);
        //START Show alert that URL is copied
        	warning_alert('Copied');
        //END
       	//Close share
        	closeShare();
	}
	
	document.addEventListener('click', function(event){
		let button  = event.target.closest(".tfccb1"),
			wrapper = event.target.closest(".shuunr21");

		if(button || wrapper){
			return;
		}

		document.getElementsByClassName("sharejs")[0].classList.add("none");
		document.getElementsByClassName("overflowjs")[0].classList.remove("ovys");
	});
	
}

{// profile_1_articles_observer
	//Observer
		function profile_1_articles_observer(id){
			//Получаем блок с классом "observer_profile_articles"
				const block = document.querySelector('.observer_profile_articles');
			//Создаем новый экземпляр Intersection Observer
				const observer = new IntersectionObserver((entries) => {
					entries.forEach((entry) => {
						//Если блок видим на экране
							if(entry.isIntersecting){
					    		//alert("work");
					    		getNewArticles();
							}
					});
				});
			//Начинаем наблюдение за блоком
				observer.observe(block);
		}
	//Get new articles
		function getNewArticles(){
			let usernameOfUserPage = document.getElementsByClassName("proniusjs")[0].innerHTML;
			let offset             = document.getElementsByClassName('window_id_1')[0].querySelectorAll('.articleID').length;
			let request            = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					//Show new articles
						document.getElementsByClassName("window_profile_content_ajax_response")[0].innerHTML = request.responseText;
					//Hide loading
						document.getElementsByClassName("window_profile_content_ajax_response_LOADING")[0].style.display = "none";
				}
			}
			request.open('POST', '../src/path/dt/ss/index/user/user-profile/src/profile_windows/1_articles/src/1_article_AJAX.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("usernameOfUserPage=" + usernameOfUserPage + "&" + "offset=" + offset + "&" + "IDWWRA=" + "002");
		}
}

{// profile_2_likes_observer
	//Observer
		function profile_2_likes_observer(){
			//Получаем блок с классом "observer_profile_likes"
				const block = document.querySelector('.observer_profile_likes');
			//Создаем новый экземпляр Intersection Observer
				const observer = new IntersectionObserver((entries) => {
					entries.forEach((entry) => {
						//Если блок видим на экране
							if(entry.isIntersecting){
					    		//alert("work");
					    		getNewLikes();
							}
					});
				});
			//Начинаем наблюдение за блоком
				observer.observe(block);
		}
	//Get new articles
		function getNewLikes(){
			let usernameOfUserPage = document.getElementsByClassName("proniusjs")[0].innerHTML;
			let offset             = document.getElementsByClassName('window_id_2')[0].querySelectorAll('.articleID').length;
			let request            = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					//Show new articles
						document.getElementsByClassName("window_profile_content_likes_ajax_response")[0].innerHTML = request.responseText;
					//Hide loading
						document.getElementsByClassName("window_profile_content_likes_ajax_response_LOADING")[0].style.display = "none";
				}
			}
			request.open('POST', '../src/path/dt/ss/index/user/user-profile/src/profile_windows/2_likes/src/2_likes_AJAX.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("usernameOfUserPage=" + usernameOfUserPage + "&" + "offset=" + offset + "&" + "IDWWRA=" + "003");
		}
}

{//	Change site appearance
	//Define functions
		if(localStorage.getItem("appearance") == "light_mode"){
			/*Light theme->*/show_light_theme();
		} else if(localStorage.getItem("appearance") == "dark_mode"){
			//alert();
			/*Dark theme->*/show_dark_theme();
		}
	//Show light theme
		function show_light_theme(){
			//Session : false/true
				//1 : Main_Menu
					document.getElementsByClassName("appearance_nr_1_dual_js")[0].classList.remove("dark_appearance_color_nr_1");
			//Session : false
				if(localStorage.getItem("session") == "false"){
					//2 : Connect_Or_Register->Button(SignIn)
						/*Remove Dark Mode*/document.getElementsByClassName("btn_PUWC_signin_js")[0].classList.remove("signin_appearance_dark");
						/*Add Light Mode*/document.getElementsByClassName("btn_PUWC_signin_js")[0].classList.add("signin_appearance_light");
				}
			//Session : true
				if(localStorage.getItem("session") == "true"){
					//3 : Main_Menu->Add_new_article(Button)
						/*Add Light Mode*/document.getElementsByClassName("appearance_add_new_article_AANANA_js")[0].classList.add("aa");
						document.getElementsByClassName("appearance_add_new_article_AANANA_js")[0].classList.remove("aa_dark_mode");
						//4 : Main_Menu->User_menu(Button/Icon)
							/*Add Light Mode*/document.getElementsByClassName("appearance_nr_2js")[0].classList.add("light_mode_style_001");
							document.getElementsByClassName("appearance_nr_2js")[0].classList.remove("light_mode_style_001_dark_mode");
							//5 : Main_Menu->Notify(Button/Icon)
								/*Add Light Mode*/document.getElementsByClassName("tBmjs")[0].classList.add("appearance_nr_3js");
								document.getElementsByClassName("tBmjs")[0].classList.remove("appearance_nr_3_dark_mode_js");
								//6 : Main_Menu->User_menu(Button/Icon)->Settings(Button)->Apply(Button)
									/*Add Light Mode*/document.getElementsByClassName("tfccb2s_apply_js")[0].classList.add("tfccb2s_apply_light_mode_js");
									document.getElementsByClassName("tfccb2s_apply_js")[0].classList.remove("tfccb2s_apply_dark_mode_js");
				}
		}
	//Show dark theme
		function show_dark_theme(){
			//1 : Main_Menu
				document.getElementsByClassName("appearance_nr_1_dual_js")[0].classList.add("dark_appearance_color_nr_1");
				//2 : Main_Menu (MENU)
					/*Remove Light_mode*/document.getElementsByClassName("menujs")[0].classList.remove("bmhhwb");
					document.getElementsByClassName("menujs")[0].classList.add("bmhhwb_appearance_dark");
					//3 : Main_Menu (MENU->Opened)
						/*Remove Light_mode*/document.getElementsByClassName("ccbwnr5js")[0].classList.remove("royalbluejs");
						document.getElementsByClassName("ccbwnr5js")[0].classList.add("dark_appearance_color_menu");
						//Main_Menu (without session)
							if(localStorage.getItem("session") == "false"){
								//4 : Connect_Or_Register
									/*Remove Light_mode*/document.getElementsByClassName("tcjs")[0].classList.remove("appearance_PUWC_light");
									document.getElementsByClassName("tcjs")[0].classList.add("appearance_PUWC_dark");
									//5 : Connect_Or_Register->Button(SignIn)
										document.getElementsByClassName("btn_PUWC_signin_js")[0].classList.add("signin_appearance_dark");
										/*Remove Light Mode*/document.getElementsByClassName("btn_PUWC_signin_js")[0].classList.remove("signin_appearance_light");
										//6 : Connect_Or_Register->Recover(Button)
											/*Remove Light Mode*/document.getElementsByClassName("appearance_CORRB_js")[0].classList.remove("fPrN");
											document.getElementsByClassName("appearance_CORRB_js")[0].classList.add("fPrN_dark_mode");
											//7 : Connect_Or_Register->Create new account(Button)
												/*Remove Light Mode*/document.getElementsByClassName("appearance_RIS_js")[0].classList.remove("rN");
												document.getElementsByClassName("appearance_RIS_js")[0].classList.add("rN_dark_mode");
												//8 : Change appearance for SignIn(Button)
													ap_spucorbsi_dark_mode();
							}
						//Main_Menu (with session)
							else if(localStorage.getItem("session") == "true"){
								//8 : Main_Menu->Add_new_article(Button)
									/*Remove Light Mode*/document.getElementsByClassName("appearance_add_new_article_AANANA_js")[0].classList.remove("aa");
									document.getElementsByClassName("appearance_add_new_article_AANANA_js")[0].classList.add("aa_dark_mode");
									//9 : Main_Menu->User_menu(Button/Icon)
										/*Remove Light Mode*/document.getElementsByClassName("appearance_nr_2js")[0].classList.remove("light_mode_style_001");
										document.getElementsByClassName("appearance_nr_2js")[0].classList.add("light_mode_style_001_dark_mode");
										//10 : Main_Menu->Notify(Button/Icon)
											/*Remove Light Mode*/document.getElementsByClassName("tBmjs")[0].classList.remove("appearance_nr_3js");
											document.getElementsByClassName("tBmjs")[0].classList.add("appearance_nr_3_dark_mode_js");
											//11 : Main_Menu->User_menu(Button/Icon)->Settings(Button)->Apply(Button)
												/*Remove Light Mode*/document.getElementsByClassName("tfccb2s_apply_js")[0].classList.remove("tfccb2s_apply_light_mode_js");
												document.getElementsByClassName("tfccb2s_apply_js")[0].classList.add("tfccb2s_apply_dark_mode_js");
							}

		}
}

{//	Add article
	//Appearance
		//Light Mode
			if(localStorage.getItem("appearance") == "light_mode"){
				ap_aaalm_light_mode();
			}	
		//Dark Mode
			else if(localStorage.getItem("appearance") == "dark_mode"){
				ap_aaalm_dark_mode();
			}
		//Appearance : functions
			function ap_aaalm_light_mode(){
				/*Remove dark mode*/document.getElementsByClassName("id_add_article_js")[0].classList.remove("sfn8_dark_mode");
				/*Add light mode*/  document.getElementsByClassName("id_add_article_js")[0].classList.add("sfn8");
			}
			function ap_aaalm_dark_mode(){
				/*Add dark mode*/    document.getElementsByClassName("id_add_article_js")[0].classList.add("sfn8_dark_mode");
				/*Remove light mode*/document.getElementsByClassName("id_add_article_js")[0].classList.remove("sfn8");
			}
}

/*START Appearance : options*/
	//Light mode
		function settings_app_set_light_mode(){
			//Session : true 
				if(localStorage.getItem("session") == "true"){
					ap_ptacdbwbssastlm_light_mode();
					//START
						/*Remove Dark theme*/document.getElementsByClassName("tBmjs")[0].classList.remove("notify_active_dark_mode_js");
					//END
					ap_nwislmlmwislm_light_mode();
				}
			//END
			/*START Light Filter*/
				filter_nr_1(1);
				filter_nr_2(3);
				//filtLd(3);
			/*END*/
			localStorage.setItem("appearance", "light_mode");
			/*START Filter*/
				filter_nr_1(1);
				filter_nr_2(3);
				//filtLd(3);
			/*END*/
			ap_ffaswsil_light_mode();
			ap_suawllmcad_light_mode();
			ap_bftswsalba_light_mode();
			ap_aaalm_light_mode();
			show_light_theme();
			/*MENU*/fFCB(0);
			sdfi();
		}
	//Dark mode
		function settings_app_set_dark_mode(){
			//Session : true 
				if(localStorage.getItem("session") == "true"){
					ap_ptacdbwbssastlm_dark_mode();
					//ap_umwosltlm_dark_mode();
					/*Buf-fix: User Menu Remove Focus for Dark Mode when site is loaded->*/document.getElementsByClassName("ajs")[0].classList.remove("avatar_activejs");
					/*Buf-fix: User Menu Add Focus for Dark Mode when site is loaded->*/document.getElementsByClassName("ajs")[0].classList.remove("dark_appearance_color_nr_2");
				}
			//END
			/*START Light Filter*/
				filter_nr_1(1);
				filter_nr_2(3);
				//filtLd(3);
			/*END*/
			localStorage.setItem("appearance", "dark_mode");
			/*START Dark Filter*/
				filter_nr_1(1);
				filter_nr_2(3);
				//filtLd(3);
			/*END*/
			ap_ffaswsil_dark_mode();
			ap_suawllmcad_dark_mode();
			ap_bftswsalba_dark_mode();
			ap_aaalm_dark_mode();
			show_dark_theme();
			//Session : false
				if(localStorage.getItem("session") == "false"){
					ap_lorlmltlm_dark_mode();
				}
			//END	
			fFCB(0);
			sdfi();
		}
	//3 : function : light_mode, dark_mode, auto. [0 : Light; 1 : Dark; 2 : Auto];
		//Light mode
			function set_app_radio_light_mode(){
				localStorage.setItem("appearance_mode", "light");
				settings_app_set_light_mode();
				/*Save preferred mode to BD->*/fspmtbd('0');
			}
		//Dark mode
			function set_app_radio_dark_mode(){
				localStorage.setItem("appearance_mode", "dark");
				settings_app_set_dark_mode();
				/*Buf-fix: User Menu Add Focus for Dark Mode when site is loaded->*/document.getElementsByClassName("ajs")[0].classList.add("dark_appearance_color_nr_2");
				/*Save preferred mode to BD->*/fspmtbd('1');
			}
		//Auto
			function set_app_radio_auto(){
				localStorage.setItem("appearance_mode", "Auto");
				checkDarkTheme(darkThemeQuery);
				/*Buf-fix: User Menu Add Focus for Dark Mode when site is loaded->*/document.getElementsByClassName("ajs")[0].classList.add("dark_appearance_color_nr_2");
				/*Save preferred mode to BD->*/fspmtbd('2');
			}
		//Save preferred mode to BD
			//src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/settings_save_appearance.php
				function fspmtbd(theme){
					//AJAX Request
						let request = new XMLHttpRequest();
						request.onreadystatechange = function(){
							if(request.readyState == 4 && request.status == 200){
								//Response
									//1 : ERROR. Empty var
										if(request.responseText == "1"){
											alert("1 : ERROR. Empty var");
										}
									//2 : theme not contains something like 0 1 or 2
										if(request.responseText == "2"){
											alert("2: theme not contains something like 0 1 or 2");
										}
							}
						}
						request.open('POST', '../src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/settings_save_appearance.php');
						request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
						request.send("theme=" + theme);
				}
/*END*/

/*START Auto appearance*/
	//Check appearance mode
		//Media query for check if Dark Mode is enabled
			const darkThemeQuery = window.matchMedia('(prefers-color-scheme: dark)');
		//Function which will be called when appearance will be changed
			function checkDarkTheme(event){
				//Check appearance mode
					if(localStorage.getItem("appearance_mode") == "Auto"){
						//Dark Mode
						    if(event.matches){
						        localStorage.setItem("appearance", "dark_mode");
								localStorage.setItem("appearance_mode", "Auto");
						        settings_app_set_dark_mode();
						        //START Bug Fix
						        	//Session : true
						        		if(localStorage.getItem("session") == "true"){
						        			//If is opened
									        	if(!document.getElementsByClassName("aPUMjs")[0].classList.contains("none")){
									        		/*Buf-fix: User Menu Add Focus for Dark Mode when site is loaded->*/document.getElementsByClassName("ajs")[0].classList.add("dark_appearance_color_nr_2");
									        	}
						        		}
						        //END
						    }
					    //Light Mode
						    else{
						        localStorage.setItem("appearance", "light_mode");
								localStorage.setItem("appearance_mode", "Auto");
						        settings_app_set_light_mode();
						    }
					}
			}
		//Adding handler event on media query
			darkThemeQuery.addListener(checkDarkTheme);
		//Check current appearance
			checkDarkTheme(darkThemeQuery);
/*END*/

{//	Set value from cookie in localStorage
	//Obtain value
		var results = document.cookie.match(/choosed_language=(.+?)(;|$)/);
	//Check if results is empty or null
		if(!results || results[1] === ""){
			//Set default
				localStorage.setItem("choosed_language", "English");
		} else {
			//Set value
				localStorage.setItem("choosed_language", results[1]);
		}
}

{//	settings_language.php
	if(localStorage.getItem("session") == "true"){
		//START Define selected button by language which is used
			let item;
			switch(localStorage.getItem("choosed_language")){
				case 'English'    : item = 0; break;
				case 'Spanish'    : item = 1; break;
				case 'French'     : item = 2; break;
				case 'Turkish'    : item = 3; break;
				case 'Portuguese' : item = 4; break;
				case 'Romanian'   : item = 5; break;
				case 'Dutch'      : item = 6; break;
				case 'Polish'     : item = 7; break;
				case 'Ukrainian'  : item = 8; break;
			}
			document.getElementsByClassName('id_slscla_js')[item].selected = true;
		//END
		//Get element elect
			var languageSelected = document.getElementsByClassName("settings_change_language_ausl_js")[0];
		//Add event onchange
		    languageSelected.addEventListener('change', function () {
		        //Define var
			        let selectedLanguage = languageSelected.value;
			        //alert(selectedLanguage);
			    /*Send to server->*/STSSLFCCL(selectedLanguage);
			        //Send to server selected language for changing current lnguage
				        function STSSLFCCL(selectedLanguage){
							let request = new XMLHttpRequest();
							request.onreadystatechange = function(){
								if(request.readyState == 4 && request.status == 200){
									//responseText
									//1 : ERROR undefined
										if(request.responseText == "1"){
											alert("ERROR NR: 1");
										}
									//2 : ERROR uncorect data
										else if(request.responseText == "2"){
											alert("ERROR NR: 2");
										}
									//3 : ERROR error on server side
										else if(request.responseText == "3"){
											alert("ERROR NR: 3");
										}
									//4 : SUCCESS
										else if(request.responseText == "4"){
											location.reload();
										}
								}
							}
							request.open('POST', '../src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/settings_change_language.php');
							request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
							request.send("selectedLanguage=" + selectedLanguage);
						}
		    });
	}
}

{//	Check radio buttons
	//Session : true
		if(localStorage.getItem("session") == "true"){
			//Light
				if(document.getElementsByClassName("id_se_radio_app_light_js")[0].checked){
					/*Run->*/set_app_radio_light_mode();
				}
			//Dark
				else if(document.getElementsByClassName("id_se_radio_app_dark_js")[0].checked){
					/*Run->*/set_app_radio_dark_mode();
					//START Bugfix
						if(document.getElementsByClassName("aPUMjs")[0].classList.contains("none")){
			        		/*Buf-fix: User Menu Add Focus for Dark Mode when site is loaded->*/document.getElementsByClassName("ajs")[0].classList.remove("dark_appearance_color_nr_2");
			        	}
		        	//END
				}
			//Auto
				else if(document.getElementsByClassName("id_se_radio_app_auto_js")[0].checked){
					/*Run->*/set_app_radio_auto();
					//START Bugfix
						if(document.getElementsByClassName("aPUMjs")[0].classList.contains("none")){
			        		/*Buf-fix: User Menu Add Focus for Dark Mode when site is loaded->*/document.getElementsByClassName("ajs")[0].classList.remove("dark_appearance_color_nr_2");
			        	}
		        	//END
				}
		}
}

{//	sidebar-home-articles/src/URL/HttpUrlArticle
	//When page is loaded if address is for extended article then
		//START Get from URL : id
			//Get current URL
				var currentUrl = window.location.href;
			//Create an object for current URL
				var url = new URL(currentUrl);
			//Get value id from URL
				var id = url.searchParams.get("id");
		//END
		//Check if URL contains : id
			if(window.location.href == domain_name + "article.php?id=" + id){
				/*Show->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].style.display = "";
				show_article_in_extended_mode(id);
			} 
		//article.php : NOTHING NOT FOUND
			else if(window.location.href == domain_name + "article.php"){
				/*Nothing was found->*/document.getElementsByClassName("srnw0js")[0].classList.remove("none");
				/*Hide->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].style.display = "none";
			}
	//Title of article : onclick (event)
		function show_article_in_extended_mode(article_id){
			//Which page is opened
				localStorage.setItem("whichPageIsOpened", "extended_article");
			/*Show : extended article->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].style.display = "";
			/*Hide : search-menu->*/document.getElementById("cSLjs").classList.add("none");
			//*1 : Show loading->*/start_show_loading_js();
			/*2 : Send ajax request for getting extended version of article*/
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.status == 200 && request.readyState == 4){
						//START : enabled_version : mobile
							if(localStorage.getItem("enabled_version") == "mobile"){
								/*Hide : advertising->*/document.getElementsByClassName("mobile_baner")[0].classList.add("none");
								/*Hide : filter->*/document.getElementsByClassName("wfs")[0].classList.add("none");
								/*close : mobile search->*/document.getElementsByClassName("mobile_search_wrapp_js")[0].classList.add("mobile_none");
							}
						//END
						/*START RESPONSE*/
								window.scrollTo(0,0);
							//Error handler
								if(request.responseText == "0"){
										document.getElementsByClassName("extended_httpUrlArticle_js")[0].style.display = "none";
									//START : searchNULL(); | Copied
										window.scrollTo(0,0);
										document.getElementsByClassName("srnw0js")[0].classList.remove("none");
										document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.add("none");
										/*hide home-btn remove*/document.getElementsByClassName("bhn1o")[0].classList.remove("bhn1ojs");
										/*hide home-btn remove*/document.getElementsByClassName("bhn1o")[0].classList.add("btn-home-hover");
										/*hide home-btn remove*/document.getElementsByClassName("bhn1o")[0].classList.add("btn-home-style-2");
										if(localStorage.getItem("session") == "true"){
											/*hide user profile page*/document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
											/*hide add-article window*/document.getElementsByClassName("a0tajs")[0].classList.add("hidden");
											/*show article window*/document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
										}
										/*show sidebar window*/document.getElementsByClassName("sijs")[0].classList.remove("none");
									//END
								} 
							//Alright
								else if(request.responseText != "0"){
									/*innerHTML->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].innerHTML = request.responseText;
									/*Hide : Nothing not was found->*/document.getElementsByClassName("srnw0js")[0].classList.add("none");
									//START
										if(localStorage.getItem("session") == "true"){
											/*Hide : Add new article->*/document.getElementsByClassName("a0tajs")[0].classList.add("none");
										}
										/*Show : Sidebar-left->*/document.getElementsByClassName("sijs")[0].classList.remove("none");
									//END
									//Options
										//Yourself article
											if(document.getElementsByClassName("author_of_article_js")[0].innerHTML == localStorage.getItem("userWhichSignIn")){
												/*Hide : Complain->*/document.getElementsByClassName("buuf_extended_js")[0].classList.add("none");
												/*Hide : Hide->*/document.getElementsByClassName("buuf_hide_extended_js")[0].classList.add("none");
												/*Show : Delete->*/document.getElementsByClassName("options_for_article_js")[0].classList.remove("none");
											}
										//Another article
											else if(document.getElementsByClassName("author_of_article_js")[0].innerHTML != localStorage.getItem("userWhichSignIn")){
												/*Show : Complain->*/document.getElementsByClassName("buuf_extended_js")[0].classList.remove("none");
												/*Show : Hide->*/document.getElementsByClassName("buuf_hide_extended_js")[0].classList.remove("none");
												/*Hide : Delete->*/document.getElementsByClassName("options_for_article_js")[0].classList.add("none");
											}
									//Session : true
										if(localStorage.getItem("session") == "true"){
											/*Hide : user-profile->*/document.getElementsByClassName("mwupwsnjs")[0].classList.add("none");
										}
									//Save id of article in localStorage
										localStorage.setItem("extended_article_id", article_id + '012');
									showComments(article_id + '012','2');
								}
						/*END*/
						//*Finish loading->*/finish_loading_id();
						/*START*/
							//UPDATE URL
								history.pushState({'page_id': 5}, '', domain_name + 'article.php?id=' + article_id);
							//Show articles in extended mode	
								show_extended_art_instructions();
							//Session : true
								if(localStorage.getItem("session") == "true"){
									/*SHOW ARTICLES->*/document.getElementsByClassName("id_index_articles_session_true_js")[0].classList.remove("none");
								}
							//Hide : Sidebar->Button(Home)
								hide_sidebar_button_home();
						/*END*/
					}
				}
				request.open("POST", "../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/src/URL/HttpUrlArticle.php");
				request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				request.send("article_id=" + article_id);
		}
	/*START LOADING*/
		//Define var
		/*	let count     = 0,
				count_max = 80;
		//Finish loading
			function finish_loading_id(){
				count_max += 20;*/
				//*hide loading->*/document.getElementsByClassName("id_loading_0p_to_100p_js")[0].classList.add("none");
			/*}
		//START Show loading
			function start_show_loading_js(){*/
				//*Show loading->*/document.getElementsByClassName("id_loading_0p_to_100p_js")[0].classList.remove("none");
				//START Animation
					/*const intervalId = setInterval(function(){
						count++;
						document.getElementsByClassName("id_loading_0p_to_100p_js")[0].style.width = count + "%";
						if(count === count_max){
							clearInterval(intervalId);
						}
					}, 40);
			}*/
	/*END LOADING*/
	//HttpUrlArticle.php
		function httpUrlArticleID(){
			var httpUrlArticle = document.getElementsByClassName("httpUrlArticle_js")[0];
		}
	//Hide : Sidebar->Button(Home)
		function hide_sidebar_button_home(){
			var home_sb_button_id_js = document.getElementsByClassName("home_sb_button_id_js")[0];
			home_sb_button_id_js.classList.remove("bhn1ojs");
			home_sb_button_id_js.classList.remove("bhs1");
			home_sb_button_id_js.classList.add("btn-home-hover");
			home_sb_button_id_js.classList.add("btn-home-style-2");
		}
	//Show : Sidebar->Button(Home)
		function show_sidebar_button_home(){
			var home_sb_button_id_js = document.getElementsByClassName("home_sb_button_id_js")[0];
			home_sb_button_id_js.classList.add("bhn1ojs");
			home_sb_button_id_js.classList.add("bhs1");
			home_sb_button_id_js.classList.remove("btn-home-hover");
			home_sb_button_id_js.classList.remove("btn-home-style-2");
		}
	//Show articles in extended mode
		function show_extended_art_instructions(){
			//Hide article WITHOUT extended mode
				/*Hide*/document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.add("none");
			//Show article WITH extended mode
				/*Show->*/document.getElementsByClassName("feed-wrapp-articles-0-item-001")[0].classList.remove("none");
				/*Show extended->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].classList.remove("none");
			//Hide : Filter (New/The best, Day/Week/Month/Year/All time, More filters)
				/*Hide*/document.getElementsByClassName("rffanr1js")[0].classList.add("none");
		}
}

{//	Current URL Handler
	//Получаем текущий URL и сохраняем его в переменной
		//Получаем текущий URL
			var currentURL = window.location.href;
		//Используем объект URL для разбора URL и извлечения пути (path)
			var urlObject  = new URL(currentURL);
			var path       = urlObject.pathname;
		//Выводим только путь (article.php) в консоль
			//console.log(path);
		//1 : OPENED URL : /article.php. EXTENDED ARTICLES WITH SELF URL
			if(path == "/article.php"){
				//Show articles in extended mode	
					show_extended_art_instructions();
				//Hide : Sidebar->Button(Home)
					hide_sidebar_button_home();
			}
}

{
	function show_popup_hide_tellwhy_complain_js(){
		document.getElementsByClassName("rWPU_extended_mode_js")[0].classList.toggle("none");
		document.addEventListener('click', function(event){
			let cw4srtmnrExtended     = event.target.closest(".cw4srtmnrExtended"),
				rWPU_extended_mode_js = event.target.closest(".rWPU_extended_mode_js");
				uunr1js               = event.target.closest(".uunr1js");
			if(cw4srtmnrExtended || rWPU_extended_mode_js || uunr1js){
				return;
			}
			document.getElementsByClassName("rWPU_extended_mode_js")[0].classList.add("none");
		});
	}
}

{//	WARNING/ALERT
	function warning_alert(message){
		document.getElementsByClassName("warning_session_true_false_js")[0].classList.add("MOVE_warning_session_true_js");
		document.getElementsByClassName("wasetr_innerText_js")[0].innerHTML = message;
		//START : Remove warning_alert
			let timeout_alert_warning = setTimeout(function(){
				document.getElementsByClassName("warning_session_true_false_js")[0].classList.remove("MOVE_warning_session_true_js");
			},2000);
		//END
	}
}

{//	Remove like from article
	function remove_like_from_article(id, id_of_article) {
    	document.getElementsByClassName("liked_window_center")[id].classList.add("none");
    	//START : handle count
	    	var el = document.getElementsByClassName("count_of_active_elements_js")[0].innerHTML;
	    	el     = Number(el);
	    	el--;
	    	document.getElementsByClassName("count_of_active_elements_js")[0].innerHTML = el;
	    	if(el == 0){
				document.getElementsByClassName("puwsulikaujs")[0].classList.remove("pat37");
	    		document.getElementsByClassName("puwsulik_session_true_js")[0].classList.remove("none");
	    		document.getElementsByClassName("likes_title_js")[0].classList.add("none");
	    	}
    	//END
    	setLS(id_of_article);
	}

	function close_likes_window_popup(){
		showPopUpInrerfaceLikes();
	}
}

{//	Undo-Removed
	function rw2bUndoRemoved(id){
		if(localStorage.getItem("session") == "true"){
				document.getElementsByClassName("tosr_removed_ID"+id)[0].classList.add("none");
				document.getElementsByClassName("tosaID"+id)[0].classList.remove("none");
				document.getElementsByClassName("rwpuID"+id)[0].classList.remove("none");
			//START : Query : send id of article which should be hided
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						
					}
				}
				request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-delete_article_undo/delete_article_undo.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send("id=" + String(id).slice(0, -3));
			//END
		}
	}

	function deletePost(id){
		if(localStorage.getItem("session") == "true"){
				document.getElementsByClassName("mobile_hpID"+id)[0].classList.add("none");
				document.getElementsByClassName("tosr_removed_ID"+id)[0].classList.remove("none");
				document.getElementsByClassName("tosaID"+id)[0].classList.add("none");
				document.getElementsByClassName("rwpuID"+id)[0].classList.add("none");
			//START : Query : send id of article which should be hided
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						handleLikeF(id);
					}
				}
				request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-delete_article/delete_article.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send("id=" + String(id).slice(0, -3));
			//END
		}
	}
}

{//	Extended article. Undo Hide
	function rw2bUndo_hide_extended(){
			/*Show extended article->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].classList.remove("none");
			/*Hide options->*/document.getElementsByClassName("tosrIDextended")[0].classList.add("none");
		//START : Query : send id of article which should be recovered
			let id      = localStorage.getItem("extended_article_id");
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					handleLikeF(id);
				}
			}
			request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-undo/undo.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("id=" + String(id).slice(0, -3));
		//END
	}
}

{//	Extended article. Delete
	function deletePost_extended(){
			/*Hide extended article->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].classList.add("none");
			/*Show options->*/document.getElementsByClassName("tosrIDextended")[0].classList.remove("none");
			/*Hide options->*/document.getElementsByClassName("article_extended_removed_hide_js")[0].classList.add("none");
			/*Hide options->*/document.getElementsByClassName("article_extended_undo_hide_js")[0].classList.add("none");
			/*Hide options->*/document.getElementsByClassName("bofa_extendedjs")[0].classList.add("none");
			/*Show options->*/document.getElementsByClassName("aer_extendedjs")[0].classList.remove("none");
			/*Show options->*/document.getElementsByClassName("aerre_extendedjs")[0].classList.remove("none");
		//START : Query : send id of article which should be hided
			let id      = localStorage.getItem("extended_article_id");
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					handleLikeF(id);
				}
			}
			request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-delete_article/delete_article.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send("id=" + String(id).slice(0, -3));
		//END
	}

	function rw2bUndoRemoved_extended(){
		/*Show extended article->*/document.getElementsByClassName("extended_httpUrlArticle_js")[0].classList.remove("none");
		/*Hide options->*/document.getElementsByClassName("tosrIDextended")[0].classList.add("none");
		/*Show options->*/document.getElementsByClassName("article_extended_removed_hide_js")[0].classList.remove("none");
		/*Show options->*/document.getElementsByClassName("article_extended_undo_hide_js")[0].classList.remove("none");
		/*Show options->*/document.getElementsByClassName("bofa_extendedjs")[0].classList.remove("none");
			//START : Query : send id of article which should be hided
				let id      = localStorage.getItem("extended_article_id");
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						
					}
				}
				request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles-delete_article_undo/delete_article_undo.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send("id=" + String(id).slice(0, -3));
			//END
	}
}

{//	Crop
	if(localStorage.getItem("session") == "true"){
		//Cropper
			document.addEventListener('DOMContentLoaded', function(){
			    const $upload               = document.getElementById('avatarInput');
			    const $crop                 = document.getElementById('crop');
			    const $preview              = document.getElementById('preview');
			    const $result               = document.getElementById('result_crop');
			    const $wrappCropAvatarImage = document.querySelector('.wrapp_crop_avatar_image');
			    let croppie;
			    let previousImage           = null;
			    let previousFile            = null;

			    $upload.addEventListener('change', function(){
			        const reader = new FileReader();
			        const file   = this.files[0];

			        reader.onload = function(e){
			            document.getElementById('avatarInput').value = ''; //Сбросить выбранный файл из элемента input типа file
			            $wrappCropAvatarImage.classList.remove("none");
			                
			            const newImage = e.target.result;

			            if(!previousImage || previousImage !== newImage || !isSameFile(previousFile, file)){
			                if(croppie){
			                    croppie.destroy();
			                }

			                croppie = new Croppie($preview, {
			                    viewport: { width: 260, height: 260 },
			                    boundary: { width: 360, height: 360 }
			                });
			                croppie.bind({
			                    url: newImage
			                });

			                previousImage = newImage;
			                previousFile  = file;

			                $wrappCropAvatarImage.classList.remove("none");
			            } else {
			                $wrappCropAvatarImage.classList.remove("none");
			            }
			        };
			        reader.readAsDataURL(file);
			    });

			    $crop.addEventListener('click', function(){
			        croppie.result({
			            type: 'canvas',
			            size: { width: 360, height: 360 }
			        }).then(function(img){
			            $result.src = img;
			            //*Hide : avatar without image->*/document.getElementsByClassName("swpp_temporary_js")[0].classList.add("none");

			            const croppedImage = img;
			    
			            if(croppie){
			                document.getElementById('avatarInput').value = ''; //Сбросить выбранный файл из элемента input типа file
			                $wrappCropAvatarImage.classList.add("none");
			            }
			            
			            //Создаем объект FormData и добавляем обрезанное изображение
				            const formData = new FormData();
				            formData.append('croppedImage', dataURItoBlob(croppedImage), 'cropped_image.png');
			            //START : Здесь можно выполнить отправку изображения на сервер через Ajax
			            	var 
								request = new XMLHttpRequest();
							request.onreadystatechange = function(){
								if(request.readyState == 4 && request.status == 200){
									
								}
							}
							request.open('POST', 'src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/src/croppie_avatar/save_croppie_avatar.php');
							request.send(formData);
			            //END
			        });
			    });

			    function isSameFile(file1, file2){
			        return file1.size === file2.size && file1.type === file2.type;
			    }

			    //Функция для преобразования data URI в Blob
				    function dataURItoBlob(dataURI){
				        var byteString = atob(dataURI.split(',')[1]);
				        var ab         = new ArrayBuffer(byteString.length);
				        var ia         = new Uint8Array(ab);
				        for(var i = 0; i < byteString.length; i++){
				            ia[i] = byteString.charCodeAt(i);
				        }
				        return new Blob([ab], { type: 'image/png' });
				    }
			});
	//Close croper
		function close_crop(){
			document.getElementsByClassName("cadn1_crap_js")[0].classList.add("none");
		}
	}
}
	
{//	history.php
	if(localStorage.getItem("session") == "true"){
		document.getElementsByClassName("puwsulik_history_js")[0].classList.add("none");
		document.getElementsByClassName("puwsu_history_saujs")[0].classList.remove("none");
	}
}

{//	showPopUpInterfaceHistory.js
	/*status : history->*/localStorage.setItem("history_status", "closed");
	function showPopUpInrerfaceHistory(){
		//Enabled version
			//mobile
				if(localStorage.getItem("enabled_version") == "mobile"){
					/*Disable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.add("ovysi");
				}
			//desktop
				else if(localStorage.getItem("enabled_version") == "desktop"){
					/*Enable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi");
				}
		//Check
			if(localStorage.getItem("history_status") == "closed"){
				/*status : history->*/localStorage.setItem("history_status", "open");
			} else if(localStorage.getItem("history_status") == "open"){
				/*status : history->*/localStorage.setItem("history_status", "closed");
			}
		document.getElementsByClassName("pUWHjs")[0].classList.toggle("none");
		document.getElementsByClassName("bHjs")[0].style.backgroundColor = "#F5F6F7";
		document.getElementsByClassName("bHjs")[0].style.borderTop       = "1px solid #DDDFE2";
		document.getElementsByClassName("bHjs")[0].style.borderBottom    = "1px solid #DDDFE2";
		document.getElementsByClassName("bHjs")[0].style.marginTop       = "-1px";
		document.getElementsByClassName("bHjs")[0].style.cursor          = "pointer";
		document.getElementsByClassName("bHjs")[0].classList.remove("btnHistorHover");
		document.getElementsByClassName("sjs")[0].style.opacity = "1";
		switch(document.getElementsByClassName("pUWHjs")[0].classList.contains("none")){
			case true:
			document.getElementsByClassName("bHjs")[0].style.backgroundColor     = "";
			document.getElementsByClassName("bHjs")[0].style.borderTop           = "";
			document.getElementsByClassName("bHjs")[0].style.borderBottom        = "";
			document.getElementsByClassName("bHjs")[0].style.marginTop           = "";
			document.getElementsByClassName("bHjs")[0].style.cursor              = "";
			document.getElementsByClassName("bHjs")[0].classList.add("btnHistorHover");
			/*Enable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi");
		}
		document.addEventListener('click', function(event){
	  		var popUpWindowHistory = event.target.closest(".pUWHjs"),
	  			btnHistr           = event.target.closest(".bHjs");
	  		if(popUpWindowHistory || btnHistr){
	  			return;
	  		}
	  		document.getElementsByClassName("bHjs")[0].style.backgroundColor     = "";
			document.getElementsByClassName("bHjs")[0].style.borderTop           = "";
			document.getElementsByClassName("bHjs")[0].style.borderBottom        = "";
			document.getElementsByClassName("bHjs")[0].style.marginTop           = "";
			document.getElementsByClassName("bHjs")[0].style.cursor              = "";
			document.getElementsByClassName("bHjs")[0].classList.add("btnHistorHover");
	  		document.querySelector('.pUWHjs').classList.add("none");
	  		/*status : history->*/localStorage.setItem("history_status", "closed");
		});
		//session : true
			if(localStorage.getItem("session") == "true"){
				show_history_of_watched_articles();
			}
	}

	function show_history_of_watched_articles(){
		/*Hide: Title->*/document.getElementsByClassName("history_title_js")[0].classList.add("none");
		/*Show: loading->*/document.getElementsByClassName("loading_for_history_articlesjs")[0].classList.remove("none");
		//Send ajax request
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
						var response = request.responseText;
					//Nothing not was found
						if(response.length <= 2000){
							document.getElementsByClassName("puwsu_history_saujs")[0].classList.remove("pat37");
							/*Hide: Title->*/document.getElementsByClassName("history_title_js")[0].classList.add("none");
							/*Hide: loading->*/document.getElementsByClassName("loading_for_history_articlesjs")[0].classList.add("none");
							/*Show: when nothing not found->*/document.getElementsByClassName("puwsulik_history_js")[0].classList.remove("none");
						} 
					//Exists
						else {
							document.getElementsByClassName("puwsu_history_saujs")[0].classList.add("pat37");
							/*Remove: loading->*/document.getElementsByClassName("loading_for_history_articlesjs")[0].classList.add("none");
							/*Hide  : when nothing not found->*/document.getElementsByClassName("puwsulik_history_js")[0].classList.add("none");
							/*Show  : Title->*/document.getElementsByClassName("history_title_js")[0].classList.remove("none");
							/*innerHTML->*/document.getElementsByClassName("puwsu_history_saujs")[0].innerHTML = response;
						}
				}
			}
			request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-history/src/history.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send('load=' + "1");
	}
}

{//	Remove history item
	function remove_history_from_article(id, id_of_article) {
    	document.getElementsByClassName("history_window_center")[id].classList.add("none");
    	//START : handle count
	    	var el = document.getElementsByClassName("count_of_active_history_elements_js")[0].innerHTML;
	    	el = Number(el);
	    	el--;
	    	document.getElementsByClassName("count_of_active_history_elements_js")[0].innerHTML = el;
	    	if(el == 0){
				document.getElementsByClassName("puwsu_history_saujs")[0].classList.remove("pat37");
	    		document.getElementsByClassName("puwsulik_history_session_true_js")[0].classList.remove("none");
	    		document.getElementsByClassName("history_title_js")[0].classList.add("none");
	    	}
    	//END
    	/*Remove : from bd->*/remove_ViewFromHistory(id_of_article);
	}

	function remove_ViewFromHistory(id_of_article){
		let request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				
			}
		}
		request.open('POST', 'src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/src/saveViewInHistory/removeViewFromHistory.php');
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		request.send('id_of_article=' + id_of_article);
	}

	function close_history_window_popup(){
		showPopUpInrerfaceHistory();
	}
}

{// chat.js
		/*status : chat->*/localStorage.setItem("chat_status", "closed");
		var show_in_interval; //Объявляем переменную здесь, чтобы она была видна в обоих случаях
	function showPopUpInrerfaceChat(){
		//Enabled version
			//mobile
				if(localStorage.getItem("enabled_version") == "mobile"){
					document.getElementsByClassName("overflowjs")[0].classList.add("ovysi");
					/*menu*/document.getElementsByClassName("pvhlzhdj_mobile")[0].classList.add("none");
					/*pointer-events : menu*/document.getElementsByClassName("naveljs")[0].classList.add("pointer_events_none");
					document.getElementsByClassName("mtclmojs")[0].classList.remove("none");
				}
			//desktop
				else if(localStorage.getItem("enabled_version") == "desktop"){
					document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi");
					/*menu*/document.getElementsByClassName("pvhlzhdj_mobile")[0].classList.remove("none");
					/*pointer-events : menu*/document.getElementsByClassName("naveljs")[0].classList.remove("pointer_events_none");
					document.getElementsByClassName("mtclmojs")[0].classList.add("none");
				}
		//Check
			if(localStorage.getItem("chat_status") == "closed"){
				/*status : chat->*/localStorage.setItem("chat_status", "open");
			} else if(localStorage.getItem("chat_status") == "open"){
				/*status : chat->*/localStorage.setItem("chat_status", "closed");
			}
		//Handle chat window
			var lEcht = document.getElementsByClassName("chtjs").length;
				document.getElementsByClassName("poUWCjs")[0].classList.toggle("none");
				document.getElementsByClassName("bCjs")[0].style.backgroundColor = "#F5F6F7";
				document.getElementsByClassName("bCjs")[0].style.borderTop       = "1px solid #DDDFE2";
				document.getElementsByClassName("bCjs")[0].style.borderBottom    = "1px solid #DDDFE2";
				document.getElementsByClassName("bCjs")[0].style.marginTop       = "-1px";
				document.getElementsByClassName("bCjs")[0].style.cursor          = "pointer";
				document.getElementsByClassName("bCjs")[0].classList.remove("btnHistorHover");
				document.getElementsByClassName("sjs")[0].style.opacity = "1";
			switch(document.getElementsByClassName("poUWCjs")[0].classList.contains("none")){
				case true:
				document.getElementsByClassName("bCjs")[0].style.backgroundColor     = "";
				document.getElementsByClassName("bCjs")[0].style.borderTop           = "";
				document.getElementsByClassName("bCjs")[0].style.borderBottom        = "";
				document.getElementsByClassName("bCjs")[0].style.marginTop           = "";
				document.getElementsByClassName("bCjs")[0].style.cursor              = "";
				document.getElementsByClassName("bCjs")[0].classList.add("btnHistorHover");
			}
			document.addEventListener('click', function(event){
		  		var popUpWindowHistory = event.target.closest(".poUWCjs"),
		  			btnHistr           = event.target.closest(".bCjs"),
		  			uunr1js            = event.target.closest(".uunr1js"),
		  			fpis0              = event.target.closest(".fpis0"),
		  			rISjs              = event.target.closest(".rISjs"),
		  			naveljs            = event.target.closest(".naveljs");
		  		if(popUpWindowHistory || btnHistr || uunr1js || rISjs || fpis0){
		  			return;
		  		}
		  		if(localStorage.getItem("enabled_version") == "mobile"){
					if(naveljs){
			  			return;
			  		}
		  		}
		  		document.getElementsByClassName("bCjs")[0].style.backgroundColor     = "";
				document.getElementsByClassName("bCjs")[0].style.borderTop           = "";
				document.getElementsByClassName("bCjs")[0].style.borderBottom        = "";
				document.getElementsByClassName("bCjs")[0].style.marginTop           = "";
				document.getElementsByClassName("bCjs")[0].style.cursor              = "";
				document.getElementsByClassName("bCjs")[0].classList.add("btnHistorHover");
		  		document.querySelector('.poUWCjs').classList.add("none");
				/*Clear : интервала для проверки новых сообщений каждые 3 секунды*/clearInterval(show_in_interval);
			  	//Check status
					if(localStorage.getItem("chat_status") == "open"){
						//Remove style for-> Enabled version: mobile
							document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi");
							document.getElementsByClassName("pvhlzhdj_mobile")[0].classList.remove("none");
					}
			  	/*status : chat->*/localStorage.setItem("chat_status", "closed");
			});
		//Check status
			if(localStorage.getItem("chat_status") == "open"){
				/*Установка интервала для проверки новых сообщений каждые 3 секунды->*/show_in_interval = setInterval(request_show_messages_from_server, 3000);
			} else if(localStorage.getItem("chat_status") == "closed"){
				/*Clear : интервала для проверки новых сообщений каждые 3 секунды*/clearInterval(show_in_interval);
			}
		//*Auto scroll down->*/document.getElementsByClassName("insertMessageChatjs")[0].scrollTop = document.getElementsByClassName("insertMessageChatjs")[0].scrollHeight;
			request_show_messages_from_server();
	}
	
	//START : Chat : Send
		function send_chat_message(){
			if(localStorage.getItem("session") == "true"){
				/*GET : Message->*/var get_message = document.getElementsByClassName("get_message_js")[0].value;
				/*START : Check message*/
					//If is empty
						if(get_message == ""){
							document.getElementsByClassName("get_message_js")[0].classList.add("crp");
							document.getElementsByClassName("get_message_js")[0].classList.add("redisbs");
							document.getElementsByClassName("get_message_js")[0].placeholder = "You can not send empty message";
						}
					//If is NOT empty
						else if(get_message != ""){
							//START
								function getCurrentTime() {
										const now         = new Date();
										let hours         = now.getHours();
										let minutes       = now.getMinutes();
									//Добавляем ведущий ноль, если минуты меньше 10
										minutes           = minutes < 10 ? '0' + minutes : minutes;
									//Добавляем ведущий ноль, если часы меньше 10
										hours             = hours < 10 ? '0' + hours : hours;
										const currentTime = hours + ':' + minutes;
										return currentTime;
								}
							//END
							//START
								// Получаем все элементы с классом "ajs"
									var elements = document.querySelectorAll('.ajs');

									// Проходим по каждому элементу
									elements.forEach(function(element) {
									  // Получаем все дочерние теги внутри элемента
									  var childTags = element.getElementsByTagName('*');

									  // Выводим дочерние теги
									  for (var i = 0; i < childTags.length; i++) {
									    // Создаем копию тега
									    var clonedTag = childTags[i].cloneNode(true);

									    // Добавляем класс к скопированному тегу
									    clonedTag.classList.add('chat_message_right_avatar_css');

									    // Теперь можно использовать clonedTag в вашем коде
									    chat_message_right_avatar = clonedTag.outerHTML;
									  }
									});
							//END
							var IDofUserWhichSignIn = localStorage.getItem("IDofUserWhichSignIn"), chat_message_right_avatar, nickname = localStorage.getItem("userWhichSignIn"), dateofpublication = getCurrentTime();
							/*INSERT : Message->*/document.getElementsByClassName("insertMessageChatjs")[0].innerHTML += `
							<!--START : RIGHT-->
                            <div class='wwctML w100 p l mb10'>
                                <div class='wwctMR1_nr_2 p r br12'>
                                    <div class='w100 p l'><div class='p r'>` + chat_message_right_avatar + `<div class='chat_right_nickname_css p l ml10 tdu c' onclick='wshowUserProfile(` + IDofUserWhichSignIn + `,"` + nickname + `")'>` + nickname + `</div></div></div><div class='w100 chat_right_message_css'>` + get_message + `</div><div class='chat_right_date_css p l'>` + dateofpublication + `</div>
                                </div>
                            </div>
                            <!--END-->`;
				            /*CLEAR : Message->*/document.getElementsByClassName("get_message_js")[0].value = "";
				            /*Auto scroll down->*/document.getElementsByClassName("insertMessageChatjs")[0].scrollTop = document.getElementsByClassName("insertMessageChatjs")[0].scrollHeight;
				            /*SEND : Message to server->*/request_to_server(get_message);
						}
				/*END*/
			} else if(localStorage.getItem("session") == "false"){
				unauthorized();
			}
		}
	//END
	//START
	    //Send message to server
	        function request_to_server(get_message){
	        	let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						/*Auto scroll down->*/document.getElementsByClassName("insertMessageChatjs")[0].scrollTop = document.getElementsByClassName("insertMessageChatjs")[0].scrollHeight;
					}
				}
				request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-chat/src/send_chat.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send("get_message=" + get_message);
	        }
	//END
	//START
		function chathandleKeyPress(event){
		    if(event.keyCode === 13){ //Проверяем код клавиши, если это Enter (код 13)
				if(localStorage.getItem("session") == "true"){
		    		/*SEND->*/send_chat_message();
		    	} else if(localStorage.getItem("session") == "false"){
					unauthorized();
				}
		    }
		}
	//END
	/*START : Remove error from chat-input*/
		function removeErrorChatInput(id){
			document.getElementsByClassName("get_message_js")[0].classList.remove("crp");
			document.getElementsByClassName("get_message_js")[0].classList.remove("redisbs");
			document.getElementsByClassName("get_message_js")[0].placeholder = "Write anything...";
		}
	/*END*/
	//START
	    //Show messages from server
	    	var number_of_request = 0;
	        function request_show_messages_from_server(){
	        	number_of_request++;
	        	let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						//Проверка на пустой ответ
				            if(!request.responseText){
				                return; //Выход из функции или выполнение другой логики
				            } else {
				            	/*Remove : Loading->*/document.getElementsByClassName("loading_for_chat_js")[0].classList.add("none");
				            	/*Show   : Title->*/document.getElementsByClassName("chat_title_js")[0].classList.remove("none");
								/*INSERT : Message->*/document.getElementsByClassName("insertMessageChatjs")[0].insertAdjacentHTML('beforeend', request.responseText);
								//Scroll down when after loading
									/*Auto scroll down->*/document.getElementsByClassName("insertMessageChatjs")[0].scrollTop = document.getElementsByClassName("insertMessageChatjs")[0].scrollHeight;
				            }
					}
				}
				request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-chat/src/show_chat.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send("number_of_request=" + number_of_request);
	        }
	//END
	//START : Close chat for mobile version
		function close_mobile_chat(){
			/*close : chat->*/document.getElementsByClassName("poUWCjs")[0].classList.add("none");
			/*show : menu*/document.getElementsByClassName("pvhlzhdj_mobile")[0].classList.remove("none");
			/*pointer-events : menu*/document.getElementsByClassName("naveljs")[0].classList.remove("pointer_events_none");
			/*status : chat->*/localStorage.setItem("chat_status", "closed");
		}
	//END
}

{//	Notifiocations
	//Show notifications
		function notifications_f(){
			let request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					//Notify exist
						if(request.responseText != "nothing"){
							/*Show : Title->*/document.getElementsByClassName("notify_title_js")[0].classList.remove("none");
							/*Hide : loading->*/document.getElementsByClassName("loading_for_notifications_js")[0].classList.add("none");		
							/*innerHTML->*/document.getElementsByClassName("innerHTML_notifications_was_found_js")[0].innerHTML = "<div class='w100' style='height: 38px;'></div>" + request.responseText;
						}
					//Notify NOT exist
						if(request.responseText == "nothing"){
							/*Hide : Title->*/document.getElementsByClassName("notify_title_js")[0].classList.add("none");
							/*Hide : loading->*/document.getElementsByClassName("loading_for_notifications_js")[0].classList.add("none");
							/*Show : Message->*/document.getElementsByClassName("notifications_not_was_found_js")[0].classList.remove("none");
						}
				}
			}
			request.open('POST', '../src/path/dt/ss/index/nav/nav-notify/src/upload.php');
			request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			request.send('upload=' + 1);
		}
	//Settings notifications
		function notification_settings_handle(){
			//START
				//Checkbox's
					var checkbox_commentary = document.getElementById("swppw-1-2-ch-1").checked,
						checkbox_likes      = document.getElementById("swppw-1-2-ch-2").checked,
						value               = null;
				//Checkpoint : all combinations
					//0 : Show all
						if(checkbox_commentary == true && checkbox_likes == true){
							value = 0;
						}
					//1 : Hide all
						else if(checkbox_commentary == false && checkbox_likes == false){
							value = 1;
						}
					//2 : Hide commentaries | Show likes
						else if(checkbox_commentary == false && checkbox_likes == true){
							value = 2;
						}
					//3 : Hide likes | Show commentaries
						else if(checkbox_commentary == true && checkbox_likes == false){
							value = 3;
						}
			//END
			//START : SEND
				let request = new XMLHttpRequest();
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						//Response text
							//Error
								if(request.responseText == "Error"){
									console.log("Error");
								}
					}
				}
				request.open('POST', '../src/path/dt/ss/index/nav/nav-notify/src/notifications_settings.php');
				request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				request.send('settings=' + value);
			//END
		}
}

{//	Change password
	function change_password(){
		document.getElementsByClassName("changepaswjs")[0].dataset.status = "open";
		document.getElementsByClassName("changepaswjs")[0].style.display  = "";
		document.getElementsByClassName("overflowjs")[0].style.overflowY  = "hidden";
	}

	function passwclose(){
		document.getElementsByClassName("changepaswjs")[0].style.display  = "none";
		document.getElementsByClassName("overflowjs")[0].style.overflowY  = "scroll";
		document.getElementsByClassName("changepaswjs")[0].dataset.status = "hidden";
	}

	{
		if(localStorage.getItem("session") == "true"){
			document.addEventListener('click', function(event){
				if(document.getElementsByClassName("changepaswjs")[0].dataset.status == "open"){
					let swppw_sign_in_methods = event.target.closest(".swppw-sign_in_methods"),
						passw2js              = event.target.closest(".passw2js");
					if(swppw_sign_in_methods || passw2js){
						return;
					}
					passwclose();
				}
			});
		}
	}
}

{//	Change email
	function change_email(){
		document.getElementsByClassName("changeemailjs")[0].dataset.status = "open";
		document.getElementsByClassName("changeemailjs")[0].style.display  = "";
		document.getElementsByClassName("overflowjs")[0].style.overflowY   = "hidden";
	}

	function emailclose(){
		document.getElementsByClassName("changeemailjs")[0].style.display  = "none";
		document.getElementsByClassName("overflowjs")[0].style.overflowY   = "scroll";
		document.getElementsByClassName("changeemailjs")[0].dataset.status = "hidden";
	}

	{
		if(localStorage.getItem("session") == "true"){
			document.addEventListener('click', function(event){
				if(document.getElementsByClassName("changeemailjs")[0].dataset.status == "open"){
					let swppw_sign_in_methods = event.target.closest(".swppw-sign_in_methods"),
						email2js              = event.target.closest(".email2js");
					if(swppw_sign_in_methods || email2js){
						return;
					}
					emailclose();
				}
			});
		}
	}
}

{//	Personal data
	function cancel_personal_data(){
		//START : Recover
			/*Nationality->*/document.getElementsByClassName("nationality_personal_data_js")[0].value = data_nationality;
			/*city->*/document.getElementsByClassName("town_city_personal_data_js")[0].value          = data_city;
			/*education->*/document.getElementsByClassName("education_personal_data_js")[0].value     = data_education;
		//END
		//START : Gen : Recover
			//Female
				if(gen_female == "checked"){
					/*SET->*/document.getElementsByClassName("gen_personal_data_female_js")[0].checked = true;
				}
			//Male
				else if(gen_male == "checked"){
					/*SET->*/document.getElementsByClassName("gen_personal_data_male_js")[0].checked = true;
				}
		//END
	}

	function update_personal_data(){
		var nationality = document.getElementsByClassName("nationality_personal_data_js")[0].value,
			town_city   = document.getElementsByClassName("town_city_personal_data_js")[0].value,
			education   = document.getElementsByClassName("education_personal_data_js")[0].value,
			gen_female  = document.getElementsByClassName("gen_personal_data_female_js")[0].checked,
			gen_male    = document.getElementsByClassName("gen_personal_data_male_js")[0].checked,
			gen         = "";
		//START : Nationality
			//If contain forrbiden characters
				if(isValidNationality(nationality) == false){
					document.getElementsByClassName("err_c_nationality")[0].innerHTML = "Nationality must not contain numbers or symbols";
					document.getElementsByClassName("err_c_nationality")[0].classList.remove("none");
					document.getElementsByClassName("nationality_personal_data_js")[0].classList.add("redisbs");
				}
			//If NOT contain forrbiden characters
				else if(isValidNationality(nationality) == true){
					//START : town_city
					//END
					//START : education
					//END
					//START : gen : 0 : Undefined; 1 : Female; 2 : Male;
						//1 : Female
							if(gen_female == true){
								gen = 1;
							}
						//2 : Male
							else if(gen_male == true){
								gen = 2;
							}
						//0 : Undefined
							else {
								gen = 0;
							}
						//SEND
							send_personal_data(nationality, town_city, education, gen);
					//END
				}
			//Check nationality
				function isValidNationality(nationality){
				    //Используем регулярное выражение для проверки наличия только букв
				    	const regex = /^[a-zA-Zа-яА-ЯёЁ]+$/;
				    //Проверяем, соответствует ли строка регулярному выражению
				    	return regex.test(nationality);
				}
		//END
	}

	function clear_error_update_personal_data(){
		document.getElementsByClassName("err_c_nationality")[0].innerHTML = "Nationality must not contain numbers or symbols";
		document.getElementsByClassName("err_c_nationality")[0].classList.add("none");
		document.getElementsByClassName("nationality_personal_data_js")[0].classList.remove("redisbs");
	}

	function send_personal_data(nationality, town_city, education, gen){
		let request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				//Response text
					//Error
						if(request.responseText == "Error"){
							console.log("Error");
						}
					//Success
						else if(request.responseText == "Success"){
							/*show : message->*/warning_alert('Personal data was successfully updated!');
						}
			}
		}
		request.open('POST', '../src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/src/save_personal_data.php');
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		request.send('nationality=' + nationality + "&" + "town_city=" + town_city + "&" + "education=" + education + "&" + "gen=" + gen);
	}
}

{//	Change username
	function change_username(){
		document.getElementsByClassName("changeusernamejs")[0].dataset.status = "open";
		document.getElementsByClassName("changeusernamejs")[0].style.display  = "";
		document.getElementsByClassName("overflowjs")[0].style.overflowY      = "hidden";
	}

	function usernameclose(){
		document.getElementsByClassName("changeusernamejs")[0].style.display  = "none";
		document.getElementsByClassName("overflowjs")[0].style.overflowY      = "scroll";
		document.getElementsByClassName("changeusernamejs")[0].dataset.status = "hidden";
	}

	{
		if(localStorage.getItem("session") == "true"){
			document.addEventListener('click', function(event){
				if(document.getElementsByClassName("changeusernamejs")[0].dataset.status == "open"){
					let swppw_sign_in_methods = event.target.closest(".swppw-sign_in_methods"),
						username2js           = event.target.closest(".username2js");
					if(swppw_sign_in_methods || username2js){
						return;
					}
					usernameclose();
				}
			});
		}
	}
}

{//	Save new username
	function save_new_username(){
		var current_password = document.getElementsByClassName("r_new_username_current_password_js")[0].value,
			new_username     = document.getElementsByClassName("r_new_username_js")[0].value;
		//Check
			//If is empty
				if(current_password == ""){
					//ERROR
						document.getElementsByClassName("err_r_new_username_current_password_js")[0].innerHTML = field_is_required;
						document.getElementsByClassName("r_new_username_current_password_js")[0].classList.add("redisbs");
				}
			//If is NOT empty
				else if(current_password != ""){
					//If is empty
						if(new_username == ""){
							//ERROR
								document.getElementsByClassName("err_r_new_username_js")[0].innerHTML = field_is_required;
								document.getElementsByClassName("r_new_username_js")[0].classList.add("redisbs");
						}
					//If is NOT empty
						if(new_username != ""){
							//START : Send
								let request = new XMLHttpRequest();
								request.onreadystatechange = function(){
									if(request.readyState == 4 && request.status == 200){
										//Response text
											//Incorect password
												if(request.responseText == "1"){
													//ERROR
														document.getElementsByClassName("err_r_new_username_current_password_js")[0].innerHTML = "Incorrect password";
														document.getElementsByClassName("r_new_username_current_password_js")[0].classList.add("redisbs");
												}
											//2 : Username exist
												else if(request.responseText == "2"){
													//ERROR
													document.getElementsByClassName("err_r_new_username_js")[0].innerHTML = "This username is already used";
													document.getElementsByClassName("r_new_username_js")[0].classList.add("redisbs");
												}
											//Success
												else if(request.responseText == "Success"){
													/*show : Username was updated->*/warning_alert('Username was changed!');
													/*clear : password->*/document.getElementsByClassName("r_new_username_current_password_js")[0].value = "";
													/*clear : username->*/document.getElementsByClassName("r_new_username_js")[0].value = "";
													/*close : window change username->*/usernameclose();
												}
									}
								}
								request.open('POST', '../src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/src/change_username.php');
								request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
								request.send("current_password=" + current_password + "&" + "new_username=" + new_username);
							//END
						}
				}
	}

	function r_err_r_new_username_current_password(){
		//REMOVE : ERROR
			document.getElementsByClassName("err_r_new_username_current_password_js")[0].innerHTML = "";
			document.getElementsByClassName("r_new_username_current_password_js")[0].classList.remove("redisbs");
	}

	function r_err_r_new_usernam(){
		//REMOVE : ERROR
			document.getElementsByClassName("err_r_new_username_js")[0].innerHTML = "";
			document.getElementsByClassName("r_new_username_js")[0].classList.remove("redisbs");
	}
}

{//	Save new password
	function save_new_password(){
		var current_password     = document.getElementsByClassName("r_current_password_js")[0].value,
			new_password         = document.getElementsByClassName("r_new_password_js")[0].value,
			reenter_new_password = document.getElementsByClassName("r_reenter_new_password_js")[0].value;
		//Check
			//If current password is empty
				if(current_password == ""){
					//ERROR
						document.getElementsByClassName("err_r_current_password_js")[0].innerHTML = field_is_required;
						document.getElementsByClassName("r_current_password_js")[0].classList.add("redisbs");
				}
			//If current password is NOT empty
				else if(current_password != ""){
					//If new password is empty
						if(new_password == ""){
							//ERROR
								document.getElementsByClassName("err_r_new_passwordjs")[0].innerHTML = field_is_required;
								document.getElementsByClassName("r_new_password_js")[0].classList.add("redisbs");
						}
					//If new password is NOT empty
						if(new_password != ""){
							//If reentered password is empty
								if(reenter_new_password == ""){
									//ERROR
										document.getElementsByClassName("err_r_reenter_new_password_js")[0].innerHTML = field_is_required;
										document.getElementsByClassName("r_reenter_new_password_js")[0].classList.add("redisbs");
								}
							//If reentered password is NOT empty
								else if(reenter_new_password != ""){
									//Check if password is NOT reentered correct
										if(new_password != reenter_new_password){
											//ERROR
												document.getElementsByClassName("err_r_reenter_new_password_js")[0].innerHTML = "Password does not match";
												document.getElementsByClassName("r_reenter_new_password_js")[0].classList.add("redisbs");
										}
									//Check if password is reentered correct
										else if(new_password == reenter_new_password){
											/*REMOVE : ERROR->*/redisbs_r_reenter_new_password_();
											//START : Send
												let request = new XMLHttpRequest();
												request.onreadystatechange = function(){
													if(request.readyState == 4 && request.status == 200){
														//Response text
															//1 : The current password is not correct
																if(request.responseText == "1"){
																	//ERROR
																		document.getElementsByClassName("err_r_current_password_js")[0].innerHTML = "The current password is not correct";
																		document.getElementsByClassName("r_current_password_js")[0].classList.add("redisbs");
																}
															//Success
																else if(request.responseText == "Success"){
																	/*show : Password was updated->*/warning_alert(`You've successfully changed your password!`);
																	/*clear : current password->*/document.getElementsByClassName("r_current_password_js")[0].value = "";
																	/*clear : new password->*/document.getElementsByClassName("r_new_password_js")[0].value = "";
																	/*clear : reentered password->*/document.getElementsByClassName("r_reenter_new_password_js")[0].value = "";
																	/*close : window change password->*/passwclose();
																}
													}
												}
												request.open('POST', '../src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/src/change_password.php');
												request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
												request.send("current_password=" + current_password + "&" + "new_password=" + new_password);
											//END
										}

								}
						}
				}
	}

	function redisbs_r_current_password(){
		//REMOVE : ERROR
			document.getElementsByClassName("err_r_current_password_js")[0].innerHTML = "";
			document.getElementsByClassName("r_current_password_js")[0].classList.remove("redisbs");
	}

	function redisbs_r_new_password(){
		//REMOVE : ERROR
			document.getElementsByClassName("err_r_new_passwordjs")[0].innerHTML = "";
			document.getElementsByClassName("r_new_password_js")[0].classList.remove("redisbs");
	}

	function redisbs_r_reenter_new_password_(){
		//REMOVE : ERROR
			document.getElementsByClassName("err_r_reenter_new_password_js")[0].innerHTML = "";
			document.getElementsByClassName("r_reenter_new_password_js")[0].classList.remove("redisbs");
	}
}

{//	Save new email
	function save_new_email(){
		var r_email_current_password_js = document.getElementsByClassName("r_email_current_password_js")[0].value,
			r_new_email_js              = document.getElementsByClassName("r_new_email_js")[0].value;
		//Check
			//If current password is empty
				if(r_email_current_password_js == ""){
					//ERROR
						document.getElementsByClassName("err_r_email_current_password_js")[0].innerHTML = field_is_required;
						document.getElementsByClassName("r_email_current_password_js")[0].classList.add("redisbs");
				}
			//If current password is NOT empty
				else if(r_email_current_password_js != ""){
					//If new email is empty
						if(r_new_email_js == ""){
							//ERROR
								document.getElementsByClassName("err_r_new_emailjs")[0].innerHTML = field_is_required;
								document.getElementsByClassName("r_new_email_js")[0].classList.add("redisbs");
						}
					//If new email is NOT empty
						if(r_new_email_js != ""){
							//Check if email is writted corectly
								function isValidEmail(email){
									var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
									return emailRegex.test(email);
								}
							//Check the result of function isValidEmail
								if(isValidEmail(r_new_email_js)){
									//Email is writted corectly
									//START : Send
										let request = new XMLHttpRequest();
										request.onreadystatechange = function(){
											if(request.readyState == 4 && request.status == 200){
												//Response text
													//1 : The current password is not correct
														if(request.responseText == "1"){
															//ERROR
																document.getElementsByClassName("err_r_email_current_password_js")[0].innerHTML = "Current password is not correct";
																document.getElementsByClassName("r_email_current_password_js")[0].classList.add("redisbs");
														}
													//2 : Email is already used
														else if(request.responseText == "2"){
															//ERROR
																document.getElementsByClassName("err_r_new_emailjs")[0].innerHTML = "Email is already used";
																document.getElementsByClassName("r_new_email_js")[0].classList.add("redisbs");
														}
													//3 : Switch to confirmation window
														else if(request.responseText == "3"){
															/*Hide : form 1->*/document.getElementsByClassName("step_1_change_email_js")[0].classList.add("none");
															/*Show : form 2->*/document.getElementsByClassName("step_2_verification_code_js")[0].classList.remove("none");
														}
											}
										}
										request.open('POST', '../src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/src/change_email.php');
										request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
										request.send("r_email_current_password_js=" + r_email_current_password_js + "&" + "r_new_email_js=" + r_new_email_js);
									//END
								} else {
									//ERROR : Email is NOT writted corectly
										document.getElementsByClassName("err_r_new_emailjs")[0].innerHTML = "Invalid email address";
										document.getElementsByClassName("r_new_email_js")[0].classList.add("redisbs");
								}
						}
				}
	}

	function redisbs_r_email_current_password(){
		//REMOVE : ERROR
			document.getElementsByClassName("err_r_email_current_password_js")[0].innerHTML = "";
			document.getElementsByClassName("r_email_current_password_js")[0].classList.remove("redisbs");
	}

	function redisbs_r_email_new_email(){
		//REMOVE : ERROR
			document.getElementsByClassName("err_r_new_emailjs")[0].innerHTML = "";
			document.getElementsByClassName("r_new_email_js")[0].classList.remove("redisbs");
	}
}

{//	Verification code
	function verify_email_using_code(){
		var r_verify_code_js = document.getElementsByClassName("r_verify_code_js")[0].value;
		//Check
			//Code is NOT writted
				if(r_verify_code_js == ""){
					//ERROR
						document.getElementsByClassName("err_r_verify_code_js")[0].innerHTML = field_is_required;
						document.getElementsByClassName("r_verify_code_js")[0].classList.add("redisbs");
				}
			//Code is writted
				else if(r_verify_code_js != ""){
					//START : Send
						let request = new XMLHttpRequest();
						request.onreadystatechange = function(){
							if(request.readyState == 4 && request.status == 200){
								//Response text
									//4 : Code is NOT writted
										if(request.responseText == "4"){
											alert("Code is NOT writted");
										}
									//5 : Code is NOT equal
										else if(request.responseText == "5"){
											alert("Code is NOT equal");
										}
									//6 : Success
										else if(request.responseText == "Success"){
											/*Clear : input code->*/document.getElementsByClassName("r_verify_code_js")[0].value = "";
											/*Show : form 1->*/document.getElementsByClassName("step_1_change_email_js")[0].classList.remove("none");
											/*Hide : form 2->*/document.getElementsByClassName("step_2_verification_code_js")[0].classList.add("none");
											/*Clear : input current password->*/document.getElementsByClassName("r_email_current_password_js")[0].value = "";
											/*Clear : input new email address->*/document.getElementsByClassName("r_new_email_js")[0].value = "";
											/*Close : window change email->*/emailclose();
											/*Show : message->*/warning_alert(`You've successfully changed your email!`);
										}
							}
						}
						request.open('POST', '../src/path/dt/ss/index/nav/nav-user_menu-settings/src/src/src/src/change_email.php');
						request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
						request.send("verification_code=" + r_verify_code_js);
					//END
				}
	}

	function redisbs_r_verify_code_(){
		//REMOVE : ERROR
			document.getElementsByClassName("err_r_verify_code_js")[0].innerHTML = "";
			document.getElementsByClassName("r_verify_code_js")[0].classList.remove("redisbs");
	}
}

{//	Detect enabled version
	//Функция для проверки медиазапроса
		function checkMediaQuery(){
			//Проверяем соответствие медиазапросу
			    var mediaQuery = window.matchMedia('(max-width: 1349px)');
			    if(mediaQuery.matches){
			        //Enabled version : mobile
			        	localStorage.setItem("enabled_version", "mobile");
			       	//Open chat
			        	if(localStorage.getItem("chat_status") == "open"){
			        		document.getElementsByClassName("pvhlzhdj_mobile")[0].classList.add("none");
			        		document.getElementsByClassName("mtclmojs")[0].classList.remove("none");
			        		document.getElementsByClassName("naveljs")[0].classList.add("pointer_events_none");
			        	}
			    } else {
			        //Enabled version : desktop
			        	localStorage.setItem("enabled_version", "desktop");
			        	//Recover for desktop
							document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi");
							document.getElementsByClassName("pvhlzhdj_mobile")[0].classList.remove("none");
							document.getElementsByClassName("mtclmojs")[0].classList.add("none");
							/*pointer-events : menu*/document.getElementsByClassName("naveljs")[0].classList.remove("pointer_events_none");
			    }
		}
	//Вызываем функцию при загрузке страницы
		checkMediaQuery();
	//Добавляем обработчик события resize для проверки медиазапроса при изменении размера окна
		window.addEventListener('resize', checkMediaQuery);
}

{//	Event scroll bar
	window.addEventListener("click", function(){
		if(localStorage.getItem("likes_status")    == "closed" && 
			localStorage.getItem("history_status") == "closed" && 
			localStorage.getItem("chat_status")    == "closed")
		{
			document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi");
		}
	});
}

{//	Mobile filter
	function mobile_filter(){
		/*show : mobile filter->*/document.getElementsByClassName("rffanr1js")[0].classList.remove("mobile_none");
		/*Disable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.add("ovysi_3");
	}

	document.addEventListener('click', function(event){
		let mobile_filter_wrapp = event.target.closest(".mobile_filter_wrapp");
			wfsf                = event.target.closest(".wfsf");
		if(mobile_filter_wrapp || wfsf){
			return;
		}
		/*close : filter->*/document.getElementsByClassName("rffanr1js")[0].classList.add("mobile_none");
		/*Enable : <Body> scroll->*/document.getElementsByClassName("overflowjs")[0].classList.remove("ovysi_3");
	});
}

{//	Mobile search
	function mobile_search(){
		/*show : mobile search->*/document.getElementsByClassName("mobile_search_wrapp_js")[0].classList.remove("mobile_none");
	}

	function mobile_close_search(){
		/*close : mobile search->*/document.getElementsByClassName("mobile_search_wrapp_js")[0].classList.add("mobile_none");
	}

	document.addEventListener('click', function(event){
		let mobile_search_js        = event.target.closest(".mobile_search_js");
			mobile_search_button_js = event.target.closest(".mobile_search_button_js");
		if(mobile_search_js || mobile_search_button_js){
			return;
		}
		/*close : mobile search->*/document.getElementsByClassName("mobile_search_wrapp_js")[0].classList.add("mobile_none");
	});
}


{//	Auto upload articles using ajax and observer
	var current_page = 1;

	function auto_uploading_reels() {
	        //current_page++;
	    let filter__menu = localStorage.getItem("filter__menu"),
	        filter__new_the_best = localStorage.getItem("filter__new_the_best"),
	        filter__day_week_month_year_all_time = localStorage.getItem("filter__day_week_month_year_all_time"),
	        filter__search = document.getElementById("input-search").value,
	        request = new XMLHttpRequest();

	    request.onreadystatechange = function () {
	        if (request.readyState == 4 && request.status == 200) {
	            close_reels_loading_window();

	            if (request.responseText.length < 5000) {
	                document.getElementsByClassName("srnw0js")[0].classList.remove("none");
	                document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.add("none");
	            } else if (request.responseText.length > 5000) {
	            	//alert("work");
	                document.getElementsByClassName("feed-wrapp-articles-0")[0].innerHTML += request.responseText;
	                document.getElementsByClassName("feed-wrapp-articles-0")[0].classList.remove("none");
	                document.getElementsByClassName("srnw0js")[0].classList.add("none");

	                // После загрузки новых статей, запускаем отслеживание видимости последней статьи
	                startObserver();
	            }
	        }
	    };

	    request.open('POST', '../src/path/dt/ss/index/sidebar/sidebar-left/sidebar-home/sidebar-home-articles/home.php');
	    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	    request.send('filter__menu=' + filter__menu + "&" + "filter__new_the_best=" + filter__new_the_best + "&" + "filter__day_week_month_year_all_time=" + filter__day_week_month_year_all_time + "&" + "filter__search=" + filter__search + "&" + "current_page=" + current_page);
	}

	function close_reels_loading_window() {
	        //current_page++;
	    var targetElement = document.getElementsByClassName('loading-rowWindowWrapper-' + current_page)[0];
	    if (targetElement) {
	        targetElement.classList.add("none");
	    }
	}

	function handleIntersection(entries, observer) {
	    entries.forEach(entry => {
	        if (entry.isIntersecting) {
	            auto_uploading_reels();
	        }
	    });
	}

	function startObserver() {
	        current_page++;
	    var targetElement = document.getElementsByClassName('loading-rowWindowWrapper-' + current_page)[0];
	    if (targetElement) {
	        var observer = new IntersectionObserver(handleIntersection);
	        observer.observe(targetElement);
	    }
	}

	// Вызовите startObserver() при загрузке страницы или там, где вам нужно начать отслеживание
	startObserver();
}















