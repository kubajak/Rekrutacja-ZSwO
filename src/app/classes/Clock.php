<?php
class Clock{
    public function clock(){
        date_default_timezone_set('Europe/Warsaw');
        $current_time = date("H:i");
        return $current_time;
    }
}
?>