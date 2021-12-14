"use strict";
var KTTransactionsList = (function() {
    var e,
        t,
        n,
        r,
        o = document.getElementById("kt_table_transactions"),
    c = () => {
        o.querySelectorAll('[data-kt-transactions-table-filter="decline_row"]').forEach((t => {
            t.addEventListener("click", (function(t) {
                t.preventDefault();
                const n = t.target.closest("tr"),
                    r = n.querySelectorAll("td")[1].querySelectorAll("p")[0].innerText;
                Swal.fire({
                    text: "Are you sure you want to decline transaction number " + r + "?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, decline!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((function(t) {
                    t.value ? Swal.fire({
                        text: "You have declined transaction number " + r + "!.",
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
                            url:"/transactions/" + rr.valueOf() + "/cancel",
                            type:'DELETE',
                            data:{
                                _token: $("input[name=_token]").val()
                            }
                        })
                        e.row($(n)).remove().draw()
                    })).then((function() {
                        a()
                    })) : "cancel" === t.dismiss && Swal.fire({
                        text: "Transaction number " + r + " was not declined.",
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
        o.querySelectorAll('[data-kt-transactions-table-filter="accept_row"]').forEach((t => {
            t.addEventListener("click", (function(t) {
                t.preventDefault();
                const n = t.target.closest("tr"),
                    r = n.querySelectorAll("td")[1].querySelectorAll("p")[0].innerText;
                Swal.fire({
                    text: "Are you sure you want to accept transaction number " + r + "?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, accept!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-success",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then((function(t) {
                    t.value ? Swal.fire({
                        text: "You have accepted transaction number " + r + "!.",
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
                            url:"/transactions/" + rr.valueOf() + "/approve",
                            type:'PUT',
                            data:{
                                _token: $("input[name=_token]").val()
                            }
                        })
                        e.row($(n)).remove().draw()
                    })).then((function() {
                        a()
                    })) : "cancel" === t.dismiss && Swal.fire({
                        text: "Transaction number " + r + " was accepted.",
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
    l = () => {
        const c = o.querySelectorAll('[type="checkbox"]');
        (t = document.querySelector(
            '[data-kt-transactions-table-toolbar="base"]'
        )), (n = document.querySelector(
            '[data-kt-transactions-table-toolbar="selected"]'
        )), (r = document.querySelector(
            '[data-kt-transactions-table-select="selected_count"]'
        ));
        const s = document.querySelector(
            '[data-kt-transactions-table-select="decline_selected"]'
        );
        c.forEach((e) => {
                e.addEventListener("click", function() {
                    setTimeout(function() {
                        a();
                    }, 50);
                });
            }),
            s.addEventListener("click", function() {
                Swal.fire({
                    text: "Are you sure you want to decline selected transactions?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, decline!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function(t) {
                    t.value ? Swal.fire({
                        text: "You have decline all selected transactions!.",
                        icon: "danger",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        },
                    })
                    .then(function() {
                        c.forEach((t) => {
                            if(t.checked && t.value > 0){
                                var rr = t.value.split("-");
                                rr = new Number(rr[1]);
                                $.ajax({
                                    url:"/transactions/" + rr.valueOf() + "/cancel",
                                    type:'DELETE',
                                    data:{
                                        _token: $("input[name=_token]").val()
                                    }
                                })
                            }
                            t.checked && e.row($(t.closest("tbody tr"))).remove().draw()
                        });
                        o.querySelectorAll('[type="checkbox"]')[0].checked = !1;
                    })
                    .then(function() {
                        a(), l();
                    }) : "cancel" === t.dismiss &&
                    Swal.fire({
                        text: "Selected transactions was not declined.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        },
                    });
                });
            });
    };
    var m = () => {
        const c = o.querySelectorAll('[type="checkbox"]');
        (t = document.querySelector(
            '[data-kt-transactions-table-toolbar="base"]'
        )), (n = document.querySelector(
            '[data-kt-transactions-table-toolbar="selected"]'
        )), (r = document.querySelector(
            '[data-kt-transactions-table-select="selected_count"]'
        ));
        const s = document.querySelector(
            '[data-kt-transactions-table-select="accept_selected"]'
        );
        c.forEach((e) => {
                e.addEventListener("click", function() {
                    setTimeout(function() {
                        a();
                    }, 50);
                });
            }),
            s.addEventListener("click", function() {
                Swal.fire({
                    text: "Are you sure you want to accept selected transactions?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, accept!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-success",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function(t) {
                    t.value ? Swal.fire({
                        text: "You have accepted all selected transactions!.",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        },
                    })
                    .then(function() {
                        c.forEach((t) => {
                            t.checked && e.row($(t.closest("tbody tr"))).remove().draw()
                            if(t.checked && t.value > 0){
                                $.ajax({
                                    url:"/transactions/" + t.value + "/approve",
                                    type:'PUT',
                                    data:{
                                        _token: $("input[name=_token]").val()
                                    }
                                })
                            }
                        });
                        o.querySelectorAll('[type="checkbox"]')[0].checked = !1;
                    })
                    .then(function() {
                        a(), m();
                    }) : "cancel" === t.dismiss &&
                    Swal.fire({
                        text: "Selected transactions was not accepted.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        },
                    });
                });
            });
    };
    const a = () => {
        const e = o.querySelectorAll('tbody [type="checkbox"]');
        let c = !1,
            l = 0,
            m = 0;
        e.forEach((e) => {
                e.checked && ((c = !0), l++, m++);
            }),
            c ? ((r.innerHTML = l),
                t.classList.add("d-none"),
                n.classList.remove("d-none")) : (t.classList.remove("d-none"), n.classList.add("d-none"));
    };
    return {
        init: function() {
            o && (e = $(o).DataTable({
                aLengthMenu: [5, 10, 25, 50, 100],
                order: [
                    [4, "desc"]
                ],

                columnDefs: [{
                    targets: 0,
                    orderable: false,
                }, ],
            })).on("draw", function() {
                l(), m(), c(), d(), a();
            }),
            l(), m(),
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

                            var date = new Date( data[4] );

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
