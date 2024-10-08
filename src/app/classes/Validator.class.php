<?php
class Validator
{

    public static function validate(array $form_data): array
    {
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
            'osiagniecia'
        ];


        foreach ($fields_to_validate as $field) {
            if (isset($form_data[$field])) {
                $validation_results[$field] = self::validateField($field, $form_data[$field]);
            } else {
                $validation_results[$field] = false;
            }
        }

        return $validation_results;
    }

    /*
    private static function validatePola(array $form_data){
        foreach($form_data as $key => $value){
            if($key !== 'drugie_imie' && empty($value)){
                return false;
            }
        }
        return true;
    }
    **/

    private static function validatePesel(string $pesel): bool
    {
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

    private static function validateImie(string $imie): bool
    {
        if (preg_match('/^[\s\p{L}]+$/u', $imie)) {
            return true;
        }
        return false;
    }

    private static function validateDrugieImie(string $drugieImie): bool
    {
        if (empty($drugieImie)) {
            return true;
        } else {
            if (preg_match('/^[\s\p{L}]+$/u', $drugieImie)) {
                return true;
            } else {
                return false;
            }
        }
    }

    private static function validateNazwisko(string $nazwisko): bool
    {
        if (preg_match('/^[\s\p{L}]+$/u', $nazwisko)) {
            return true;
        }
        return false;
    }

    private static function validateMiejscowosc(string $miejscowosc): bool
    {
        if (preg_match('/^[\s\p{L}]+$/u', $miejscowosc)) {
            return true;
        }
        return false;
    }

    private static function validateKodPocztowy(string $kodpocztowy): bool
    {
        if (preg_match('/^[0-9]{2}-[0-9]{3}$/', $kodpocztowy)) {
            return true;
        }
        return false;
    }

    private static function valdiateUlicaNumerDomu(string $ulicaNumerDomu): bool
    {
        if (!empty($ulicaNumerDomu)) {
            return true;
        }
        return false;
    }

    private static function validateSzkolaPodstawowa(string $szkolaPodstawowa): bool
    {
        if (!empty($szkolaPodstawowa)) {
            return true;
        }
        return false;
    }

    private static function validateEgzCzHuman(string $egczhuman): bool
    {
        if (self::checkProcent($egczhuman)) {
            return true;
        }
        return false;
    }

    private static function valdiateEgzCzMatma(string $egzczmatma): bool
    {
        if (self::checkProcent($egzczmatma)) {
            return true;
        }
        return false;
    }

    private static function valdiateEgzCzObcy(string $egzczobcy): bool
    {
        if (self::checkProcent($egzczobcy)) {
            return true;
        }
        return false;
    }

    private static function validatePolski(string $data): bool
    {
        if (self::checkOcena($data)) {
            return true;
        }
        return false;
    }

    private static function validateObcy(string $data): bool
    {
        if (self::checkOcena($data)) {
            return true;
        }
        return false;
    }

    private static function validateHistoria(string $data): bool
    {
        if (self::checkOcena($data)) {
            return true;
        }
        return false;
    }

    private static function validateWos(string $data): bool
    {
        if (self::checkOcena($data)) {
            return true;
        }
        return false;
    }

    private static function validateGeografia(string $data): bool
    {
        if (self::checkOcena($data)) {
            return true;
        }
        return false;
    }

    private static function validateChemia(string $data): bool
    {
        if (self::checkOcena($data)) {
            return true;
        }
        return false;
    }

    private static function validateBiologia(string $data): bool
    {
        if (self::checkOcena($data)) {
            return true;
        }
        return false;
    }

    private static function validateMatematyka(string $data): bool
    {
        if (self::checkOcena($data)) {
            return true;
        }
        return false;
    }

    private static function validateInformatyka(string $data): bool
    {
        if (self::checkOcena($data)) {
            return true;
        }
        return false;
    }

    private static function validateOsiagniecia(string $data): bool
    {
        if (!($data >= 0 && $data <= 18 && is_numeric($data))) {
            return false;
        }
        return true;
    }

    private static function checkProcent(string $data): bool
    {
        $data = floatval($data);
        
        if (is_numeric($data) && $data >= 0.00 && $data <= 100.00) 
        {
            return true;
        } else {
            return false;
        }
    }

    private static function checkOcena(string $data): bool
    {
        if (!($data >= 2 && $data <= 6 && is_numeric($data))) {
            return false;
        }
        return true;
    }

    private static function validateField(string $field, string $value): bool
    {
        switch ($field) {
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
