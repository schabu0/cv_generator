/*
    usefulness status:
    0 - no
    1 - useful
    2 - worn

    e_ element
    f_ file
    v_ value
 */

const e_main = document.getElementById("app");
const e_warning = document.getElementById("warning");

document.getElementById("button-add").addEventListener( "click", send_to_db );

function send_to_db() {
    let v_name = document.getElementById("data-input-name").value;
    let v_price = document.getElementById("data-input-price").value;
    let v_quantity = document.getElementById("data-input-quantity").value;
    let v_perm = document.getElementById("data-input-perm").checked;

    v_perm = v_perm ? 1 : 0;
    if( v_name == "" || v_price == "" || v_quantity == "" ) {
        warning("Please fill the inputs");
        return false;
    }

    let v_tab = [ v_name, v_price, v_quantity, v_perm ];
    //sanitize v_ witch regexp

    send_async( "send.php", v_tab )
}

function send_async( f_1, v_array ) {
    let str = '';
    v_array.forEach( ( val, i ) => {
        if( i != 0 ) str += '\&';
        str += 'v_' + ( i + 1 ) + '=' + val;
    });
    //improve to ES6
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            warning(xhttp.responseText);
        }
    };
    xhttp.open("POST", "php/" + f_1, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(str);
}

function warning( text ) {
    e_warning.innerHTML = text;
    e_warning.classList.add("open");
    e_warning.addEventListener( "mouseenter", function(){
        clearTimeout(popUpTime);
    });
    e_warning.addEventListener( "mouseleave", function(){
        popUpTime =  setTimeout( function() {
        e_warning.classList.remove("open");
    }, 50 );
    });

    let popUpTime =  setTimeout( function() {
        e_warning.classList.remove("open");
    }, 3000 );
}

document.querySelectorAll('.button-worn').forEach( button_tmp => {
    button_tmp.addEventListener("click", function(event){
        send_async( 'send-expiration.php', [event.target.dataset.item_id] )
    });
});

