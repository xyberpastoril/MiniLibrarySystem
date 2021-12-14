"use strict";
var KTTransactionsList = (function() {
    var e,
        t,
        n,
        r,
        o = document.getElementById("kt_table_transactions"),
    c = () => {
        o.querySelectorAll('[data-kt-transactions-table-filter="delete_row"]').forEach((t => {
            t.addEventListener("click", (function(t) {
                t.preventDefault();
                const n = t.target.closest("tr"),
                    r = n.querySelectorAll("td")[1].querySelectorAll("p")[0].innerText;
                Swal.fire({
                    text: "Are you sure you want to delete transaction number " + r + "?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((function(t) {
                    t.value ? Swal.fire({
                        text: "You have deleted transaction number " + r + "!.",
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
                        text: "Transaction number " + r + " was not deleted.",
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
            '[data-kt-transactions-table-select="delete_selected"]'
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
                    text: "Are you sure you want to delete selected transactions?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function(t) {
                    t.value ? Swal.fire({
                        text: "You have delete all selected transactions!.",
                        icon: "danger",
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
                                    url:"/transactions/" + t.value + "/cancel",
                                    type:'DELETE',
                                    data:{
                                        _token: $("input[name=_token]").val()
                                    }
                                })
                            }
                        });
                        o.querySelectorAll('[type="checkbox"]')[0].checked = !1;
                    })
                    .then(function() {
                        a(), l();
                    }) : "cancel" === t.dismiss &&
                    Swal.fire({
                        text: "Selected transactions was not deleted.",
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
                        [6, "desc"]
                    ],

                    columnDefs: [{
                        targets: 0,
                        orderable: false,
                    }, ],
                })).on("draw", function() {
                    l(), c(), a();
                }),
                l(), c(), document.querySelector('[data-kt-transactions-table-filter="search"]').addEventListener("keyup", (function(t) {
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

                            var date = new Date( data[6] );

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
			})();
        },
    };
})();
KTUtil.onDOMContentLoaded(function() {
    KTTransactionsList.init();
});

$("[data-kt-transactions-table-filter='pay_row']").click(function(e){
    e.preventDefault();
    console.log("Penalty ID: " + this.getAttribute('penalty-id'))
    console.log("Transaction ID: " + this.getAttribute('transaction-id'))

    var penalty_id = this.getAttribute('penalty-id')
    var transaction_id = this.getAttribute('transaction-id')
    var btn = this

    Swal.fire({
        text: "Are you sure you want to mark penalty of transaction number " + transaction_id + " as paid?",
        icon: "warning",
        showCancelButton: !0,
        buttonsStyling: !1,
        confirmButtonText: "Yes, mark as paid!",
        cancelButtonText: "No, cancel",
        customClass: {
            confirmButton: "btn fw-bold btn-success",
            cancelButton: "btn fw-bold btn-active-light-primary"
        }
    }).then((function(t) {
        t.value ? Swal.fire({
            text: "You have marked penalty of transaction number " + transaction_id + " as paid!.",
            icon: "success",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn fw-bold btn-primary"
            }
        }).then((function() {
            $.ajax({
                url:"/penalty/" + penalty_id + "/pay",
                type:'POST',
                data:{
                    _token: $("input[name=_token]").val()
                },
                success: function(data, status, xhr) {
                    console.log(data)
                    window.location.reload();
                },
                error: function(jqXhr, textStatus, errorMessage) {
                    swal.fire({
                        text: "It's not your fault. Something seems wrong on our end. Please try again later.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    })
                }
            })
        })).then((function() {
            a()
        })) : "cancel" === t.dismiss && Swal.fire({
            text: "Transaction number " + transaction_id + " was not marked as paid.",
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn fw-bold btn-primary"
            }
        })
    }))
})
