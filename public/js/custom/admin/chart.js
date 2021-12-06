"use strict";
var KTGeneralChartJS = function() {
    function a(a = 1, e = 100) {
        return Math.floor(Math.random() * (e - a) + a)
    }

    function e(e = 1, t = 100, s = 10) {
        for (var r = [], l = 0; l < s; l++) r.push(a(e, t));
        return r
    }
    return {
        init: function() {
            Chart.defaults.font.size = 13, Chart.defaults.font.family = KTUtil.getCssVariableValue("--bs-font-sans-serif"),
            function() {
                var a = document.getElementById("kt_chartjs_1"),
                    t = KTUtil.getCssVariableValue("--bs-primary"),
                    s = KTUtil.getCssVariableValue("--bs-danger"),
                    r = KTUtil.getCssVariableValue("--bs-success");
                KTUtil.getCssVariableValue("--bs-font-sans-serif");
                const l = {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [{
                        label: "Number of Transactions",
                        data: e(1, 100, 12),
                        backgroundColor: t,
                        stack: "Stack 0"
                    }]
                };
                new Chart(a, {
                    type: "bar",
                    data: l,
                    options: {
                        plugins: {
                            title: {
                                display: !1
                            }
                        },
                        responsive: !0,
                        interaction: {
                            intersect: !1
                        },
                        scales: {
                            x: {
                                stacked: !0
                            },
                            y: {
                                stacked: !0
                            }
                        }
                    }
                })
            }()
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTGeneralChartJS.init()
}));
