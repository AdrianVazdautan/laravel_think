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