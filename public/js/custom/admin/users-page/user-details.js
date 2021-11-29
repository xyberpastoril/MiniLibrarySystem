var kt_form_user_details = document.getElementById("kt_form_user_details"),
  btn_group = document.getElementById("btn_group"),
  btn_delete = document.getElementById("btn_delete"),
  btn_save = document.getElementById("btn_save"),
  btn_discard = document.getElementById("btn_discard");

kt_form_user_details.addEventListener("input", function () {
  btn_group.classList.remove("visually-hidden");
  btn_delete.classList.add("visually-hidden");
});

btn_discard.addEventListener("click", function () {
  btn_group.classList.add("visually-hidden");
  btn_delete.classList.remove("visually-hidden");
});

btn_delete.addEventListener('click', e => {
    e.preventDefault();

    Swal.fire({
		text: "Are you sure you want to delete this book?",
		icon: "warning",
		showCancelButton: !0,
		buttonsStyling: !1,
		confirmButtonText: "Yes, delete!",
		cancelButtonText: "No, cancel",
		customClass: {
			confirmButton: "btn fw-bold btn-danger",
			cancelButton: "btn fw-bold btn-active-light-primary"
		}
	}).then((function(e) {
		e.value ? Swal.fire({
			text: "You have successfully deleted a book!",
			icon: "success",
			buttonsStyling: !1,
			confirmButtonText: "Ok, got it!",
			customClass: {
				confirmButton: "btn fw-bold btn-primary"
			}
		}).then((function() {
			e.draw()
		}))
		 : "cancel" === e.dismiss && Swal.fire({
			text: "Book was not deleted.",
			icon: "error",
			buttonsStyling: !1,
			confirmButtonText: "Ok, got it!",
			customClass: {
				confirmButton: "btn fw-bold btn-primary"
			}
		})
	}))
});

btn_save.addEventListener('click', e => {
    e.preventDefault();

    Swal.fire({
		text: "Are you sure you want to save changes?",
		icon: "warning",
		showCancelButton: !0,
		buttonsStyling: !1,
		confirmButtonText: "Yes, save!",
		cancelButtonText: "No, cancel",
		customClass: {
			confirmButton: "btn fw-bold btn-danger",
			cancelButton: "btn fw-bold btn-active-light-primary"
		}
	}).then((function(e) {
		e.value ? Swal.fire({
			text: "You have successfully edited a book!",
			icon: "success",
			buttonsStyling: !1,
			confirmButtonText: "Ok, got it!",
			customClass: {
				confirmButton: "btn fw-bold btn-primary"
			}
		}).then((function() {
			e.draw()
		}))
		 : "cancel" === e.dismiss && Swal.fire({
			text: "Changes was not saved.",
			icon: "error",
			buttonsStyling: !1,
			confirmButtonText: "Ok, got it!",
			customClass: {
				confirmButton: "btn fw-bold btn-primary"
			}
		})
	}))
});