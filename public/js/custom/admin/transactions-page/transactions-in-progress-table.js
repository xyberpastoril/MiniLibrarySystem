"use strict";

"use strict";
var KTTransactionsList = (function() {
    var e,
        t,
        n,
        r,
        o = document.getElementById("kt_table_transactions"),
    c = () => {
        o.querySelectorAll('[data-kt-transactions-table-filter="return_row"]').forEach((t => {
            t.addEventListener("click", (function(t) {
                t.preventDefault();
                const n = t.target.closest("tr"),
                    r = n.querySelectorAll("td")[0].querySelectorAll("p")[0].innerText;
                Swal.fire({
                    text: "Are you sure you want to mark transaction number " + r + " as returned?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, mark!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((function(t) {
                    t.value ? Swal.fire({
                        text: "You have marked transaction number " + r + " as returned!.",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    }).then((function() {
                        var rr = r.split("-");
                        rr = new Number(rr[1]);
                        $.ajax({
                            url:"/transactions/" + rr.valueOf() + "/return",
                            type:'PUT',
                            data:{
                                _token: $("input[name=_token]").val()
                            }
                        })
                        e.row($(n)).remove().draw()
                    })).then((function() {
                        a()
                    })) : "cancel" === t.dismiss && Swal.fire({
                        text: "Transaction number " + r + " was not marked as returned.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }))
            }))
        }))
    },
    d = () => {
        o.querySelectorAll('[data-kt-transactions-table-filter="claimed_row"]').forEach((t => {
            t.addEventListener("click", (function(t) {
                t.preventDefault();
                const n = t.target.closest("tr"),
                    r = n.querySelectorAll("td")[0].querySelectorAll("p")[0].innerText;
                Swal.fire({
                    text: "Are you sure you want to mark transaction number " + r + " as claimed?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, mark!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-success",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then((function(t) {
                    t.value ? Swal.fire({
                        text: "You have marked transaction number " + r + " as claimed!.",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    }).then((function() {
                        var rr = r.split("-");
                        rr = new Number(rr[1]);
                        $.ajax({
                            url:"/transactions/" + rr.valueOf() + "/claim",
                            type:'PUT',
                            data:{
                                _token: $("input[name=_token]").val()
                            }
                        })
                        window.location.reload();
                    })).then((function() {
                        a()
                    })) : "cancel" === t.dismiss && Swal.fire({
                        text: "Transaction number " + r + " was not marked as claimed.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }))
            }))
        }))
    };
    return {
        init: function() {
            o && (e = $(o).DataTable({
                    aLengthMenu: [5, 10, 25, 50, 100],
                    order: [
                        [3, "desc"]
                    ],

                    columnDefs: [{
                        targets: 0,
                        orderable: false,
                    }, ],
                })).on("draw", function() {
                    c(), d();
                }),
                c(), d(), document.querySelector('[data-kt-transactions-table-filter="search"]').addEventListener("keyup", (function(t) {
                    e.search(t.target.value).draw()
                })), document.querySelector('[data-kt-transactions-table-filter="reset"]').addEventListener("click", (function() {
				document.querySelector('[data-kt-transactions-table-filter="form"]').querySelectorAll("select").forEach((e => {
					$(e).val("").trigger("change")
				})), $.fn.dataTable.ext.search.pop(), e.search("").draw()
			})),

            (() => {
				const t = document.querySelector('[data-kt-transactions-table-filter="form"]'),
					n = t.querySelector('[data-kt-transactions-table-filter="filter"]'),
					r = t.querySelectorAll("select");
				n.addEventListener("click", (function() {
					var t = "";
					r.forEach(((e, n) => {
						e.value && "" !== e.value && (0 !== n && (t += " "), t += e.value)
					})),
                    $.fn.dataTable.ext.search.pop()
                    $.fn.dataTable.ext.search.push(
                        function( settings, data, dataIndex ) {
                            var today = new Date().toISOString().slice(0, 10);

                            var min = new Date(t);
                            var max = new Date(today);

                            var date = new Date( data[3] );

                            if (
                                ( min === null && max === null ) ||
                                ( min === null && date <= max ) ||
                                ( min <= date   && max === null ) ||
                                ( min <= date   && date <= max )
                            ) {
                                return true;
                            }
                            return false;
                        }
                    )
                    e.draw()
				}))
			})();;
        },
    };
})();
KTUtil.onDOMContentLoaded(function() {
    KTTransactionsList.init();
});
