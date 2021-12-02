"use strict";
var KTAccountSettingsSigninMethods = {
    init: function() {
        var t, e;
        ! function() {
            var t = document.getElementById("kt_signin_email"),
                e = document.getElementById("kt_signin_email_edit"),
                n = document.getElementById("kt_signin_password"),
                i = document.getElementById("kt_signin_password_edit"),
                o = document.getElementById("kt_signin_email_button"),
                s = document.getElementById("kt_signin_cancel"),
                r = document.getElementById("kt_signin_password_button"),
                a = document.getElementById("kt_password_cancel");
            o.querySelector("button").addEventListener("click", (function() {
                l()
            })), s.addEventListener("click", (function() {
                l()
            })), r.querySelector("button").addEventListener("click", (function() {
                d()
            })), a.addEventListener("click", (function() {
                d()
            }));
            var l = function() {
                    t.classList.toggle("d-none"), o.classList.toggle("d-none"), e.classList.toggle("d-none")
                },
                d = function() {
                    n.classList.toggle("d-none"), r.classList.toggle("d-none"), i.classList.toggle("d-none")
                }
        }(), e = document.getElementById("kt_signin_change_email"), t = FormValidation.formValidation(e, {
                fields: {
                    emailaddress: {
                        validators: {
                            notEmpty: {
                                message: "Email is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    confirmemailpassword: {
                        validators: {
                            notEmpty: {
                                message: "Password is required"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
            }), e.querySelector("#kt_signin_submit").addEventListener("click", (function(e) {
                e.preventDefault(), console.log("click"), t.validate().then((function(t) {
                    $.ajax({
                        url: "/account/updateEmail",
                        type: 'POST',
                        data: {
                            _token: $("input[name=_token]").val(),
                            email: $("#email").val(),
                            confirmemailpassword: $("#confirmemailpassword").val()
                        },
                        success: function(data, status, xhr) { // success callback function
                            // reset errors
                            $("#confirmemailpassword-error").hide()
                            $("#email-error").hide()
                            $("#email").removeClass("is-invalid")
                            $("#confirmemailpassword").removeClass("is-invalid")

                            if (data.success) {
                                // reset
                                $("#kt_signin_email_edit").addClass("d-none")
                                $("#kt_signin_email").removeClass("d-none")
                                $("#kt_signin_email_button").removeClass("d-none")
                                $("#email").val("")
                                $("#confirmemailpassword").val("")

                                swal.fire({
                                    text: "Email successfully updated.",
                                    icon: "success",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                })
                            } else if (data.error == "email_exists") {
                                // if email already exists
                                $("#email-error").show()
                                $("#email-error strong").html("Email already exists.")
                                $("#email").addClass("is-invalid")
                            } else if (data.error == "wrong_password") {
                                // if invalid password
                                $("#confirmemailpassword-error").show()
                                $("#confirmemailpassword-error strong").html("Invalid password.")
                                $("#confirmemailpassword").addClass("is-invalid")
                            }
                        },
                        error: function(jqXhr, textStatus, errorMessage) { // error callback
                            swal.fire({
                                text: "It's not your fault. Something seems wrong on our end. Please try again.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            })
                        }
                    })
                }))
            })),
            function(t) {
                var e, n = document.getElementById("kt_signin_change_password");
                e = FormValidation.formValidation(n, {
                    fields: {
                        currentpassword: {
                            validators: {
                                notEmpty: {
                                    message: "Current Password is required"
                                }
                            }
                        },
                        newpassword: {
                            validators: {
                                notEmpty: {
                                    message: "New Password is required"
                                }
                            }
                        },
                        confirmpassword: {
                            validators: {
                                notEmpty: {
                                    message: "Confirm Password is required"
                                },
                                identical: {
                                    compare: function() {
                                        return n.querySelector('[name="newpassword"]').value
                                    },
                                    message: "The password and its confirm are not the same"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row"
                        })
                    }
                }), n.querySelector("#kt_password_submit").addEventListener("click", (function(t) {
                    t.preventDefault(), console.log("click"), e.validate().then((function(t) {
                        "Valid" == t ? swal.fire({
                            text: "Sent password reset. Please check your email",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }) : swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        })
                    }))
                }))
            }()
    }
};
KTUtil.onDOMContentLoaded((function() {
    KTAccountSettingsSigninMethods.init()
}))