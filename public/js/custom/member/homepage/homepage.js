"use strict";
var KTSearchHorizontal = {
    init: function() {
        var s = document.querySelector("#kt_advanced_search_form").querySelector('[name="status"]'),
            n = document.querySelector("#kt_horizontal_search_advanced_link");

        n.addEventListener("click", function(e) {
            e.preventDefault(),
                "Advanced Search" === n.innerHTML ? (n.innerHTML = "Hide Advanced Search") : (n.innerHTML = "Advanced Search");
        }),
        s.addEventListener("click", function(e) {
            if (s.checked == true){
                s.value = "available";
            } else {
                s.value = "";
            }
        })
    },
};
KTUtil.onDOMContentLoaded(function() {
    KTSearchHorizontal.init();
});
