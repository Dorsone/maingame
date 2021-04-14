$(document).ready(function () {
    svg4everybody();

    // === header search ===
    $('.header-search').on('click', function (){
        $('.search').fadeIn('fast').css('display','flex');
    })
    $('.search-close').on('click', function (){
        $('.search').fadeOut('fast');
    })


    // === home main slider
    if($('.home-main__slider').length){
        let el = $('.home-main__small .swiper-slide:first-child');
        $('.home-main__small .swiper-wrapper').append(el);

        var homeSmall = new Swiper('.home-main__small', {
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            speed: 500,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            effect: 'fade',
            allowTouchMove: false
        });
        var homeMain = new Swiper('.home-main__main', {
            speed: 500,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            effect: 'fade',
            slidesPerView: 1,
            thumbs: {
                swiper: homeSmall,
            },
        });
    }

    // === category slider
    if($('.category-slider').length){
        let categorySlider = new Swiper('.category-slider .swiper-container', {
            speed: 500,
            slidesPerView: 'auto',
            spaceBetween: 15,
            freeMode: true,
            allowTouchMove: true,
            breakpoints: {
                800: {
                    spaceBetween: 32
                }
            }
        });
    }

    // === save news ===
    $('.item-block__save').on('click', function (){
        $(this).parents('.item-block').toggleClass('saved');
    })
    $('.news-article__actions .save').on('click', function (){
        $(this).parents('.news-article').toggleClass('saved');
    })

    // === current tag ===
    $('.tag').on('click', function (){
        $(this).toggleClass('current');
    });
    $('.tag-remove').on('click', function (){
        $('.tag').removeClass('current')
    })

    // === show tags ===
    $(function (){
        let tag = $('.tag');
        $('.tag-more').on('click', function (){
            tag.show();
            $(this).hide();
        });
        if(tag.length < 14){
            $('.tag-more').hide();
        } else {
            let tag_hide = tag.length - 13;
            $('.tag-more span').text(tag_hide);

        }
    })

    // === show sort ===
    $('.sort-selected, .sort-arrow').on('click', function (e){
        $("html").one("click", function() {
            $(".sort").removeClass("show")
        });
       $(this).parents('.sort').toggleClass('show');
        e.stopPropagation()
    });
    $('.sort-list span').on('click', function (){
        $('.sort-selected').text($(this).text())
        $('.sort').removeClass('show')
    })

});

