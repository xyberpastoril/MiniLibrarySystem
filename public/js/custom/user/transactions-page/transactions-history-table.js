"use strict";
var KTTransactionsList = (function () {
  var e,
    t,
    n,
    r,
    o = document.getElementById("kt_table_transactions"),
    l = () => {
      const c = o.querySelectorAll('[type="checkbox"]');
      (t = document.querySelector('[data-kt-transaction-table-toolbar="base"]')),
        (n = document.querySelector('[data-kt-transaction-table-toolbar="selected"]')),
        (r = document.querySelector(
          '[data-kt-transaction-table-select="selected_count"]'
        ));
      const s = document.querySelector(
        '[data-kt-transaction-table-select="return_selected"]'
      );
      c.forEach((e) => {
        e.addEventListener("click", function () {
          setTimeout(function () {
            a();
          }, 50);
        });
      }),
        s.addEventListener("click", function () {
          Swal.fire({
            text: "Are you sure you want to mark selected transactions as returned?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Yes, mark!",
            cancelButtonText: "No, cancel",
            customClass: {
              confirmButton: "btn fw-bold btn-success",
              cancelButton: "btn fw-bold btn-active-light-primary",
            },
          }).then(function (t) {
            t.value
              ? Swal.fire({
                  text: "You have marked all selected transactions as returned!.",
                  icon: "success",
                  buttonsStyling: !1,
                  confirmButtonText: "Ok, got it!",
                  customClass: {
                    confirmButton: "btn fw-bold btn-primary",
                  },
                })
                  .then(function () {
                    c.forEach((t) => {
                      t.checked &&
                        e
                          .row($(t.closest("tbody tr")))
                          .remove()
                          .draw();
                    });
                    o.querySelectorAll('[type="checkbox"]')[0].checked = !1;
                  })
                  .then(function () {
                    a(), l();
                  })
              : "cancel" === t.dismiss &&
                Swal.fire({
                  text: "Selected transactions was not marked as returned.",
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
      l = 0;
    e.forEach((e) => {
      e.checked && ((c = !0), l++);
    }),
      c
        ? ((r.innerHTML = l),
          t.classList.add("d-none"),
          n.classList.remove("d-none"))
        : (t.classList.remove("d-none"), n.classList.add("d-none"));
  };
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
              targets: 8,
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
