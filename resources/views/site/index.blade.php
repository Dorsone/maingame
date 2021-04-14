@extends('site.layout')
@section('content')
    <section class="home-main">
        <div class="home-main__slider">
            <div class="swiper-container home-main__main">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="home-main__main__img">
                            <img src="/build/images/home1.jpg" alt=""/>
                        </div>
                        <div class="title title-h1"> Заголовок баннера</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="home-main__main__img">
                            <img src="/build//images/home2.jpg" alt=""/>
                        </div>
                        <div class="title title-h1"> В ожидании финала зимней лиги DPC 2021</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="home-main__main__img">
                            <img src="/build/images/home1.jpg" alt=""/>
                        </div>
                        <div class="title title-h1"> Заголовок баннера</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="home-main__main__img">
                            <img src="/build/images/home2.jpg" alt=""/>
                        </div>
                        <div class="title title-h1"> В ожидании финала зимней лиги DPC 2021</div>
                    </div>
                </div>
            </div>
            <div class="swiper-container home-main__small">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="home-main__small__img img-sm"><img src="/build/images/home1.jpg" alt=""/>
                        </div>
                        <svg class="circle-svg" width="72" height="72" viewBox="0 0 67 67" preserveAspectRatio="xMidYMin meet">
                            <circle class="path" cx="33" cy="33" r="31" stroke="#3BE6EF" stroke-width="5px" stroke-dasharray="195 195" stroke-linecap="round"></circle>
                        </svg>
                        <div class="title title-h4"> Заголовок баннера</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="home-main__small__img img-sm"><img src="/build/images/home2.jpg" alt=""/>
                        </div>
                        <svg class="circle-svg" width="72" height="72" viewBox="0 0 67 67" preserveAspectRatio="xMidYMin meet">
                            <circle class="path" cx="33" cy="33" r="31" stroke="#3BE6EF" stroke-width="5px" stroke-dasharray="195 195" stroke-linecap="round"></circle>
                        </svg>
                        <div class="title title-h4"> В ожидании финала зимней лиги DPC 2021</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="home-main__small__img img-sm"><img src="/build/images/home1.jpg" alt=""/>
                        </div>
                        <svg class="circle-svg" width="72" height="72" viewBox="0 0 67 67" preserveAspectRatio="xMidYMin meet">
                            <circle class="path" cx="33" cy="33" r="31" stroke="#3BE6EF" stroke-width="5px" stroke-dasharray="195 195" stroke-linecap="round"></circle>
                        </svg>
                        <div class="title title-h4"> Заголовок баннера</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="home-main__small__img img-sm"><img src="/build/images/home2.jpg" alt=""/>
                        </div>
                        <svg class="circle-svg" width="72" height="72" viewBox="0 0 67 67" preserveAspectRatio="xMidYMin meet">
                            <circle class="path" cx="33" cy="33" r="31" stroke="#3BE6EF" stroke-width="5px" stroke-dasharray="195 195" stroke-linecap="round"></circle>
                        </svg>
                        <div class="title title-h4"> В ожидании финала зимней лиги DPC 2021</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-main__form">
            <div class="title title-h1"> Подпишись на обновления</div>
            <div class="sentence">Никакого спама! Только интересные новости по твоим предпочтениям</div>
            <form class="form form-line" action="">
                <input type="email" placeholder="Почта"/>
                <button>
                    <svg class="icon icon-send ">
                        <use xlink:href="/build/images/sprite-inline.svg#send"></use>
                    </svg>
                </button>
            </form>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="title-line">
                <div class="title title-h2"> Категории</div>
                <a class="link-arrow" href="javascript:void(0)"><span>Смотреть все</span>
                    <svg class="icon icon-arrow ">
                        <use xlink:href="/build/images/sprite-inline.svg#arrow"></use>
                    </svg>
                </a>
            </div>
        </div>
        <div class="category-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper"><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ1.jpg" alt=""/>
                        </div>
                        <div class="sentence">CS:go</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ2.jpg" alt=""/>
                        </div>
                        <div class="sentence">Dota</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ3.jpg" alt=""/>
                        </div>
                        <div class="sentence">Видеоконтент</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ4.jpg" alt=""/>
                        </div>
                        <div class="sentence">Соревнования</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ5.jpg" alt=""/>
                        </div>
                        <div class="sentence">Стримы</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ6.jpg" alt=""/>
                        </div>
                        <div class="sentence">Категория</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ1.jpg" alt=""/>
                        </div>
                        <div class="sentence">CS:go</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ2.jpg" alt=""/>
                        </div>
                        <div class="sentence">Dota</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ3.jpg" alt=""/>
                        </div>
                        <div class="sentence">Видеоконтент</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ4.jpg" alt=""/>
                        </div>
                        <div class="sentence">Соревнования</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ5.jpg" alt=""/>
                        </div>
                        <div class="sentence">Стримы</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ6.jpg" alt=""/>
                        </div>
                        <div class="sentence">Категория</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ1.jpg" alt=""/>
                        </div>
                        <div class="sentence">CS:go</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ2.jpg" alt=""/>
                        </div>
                        <div class="sentence">Dota</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ3.jpg" alt=""/>
                        </div>
                        <div class="sentence">Видеоконтент</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ4.jpg" alt=""/>
                        </div>
                        <div class="sentence">Соревнования</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ5.jpg" alt=""/>
                        </div>
                        <div class="sentence">Стримы</div>
                    </a><a class="swiper-slide category-slider__item" href="javascript:void(0)">
                        <div class="img-sm"><img src="/build/images/categ6.jpg" alt=""/>
                        </div>
                        <div class="sentence">Категория</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="title-line">
                <div class="title title-h1"> Последние новости киберспорта</div>
            </div>
            <div class="news-all"><a class="item-block" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/news-one.jpg" alt=""/>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем имена и
                            посев лишь четырех! Еще десять мест (четыре путевки от Китая мы пока не учитываем) будут разыгрываться в этот уикенд!
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a><a class="item-block" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/news-one.jpg" alt=""/>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем имена и
                            посев лишь четырех! Еще десять мест (четыре путевки от Китая мы пока не учитываем) будут разыгрываться в этот уикенд!
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a><a class="item-block" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/news-one.jpg" alt=""/>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем имена и
                            посев лишь четырех! Еще десять мест (четыре путевки от Китая мы пока не учитываем) будут разыгрываться в этот уикенд!
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a><a class="item-block" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/news-one.jpg" alt=""/>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем имена и
                            посев лишь четырех! Еще десять мест (четыре путевки от Китая мы пока не учитываем) будут разыгрываться в этот уикенд!
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="title-line title-line__center">
                <div class="img-sm"><img src="/build/images/categ1.jpg" alt=""/>
                </div>
                <div class="title title-h2"> CS:go</div>
                <a class="link-arrow" href="javascript:void(0)"><span>Больше в категории</span>
                    <svg class="icon icon-arrow ">
                        <use xlink:href="/build/images/sprite-inline.svg#arrow"></use>
                    </svg>
                </a>
            </div>
            <div class="col-three col-three__scroll"><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/item-home.jpg" alt=""/>
                        <div class="item-block__marks">
                            <div class="mark mark__orange">Dota</div>
                            <div class="mark mark__velvet">Видеоконтент</div>
                        </div>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем ...
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/item-home.jpg" alt=""/>
                        <div class="item-block__marks">
                            <div class="mark mark__orange">Dota</div>
                            <div class="mark mark__velvet">Видеоконтент</div>
                        </div>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем ...
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/item-home.jpg" alt=""/>
                        <div class="item-block__marks">
                            <div class="mark mark__orange">Dota</div>
                            <div class="mark mark__velvet">Видеоконтент</div>
                        </div>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем ...
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="banner">
                <div class="banner__bg"><img src="/build/images/banner1.jpg" alt=""/>
                </div>
                <div class="banner__desc">
                    <div class="title-line">
                        <div class="title title-h1"> Стань студентом самой нескучной академии</div>
                    </div>
                    <div class="sentence">Регистрация займет всего 2 минуты, а еще текст</div>
                </div>
                <a class="link-blue link-default" href="javascript:void(0)">Зарегистрироваться</a>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="title-line title-line__center">
                <div class="img-sm"><img src="/build/images/categ2.jpg" alt=""/>
                </div>
                <div class="title title-h2"> Dota</div>
                <a class="link-arrow" href="javascript:void(0)"><span>Больше в категории</span>
                    <svg class="icon icon-arrow ">
                        <use xlink:href="/build/images/sprite-inline.svg#arrow"></use>
                    </svg>
                </a>
            </div>
            <div class="col-three col-three__scroll"><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/item-home.jpg" alt=""/>
                        <div class="item-block__marks">
                            <div class="mark mark__blue">Cs:go</div>
                            <div class="mark mark__green">Соревнования</div>
                        </div>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем ...
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/item-home.jpg" alt=""/>
                        <div class="item-block__marks">
                            <div class="mark mark__blue">Cs:go</div>
                            <div class="mark mark__green">Соревнования</div>
                        </div>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем ...
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/item-home.jpg" alt=""/>
                        <div class="item-block__marks">
                            <div class="mark mark__blue">Cs:go</div>
                            <div class="mark mark__green">Соревнования</div>
                        </div>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем ...
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="title-line title-line__center">
                <div class="img-sm"><img src="/build/images/categ3.jpg" alt=""/>
                </div>
                <div class="title title-h2"> Видеоконтент</div>
                <a class="link-arrow" href="javascript:void(0)"><span>Больше в категории</span>
                    <svg class="icon icon-arrow ">
                        <use xlink:href="/build/images/sprite-inline.svg#arrow"></use>
                    </svg>
                </a>
            </div>
            <div class="col-three col-three__scroll"><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/item-home.jpg" alt=""/>
                        <div class="item-block__marks">
                            <div class="mark mark__red">Категория</div>
                            <div class="mark mark__green">Соревнования</div>
                        </div>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем ...
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/item-home.jpg" alt=""/>
                        <div class="item-block__marks">
                            <div class="mark mark__red">Категория</div>
                            <div class="mark mark__green">Соревнования</div>
                        </div>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем ...
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <div class="item-block__pic"><img src="/build/images/item-home.jpg" alt=""/>
                        <div class="item-block__marks">
                            <div class="mark mark__red">Категория</div>
                            <div class="mark mark__green">Соревнования</div>
                        </div>
                    </div>
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__text">До конца зимней лиги DPC 2021 в пяти регионах осталось всего лишь три дня, а из 18 участников Singapore Major мы знаем ...
                        </div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="banner">
                <div class="banner__bg"><img src="/build/images/banner2.jpg" alt=""/>
                </div>
                <div class="banner__desc">
                    <div class="title-line">
                        <div class="title title-h1"> Принимай участие в Турнирах</div>
                    </div>
                    <div class="sentence">Регистрация займет всего 2 минуты, а еще текст</div>
                </div>
                <a class="link-velvet link-default" href="javascript:void(0)">Зарегистрироваться</a>
            </div>
        </div>
    </section>
@endsection
