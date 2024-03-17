{//	signin_admin.js
	function login(){
		var col_a_2_2_inputjs = document.getElementsByClassName("col_a_2_2_inputjs")[0].value;
		var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				if(request.responseText == "1"){
					window.location.replace("admin.php");
				}
			}
		}
		request.open('POST', '../src/path/dt/ss/index/nav/nav-sign_in/login_2.php');
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		request.send("col_a_2_2_inputjs=" + col_a_2_2_inputjs);
	}
}

{
	window.onload = ()=>{
		setTimeout(()=>{document.getElementsByClassName("lojs")[0].classList.add("none");},240);
	}
}