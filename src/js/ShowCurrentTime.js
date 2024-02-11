$(document).ready(function(){
    function showCurrentTime(){
        var date = new Date();

        var hours = date.getHours();
        var minutes = date.getMinutes();

        hours = (hours < 10) ? "0" + hours : hours;
        minutes = (minutes < 10) ? "0" + minutes : minutes;

        $("#h1-id-zegar").text(hours + ":" + minutes);
    }

    showCurrentTime();

    setInterval(showCurrentTime, 1000);
});