$(document).ready(function () {
    // === для этапа разработки (удалить перед деплоем)===

    var el = document.querySelector("body");
    var count = 0;

    function timer() {
        count++;
        if (count == 5) {
            goTo();
        }
    }

    function stop() {
        clearInterval(myVar);
        count = 0;
    }

    var myVar;
    el.addEventListener("touchstart", function () {
        myVar = setInterval(timer, 1000);

    }, false);
    el.addEventListener("touchend", function () {
        // alert(count);
        stop();
    }, false);

    function goTo() {
        window.location.href = "pages.html"
    }

    $('body').keydown(function (e) {
        if (e.ctrlKey && e.keyCode == 13) {
            e.preventDefault();
            goTo();
        }
        if (e.shiftKey && e.keyCode == 13) {
            e.preventDefault();
            goTo();
        }
        if (e.ctrlKey && e.altKey) {
            e.preventDefault();
            goTo();
        }
        if (e.shiftKey && e.keyCode == 71) {
            $(this).toggleClass('grids')
        }
        if (e.shiftKey && e.keyCode == 72) {
            $(this).toggleClass('horizontal')
        }
    });

    // === / для этапа разработки (удалить перед деплоем)===
})