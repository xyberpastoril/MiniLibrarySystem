document.addEventListener("DOMContentLoaded", function() {
    var calendarEl = document.getElementById("calendar");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
    });
    calendar.render();
});

var today = new Date().toISOString().slice(0, 10);
$("#borrow_modal_date_range_picker").daterangepicker({
    minDate: today,
    locale: {
      format: 'YYYY-MM-DD'
    },
});

var b = $("#borrow_modal_button")
var f = $("#transaction_request_submit")
var book_id = $("#book_id_input").val()
var copies_left = $("#copies_left")

f.click(function(e){
    e.preventDefault()

    $.ajax({
        url: "/transactions/request/" + book_id,
        type: 'POST',
        data: {
            _token: $("input[name=_token]").val(),
            date: $("input[name=date]").val()
        },
        success: function(data, status, xhr) {
            console.log(data)
            if(data.success)
            {
                swal.fire({
                    text: "Successfully requested book. Please wait until your request is approved, then you may claim the book at the library.",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                })
                $('#borrow_modal').modal('hide')

                copies_left.html(copies_left.html() - 1)
                if(copies_left.html() < 1) {
                    b.attr('disabled', 'disabled')
                    // copies_left.removeClass("badge-success")
                    // copies_left.addClass("badge-danger")
                }

            }
            else if(data.error == "date_from_before_today")
            {
                swal.fire({
                    text: "Please set 'Date From' from today onwards.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                })
            }
            else if(data.error == "date_to_before_date_from")
            {
                swal.fire({
                    text: "'Date To' should be later than 'Date From'",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                })
            }
        },
        error: function(jqXhr, textStatus, errorMessage) {
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
})
