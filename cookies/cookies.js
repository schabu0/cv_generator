function noCooDis(){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
			var cook = xhttp.responseText;
			if (cook!=0){
			document.getElementById("cookie").style.display = "block";
			}
            
        }
    };
    xhttp.open("GET", "cookies/cook-disp.php", true);
    xhttp.send();
}

function hidCoo() {
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("cookie").style.display = "none";
			}
        
    };
    xhttp.open("GET", "cookies/cookie.php", true);
    xhttp.send();

}


window.addEventListener("load", noCooDis );