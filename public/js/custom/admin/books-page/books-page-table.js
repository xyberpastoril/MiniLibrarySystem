"use strict";
var KTDatatablesServerSide = (function () {
    var e,
        t,
        n = () => {
            document
                .querySelectorAll('[data-kt-docs-table-filter="delete_row"]')
                .forEach((t) => {
                    t.addEventListener("click", function (t) {
                        t.preventDefault();
                        const n = t.target
                            .closest("tr")
                            .querySelectorAll("td")[1].innerText;
                        Swal.fire({
                            text: "Are you sure you want to delete " + n + "?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, delete!",
                            cancelButtonText: "No, cancel",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton:
                                    "btn fw-bold btn-active-light-primary",
                            },
                        }).then(function (t) {
                            t.value
                                ? Swal.fire({
                                      text: "Deleting " + n,
                                      icon: "info",
                                      buttonsStyling: !1,
                                      showConfirmButton: !1,
                                      timer: 2e3,
                                  }).then(function () {
                                      Swal.fire({
                                          text: "You have deleted " + n + "!.",
                                          icon: "success",
                                          buttonsStyling: !1,
                                          confirmButtonText: "Ok, got it!",
                                          customClass: {
                                              confirmButton:
                                                  "btn fw-bold btn-primary",
                                          },
                                      }).then(function () {
                                          e.draw();
                                      });
                                  })
                                : "cancel" === t.dismiss &&
                                  Swal.fire({
                                      text: n + " was not deleted.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: {
                                          confirmButton:
                                              "btn fw-bold btn-primary",
                                      },
                                  });
                        });
                    });
                });
        },
        o = function () {
            const t = document.querySelector("#kt_datatable_example_1"),
                n = t.querySelectorAll('[type="checkbox"]'),
                o = document.querySelector(
                    '[data-kt-docs-table-select="delete_selected"]'
                );
            n.forEach((e) => {
                e.addEventListener("click", function () {
                    setTimeout(function () {
                        a();
                    }, 50);
                });
            }),
                o.addEventListener("click", function () {
                    Swal.fire({
                        text: "Are you sure you want to delete selected customers?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        showLoaderOnConfirm: !0,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton:
                                "btn fw-bold btn-active-light-primary",
                        },
                    }).then(function (n) {
                        n.value
                            ? Swal.fire({
                                  text: "Deleting selected customers",
                                  icon: "info",
                                  buttonsStyling: !1,
                                  showConfirmButton: !1,
                                  timer: 2e3,
                              }).then(function () {
                                  Swal.fire({
                                      text: "You have deleted all selected customers!.",
                                      icon: "success",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: {
                                          confirmButton:
                                              "btn fw-bold btn-primary",
                                      },
                                  }).then(function () {
                                      e.draw();
                                  });
                                  t.querySelectorAll(
                                      '[type="checkbox"]'
                                  )[0].checked = !1;
                              })
                            : "cancel" === n.dismiss &&
                              Swal.fire({
                                  text: "Selected customers was not deleted.",
                                  icon: "error",
                                  buttonsStyling: !1,
                                  confirmButtonText: "Ok, got it!",
                                  customClass: {
                                      confirmButton: "btn fw-bold btn-primary",
                                  },
                              });
                    });
                });
        },
        a = function () {
            const e = document.querySelector("#kt_datatable_example_1"),
                t = document.querySelector(
                    '[data-kt-docs-table-toolbar="base"]'
                ),
                n = document.querySelector(
                    '[data-kt-docs-table-toolbar="selected"]'
                ),
                o = document.querySelector(
                    '[data-kt-docs-table-select="selected_count"]'
                ),
                a = e.querySelectorAll('tbody [type="checkbox"]');
            let c = !1,
                r = 0;
            a.forEach((e) => {
                e.checked && ((c = !0), r++);
            }),
                c
                    ? ((o.innerHTML = r),
                      t.classList.add("d-none"),
                      n.classList.remove("d-none"))
                    : (t.classList.remove("d-none"), n.classList.add("d-none"));
        };
    return {
        init: function () {
            (e = $("#kt_datatable_example_1").DataTable()),
                e.$,
                e.on("draw", function () {
                    o(), a(), n(), KTMenu.createInstances();
                }),
                document
                    .querySelector('[data-kt-docs-table-filter="search"]')
                    .addEventListener("keyup", function (t) {
                        e.search(t.target.value).draw();
                    }),
                o(),
                (t = document.querySelectorAll(
                    '[data-kt-docs-table-filter="payment_type"] [name="payment_type"]'
                )),
                document
                    .querySelector('[data-kt-docs-table-filter="filter"]')
                    .addEventListener("click", function () {
                        let n = "";
                        t.forEach((e) => {
                            e.checked && (n = e.value), "all" === n && (n = "");
                        }),
                            e.search(n).draw();
                    }),
                n(),
                document
                    .querySelector('[data-kt-docs-table-filter="reset"]')
                    .addEventListener("click", function () {
                        (t[0].checked = !0), e.search("").draw();
                    });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});
