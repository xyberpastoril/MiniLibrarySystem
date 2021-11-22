"use strict";

$("#kt_published_date_picker").daterangepicker(
  {
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1800,
    maxYear: parseInt(moment().format("YYYY"), 10),
  }
);

var KTNewBook = (function () {
  const t = document.getElementById("kt_modal_new_book"),
    e = t.querySelector("#kt_modal_new_book_form"),
    n = new bootstrap.Modal(t);
  return {
    init: function () {
      (() => {
        var o = FormValidation.formValidation(e, {
          fields: {
            book_title: {
              validators: {
                notEmpty: {
                  message: "Book Title is required",
                },
              },
            },
            author: {
              validators: {
                notEmpty: {
                  message: "Author is required",
                },
              },
            },
            published_date: {
              validators: {
                notEmpty: {
                  message: "Published Date is required",
                },
              },
            },
            isbn: {
              validators: {
                notEmpty: {
                  message: "ISBN is required",
                },
              },
            },
            total_copies: {
              validators: {
                notEmpty: {
                  message: "Total Copies is required",
                },
              },
            },
          },
          plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
              rowSelector: ".fv-row",
              eleInvalidClass: "",
              eleValidClass: "",
            }),
          },
        });
        const i = t.querySelector('[data-kt-books-modal-action="submit"]');
        i.addEventListener("click", (t) => {
          t.preventDefault(),
            o &&
              o.validate().then(function (t) {
                console.log("validated!"),
                  "Valid" == t
                    ? (i.setAttribute("data-kt-indicator", "on"),
                      (i.disabled = !0),
                      setTimeout(function () {
                        i.removeAttribute("data-kt-indicator"),
                          (i.disabled = !1),
                          Swal.fire({
                            text: "Form has been successfully submitted!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                              confirmButton: "btn btn-primary",
                            },
                          }).then(function (t) {
                            t.isConfirmed && n.hide();
                          });
                      }, 2e3))
                    : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                          confirmButton: "btn btn-primary",
                        },
                      });
              });
        }),
          t
            .querySelector('[data-kt-books-modal-action="cancel"]')
            .addEventListener("click", (t) => {
              t.preventDefault(),
                Swal.fire({
                  text: "Are you sure you would like to cancel?",
                  icon: "warning",
                  showCancelButton: !0,
                  buttonsStyling: !1,
                  confirmButtonText: "Yes, cancel it!",
                  cancelButtonText: "No, return",
                  customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light",
                  },
                }).then(function (t) {
                  t.value
                    ? (e.reset(), n.hide())
                    : "cancel" === t.dismiss &&
                      Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                          confirmButton: "btn btn-primary",
                        },
                      });
                });
            }),
          t
            .querySelector('[data-kt-books-modal-action="close"]')
            .addEventListener("click", (t) => {
              t.preventDefault(),
                Swal.fire({
                  text: "Are you sure you would like to cancel?",
                  icon: "warning",
                  showCancelButton: !0,
                  buttonsStyling: !1,
                  confirmButtonText: "Yes, cancel it!",
                  cancelButtonText: "No, return",
                  customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light",
                  },
                }).then(function (t) {
                  t.value
                    ? (e.reset(), n.hide())
                    : "cancel" === t.dismiss &&
                      Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                          confirmButton: "btn btn-primary",
                        },
                      });
                });
            });
      })();
    },
  };
})();
KTUtil.onDOMContentLoaded(function () {
  KTNewBook.init();
});
