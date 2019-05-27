var SetTitle = (function () {
    "use strict";

    var pub = {};

    function gigOnClick() {
        $(".title-click").click(function (e) {
            let txt = $(e.target).text();
            window.location = 'gig.php?title=' + txt;
        });

        $(".info-click").click(function () {
            let txt = $(this).parent().next().find("a").text();
            window.location = 'gig.php?title=' + txt;
        });

        $(".btn").click(function () {
            window.location = 'calendar.php'
        });

        $("#list-btn").click(function () {
            window.location = 'index.php'
        });
    }


    pub.setup = function () {
        gigOnClick();
    };

    return pub;

}());

$(document).ready(SetTitle.setup);