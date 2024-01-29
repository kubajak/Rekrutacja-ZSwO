<?php
class Time{
    public function currentYear(){
        $date = gmdate('Y', time());
        return $date;
    }

    public function currentTime(){
        $date = gmdate('h:i', time());
        return $date;
    }
}
?>