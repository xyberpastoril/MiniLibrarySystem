"use strict";

$("#kt_published_date_picker").daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1800,
    maxYear: parseInt(moment().format("YYYY"), 10),
    locale: {
      format: 'YYYY-MM-DD'
    }
});

var KTNewBook = (function() {
    const t = document.getElementById("kt_modal_new_book"),
        e = t.querySelector("#kt_modal_new_book_form"),
        n = new bootstrap.Modal(t);
    return {
        init: function() {
            (() => {
                const i = t.querySelector('[data-kt-books-modal-action="submit"]');
                i.addEventListener("click", (t) => {
                        t.preventDefault(),

                        Swal.fire({
                            text: "Form has been successfully submitted!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        }).then(function(t) {
                            t.isConfirmed && n.hide()
                            e.submit();
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
                            }).then(function(t) {
                                t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss &&
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
                            }).then(function(t) {
                                t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss &&
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
KTUtil.onDOMContentLoaded(function() {
    KTNewBook.init();
});
