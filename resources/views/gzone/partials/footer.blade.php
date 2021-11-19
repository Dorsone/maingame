<footer class="footer">
    <aside class="section-aside">
        <div class="section-aside__social-feed"><img src="./images/social-feed.jpg" alt=""/><img
                src="./images/social-feed.jpg" alt=""/>
        </div>
    </aside>
    <div class="container-sides-lg">
        <div class="footer__content">
            <div class="content-left">
                <div class="footer__main"><span class="tag">Social</span>
                    <h2 class="title-h2">Присоединяйся к нашим комьюнити </h2>
                    <p>Получай +100 к знаниям, поддержке и победам.</p>
                    <div class="footer__subscribe subscribe">
                        <p>Подписывайся</p>
                        <form  method="post"
                               data-success-block="footer-subscribe-done"
                               class="subscribe-form"
                               action="{{ route('site.subscribe') }}">
                            @csrf
                            <div class="subscribe-form__email">
                                <label for="subscribe-email">Email</label>
                                <input name="mail" type="email" id="subscribe-email" placeholder="Hideo_Kojima@mail.com"/>
                            </div>
                            <div class="subscribe-form__agree">
                                <input type="checkbox" id="subscribe-checkbox"/>
                                <label for="subscribe-checkbox">Разрешаю обработку моих личных данных</label>
                            </div>
                            <button class="subscribe-form__submit">Подписаться</button>
                        </form>
                    </div>
                </div>
                <div class="footer__bottom">
                    <p class="footer__address">1013 Centre RD STE 403B, г. Вильмингтон, штат Делавер, США</p>
                    <p class="footer__copyright">© 2011 - 2021 Maingame Все права защищены</p>
                </div>
            </div>
            <div class="content-right">
                <ul class="social-list">
                    <li><a class="social-list__link" href="javascript:void(0)">
                            <div class="social-list__icon"><img src="./images/facebook-original.svg" alt=""/>
                            </div>
                            <div class="social-list__desc">
                                <p class="social-list__title">Facebook</p>
                                <p>Главные новости мира гейминга</p>
                            </div>
                        </a></li>
                    <li><a class="social-list__link" href="javascript:void(0)">
                            <div class="social-list__icon"><img src="./images/twitter-original.svg" alt=""/>
                            </div>
                            <div class="social-list__desc">
                                <p class="social-list__title">Twitter</p>
                                <p>Когда нет времени читать много</p>
                            </div>
                        </a></li>
                    <li><a class="social-list__link" href="javascript:void(0)">
                            <div class="social-list__icon"><img src="./images/telegram.svg" alt=""/>
                            </div>
                            <div class="social-list__desc">
                                <p class="social-list__title">Telegram</p>
                                <p>Всё по теме в одном канале</p>
                            </div>
                        </a></li>
                    <li><a class="social-list__link" href="javascript:void(0)">
                            <div class="social-list__icon"><img src="./images/instagram.svg" alt=""/>
                            </div>
                            <div class="social-list__desc">
                                <p class="social-list__title">Instagram</p>
                                <p>Показываем всё, что обычно скрыто</p>
                            </div>
                        </a></li>
                    <li><a class="social-list__link" href="javascript:void(0)">
                            <div class="social-list__icon"><img src="./images/zenhub.svg" alt=""/>
                            </div>
                            <div class="social-list__desc">
                                <p class="social-list__title">Zen</p>
                                <p>Лучшие статьи редакции</p>
                            </div>
                        </a></li>
                    <li><a class="social-list__link" href="javascript:void(0)">
                            <div class="social-list__icon"><img src="./images/discord-original.svg" alt=""/>
                            </div>
                            <div class="social-list__desc">
                                <p class="social-list__title">Discord</p>
                                <p>Общаемся про киберспорт и не только</p>
                            </div>
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
