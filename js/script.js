$('.slider-item').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    responsive:[
        {
            breakpoint: 991.5,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 575.5,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

// mobile-menu

$(function() {
    var $menu_popup = $('.menu-popup');

    $(".burger-menu").click(function(){
        $('body').addClass('body_pointer');
        $('body,html').addClass('active');
        $menu_popup.show(0);
        $menu_popup.animate(
            {right: parseInt($menu_popup.css('left'),10) == 0 ? -$menu_popup.outerWidth() : 0},
            300
        );
        return false;
    });

    $(".menu-close").click(function(){
        $('body').removeClass('body_pointer');
        $('body,html').removeClass('active');
        $menu_popup.animate(
            {right: parseInt($menu_popup.css('right'),10) == 0 ? -$menu_popup.outerWidth() : 0},
            300,
            function(){
                $menu_popup.hide(0);
            }
        );
        return false;
    });

    $('#burger-menu a').on('click', function () {
        $(".menu-close").trigger('click');
    });

    $(document).on('click', function(e){
        if (!$(e.target).closest('.menu-popup').length){
            $('body').removeClass('body_pointer');
            $menu_popup.animate(
                {right: parseInt($menu_popup.css('right'),10) == 0 ? -$menu_popup.outerWidth() : 0},
                300,
                function(){
                    $menu_popup.hide(0);
                }
            );
        }
    });
});

//menu




// button

$(".button").on("click",function () {
    let name = $(this).data('title');
    $('#value').val(name);
})




