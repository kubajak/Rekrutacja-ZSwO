// * Dane Wymagane
// PESEL
// Imię  
// Drugi Imię
// Nazwisko
// Miejscowość
// Kod pocztowy
// Ulica i numer domu
// Szkoła podstawowa
// Egzamin część Humanistyczna %
// Egzamin część Matemtyczna %
// Egzamin Język Obcy %
// Język Polski
// Język Obcy
// Historia
// Wiedza o społeczeństwie
// Geografia
// Chemia
// Biologia
// Matematyka
// Informatyka
// Szczegółowe osiągnięcia

var button = "#button_checked";

$(function(){ // PESEL*
    var pole_pesel = "#pesel_spr";
    $("#pesel_spr").keyup(function(){
        var pesel = $.trim($(pole_pesel).val());
        if(pesel.length < 12){
            //var reg = /^\d+$/;
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
    $("#imie_spr").keyup(function(){
        sprawdz_dane("#imie_spr",true);
    });
});

$(function(){ // Drugi Imię*
    $("#drugie_imie_spr").keyup(function(){
        sprawdz_dane("#drugie_imie_spr",false);
    });
});

$(function(){ // Nazwisko*
    $("#nazwisko_spr").keyup(function(){
        sprawdz_dane("#nazwisko_spr",true);
    });
});

$(function(){ // Miejscowość*
    $("#miejscowosc_spr").keyup(function(){
        sprawdz_dane("#miejscowosc_spr",true);
    });
});

$(function(){ // Kod pocztowy*
    var reg = /^\d+$/;
    $("#kod_pocztowy_spr").keyup(function(){
        var str = $.trim($("#kod_pocztowy_spr").val());
        if(str.length == 6 && str[2]=="-"){
            var _str_ = str.replace("-","");
            if(reg.test(_str_)){
                $("#kod_pocztowy_spr").css({
                    "border": "1px solid #17C671"
                });
                $(button).attr("disabled",false);
            } else {
                $("#kod_pocztowy_spr").css({
                    "border": "1px solid #C4183C"
                });
                $(button).attr("disabled",true);
            }
        } else {
            $("#kod_pocztowy_spr").css({
                "border": "1px solid #C4183C"
            });
            $(button).attr("disabled",true);
        }
    });
});

$(function(){ // Ulica i numer domu*
    $("#ulica_spr").keyup(function(){
            $("#ulica_spr").css({
                "border": "1px solid #17C671"
            });
            $(button).attr("disabled",false);
    });
});

$(function(){ // Szkoła podstawowa*
    $("#szkola_spr").keyup(function(){
            $("#szkola_spr").css({
                "border": "1px solid #17C671"
            });
            $(button).attr("disabled",false);
    });
});

$(function(){ // Egzamin część Humanistyczna %*
    $("#eg_cz_H_spr").keyup(function(){
        sprawdz_procenty("#eg_cz_H_spr")
    });
});

$(function(){ // Egzamin część Matemtyczna %*
    $("#eg_cz_M_spr").keyup(function(){
        sprawdz_procenty("#eg_cz_M_spr")
    });
});

$(function(){ // Egzamin Język Obcy %*
    $("#eg_cz_O_spr").keyup(function(){
        sprawdz_procenty("#eg_cz_O_spr")
    });
});

$(function(){ // Język Polski*
    $("#p_spr").keyup(function(){
        sprawdz_oceny("#p_spr")
    });
});

$(function(){ // Język Obcy*
    $("#o_spr").keyup(function(){
        sprawdz_oceny("#o_spr")
    });
});

$(function(){ // Historia*
    $("#h_spr").keyup(function(){
        sprawdz_oceny("#h_spr")
    });
});

$(function(){ // Wiedza o społeczeństwie*
    $("#w_spr").keyup(function(){
        sprawdz_oceny("#w_spr")
    });
});

$(function(){ // Geografia*
    $("#g_spr").keyup(function(){
        sprawdz_oceny("#g_spr")
    });
});

$(function(){ // Chemia*
    $("#ch_spr").keyup(function(){
        sprawdz_oceny("#ch_spr")
    });
});

$(function(){ // Biologia*
    $("#b_spr").keyup(function(){
        sprawdz_oceny("#b_spr")
    });
});

$(function(){ // Matematyka*
    $("#m_spr").keyup(function(){
        sprawdz_oceny("#m_spr")
    });
});

$(function(){ // Informatyka*
    $("#i_spr").keyup(function(){
        sprawdz_oceny("#i_spr")
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
