
$(document).ready(function () {
    $("#item1").click(function () {
        // $('#bid').removeClass('active');
        // $('#transaction').addClass('active');
        $(".item1").show();
        $(".item2").hide();
        $(".item3").hide();
    });

    $("#item2").click(function () {
        // $('#bid').removeClass('active');
        // $('#transaction').addClass('active');
        $(".item2").show();
        $(".item1").hide();
        $(".item3").hide();
    });

    $("#item3").click(function () {
        // $('#bid').removeClass('active');
        // $('#transaction').addClass('active');
        $(".item3").show();
        $(".item1").hide();
        $(".item2").hide();
    });
});