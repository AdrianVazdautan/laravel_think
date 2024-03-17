{
	window.onload = ()=>{
		setTimeout(()=>{document.getElementsByClassName("lojs")[0].classList.add("none");},240);
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

{//	Reset password
	function saveNewPassword(hash){
			var newpassword_js = document.getElementsByClassName("newpassword_js")[0].value;
		//is empty input
			if(newpassword_js == ""){
				//ERROR
					/*Message->*/document.getElementsByClassName("err_r_newpassword_js")[0].innerHTML = "Field is required";
					/*Border->*/document.getElementsByClassName("newpassword_js")[0].classList.add("redisbs");
			}
		//is NOT empty input
			else if(newpassword_js != ""){
				//Minimum length 5 characters
					if(newpassword_js.length < 5){
						//ERROR
							/*Message->*/document.getElementsByClassName("err_r_newpassword_js")[0].innerHTML = "Minimum length 5 characters";
							/*Border->*/document.getElementsByClassName("newpassword_js")[0].classList.add("redisbs");
					}
				//Maximum length 100 characters
					else if(newpassword_js.length > 100){
						//ERROR
							/*Message->*/document.getElementsByClassName("err_r_newpassword_js")[0].innerHTML = "Maximum length 100 characters";
							/*Border->*/document.getElementsByClassName("newpassword_js")[0].classList.add("redisbs");
					}
				//Enough
					else {
						//START : Query : send newpassword_js
							let request = new XMLHttpRequest();
							request.onreadystatechange = function(){
								if(request.readyState == 4 && request.status == 200){
									//response
										var response = request.responseText;
									//1 : is empty input
										if(request.responseText == "1"){
											//ERROR
												/*Message->*/document.getElementsByClassName("err_r_newpassword_js")[0].innerHTML = "Field is required";
												/*Border->*/document.getElementsByClassName("newpassword_js")[0].classList.add("redisbs");
										}
									//2 : Minimum length 5 characters
										else if(request.responseText == "2"){
											//ERROR
												/*Message->*/document.getElementsByClassName("err_r_newpassword_js")[0].innerHTML = "Minimum length 5 characters";
												/*Border->*/document.getElementsByClassName("newpassword_js")[0].classList.add("redisbs");
										}
									//3 : Maximum length 100 characters
										else if(request.responseText == "3"){
											//ERROR
												/*Message->*/document.getElementsByClassName("err_r_newpassword_js")[0].innerHTML = "Maximum length 100 characters";
												/*Border->*/document.getElementsByClassName("newpassword_js")[0].classList.add("redisbs");
										}
									//Success : Authorize user
										else if(request.responseText == "5"){
											//Redirect to
												window.location.replace("feed.php");
										}
								}
							}
							request.open('POST', '../src/path/dt/ss/recovery/newpassword.php');
							request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
							request.send("newpassword_js=" + newpassword_js + "&" + "hash=" + hash);
						//END
					}
			}
	}

	function r_err_r_newpassword(){
		//REMOVE ERROR
			/*Message->*/document.getElementsByClassName("err_r_newpassword_js")[0].innerHTML = "";
			/*Border->*/document.getElementsByClassName("newpassword_js")[0].classList.remove("redisbs");
	}
}