
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