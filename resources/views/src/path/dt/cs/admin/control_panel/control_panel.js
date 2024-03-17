{
	window.onload = ()=>{
		setTimeout(()=>{
			document.getElementsByClassName("lojs")[0].classList.add("none");
			openControlPanel();
		},240);
	}
}

{
	function openPageArticle(){
		let request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				document.getElementsByClassName("rootInnerHTMLjs")[0].innerHTML = request.responseText;
			}
		}
		request.open('POST', 'src/path/dt/ss/admin/article/article.php');
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		request.send('item_001=' + '0');
	}
}

{
	function openControlPanel(){
		let request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				document.getElementsByClassName("rootInnerHTMLjs")[0].innerHTML = request.responseText;
			}
		}
		request.open('POST', 'src/path/dt/ss/admin/control_panel/control_panel.php');
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		request.send('item_002=' + '0');
	}
}