@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
    <main class="article-page">
        <div class="container-sides-lg">
            <div class="back-link">
                <div class="line"></div><a href="javascript:void(0)">Вернуться</a>
            </div>
            <div class="container-sm">
                <div class="article-page-inner">
                    <div class="article__tags">
                        <div class="hashtags"><a href="javascript:void(0)">#WEPLAY! VIDEO</a><a href="javascript:void(0)">#DOTA 2</a></div>
                        <div class="article__action bookmark">
                            <svg class="icon icon-mark ">
                                <use xlink:href="./images/sprite-inline.svg#mark"></use>
                            </svg>
                        </div>
                    </div>
                    <h1 class="title-h2">Турнир для всех ко Дню святого Валентина: Gachi Sunday</h1>
                    <div class="article__info">
                        <div class="article__author">
                            <div class="article__author-img"><img src="./images/post-author-1.png" alt=""/>
                            </div><a class="article__author-name" href="javascript:void(0)">Андрей Ярец</a>
                        </div><span class="article__reading">Читать 1 мин</span>
                    </div>
                    <div class="article__img">
                        <div class="article__img-wrapper"><img src="./images/image-20.png" alt=""/>
                        </div>
                    </div>
                    <h2 class="title-h3">Ван Даркхолм будет ждать тебя в финале! (но это не точно)</h2>
                    <p>Ах, этот прекрасный День святого Валентина… В воздухе уже витает романтика. Пора выбираться в магазин за самыми вкусными конфетами и тренировать почерк, чтобы подписать валентинку для своей второй половинки. А потом вы возьметесь вместе за руки и будете встречать рассв.... [Вжжж, стоп, не то!]</p>
                    <p>Парень, ты серьезно собрался измазать свой комп конфетами? Валентинку он тоже не оценит. Если тебе вдруг не с кем встречать этот День всех влюбленных, можно провести его по-серьезному! Твоя истинная любовь — вот она, прямо в твоей комнате. Кого ты сейчас нежно поглаживаешь по скроллу? Чей тихий рокот доносится из под стола? Мы про вентиляторы твоего компа, если что. В общем, есть у нас к тебе одно деликатное предложение… </p>
                    <p>♂Из-за угла выглядывает какой-то мужик в кожаных трусах и начинает кричать♂: Юкихо! Рей! Чирно!♂</p>
                    <p>Возможно тебе покажется, что речь об аниме, но давай поговорим о киберспорте. С гордостью представляем тебе и твоему возлюбленному ПК новый турнир от WePlay Esports, который мы решили приурочить ко Дню святого Валентина — Gachi Sunday! Уже 14 февраля 2021 года ты вместе со своей второй половинкой можешь стать участником лютой зарубы за неплохой призовой фонд. Чувствуешь в себе силу и возможности для состязания? Тогда готовься звучно отшлепать противника и забрать призы за первое место! ♂Хоу ю лайк дат, а??♂</p>
                    <h2 class="title-h3">Формат и даты</h2>
                    <p>Состязание пройдет на турнирной платформе WePlay Esports. Дата проведения — 14 февраля 2021 года. Турнир состоится по двум дисциплинам: CS:GO и Dota 2.</p>
                    <h3 class="title-h4">WePlay Dota 2 дуэль Pudge #417 (EU)</h3>
                    <p>Формат турнира по CS:GO — 2vs2 (Ну а сколько еще может быть игроков в команде на турнире, который называется Gachi Sunday?).</p>
                    <h3 class="title-h4">Турнир пройдет в два этапа: </h3>
                    <p class="list-item-paragraph">4 квалификации в формате Single Elimination. Регистрация будет открыта с 9 по 14 февраля 2021 года.</p>
                    <p class="qualification-reg"><a href="javascript:void(0)">Ссылка на регистрацию на квалификацию № 1</a>, начало в 10.00;</p>
                    <p class="qualification-reg"><a href="javascript:void(0)">Ссылка на регистрацию на квалификацию № 1</a>, начало в 10.00;</p>
                    <p class="qualification-reg"><a href="javascript:void(0)">Ссылка на регистрацию на квалификацию № 1</a>, начало в 10.00;</p>
                    <p class="qualification-reg"><a href="javascript:void(0)">Ссылка на регистрацию на квалификацию № 1</a>, начало в 10.00;</p>
                    <p class="qualification-reg"><a href="javascript:void(0)">Ссылка на регистрацию на квалификацию № 1</a>, начало в 10.00;</p>
                    <h3 class="title-h4">Первое и второе место из каждой квалификации получает слот в плей-офф турнира и приятный бонус в виде крутых скинов!</h3>
                    <p class="list-item-paragraph">Плей-офф — Double Elimination, начало в 18.00. Формат игр — bo1. Финал — bo3</p>
                    <h2 class="title-h3">Призовой фонд Gachi Sunday</h2>
                    <p>В CS:GO претенденты разыграют призовой фонд в виде крутых скинов, суммарная стоимость которых достигает $300. ♂THREE HUNDRED BUCKS♂</p>
                    <p>Призовой фонд Gachi Sunday по Dota 2 — внутриигровые скины на $150;</p>
                    <div class="divider"></div>
                    <p>Новые скины хорошо согреют тебя в этот День святого Валентина и будут радовать глаз при каждом входе в любимую игру. Ну а после турнира ты усядешься смотреть фильм о крепкой мужской дружбе и вспоминать, как навалял врагам 14 февраля без всяких там валентинок. Да, и не забудь протереть свой ПК от пыли, он тоже тебя любит.</p>
                    <div class="subscribe-banner">
                        <div class="subscribe-banner__top">
                            <div class="subscribe-banner__desc">
                                <div class="subscribe-banner__caption"><span class="title-h3">Дайджест Maingame!</span></div>
                                <p class="subscribe-banner__text">Новости, лонгриды, мемасики – лучшее из мира киберспорта прямо у тебя в почте!</p>
                            </div>
                            <div class="subscribe-banner__icon">
                                <svg class="icon icon-maingame ">
                                    <use xlink:href="./images/sprite-inline.svg#maingame"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="subscribe-banner__form">
                            <form class="subscribe-form">
                                <label class="subscribe-form__email-label" for="subscribe-email-banner">Email</label>
                                <div class="subscribe-form__banner-field">
                                    <input class="subscribe-form__email-input" type="email" id="subscribe-email-banner" placeholder="Hideo_Kojima@mail.com"/>
                                    <button class="subscribe-form__submit">Подписаться</button>
                                </div>
                                <div class="subscribe-form__agree">
                                    <input type="checkbox" id="subscribe-checkbox-banner"/>
                                    <label for="subscribe-checkbox-banner">Разрешаю обработку моих личных данных</label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <aside class="section-aside">
                        <div class="section-aside__items">
                            <div class="section-aside__item">
                                <div class="news-info">
                                    <div class="news-info__bg-img"><img src="./images/news-banner-1.jpg" alt=""/>
                                    </div><a href="javascript:void(0)"> </a>
                                    <div class="news-info__main">
                                        <div class="news-info__top">
                                            <div class="hashtags"><a href="javascript:void(0)">#WEPLAY! VIDEO</a><a href="javascript:void(0)">#DOTA 2</a></div>
                                            <div class="news-info__action bookmark">
                                                <svg class="icon icon-mark ">
                                                    <use xlink:href="./images/sprite-inline.svg#mark"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="news-info__caption">ODPixel - Techies (feat. BSJ) (Official Video)</p>
                                        <div class="news-info__bottom"> <span class="news-info__date">30 апр. 2021</span><span class="news-info__reading">Читать 1 мин</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-aside__item">
                                <div class="news-info">
                                    <div class="news-info__bg-img"><img src="./images/news-banner-2.jpg" alt=""/>
                                    </div><a href="javascript:void(0)"> </a>
                                    <div class="news-info__main">
                                        <div class="news-info__top">
                                            <div class="hashtags"><a href="javascript:void(0)">#WEPLAY! VIDEO</a><a href="javascript:void(0)">#DOTA 2</a></div>
                                            <div class="news-info__action bookmark">
                                                <svg class="icon icon-mark ">
                                                    <use xlink:href="./images/sprite-inline.svg#mark"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="news-info__caption">ODPixel - Techies (feat. BSJ) (Official Video)</p>
                                        <div class="news-info__bottom"> <span class="news-info__date">30 апр. 2021</span><span class="news-info__reading">Читать 1 мин</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-aside__item">
                                <div class="news-info">
                                    <div class="news-info__bg-img"><img src="./images/news-banner-2.jpg" alt=""/>
                                    </div><a href="javascript:void(0)"> </a>
                                    <div class="news-info__main">
                                        <div class="news-info__top">
                                            <div class="hashtags"><a href="javascript:void(0)">#WEPLAY! VIDEO</a><a href="javascript:void(0)">#DOTA 2</a></div>
                                            <div class="news-info__action bookmark">
                                                <svg class="icon icon-mark ">
                                                    <use xlink:href="./images/sprite-inline.svg#mark"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="news-info__caption">ODPixel - Techies (feat. BSJ) (Official Video)</p>
                                        <div class="news-info__bottom"> <span class="news-info__date">30 апр. 2021</span><span class="news-info__reading">Читать 1 мин</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-aside__item section-aside__item_show-md">
                                <div class="news-info news-info_coming">
                                    <div class="hashtags"><a href="javascript:void(0)">#Next article</a></div>
                                    <p>Coming soon...</p>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <div class="social">
            <ul class="social__links">
                <li><a href="https://youtube.com">
                        <svg class="icon icon-youtube ">
                            <use xlink:href="./images/sprite-inline.svg#youtube"></use>
                        </svg></a></li>
                <li><a href="https://google.com">
                        <svg class="icon icon-google ">
                            <use xlink:href="./images/sprite-inline.svg#google"></use>
                        </svg></a></li>
                <li><a href="https://discord.com">
                        <svg class="icon icon-discord ">
                            <use xlink:href="./images/sprite-inline.svg#discord"></use>
                        </svg></a></li>
                <li><a href="https://facebook.com">
                        <svg class="icon icon-facebook ">
                            <use xlink:href="./images/sprite-inline.svg#facebook"></use>
                        </svg></a></li>
            </ul>
        </div>
    </main>
@endsection
