var fast = 0;
var patch = document.getElementById("svg2").children;
document.getElementById("svg2").addEventListener("click", function(){fast = fast ? 0 : 1});

for( var i = 3; patch[i]; i++ ){
    var elem;
    for( var j = 0; elem = patch[i].children[j]; j++ ){
        elem.style.display = "none";
        elem.style.fillOpacity = 0;
        elem.style.strokeDasharray = elem.getTotalLength();
        elem.style.strokeDashoffset = elem.getTotalLength();
    }
}

document.getElementById("svg2").style.display = "block";

var g = 3;
var p = 0;
var pt;
var tm;

function play(){
    if( !(patch[g].children[p]) ) {
        g++;
        p = 0;
    }
    if( !patch[g] ) return false;
    pt = patch[g].children[p];
    pt.style.display = "block";
    pt.classList.add("animation");
    tm = fast ? 20 : Math.pow(Math.abs(pt.getTotalLength()), 2/3) * 6;
    pt.style.animationDuration = tm + "ms";
    setTimeout( function(){ stop(pt); p++; play() }, tm);
}

play();

function stop(elem){
    elem.classList.remove("animation");
    elem.classList.add("visible-patch");
}
