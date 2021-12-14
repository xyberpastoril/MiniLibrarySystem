"use strict";
var KTTransactionsList = (function() {
    var e,
        t,
        n,
        r,
        o = document.getElementById("kt_table_transactions");
    return {
        init: function() {
            o && (e = $(o).DataTable({
                aLengthMenu: [5, 10, 25, 50, 100],
                "search": {
                    "caseInsensitive": false
                },
                searchDelay: 500,
                order: [
                    [2, "desc"]
                ],

                columnDefs: [{
                    targets: 0,
                    orderable: false,
                }, ],
            })),document.querySelector('[data-kt-transactions-table-filter="search"]').addEventListener("keyup", (function(t) {
				e.search(t.target.value).draw()
			})), document.querySelector('[data-kt-transactions-table-filter="reset"]').addEventListener("click", (function() {
				document.querySelector('[data-kt-transactions-table-filter="form"]').querySelectorAll("select").forEach((e => {
					$(e).val("").trigger("change")
				})), e.search("").draw()
			})), (() => {
				const t = document.querySelector('[data-kt-transactions-table-filter="form"]'),
					n = t.querySelector('[data-kt-transactions-table-filter="filter"]'),
					r = t.querySelectorAll("select");
				n.addEventListener("click", (function() {
					var t = "";
					r.forEach(((e, n) => {
						e.value && "" !== e.value && (0 !== n && (t += " "), t += e.value)
					})), e.search(t).draw()
				}))
			})()
        },
    };
})();
KTUtil.onDOMContentLoaded(function() {
    KTTransactionsList.init();
});
