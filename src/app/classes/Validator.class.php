<?php
class Validator{
    public function validate(mixed $form_data){
        foreach($form_data as $key => $value){
            if($key !== 'drugie_imie' && empty($value)){
                return false;
            }
        }
        return true;
    }
}
?>