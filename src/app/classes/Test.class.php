<?php
class Test{
    public static function test1($form_data){
        if(!in_array(false, Validator::validate($form_data), true)) {
            echo "True";
            echo var_export(Validator::validate($form_data));
        } else {
            echo "False";
            echo var_export(Validator::validate($form_data));
        }
    }
}
?>