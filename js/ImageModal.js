var ImageModal = (function () {
    "use strict";

    var pub = {};

    function imageOnClick(){
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        };

        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
            modal.style.display = "none";
        }
    }

    function whereOnClick(){
        $(".scroll-to-map, #location-text").css('cursor', 'pointer');
        $(".scroll-to-map, #location-text").click(function() {
            $('html,body').animate({
                    scrollTop: $("#col-location").offset().top},
                'slow');
        });
    }

    pub.setup = function () {
        imageOnClick();
        whereOnClick();
    };

    return pub;

}());

$(document).ready(ImageModal.setup);