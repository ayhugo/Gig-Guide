var GigInfo = (function () {
    "use strict";

    var pub = {};

    function parseVenueInfo(data, venue, targets){
        $(data).find("venue").each(function () {
            if($(this).find("venuename")[0].textContent === venue) {
                targets.mapLocation.append("<iframe " + $(this).find("venuemap")[0].textContent + "></iframe>");
            }
        });
    }

    function getVenueInfo(venue, targets){
        var xmlSource = "htaccess/formInfo.xml";
        $.ajax({
            type: "GET",
            url: xmlSource,
            cache: false,
            success: function (data) {
                parseVenueInfo(data, venue, targets);
            },
            error: function (){
                window.location = 'error.php';
            }
        });
    }

    function genGoogleCalendar(title){
        //"http://www.google.com/calendar/event?
        // action=TEMPLATE
        // &text=[event-title]
        // &dates=20160627/20160627
        // &details=[description]
        // &location=[location]
        // &trp=false
        // &sprop=
        // &sprop=name:"

    }

    function parseGigInfo(data, targets, titleFromQuery) {
        var isFound = false;

        $(data).find("gig").each(function () {
            if($(this).find("title")[0].textContent === titleFromQuery) {
                var title = $(this).find("title")[0].textContent;
                var details = $(this).find("details")[0].textContent;
                var artistsperforming = $(this).find("artistsperforming")[0].textContent;
                var artistslink = $(this).find("artistslink")[0].textContent;
                var date = $(this).find("date")[0].textContent;
                var doortime = $(this).find("doortime")[0].textContent;
                var venue = $(this).find("venue")[0].textContent;
                var age = $(this).find("age")[0].textContent;
                var price = $(this).find("price")[0].textContent;
                isFound = true;
                targets.title.text(artistsperforming + " - " + title);
                targets.when.text(date);
                targets.where.text(venue);
                targets.information.text(details);
                targets.doors.text(doortime);
                targets.age.text(age);
                targets.price.text(price);
                var links = artistslink.split(",");
                links.forEach(function(link) {
                    targets.links.append("<p class='min-text-center'><a href='" + link + "' target='_blank'>" + link + "</a></p>");
                });
                getVenueInfo(venue, targets);
                var revDate = date.split('-').reverse().join('');
                var currDay = date.split('-')[0];
                currDay = Number(currDay) + 1;
                var endDate = date.split('-')[2] + date.split('-')[1] + String(currDay);
                var url = "http://www.google.com/calendar/event?action=TEMPLATE&text=" + title + "&dates="  + revDate + "/" + endDate + "&details=" + details + "&location=" + venue;
                $("#g-cal").append("<a class='text-center' href='" + url + "' target='_blank' rel='nofollow'>Add Event to Google Calendar</a>");

            }
        });
        if(!isFound){
            window.location = 'error.php';
        }
    }


    function getGigInfo(titleFromQuery) {
        var targets = {
            title: $("#gig-title"),
            when: $("#date-text"),
            where: $("#location-text"),
            information: $("#information-text"),
            doors: $("#door-time"),
            links: $("#col-links"),
            age: $("#door-restriction"),
            price: $("#door-price"),
            mapLocation: $("#col-location")
        };
        var xmlSource = "htaccess/gigs.xml";
        $.ajax({
            type: "GET",
            url: xmlSource,
            cache: false,
            success: function (data) {
                    parseGigInfo(data, targets, titleFromQuery);
            },
            error: function (){
                window.location = 'error.php';
            }
        });
    }


    function getStringQuery(){
        const urlParams = new URLSearchParams(window.location.search);
        const titleFromQuery = urlParams.get('title');
        if(titleFromQuery === '' || urlParams.get('title') === null){
            window.location = 'error.php';
        }else{
            getGigInfo(titleFromQuery);
        }
    }

    pub.setup = function () {
        getStringQuery();
    };

    return pub;

}());

$(document).ready(GigInfo.setup);