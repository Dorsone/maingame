"use strict";$(document).ready(function(){svg4everybody();var e=new Swiper(".main-page-slider .swiper-container",{speed:500,slidesPerView:1,loop:!0,allowTouchMove:!1,autoplay:{delay:5e3,disableOnInteraction:!1},navigation:{nextEl:".pagination-wrapper .swiper-button-next",prevEl:".pagination-wrapper .swiper-button-prev"},pagination:{el:".pagination-wrapper .swiper-pagination",clickable:!0,type:"bullets"}}),t=new Swiper(".news-slider.swiper-container",{speed:500,slidesPerView:1,loop:!0,allowTouchMove:!1,navigation:{nextEl:".news-slider .swiper-button-next",prevEl:".news-slider .swiper-button-prev"},pagination:{el:".news-slider .swiper-pagination",clickable:!0,type:"bullets"}}),s=window.matchMedia("(min-width: 1250px)").matches,n=document.querySelector(".page-slider"),i=document.querySelector(".page-slider__wrapper"),o=document.querySelectorAll(".screen"),l=!1,a=!1;function c(t){n.classList[t]("swiper-container"),i.classList[t]("swiper-wrapper"),o.forEach(function(e){e.classList[t]("swiper-slide")})}function r(){s?l||(l=!0,a=new Swiper(".page-slider",{direction:"vertical",slidesPerView:1,mousewheel:!0,speed:700,simulateTouch:!1,pagination:{el:".page-numbering",type:"fraction",formatFractionCurrent:function(e){return("0"+e).slice(-2)},formatFractionTotal:function(e){return("0"+e).slice(-2)},renderFraction:function(e,t){return'<div class="top-line"><div class="number-line"></div><span class="number '+e+'"></span></div><div class="bottom-line"><div class="number-line"></div><span class="number '+t+'"></span></div>'}},on:{beforeInit:c("add")}})):(a&&(a.destroy(),l=!1),c("remove"))}var d,u=!1;function h(){s?u&&(e.allowTouchMove=!1,t.allowTouchMove=!1,u=!1):u||(u=!0,e.allowTouchMove=!0,t.allowTouchMove=!0)}function p(){d=d||setTimeout(function(){d=null,s=window.matchMedia("(min-width: 1250px)").matches,r(),h()},66)}document.querySelector(".homepage")&&(n&&r(),h(),window.addEventListener("resize",p,!1)),$(".bookmark").on("click",function(){$(this).toggleClass("add")}),$(".burger").on("click",function(){$(".header").toggleClass("open"),$("body").toggleClass("stop-scroll"),$(".popup__searching").removeClass("open")}),$(window).scroll(function(){var e,t,s,n;$(".footer").length&&(e=$(".footer"),t=e.offset().top,s=t+e.outerHeight(),n=$(window).scrollTop(),e=n+$(window).height(),n<s&&t<e&&!$(".tournaments-submenu-block").hasClass(".hide")?$(".tournaments-submenu-block").addClass("hide"):$(".tournaments-submenu-block").removeClass("hide"))}),window.matchMedia("(max-width: 767.9px)").matches&&$(".footer")&&$(".footer .content-right").append($(".footer__bottom"));var _=!1;$(window).resize(function(){window.matchMedia("(max-width: 767.9px)").matches&&!_&&($(".footer .content-right").append($(".footer__bottom")),_=!0),window.matchMedia("(min-width: 768px)").matches&&_&&($(".footer .content-left").append($(".footer__bottom")),_=!1)}),$(".select-block__btn").on("click",function(e){$("html").one("click",function(){$(".select-block__btn").removeClass("open"),$(".select-block__list").removeClass("open")}),$(".select-block__btn").not(this).removeClass("open"),$(".select-block__list").removeClass("open"),$(this).hasClass("open")?($(this).removeClass("open"),$(this).siblings(".select-block__list").removeClass("open")):($(this).addClass("open"),$(this).siblings(".select-block__list").addClass("open")),e.stopPropagation()}),$(".select-block__list li").on("click",function(){$(this).siblings().removeClass("active"),$(this).addClass("active"),$(this).parent(".select-block__list").siblings(".select-block__btn").children("span").text($(this).children("span").text()),$(this).parent(".select-block__list").removeClass("open"),$(this).parent(".select-block__list").siblings(".select-block__btn").removeClass("open")}),$(function(){var s,e=$(".tabs-menu .tabs-menu-item");e.on("click",function(){s=$(this).index();var e=$(this),t=e.parents(".tabs");e.is("current")||(e.siblings().removeClass("current"),t.find(".tabs-content > li").removeClass("current"),e.addClass("current"),t.find(".tabs-content").children("li:eq("+s+")").addClass("current"))})});var m=$(".tournaments-seo__text"),g=m.height();$(".tournaments-seo__btn").on("click",function(){m.stop(),m.hasClass("open")?($(this).removeClass("open"),m.removeClass("open").animate({height:g},500)):($(this).addClass("open"),m.addClass("open").animate({height:m.get(0).scrollHeight},700,function(){$(this).height("auto")}))}),$('[data-action="see-password"]').on("click",function(){var e="."+$(this).attr("data-toggle");"password"==$(this).siblings(e).attr("type")?($(this).addClass("eye-close"),$(this).siblings(e).attr("type","text")):($(this).removeClass("eye-close"),$(this).siblings(e).attr("type","password")),$(this).siblings(e).focus()}),$(".header__user-profile").on("click",function(e){$(".header__user-menu").toggleClass("open"),$(".popup__searching").removeClass("open"),e.stopPropagation()}),$(".header__user-menu").on("click",function(e){e.stopPropagation()}),$(".header__user-profile").length&&$("html").on("click",function(){$(".header__user-menu").removeClass("open")});var b=document.querySelector(".full-screen-btn"),v=document.querySelector(".fullscreen-off-btn"),w=document.querySelector(".standings__body");b&&b.addEventListener("click",function(){var e;(e=w).requestFullscreen?e.requestFullscreen():e.mozRequestFullScreen?e.mozRequestFullScreen():e.webkitRequestFullscreen?e.webkitRequestFullscreen():e.msRequestFullscreen&&e.msRequestFullscreen()}),v&&v.addEventListener("click",function(){document.exitFullscreen?document.exitFullscreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitExitFullscreen?document.webkitExitFullscreen():document.msExitFullscreen&&document.msExitFullscreen()}),$(".compact-view-btn").on("click",function(){$(".game-table").toggleClass("compact-view")}),$(".game-table__col").on("mouseover",function(){var e=$(this).index();$(this).addClass("highlighted"),$(".standings__top-labels").children(".standings__label-item:eq("+e+")").addClass("highlighted")}),$(".game-table__col").on("mouseout",function(){var e=$(this).index();$(this).removeClass("highlighted"),$(".standings__top-labels").children(".standings__label-item:eq("+e+")").removeClass("highlighted")}),$(".standings__label-item").on("mouseover",function(){var e=$(this).index();$(this).addClass("highlighted"),$(".standings__game-table").children(".game-table__col:eq("+e+")").addClass("highlighted")}),$(".standings__label-item").on("mouseout",function(){var e=$(this).index();$(this).removeClass("highlighted"),$(".standings__game-table").children(".game-table__col:eq("+e+")").removeClass("highlighted")}),$(".show-standings-btn").on("click",function(){var e=$(".standings").offset().top;$("body,html").animate({scrollTop:e},700)}),$(".standings__body").overlayScrollbars({className:"os-theme-light",scrollbars:{visibility:"visible",clickScrolling:!0}}),$(".calendar").datepicker({dateFormat:"dd.mm.yy",changeYear:!0,changeMonth:!0,showOtherMonths:!0,yearRange:"c-120:c+10",firstDay:1}),$.datepicker.setDefaults($.datepicker.regional.ru),$(".__select__title").on("click",function(e){$("html").one("click",function(){$(".__select").attr("data-state","")}),$(".__select").not($(this).parent(".__select")).attr("data-state",""),"active"===$(this).parent(".__select").attr("data-state")?$(this).parent(".__select").attr("data-state",""):$(this).parent(".__select").attr("data-state","active"),e.stopPropagation()}),$(".__select__label").on("click",function(){$(this).parent(".__select__content").siblings(".__select__title").text($(this).text()),$(this).parents(".__select").attr("data-state","")}),$(".__select__title").each(function(){$(this).text($(this).siblings(".__select__content").children("input:checked + label").text())}),$(".header__search-btn").on("click",function(){$(".popup__searching").toggleClass("open")}),$(".searching__close-btn").on("click",function(){$(".popup__searching").removeClass("open")})});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
