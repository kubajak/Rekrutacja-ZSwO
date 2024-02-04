<?php
class Validator{
    public static function validate(mixed $form_data){
        foreach($form_data as $key => $value){
            if($key !== 'drugie_imie' && empty($value)){
                return false;
            }
        }
        return true;
    }

    public static function validatePesel(string $pesel){
        $wagi = [1, 3, 7, 9, 1, 3, 7, 9, 1, 3];
        $suma = 0;
    
        // Sprawdź długość numeru PESEL
        if (strlen($pesel) != 11) {
            return false;
        }
    
        // Sprawdź, czy PESEL składa się tylko z cyfr
        if (!ctype_digit($pesel)) {
            return false;
        }
    
        // Oblicz sumę kontrolną
        for ($i = 0; $i < 10; $i++) {
            $suma += $pesel[$i] * $wagi[$i];
        }
    
        // Oblicz resztę z dzielenia sumy przez 10
        $mod = $suma % 10;
    
        // Sprawdź, czy ostatnia cyfra (suma kontrolna) jest zgodna z obliczoną wartością
        return ($mod == 0) ? ($pesel[10] == 0) : ($pesel[10] == (10 - $mod));
    }

    public static function validateImie(string $imie){
        if(!preg_match('/^[a-zA-ZęóąśłżźćńĘÓĄŚŁŻŹĆŃ]+$/u', $imie)){
            return false;
        }

    }
}
?>