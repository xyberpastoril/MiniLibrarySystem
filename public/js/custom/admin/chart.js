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
                    r = KTUtil.getCssVariableValue("--bs-success"),
                    months, no_of_transactions, transaction_data;
                KTUtil.getCssVariableValue("--bs-font-sans-serif");

                $.ajax({
                    url:"result/transactions/monthly/",
                    type:'GET',
                    data:{
                        _token: $("input[name=_token]").val()
                    },
                    success: function(data, status, xhr) {
                        console.log(data)  
                        transaction_data = data    
                        months = [], no_of_transactions = []
                        for(var i = 0; i < data.length; i++) {
                            months.push(data[i].month)
                            no_of_transactions.push(data[i].no_transactions)
                        }

                        const l = {
                            labels: months,
                            datasets: [{
                                label: "Number of Transactions",
                                data: no_of_transactions,
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
                    },
                    error: function(jqXhr, textStatus, errorMessage) {
                        console.log(jqXhr)
                    }
                })                
            }()
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTGeneralChartJS.init()
}));
