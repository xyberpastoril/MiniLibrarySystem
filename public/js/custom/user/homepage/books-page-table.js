"use strict";
var KTBooksList = (function () {
  var e,
    t,
    n,
    r,
    o = document.getElementById("kt_table_books");
  return {
    init: function () {
      o &&
        (o.querySelectorAll("tbody tr").forEach((e) => {
          const t = e.querySelectorAll("td");
          const l = moment(t[2].innerHTML, "DD MMM YYYY").format();
          t[2].setAttribute("data-order", l);
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
        c(),
        (() => {
          const t = document.querySelector(
              '[data-kt-book-table-filter="form"]'
            ),
            n = t.querySelector('[data-kt-book-table-filter="filter"]'),
            r = t.querySelectorAll("select");
          n.addEventListener("click", function () {
            var t = "";
            r.forEach((e, n) => {
              e.value &&
                "" !== e.value &&
                (0 !== n && (t += " "), (t += e.value));
            }),
              e.search(t).draw();
          });
        })());
    },
  };
})();
KTUtil.onDOMContentLoaded(function () {
  KTBooksList.init();
});
