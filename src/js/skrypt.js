function zegar() {
    var data = new Date();
    var godzina = data.getHours();
    var minuta = data.getMinutes();
    if (godzina < 10) godzina = "0" + godzina;
    if (minuta < 10) minuta = "0" + minuta;
    document.getElementById("h1-id-zegar").innerHTML = godzina +":"+ minuta;
    setTimeout(zegar,1000);
}

function stopka() {
    var data = new Date();
    var rok = data.getYear();
    document.getElementById("span_footer").innerHTML = "© J.K.K.J - " + rok;
}
