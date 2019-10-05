$(document).ready(function(){


    $("#calculateButton").click(function(){
        var usd = $("#input_usd").val();
        var rate = 32.3;
        var thb = usd*rate;

        $("#myOutput").html(thb);
    });
});