function update_bottles () {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            bottle_stat = xmlhttp.responseText;
            change_bottles(xmlhttp.responseText);
        }
    }
    xmlhttp.open("GET","get_bier_data.php",true);
    xmlhttp.send();
}

function change_bottles (data) {
    for (i=0; i<data.length; i++) {
        if (data[i] == "0") {
            src = "leer.png";
        } else {
            src = "voll.png";
        }
        document.getElementById("Flasche"+(i+1).toString()).src = src;
    }
}

function onload () {
    setInterval(update_bottles, 300);
}
