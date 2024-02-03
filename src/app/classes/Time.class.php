<?php
class Time{
    public static function currentYear(){
        date_default_timezone_set('Europe/Warsaw');
        $date = date('Y');
        return $date;
    }

    public static function currentTime(){
        date_default_timezone_set('Europe/Warsaw');
        $date = date('h:i', time());
        return $date;
    }
}
?>