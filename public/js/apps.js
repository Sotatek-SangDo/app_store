$(function() {

    $("#flexiselDemo1").flexisel({
        visibleItems: 5,
        animationSpeed: 1000,
        autoPlay: false,
        autoPlaySpeed: 3000,
        pauseOnHover:true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2
            },
            tablet: {
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $("#flexiselDemo2").flexisel({
        visibleItems: 5,
        animationSpeed: 1000,
        autoPlay: false,
        autoPlaySpeed: 3000,
        pauseOnHover:true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2
            },
            tablet: {
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $(".tab-silder").click(function(e) {
        e.preventDefault();
        var dataClass = $(this).data('class');
        $(".tab-silder").removeClass('active-links');
        $(this).addClass("active-links");
        $(".tabsSlider").each(function() {
            if($(this).data('class') == dataClass) {
                $(this).addClass("active-tabs");
            } else {
                $(this).removeClass("active-tabs");
            }
        });
    });

    $('.product__item').hover(function() {
        $(this).toggleClass('hover');
    });
    $('.nbs-flexisel-item').hover(function() {
        $(this).toggleClass('hover');
    });
});