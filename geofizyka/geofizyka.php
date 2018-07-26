<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html" />
	<title></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="Shortcut icon" href="icon.ico" />
	<meta charset="UTF-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<!--<link href='https://fonts.googleapis.com/css?family==Roboto:400,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>-->

	<?php include_once("../analyticstracking.php") ?>
<style>
body{margin:0;background-color:#F1f1f1;font-family:calibri}#nav{width:100%;height:50px;background-color:#ff5722;position:fixed;top:0;z-index:9;box-shadow:0 0 10px RGBA(0,0,0,.3)}.rect{width:520px;height:110px;background-color:#eee;margin:10px 10px 0 10px;box-shadow:0 0 10px RGBA(0,0,0,.3)}#f-rect{margin-top:60px}.p{float:left;height:20px;width:74px;padding:10px 5px 10px 0;margin:10px 0 0 10px;text-align:right;background-color:#efefef;color:#20202F}._p_1{width:245px;background-color:#616161;color:#FFF}span{float:left;margin-left:10px}.inp{margin:0;border:none;padding:5px;height:30px;margin:10px 0 0 0;width:71px;float:left;box-shadow:0 0 5px RGBA(0,0,0,.3)}._inp_1{width:240px}#button{width:60px;height:60px;border-radius:30px;position:absolute;border:none;background-color:#ff5722;color:#FFF;left:470px;font-size:40px;font-weight:300;box-shadow:0 0 5px RGBA(0,0,0,.6);transition-duration:0.3s;cursor:pointer;padding-bottom:9px;margin:0;float:none}#button:hover{box-shadow:0 0 10px RGBA(0,0,0,.5);transition-duration:0.3s}#form{position:fixed;top:0;right:10px;z-index:10}#form>p{float:left;border-radius:20px 0 0 20px;height:20px;width:125px;padding:10px 5px 10px 0;margin:5px 0 0 10px;text-align:right;background-color:#424242;color:#FFF}#form>input{margin:0;border:none;padding:5px;border-radius:0 20px 20px 0;height:30px;margin:5px 0 0 0;width:140px;float:left;box-shadow:0 0 5px RGBA(0,0,0,.3)}#demo{position:absolute;top:0;right:0;width:500px;height:150px;background-color:red;word-wrap:break-word;display:none}#slide1{position:absolute;left:500px;top:70px;width:20px;height:20px;border-radius:50%;background-color:green}#scale{margin-top:10px}.box{width:97px;position:absolute;box-shadow:0 0 15px RGBA(0,0,0,.3)}#canv{background-color:#FFF;position:absolute;right:20px;box-shadow:0 0 15px RGBA(0,0,0,.3)}#top_1{width:87px;color:#FFF;padding:2px 0 2px 10px}#top_2{background-color:#FFF;padding:2px 0 2px 10px}#add{position:fixed;z-index:999;width:100px;height:30px;padding-top:10px;text-align:center;cursor:pointer;background-color:#fff;top:5px;border-radius:20px;box-shadow:0 0 5px RGBA(0,0,0,.5);left:10px;margin:0;transition-duration:0.3s}#add:hover{box-shadow:0 0 10px RGBA(0,0,0,.5);transition-duration:0.5s}
</style>
<script>

function validateQty(event) {
    var key = window.event ? event.keyCode : event.which;
    document.getElementById("clockdiv").querySelector('.minutes').innerHTML = key;
    if (event.keyCode == 8 || event.keyCode == 46 || event.charCode == 46 ||
        event.keyCode == 37 || event.keyCode == 39) {
        return true;
    } else if (event.keyCode == 44) {
		return ".";
	} else if (key < 48 || key > 57) {
        return false;
    } else return true;
};


var c = 1;
var ii = 0;
//inicjowanie strony w zależności od liczby skał
function start() {
    //placeholder
    var ro = ['glina', 'sól', 'gips', 'wapień', 'kreda'];
    var ti = [1.65, 2.15, 2.35, 2.9, 2.2];
    var gu = [10, 10, 10, 10, 10];
    var vo = [2500, 6500, 4500, 6000, 3500]

    var tab = [{
        s: "Rodzaj skały:",
        id: "rk",
        p: ro
    }, {
        s: "Gęstość:",
        id: "th",
        p: ti
    }, {
        s: "Prędkość:",
        id: "vl",
        p: vo
    }, {
        s: "Grubość:",
        id: "sz",
        p: gu
    }]

    if (c == 1) {
        var form = document.createElement("form");
        form.id = "frm";
        document.body.appendChild(form);
    } else var form = document.getElementById("frm");

    var elem;
    var inp;
    var span;
    var rect = [];

    if ((c - 1) % 5 == 0) ii = 0;
    rect[c] = document.createElement("div");
    rect[c].setAttribute("class", "rect");
    form.appendChild(rect[c]);
    for (var j = 1; j <= 4; j++) {
        elem = document.createElement("p");
        elem.id = "opis_" + j + "_" + c;
        elem.setAttribute("class", "p _p_"+j);
        elem.innerHTML = tab[j - 1].s;
        rect[c].appendChild(elem);
        inp = document.createElement("input");
        inp.type = "text";
        inp.onkeyup = function() {
            fc(c - 1);
        }
        inp.setAttribute("class", "inp _inp_"+j);
        inp.id = tab[j - 1].id + c;
        inp.placeholder = tab[j - 1].p[ii];
        rect[c].appendChild(inp);
    }
    ii++
    span = document.createElement("span");
    span.innerHTML = "[" + c + "]";
    document.getElementById("opis_1_" + c).appendChild(span);

/*<p id="skala">Skala pozioma</p><input type="text" id="scale" placeholder="200"></input>
	<p id="skala">Skala pionowa</p><input type="text" id="vScale" placeholder="50"></input>
	<p id="skala">Przesunięcie</p><input type="text" id="dis" placeholder="300"></input>*/

    if (c == 1) {
        var bt = document.createElement("input");
        bt.id = "button";
        bt.type = "button";
        bt.onclick = function() {
            start();2
        };
        bt.value = "+";
		bt.title = "Dodaj skałę";
        form.appendChild(bt);
		
		var frm = document.getElementById("form");
		var pdp = document.createElement("p");
		pdp.id = "skala";
		pdp.innerHTML= "Skala pozioma";
		frm.appendChild(pdp);		
		var scl = document.createElement("input");
		scl.id = "scale";
		scl.type = "text";
		scl.placeholder = "200";
		scl.onkeyup = function() {
            fc(c - 1);
        }
		frm.appendChild(scl);
		
		var pdp = document.createElement("p");
		pdp.id = "skala";
		pdp.innerHTML= "Skala pionowa";
		frm.appendChild(pdp);		
		var scl = document.createElement("input");
		scl.id = "vScale";
		scl.type = "text";
		scl.placeholder = "500";
		scl.onkeyup = function() {
            fc(c - 1);
        }
		frm.appendChild(scl);
		
		var pdp = document.createElement("p");
		pdp.id = "skala";
		pdp.innerHTML= "Przesunięcie";
		frm.appendChild(pdp);		
		var scl = document.createElement("input");
		scl.id = "dis";
		scl.type = "text";
		scl.placeholder = "300";
		scl.onkeyup = function() {
            fc(c - 1);
        }
		frm.appendChild(scl);
	}
	var bt = document.getElementById("button");
	bt.style.top = 120 * c +180 +"px"
	fc(c);
    c++;
	
}




function fc(ile) {

    if (document.getElementById("canv")) {
        var child = document.getElementById("canv");
        var parent = document.body;
        parent.removeChild(child);

        var child = document.getElementById("top_1");
        parent.removeChild(child);

        var child = document.getElementById("top_2");
        parent.removeChild(child);
		
		if ( document.getElementById("box_" + (ile )) )
		{
		for (var i = 1; i <= ile; i++) {
			child = document.getElementById("box_" + i);
			parent = document.body;
			parent.removeChild(child);
		}
		}
		else
		{
		
		for (var i = 1; i < ile; i++) {
			child = document.getElementById("box_" + i);
			parent = document.body;
			parent.removeChild(child);
		}
		}
    }

    var demo = document.getElementById("demo"); //okienko próbne
    var s = " ";
    var br = "<br>";
	
	var color = "#424242";
	
	var LEFT = 540;
    var TOP = 120; //odległość wykresu od góry
    var col = {
        'glina': 'glina',
        'sól': 'sol',
        'gips': 'gips',
        'wapień': 'wapien',
        'kreda': 'kreda',
        'łupek': 'lupek'
    } //kolory skał
    var vel = {
        'gips': '4500',
        'wapień': '6000',
        'sól': '6500',
        'kreda': '3500',
        'glina': '2500',
        'zwietrzelina': '600',
        'łupek': '6800'
    } //tablica prędkości
    var tho = {
        'gips': '2.35',
        'wapień': '2.9',
        'sól': '2.15',
        'kreda': '2.2',
        'glina': '1.65'
    } //tablica gęstości
    var rk = []; //tablica skał
    var th = []; //tablica miąższości
    var sz = []; //tablica grubości
    var vl = []; //tablica prędkości
    var nsz = []; //tablica Number(grubości)
    var wsz = []; //tablica całkowitej grubości do danej skały
    var WSZ = 0; //całkowita grubość
    var box = []; //tablica prostokątów-skał

    for (var pre = 1; pre <= ile; pre++) { //wczytywanie danych z formularza

        rk[pre] = document.getElementById("rk" + pre).placeholder;
        if (document.getElementById("rk" + pre).value) rk[pre] = document.getElementById("rk" + pre).value;

        document.getElementById("th" + pre).placeholder = tho[rk[pre]];
        document.getElementById("vl" + pre).placeholder = vel[rk[pre]];
		
        sz[pre] = document.getElementById("sz" + pre).placeholder;
        if (document.getElementById("sz" + pre).value) sz[pre] = document.getElementById("sz" + pre).value;
        nsz[pre] = Number(sz[pre]);
        WSZ += nsz[pre];
        wsz[pre] = WSZ;
        th[pre] = document.getElementById("th" + pre).placeholder;
        if (document.getElementById("th" + pre).value) th[pre] = document.getElementById("th" + pre).value;

        vl[pre] = document.getElementById("vl" + pre).placeholder;
        if (document.getElementById("vl" + pre).value) vl[pre] = document.getElementById("vl" + pre).value;

    }


    var dis = Number(document.getElementById("dis").placeholder);
    if (document.getElementById("dis").value) dis = Number(document.getElementById("dis").value);

    document.getElementById("vScale").placeholder = Math.round(800 / WSZ);
	
    var scale = Number(document.getElementById("scale").placeholder);
    if (document.getElementById("scale").value) scale = Number(document.getElementById("scale").value);
    var vScale = document.getElementById("vScale").placeholder;
    if (document.getElementById("vScale").value) vScale = document.getElementById("vScale").value;


    var rc = []; //tablica współczynnyków odbicia
    for (var k = 1; k < ile; k++) { //liczenie współczynników odbicia
        rc[k] = (vl[k + 1] * th[k + 1] - vl[k] * th[k]) / (vl[k + 1] * th[k + 1] + vl[k] * th[k]);
        demo.innerHTML += br + "rc[" + k + "] = " + rc[k];
    }


    function Legenda(TOP) {
        div = document.createElement("div");
        div.class = "top";
        div.id = "top_1";
        div.style.position = "absolute";
		div.style.backgroundColor = color;
        div.style.left = LEFT+"px";
        div.style.top = "60px";
        div.style.fontSize = "18px";
        div.innerHTML = "Litologia";
        document.body.appendChild(div);
        div = document.createElement("div");
        div.class = "top";
        div.id = "top_2";
        div.style.position = "absolute";
        div.style.left = LEFT+97+"px";
        div.style.top = "60px";
		div.style.width = document.body.clientWidth - LEFT-147 + "px";
        div.style.fontSize = "18px";
        div.innerHTML = "Wykres współczynników odbicia w funkcji głębokości";
        document.body.appendChild(div);
    }

    Legenda(TOP);



    var top = TOP;
    for (var j = 1; j <= ile; j++) { //tworzenie prostokątów-skał
        box[j] = document.createElement("div");
        box[j].setAttribute("class", "box");
        box[j].id = "box_" + j;
        box[j].setAttribute("title", rk[j] + ", " + sz[j] + "m");
        box[j].style.height = sz[j] * vScale + "px";
		box[j].style.left = LEFT + "px";
        box[j].style.top = top + "px";
		box[j].style.backgroundColor = color;
        top += sz[j] * vScale;
        box[j].style.backgroundImage = 'url("../img/' + col[rk[j]] + '.png")';
        document.body.appendChild(box[j]);
    }
																																			//tworzenie canvas
    var can = document.createElement("canvas");
    can.id = "canv";
	can.style.width = document.body.clientWidth - LEFT-117 +"px";
    can.style.height = top - TOP + 'px';
    can.height = top - TOP;
    can.width = document.body.clientWidth - LEFT-117;
    can.style.top = TOP + "px";
    document.body.appendChild(can);
    var ctx = can.getContext("2d");
    ctx.beginPath(); //linia zerowa
    ctx.lineWidth = "3";
    ctx.strokeStyle = color;
    ctx.moveTo(dis, 0);
    ctx.lineTo(dis, can.height);
	ctx.stroke();
	ctx.beginPath();
    ctx.lineWidth = "0.3"; //linie pionowe w 1 i -1
    ctx.moveTo(dis + scale, 0);
    ctx.lineTo(dis + scale, can.height);

    ctx.moveTo(dis - scale, 0);
    ctx.lineTo(dis - scale, can.height);
    ctx.stroke();
    for (var i = vScale / 2; i < WSZ * vScale; i = i + (vScale / 2)) //linie poziome co pół metra
    {
        ctx.beginPath();
        ctx.lineWidth = "0.3";
        ctx.strokeStyle = "grey";
        ctx.moveTo(0, i);
        ctx.lineTo(can.width, i);
        ctx.stroke();
    }




    var points = new Array(ile); //tablica punktów wykresu
    for (var i = 0; i < ile; i++ ) points[i] = {x: 0, y:0 };
	
	points[0] = {
        x: dis,
        y: 0
    }
    
    demo.innerHTML = "";
    for (var i = 1; i <= (ile - 1); i++) { //uzupełnianie tablicy punktów wykresu
        points[i].x = dis + rc[i] * scale;
        points[i].y = wsz[i] * vScale;
        demo.innerHTML += "points[" + i + "] = " + points[i].x + " , " + points[i].y + br;
    }
	points[ile] = {
        x: dis,
        y: can.height
    };
    ctx.beginPath();
    ctx.strokeStyle = color;
    ctx.lineWidth = "4";

    for (var i = 0; i < points.length - 1; i++) {
		
		
		ctx.moveTo(dis, points[i].y);
		ctx.lineTo(points[i].x, points[i].y);
		
		/*
        var x_mid = (points[i].x + points[i + 1].x) / 2;
        var y_mid = (points[i].y + points[i + 1].y) / 2;
        var cp_x1 = (x_mid + points[i].x) / 2;
        var cp_y1 = (y_mid + points[i].y) / 2;
        var cp_x2 = (x_mid + points[i + 1].x) / 2;
        var cp_y2 = (y_mid + points[i + 1].y) / 2;
		
        if ((points[i].x - dis) < 0 && (points[i + 1].x - dis) < 0) {
            ctx.quadraticCurveTo(points[i].x, y_mid, points[i + 1].x, points[i + 1].y);
        } else if ((points[i].x - dis) > 0 && (points[i + 1].x - dis) > 0) {
            ctx.quadraticCurveTo(points[i].x, y_mid, points[i + 1].x, points[i + 1].y);
        } else {
            ctx.quadraticCurveTo(points[i].x, cp_y1, x_mid, y_mid);
            ctx.quadraticCurveTo(points[i + 1].x, cp_y2, points[i + 1].x, points[i + 1].y);
		}*/
    }
    ctx.stroke();

    ctx.beginPath();
    ctx.font = "15px Arial";
    ctx.fillText(0, dis + 5, 15);
    ctx.fillText(-1, dis - scale + 5, 15);
    ctx.fillText(1, dis + scale + 5, 15);
    ctx.stroke();
    for (var r = 1; r < ile; r++) { //punkty współczynników odbicia w zależności od głębokości		
        ctx.beginPath();
        ctx.arc(dis + rc[r] * scale, wsz[r] * vScale, 3, 0, 2 * Math.PI, false);
        ctx.fillStyle = '#000';
        ctx.fill();
        ctx.lineWidth = "0.5";
        ctx.strokeStyle = "grey";
        ctx.moveTo(0, wsz[r] * vScale);
        ctx.lineTo(can.width, wsz[r] * vScale);
        ctx.font = "13px Arial";
        ctx.fillText(Math.round(rc[r] * 100) / 100, dis + rc[r] * scale-15, wsz[r] * vScale-5);
        ctx.stroke();
    }
    for (var r = 1; r <= ile; r++) { //napisy na liniach poziomych
        ctx.beginPath();
        ctx.font = "10px Arial";
        ctx.fillText(Math.round(wsz[r] * 10) / 10 + "m", 5, wsz[r] * vScale - 3);
        ctx.stroke();
    }
	
	if( can.width < 600 && scale >= 200 && !(document.getElementById("scale").value) )
	{
		document.getElementById("scale").placeholder = Math.round(can.width/2-20);
		document.getElementById("dis").placeholder = Math.round(can.width/2-20+10);
		fc(ile);
	}
	
}

</script>

</head>

<body onload="start();start()">
<div id="f-rect" class="rect" style="background-color: #FFF;">
	<span style="margin: 10px;">
	W nowo utworzonej skale wpisane są na szaro wartości domyślne.<br>
	Aby edytować rodzaj skały wpisz nazwę skały. Aby powrócić do domyślych wartości usuń wpisany tekst.
	<br>
	Jednostki: gęstość: g/cm3; prędkość: m/s; grubość: m;
	</span>
</div>
<div id="nav">
	<p id="add" onclick="start()">Dodaj skałę</p>
</div>

<div id="bg"></div>
<form id="form">
</form>






<!--
<form>
	<p>Skała:</p>
	<input type="text" id="rk1" placeholder="glina">
	<input type="text" id="rk2" placeholder="sól">
	<input type="text" id="rk3" placeholder="gips">
	<input type="text" id="rk4" placeholder="wapień">
	<br><p>Miąższość [g/cm3]:</p>
	<input type="text" id="th1" placeholder="1.65">
	<input type="text" id="th2" placeholder="2.15">
	<input type="text" id="th3" placeholder="2.35">
	<input type="text" id="th4" placeholder="2.9">
	<br><p>Grubość [m]:</p>
	<input type="text" id="sz1" placeholder="1">
	<input type="text" id="sz2" placeholder="3">
	<input type="text" id="sz3" placeholder="2.1">
	<input type="text" id="sz4" placeholder="5">
	<br><p>Skala:</p>
	<input type="text" id="scale" placeholder="100">
	<br><p>Przesunięcie:</p>
	<input type="text" id="dis" placeholder="100">
	<br>
	<input type="button" id="button" onclick="fc()" value="Do dzieła!">
	
</form>
-->

<div id="demo">DEMO</div>



</body>

</html>