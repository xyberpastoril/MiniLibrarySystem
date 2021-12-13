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
                searchDelay: 500,
                order: [
                    [4, "desc"]
                ],

                columnDefs: [{
                    targets: 0,
                    orderable: false,
                }, ],
            })),document.querySelector('[data-kt-transactions-table-filter="search"]').addEventListener("keyup", (function(t) {
				e.search(t.target.value).draw()
			}));
        },
    };
})();
KTUtil.onDOMContentLoaded(function() {
    KTTransactionsList.init();
});
