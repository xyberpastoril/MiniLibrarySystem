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
                    if(n.classList.contains("d-none"))
                        n.classList.toggle("d-none"), r.classList.toggle("d-none"), i.classList.toggle("d-none")
                    $("#email").focus()
                },
                d = function() {
                    n.classList.toggle("d-none"), r.classList.toggle("d-none"), i.classList.toggle("d-none")
                    if(t.classList.contains("d-none"))
                        t.classList.toggle("d-none"), o.classList.toggle("d-none"), e.classList.toggle("d-none")
                    $("#currentpassword").focus()
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

                            $("#email").removeClass("is-valid")
                            $("#confirmemailpassword").removeClass("is-valid")

                            if (data.success) {
                                // reset
                                $("#kt_signin_email_edit").addClass("d-none")
                                $("#kt_signin_email").removeClass("d-none")
                                $("#kt_signin_email_button").removeClass("d-none")

                                $("#email-readonly").html($("#email").val())

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

                        // reset errors
                        $("#currentpassword-error").hide()
                        $("#newpassword-error").hide()
                        $("#confirmpassword-error").hide()

                        $("#currentpassword").removeClass("is-invalid")
                        $("#newpassword").removeClass("is-invalid")
                        $("#confirmpassword").removeClass("is-invalid")

                        $("#currentpassword").removeClass("is-valid")
                        $("#newpassword").removeClass("is-valid")
                        $("#confirmpassword").removeClass("is-valid")

                        if( $("#currentpassword").val() &&
                            $("#newpassword").val() &&
                            $("#confirmpassword").val() &&
                            $("#newpassword").val() == $("#confirmpassword").val() )
                        {
                            $.ajax({
                                url: "/account/updatePassword",
                                type: 'POST',
                                data: {
                                    _token: $("input[name=_token]").val(),
                                    currentpassword: $("#currentpassword").val(),
                                    newpassword: $("#newpassword").val(),
                                    confirmpassword: $("#confirmpassword").val(),
                                },
                                success: function(data, status, xhr) { // success callback function
                                    if (data.success) {
                                        // reset
                                        $("#kt_signin_password_edit").addClass("d-none")
                                        $("#kt_signin_password").removeClass("d-none")
                                        $("#kt_signin_password_button").removeClass("d-none")
                                        $("#currentpassword").val("")
                                        $("#newpassword").val("")
                                        $("#confirmpassword").val("")

                                        swal.fire({
                                            text: "Password successfully updated.",
                                            icon: "success",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn font-weight-bold btn-light-primary"
                                            }
                                        })
                                    }
                                    else if (data.error == "wrong_password") {
                                        $("#currentpassword-error").show()
                                        $("#currentpassword-error strong").html("You entered a wrong password.")
                                        $("#currentpassword").addClass("is-invalid")
                                    }
                                    else if (data.error == "passwords_not_match") {
                                        $("#confirmpassword-error").show()
                                        $("#confirmpassword-error strong").html("Passwords do not match.")
                                        $("#confirmpassword").addClass("is-invalid")
                                    }
                                },
                                error: function(jqXhr, textStatus, errorMessage) { // error callback
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
                        }
                    }))
                }))
            }()
    }
};
KTUtil.onDOMContentLoaded((function() {
    KTAccountSettingsSigninMethods.init()
}))
