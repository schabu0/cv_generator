let fast = 1;
let patch = document.getElementById("svg2").children;
document.getElementById("svg2").addEventListener("click", function(){fast = fast ? 0 : 1});

for( let i = 3; patch[i]; i++ ){
    let elem;
    for( let j = 0; elem = patch[i].children[j]; j++ ){
        elem.style.display = "none";
        elem.style.fillOpacity = 0;
        elem.style.strokeDasharray = elem.getTotalLength();
        elem.style.strokeDashoffset = elem.getTotalLength();
    }
}

document.getElementById("svg2").style.display = "block";

let g = 3;
let p = 0;
let pt;
let tm;

function play(){
    if( !(patch[g].children[p]) ) {
        g++;
        p = 0;
    }
    if( !patch[g] ) return false;
    pt = patch[g].children[p];
    pt.style.display = "block";
    pt.classList.add("animation");
    tm = fast ? Math.pow(Math.abs(pt.getTotalLength()), 2/3) : Math.pow(Math.abs(pt.getTotalLength()), 2/3) * 6;
    pt.style.animationDuration = tm + "ms";
    setTimeout( function(){ stop(pt); p++; play() }, tm);
}

play();

function stop(elem){
    elem.classList.remove("animation");
    elem.classList.add("visible-patch");
}
