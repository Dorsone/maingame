$(document).ready(function () {
    svg4everybody();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // === header search ===
    $('.header-search').on('click', function () {
        $('.search').fadeIn('fast').css('display', 'flex');
    })
    $('.search-close').on('click', function () {
        $('.search').fadeOut('fast');
    })


    // === home main slider
    if ($('.home-main__slider').length) {
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
    if ($('.category-slider').length) {
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
    $('.item-block__save').on('click', function () {
        $(this).parents('.item-block').toggleClass('saved');
    })
    $('.news-article__actions .save').on('click', function () {
        $(this).parents('.news-article').toggleClass('saved');
    })

    // === current tag ===
    $('.tag').on('click', function () {
        $(this).toggleClass('current');
        getArticles()
    });
    $('.tag-remove').on('click', function () {
        $('.tag').removeClass('current')
        getArticles()
    })

    // === show tags ===
    $(function () {
        let tag = $('.tag');
        $('.tag-more').on('click', function () {
            tag.show();
            $(this).hide();
        });
        if (tag.length < 14) {
            $('.tag-more').hide();
        } else {
            let tag_hide = tag.length - 13;
            $('.tag-more span').text(tag_hide);

        }
    })

    // === show sort ===
    $('.sort-selected, .sort-arrow').on('click', function (e) {
        $("html").one("click", function () {
            $(".sort").removeClass("show")
        });
        $(this).parents('.sort').toggleClass('show');
        e.stopPropagation()
    });
    $('.sort-list span').on('click', function () {
        let _this = $(this);
        let sortSelected = $('.sort-selected');

        sortSelected.text(_this.text());
        sortSelected.attr('data-col', _this.attr('data-col'));
        sortSelected.attr('data-sort', _this.attr('data-sort'));
        $('.sort').removeClass('show')
        getArticles()
    })

    // === link more ===
    $('.js-link-more').on('click', function () {
        let _this = $(this);
        let url = _this.attr('data-url');
        getArticles(url, false)
    });

    // === send form ===
    $('.js-send-form').on('submit', function (e) {
        e.preventDefault();

        let form = $(this)
        let url = form.attr('action')
        let successMessageBlock = form.attr('data-success-block')

        $.ajax({
            url: url,
            data: form.serialize(),
            type: form.attr('method'),
            dataType: "json",
            beforeSend: function () {
                if (typeof successMessageBlock !== 'undefined') {
                    $('.' + successMessageBlock).hide();
                }
            },
            complete: function () {

            },
            error: function (jqXHR, exception) {
                console.log(jqXHR, exception)
            },
            success: function (response) {
                if (typeof successMessageBlock !== 'undefined') {
                    $('.' + successMessageBlock).show();
                }

                form.trigger("reset");
            }
        });
    });
});

function getArticles(url = null, replace = true) {

    let content = $('section .container')
    let tagsList = $('.js-tag-item.current');
    let tags = [];
    let sort = {};

    if (url === null) {
        url = document.location.href;
    }

    if (tagsList.length > 0) {
        tagsList.each(function (key, item) {
            tags.push($(item).attr('data-tag'));
        })
    }

    let sortSelected = $('.sort-selected');
    sort.col = sortSelected.attr('data-col');
    sort.order = sortSelected.attr('data-sort');

    $.ajax({
        url: url,
        data: {
            tags: tags,
            sort: sort,
        },
        dataType: "html",
        beforeSend: function () {

        },
        complete: function () {

        },
        success: function (response) {
            let html = $(response);
            let list = html.find('a.item-block');
            let paginate = html.find('.js-link-more').attr('data-url')

            content.find('.js-link-more').attr('data-url', paginate);
            if (replace) {
                content.find('.js-articles-wrap').html(list);
            } else {
                content.find('.js-articles-wrap').append(list);
            }
        }
    });
}

