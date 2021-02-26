
$(document).ready(function () {
    $("#bid").click(function () {
        $('#transaction').removeClass('active');
        $('#bid').addClass('active');
        $(".transaction").hide();
        $(".bid").show();
    });
    
    $("#transaction").click(function () {
        $('#bid').removeClass('active');
        $('#transaction').addClass('active');
        $(".bid").hide();
        $(".transaction").show();
    });
});