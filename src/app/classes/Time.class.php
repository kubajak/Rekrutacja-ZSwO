<?php
class Time{
    public function currentYear(){
        date_default_timezone_set('Europe/Warsaw');
        $date = date('Y', time());
        return $date;
    }

    public function currentTime(){
        date_default_timezone_set('Europe/Warsaw');
        $date = date('h:i', time());
        return $date;
    }
}
?>