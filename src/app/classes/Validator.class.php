<?php
class Validator{

    public static function validate(array $form_data){
        $validation_results = [];

        $fields_to_validate = [
            'pesel',
            'imie',
            'drugie_imie',
            'nazwisko',
            'miejscowosc',
            'kod_pocztowy',
            'ulica_numer',
            'szkola_podstawowa',
            'egczhuman',
            'egczmatma',
            'egczobcy',
            'polski',
            'obcy',
            'historia',
            'wos',
            'geografia',
            'chemia',
            'biologia',
            'matematyka',
            'informatyka',
            'osiagniecia'];


            foreach($fields_to_validate as $field){
            if(isset($form_data[$field])){
                $validation_results[$field] = self::validateField($field, $form_data[$field]);
            }else{
                $validation_results[$field] = false;
            }
        }

        return $validation_results;
    }

    public static function validatePola($form_data){
        foreach($form_data as $key => $value){
            if($key !== 'drugie_imie' && empty($value)){
                return false;
            }
        }
        return true;
    }

    public static function validatePesel($pesel){
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

    public static function validateImie($imie){
        if(preg_match('/^[\s\p{L}]+$/u', $imie)){
            return true;
        }
        return false;
    }

    public static function validateDrugieImie($drugieImie){
        if(empty($drugieImie)){
            return true;
        }else{
            if(preg_match('/^[\s\p{L}]+$/u', $drugieImie)){
                return true;
            }else{
                return false;
            }
        }
    }

    public static function validateNazwisko($nazwisko){
        if(preg_match('/^[\s\p{L}]+$/u', $nazwisko)){
            return true;
        }
        return false;
    }

    public static function validateMiejscowosc($miejscowosc){
        if(preg_match('/^[\s\p{L}]+$/u', $miejscowosc)){
            return true;
        }
        return false;
    }

    public static function validateKodPocztowy($kodpocztowy){
        if(preg_match('/^[0-9]{2}-[0-9]{3}$/', $kodpocztowy)){
            return true;
        }
        return false;
    }

    public static function valdiateUlicaNumerDomu($ulicaNumerDomu){
        if(!empty($ulicaNumerDomu)){
            return true;
        }
        return false;
    }

    public static function validateSzkolaPodstawowa($szkolaPodstawowa){
        if(!empty($szkolaPodstawowa)){
            return true;
        }
        return false;
    }

    public static function validateEgzCzHuman($egczhuman){
        if(self::checkProcent($egczhuman)){
            return true;
        }
        return false;
    }

    public static function valdiateEgzCzMatma($egzczmatma){
        if(self::checkProcent($egzczmatma)){
            return true;
        }
        return false;
    }

    public static function valdiateEgzCzObcy($egzczobcy){
        if(self::checkProcent($egzczobcy)){
            return true;
        }
        return false;
    }

    public static function validatePolski($data){
        if(self::checkOcena($data)){
            return true;
        }
        return false;
    }

    public static function validateObcy($data){
        if(self::checkOcena($data)){
            return true;
        }
        return false;
    }

    public static function validateHistoria($data){
        if(self::checkOcena($data)){
            return true;
        }
        return false;
    }

    public static function validateWos($data){
        if(self::checkOcena($data)){
            return true;
        }
        return false;
    }

    public static function validateGeografia($data){
        if(self::checkOcena($data)){
            return true;
        }
        return false;
    }

    public static function validateChemia($data){
        if(self::checkOcena($data)){
            return true;
        }
        return false;
    }
    
    public static function validateBiologia($data){
        if(self::checkOcena($data)){
            return true;
        }
        return false;
    }
    
    public static function validateMatematyka($data){
        if(self::checkOcena($data)){
            return true;
        }
        return false;
    }
    
    public static function validateInformatyka($data){
        if(self::checkOcena($data)){
            return true;
        }
        return false;
    }
    
    public static function validateOsiagniecia($data){
        if(!($data >= 0 && $data <= 18 && is_numeric($data))){
            return false;
        }
        return true;
    }

    private static function checkProcent($data){
        if(!($data >= 0 && $data <= 100 && is_numeric($data))){
            return false;
        }
        return true;
    }

    private static function checkOcena($data){
        if(!($data >= 2 && $data <= 6 && is_numeric($data))){
            return false;
        }
        return true;
    }

    private static function validateField($field, $value){
        switch($field){
            case 'pesel':
                return self::validatePesel($value);
            case 'imie':
                return self::validateImie($value);
            case 'drugie_imie':
                return self::validateDrugieImie($value);
            case 'nazwisko':
                return self::validateNazwisko($value);
            case 'miejscowosc':
                return self::validateMiejscowosc($value);
            case 'kod_pocztowy':
                return self::validateKodPocztowy($value);
            case 'ulica_numer':
                return self::valdiateUlicaNumerDomu($value);
            case 'szkola_podstawowa':
                return self::validateSzkolaPodstawowa($value);
            case 'egczhuman':
                return self::validateEgzCzHuman($value);
            case 'egczmatma':
                return self::valdiateEgzCzMatma($value);
            case 'egczobcy':
                return self::valdiateEgzCzObcy($value);
            case 'polski':
                return self::validatePolski($value);
            case 'obcy':
                return self::validateObcy($value);
            case 'historia':
                return self::validateHistoria($value);
            case 'wos':
                return self::validateWos($value);
            case 'geografia':
                return self::validateGeografia($value);
            case 'chemia':
                return self::validateChemia($value);
            case 'biologia':
                return self::validateBiologia($value);
            case 'matematyka':
                return self::validateMatematyka($value);
            case 'informatyka':
                return self::validateInformatyka($value);
            case 'osiagniecia':
                return self::validateOsiagniecia($value);
            default:
                return false; // Zwróć false jeśli nie znaleziono prawidłowego pola formularza. Domyślnie, jeśli nie znaleziono prawidłowego pola, zwróci true.
            }
    }
}

// Przykładowe dane formularza
/*
$form_data = [
    'pesel' => '68081878491',
    'imie' => 'Jan',
    'drugie_imie' => '',
    'nazwisko' => 'Kowalski',
    'miejscowosc' => 'Kuślin',
    'kod_pocztowy' => '64-316',
    'ulica_numer' => 'Parkowa 2/2',
    'szkola_podstawowa' => 'Wąsowo',
    'egczhuman' => '90',
    'egczmatma' => '85',
    'egczobcy' => '75',
    'polski' => '4',
    'obcy' => '4',
    'historia' => '3',
    'wos' => '5',
    'geografia' => '5',
    'chemia' => '4',
    'biologia' => '5',
    'matematyka' => '6',
    'informatyka' => '5',
    'osiagniecia' => '15'
];


// Sprawdzenie formularza za pomocą klasy Validator
if(!in_array(false, Validator::validate($form_data), true)) {
    echo True;
    echo var_dump(Validator::validate($form_data));
} else {
    echo false;
    echo var_dump(Validator::validate($form_data));
}
**/
?>