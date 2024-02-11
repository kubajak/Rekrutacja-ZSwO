$(document).ready(function(){
    function showCurrentYear(){
        var date = new Date();

        var currentYear = date.getFullYear();
        $("#span_footer").text("© J.K.K.J - " + currentYear);
    }

    showCurrentYear();

    setInterval(displayCurrentTime, 1000);
});