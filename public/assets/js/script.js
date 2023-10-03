$(window).on("scroll", function() {
    if ($(".navbar").offset().top > 40) {
        $(".navbar").addClass("navbar-fixed");
        $(".go-top").show();
    } else {
        $(".navbar").removeClass("navbar-fixed");
        $(".go-top").hide();
    }
});

