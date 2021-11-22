"use strict";

var KTTransactionsList = (function () {
  var e,
    o = document.getElementById("kt_table_transactions");

  return {
    init: function () {
      o &&
        (o.querySelectorAll("tbody tr").forEach((e) => {
          const t = e.querySelectorAll("td");
        }),
        (e = $(o).DataTable({
          info: !1,
          order: [],
          pageLength: 10,
          lengthChange: !1,
          columnDefs: [
            {
              orderable: !1,
              targets: 0,
            },
            {
              orderable: !1,
              targets: 7,
            },
          ],
        })).on("draw", function () {
          l(), c(), a();
        }),
        l(),
        c());
    },
  };
})();

KTUtil.onDOMContentLoaded(function () {
  KTTransactionsList.init();
});
