const button = "#button_checked";

$(function(){ // PESEL*
    var pole_pesel = "#pesel";
    $("#pesel").keyup(function(){
        var pesel = $.trim($(pole_pesel).val());
        if(pesel.length < 12){
            var _pesel_ = pesel.substring(0,10);
            var tab0 = [1,3,7,9,1,3,7,9,1,3];
            let tab1 = Array.from(String(_pesel_),Number);
            let pesel_suma = 0;
            for(i=0;i<10;i++){
                pesel_suma += tab0[i] * tab1[i];
            }
            let tab2 = Array.from(String(pesel_suma),Number);
            if(tab2.length == 3){
                let wynik = 10 - tab2[2];
                if(wynik == parseInt(pesel[10])){
                    $(pole_pesel).css({
                        "border": "1px solid #17C671"
                    });
                    $(button).attr("disabled",false);
                } else {
                    $(pole_pesel).css({
                        "border": "1px solid #C4183C"
                    });
                    $(button).attr("disabled",true);
                }
            }
            if(tab2.length == 2){
                let wynik = 10 - tab2[1];
                    if(wynik == parseInt(pesel[10])){
                        $(pole_pesel).css({
                            "border": "1px solid #17C671"
                        });
                        $(button).attr("disabled",false);
                    } else {
                        $(pole_pesel).css({
                            "border": "1px solid #C4183C"
                    });
                    $(button).attr("disabled",true);
                }
            }
        } else {
            $(pole_pesel).css({
                "border": "1px solid #C4183C"
            });
            $(button).attr("disabled",true);
        }
    });
});

$(function(){ // Imię*
    $("#imie").keyup(function(){
        sprawdz_dane("#imie",true);
    });
});

$(function(){ // Drugi Imię*
    $("#drugie_imie").keyup(function(){
        sprawdz_dane("#drugie_imie",false);
    });
});

$(function(){ // Nazwisko*
    $("#nazwisko").keyup(function(){
        sprawdz_dane("#nazwisko",true);
    });
});

$(function(){ // Miejscowość*
    $("#miejscowosc").keyup(function(){
        sprawdz_dane("#miejscowosc",true);
    });
});

$(function(){ // Kod pocztowy*
    var reg = /^\d+$/;
    $("#kod_pocztowy").keyup(function(){
        var str = $.trim($("#kod_pocztowy").val());
        if(str.length == 6 && str[2]=="-"){
            var _str_ = str.replace("-","");
            if(reg.test(_str_)){
                $("#kod_pocztowy").css({
                    "border": "1px solid #17C671"
                });
                $(button).attr("disabled",false);
            } else {
                $("#kod_pocztowy").css({
                    "border": "1px solid #C4183C"
                });
                $(button).attr("disabled",true);
            }
        } else {
            $("#kod_pocztowy").css({
                "border": "1px solid #C4183C"
            });
            $(button).attr("disabled",true);
        }
    });
});

$(function(){ // Ulica i numer domu*
    $("#ulica_numer").keyup(function(){
            $("#ulica_numer").css({
                "border": "1px solid #17C671"
            });
            $(button).attr("disabled",false);
    });
});

$(function(){ // Szkoła podstawowa*
    $("#szkola_podstawowa").keyup(function(){
            $("#szkola_podstawowa").css({
                "border": "1px solid #17C671"
            });
            $(button).attr("disabled",false);
    });
});

$(function(){ // Egzamin część Humanistyczna %*
    $("#egczhuman").keyup(function(){
        sprawdz_procenty("#egczhuman")
    });
});

$(function(){ // Egzamin część Matemtyczna %*
    $("#egczmatma").keyup(function(){
        sprawdz_procenty("#egczmatma")
    });
});

$(function(){ // Egzamin Język Obcy %*
    $("#egczobcy").keyup(function(){
        sprawdz_procenty("#egczobcy")
    });
});

$(function(){ // Język Polski*
    $("#polski").keyup(function(){
        sprawdz_oceny("#polski")
    });
});

$(function(){ // Język Obcy*
    $("#obcy").keyup(function(){
        sprawdz_oceny("#obcy")
    });
});

$(function(){ // Historia*
    $("#historia").keyup(function(){
        sprawdz_oceny("#historia")
    });
});

$(function(){ // Wiedza o społeczeństwie*
    $("#wos").keyup(function(){
        sprawdz_oceny("#wos")
    });
});

$(function(){ // Geografia*
    $("#geografia").keyup(function(){
        sprawdz_oceny("#geografia")
    });
});

$(function(){ // Chemia*
    $("#chemia").keyup(function(){
        sprawdz_oceny("#chemia")
    });
});

$(function(){ // Biologia*
    $("#biologia").keyup(function(){
        sprawdz_oceny("#biologia")
    });
});

$(function(){ // Matematyka*
    $("#matematyka").keyup(function(){
        sprawdz_oceny("#matematyka")
    });
});

$(function(){ // Informatyka*
    $("#informatyka").keyup(function(){
        sprawdz_oceny("#informatyka")
    });
});

$(function(){ // Szczegółowe osiągnięcia*
    $("#osiagniecia").keyup(function(){
        var reg = /^\d+$/;
        var val = $("#osiagniecia").val();
        if(val >= 0 && val <= 18 && reg.test(val)){
            $("#osiagniecia").css({
                "border": "1px solid #17C671"
            });
            $(button).attr("disabled",false);
        } else {
            $("#osiagniecia").css({
                "border": "1px solid #C4183C"
            });
            $(button).attr("disabled",false);
        }
    });
});

function sprawdz_dane(pole_id,button_tf){
    var reg = /^[\s\p{L}]+$/u;
    var str = $.trim($(pole_id).val());
    if(reg.test(str)){
        $(pole_id).css({
            "border": "1px solid #17C671"
        });
        $(button).attr("disabled",false);
    } else {
        $(pole_id).css({
            "border": "1px solid #C4183C"
        });
        if(button_tf){
            $(button).attr("disabled",true);
        } else {
            $(button).attr("disabled",false);
        }
    }
}

function sprawdz_procenty(pole_id){
    var reg = /^\d+$/;
    var val = $.trim($(pole_id).val());
    if(val >= 0 && val <= 100 && reg.test(val)){
        $(pole_id).css({
            "border": "1px solid #17C671"
        });
        $(button).attr("disabled",false);
    } else {
        $(pole_id).css({
            "border": "1px solid #C4183C"
        });
        $(button).attr("disabled",true);
    }
}

function sprawdz_oceny(pole_id){
    var reg = /^\d+$/;
    var val = $.trim($(pole_id).val());
    if(val >= 2 && val <= 6 && reg.test(val)){
        $(pole_id).css({
            "border": "1px solid #17C671"
        });
        $(button).attr("disabled",false);
    } else {
        $(pole_id).css({
            "border": "1px solid #C4183C"
        });
        $(button).attr("disabled",true);
    }
}
