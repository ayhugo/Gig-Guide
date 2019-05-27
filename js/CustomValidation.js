var CustomValidation = (function () {
    "use strict";

    var pub = {};

    function setValidation(){
        let today = new Date();
        let day = today.getDate();
        let month = today.getMonth()+1;
        let year = today.getFullYear();
        let yearMax = today.getFullYear() + 5;
        let curr, currMax;
        if(day < 10 && month < 10){
            curr = year+"-0"+month+"-0"+day;
            currMax = yearMax+"-0"+month+"-0"+day;
        }else if(day < 10){
            curr = year+"-"+month+"-0"+day;
            currMax = yearMax+"-"+month+"-0"+day;
        }else if(month < 10){
            curr = year+"-0"+month+"-"+day;
            currMax = yearMax+"-0"+month+"-"+day;
        }else{
            curr = year+"-"+month+"-"+day;
            currMax = yearMax+"-"+month+"-"+day;
        }
        document.getElementById("indate").valueAsDate = new Date(curr);
        document.querySelector("#indate").setAttribute("min", curr);
        document.querySelector("#indate").setAttribute("max", currMax);
    }

    pub.setup = function () {
        setValidation();
    };

    return pub;

}());

$(document).ready(CustomValidation.setup);