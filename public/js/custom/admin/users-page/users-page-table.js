"use strict";
var KTUsersList = function() {
	var e, t, n, r, o = document.getElementById("kt_table_users"),
		c = () => {
			o.querySelectorAll('[data-kt-users-table-filter="delete_row"]').forEach((t => {
				t.addEventListener("click", (function(t) {
					t.preventDefault();
					const n = t.target.closest("tr"),
						r = n.querySelectorAll("td")[1].querySelectorAll("a")[0].innerText,
                        z = n.querySelectorAll("td")[0].querySelectorAll("input")[0].value;
					Swal.fire({
						text: "Are you sure you want to delete " + r + "?",
						icon: "warning",
						showCancelButton: !0,
						buttonsStyling: !1,
						confirmButtonText: "Yes, delete!",
						cancelButtonText: "No, cancel",
						customClass: {
							confirmButton: "btn fw-bold btn-danger",
							cancelButton: "btn fw-bold btn-active-light-primary"
						}
					}).then((function(t) {
						t.value ? Swal.fire({
							text: "You have deleted " + r + "!.",
							icon: "success",
							buttonsStyling: !1,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn fw-bold btn-primary"
							}
						}).then((function() {
                            $.ajax({
                                url:"users/"+z,
                                type:'DELETE',
                                data:{
                                    _token: $("input[name=_token]").val()
                                }
                            })
							e.row($(n)).remove().draw()
						})).then((function() {
							a()
						})) : "cancel" === t.dismiss && Swal.fire({
							text: r + " was not deleted.",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn fw-bold btn-primary"
							}
						})
					}))
				}))
			}))
		},
		l = () => {
			const c = o.querySelectorAll('[type="checkbox"]');
			t = document.querySelector('[data-kt-user-table-toolbar="base"]'), n = document.querySelector('[data-kt-user-table-toolbar="selected"]'), r = document.querySelector('[data-kt-user-table-select="selected_count"]');
			const s = document.querySelector('[data-kt-user-table-select="delete_selected"]');
			c.forEach((e => {
				e.addEventListener("click", (function() {
					setTimeout((function() {
						a()
					}), 50)
				}))
			})), s.addEventListener("click", (function() {
				Swal.fire({
					text: "Are you sure you want to delete selected users?",
					icon: "warning",
					showCancelButton: !0,
					buttonsStyling: !1,
					confirmButtonText: "Yes, delete!",
					cancelButtonText: "No, cancel",
					customClass: {
						confirmButton: "btn fw-bold btn-danger",
						cancelButton: "btn fw-bold btn-active-light-primary"
					}
				}).then((function(t) {
					t.value ? Swal.fire({
						text: "You have deleted all selected users!.",
						icon: "success",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn fw-bold btn-primary"
						}
					}).then((function() {
						c.forEach((t => {
							t.checked && e.row($(t.closest("tbody tr"))).remove().draw()
                            if(t.checked && t.value > 0)
                            {
                                $.ajax({
                                    url:"users/"+t.value,
                                    type:'DELETE',
                                    data:{
                                        _token: $("input[name=_token]").val()
                                    }
                                })
                            }
						}));
						o.querySelectorAll('[type="checkbox"]')[0].checked = !1
					})).then((function() {
						a(), l()
					})) : "cancel" === t.dismiss && Swal.fire({
						text: "Selected users was not deleted.",
						icon: "error",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn fw-bold btn-primary"
						}
					})
				}))
			}))
		};
	const a = () => {
		const e = o.querySelectorAll('tbody [type="checkbox"]');
		let c = !1,
			l = 0;
		e.forEach((e => {
			e.checked && (c = !0, l++)
		})), c ? (r.innerHTML = l, t.classList.add("d-none"), n.classList.remove("d-none")) : (t.classList.remove("d-none"), n.classList.add("d-none"))
	};
	return {
		init: function() {
			o && (e = $(o).DataTable({
                // dom: 'B',
                // buttons: [
                //     {
                //         extend: 'pdfHtml5',
                //         download: 'open'
                //     }
                // ],
				aLengthMenu: [5, 10, 25, 50, 100],
				searchDelay: 500,
				order: [[1, "asc"]],
				columnDefs: [
					{
						targets: 0,
						orderable: false,
					},
				],
			})).on("draw", (function() {
				l(), c(), a()
			})), l(), document.querySelector('[data-kt-user-table-filter="search"]').addEventListener("keyup", (function(t) {
				e.search(t.target.value).draw()
			})), document.querySelector('[data-kt-user-table-filter="reset"]').addEventListener("click", (function() {
				document.querySelector('[data-kt-user-table-filter="form"]').querySelectorAll("select").forEach((e => {
					$(e).val("").trigger("change")
				})), e.search("").draw()
			})), c(), (() => {
				const t = document.querySelector('[data-kt-user-table-filter="form"]'),
					n = t.querySelector('[data-kt-user-table-filter="filter"]'),
					r = t.querySelectorAll("select");
				n.addEventListener("click", (function() {
					var t = "";
					r.forEach(((e, n) => {
						e.value && "" !== e.value && (0 !== n && (t += " "), t += e.value)
					})), e.search(t).draw()
				}))
			})()
		}
	};
}();
KTUtil.onDOMContentLoaded((function() {
	KTUsersList.init()
}));

$(".verify-btn").click(function(e){
	e.preventDefault()
	console.log(this.getAttribute('data-id'))

	var user_id = this.getAttribute('data-id')
	var btn = this

	Swal.fire({
		text: "Are you sure you want to verify " + user_id + "?",
		icon: "warning",
		showCancelButton: !0,
		buttonsStyling: !1,
		confirmButtonText: "Yes, verify!",
		cancelButtonText: "No, cancel",
		customClass: {
			confirmButton: "btn fw-bold btn-danger",
			cancelButton: "btn fw-bold btn-active-light-primary"
		}
	}).then((function(t) {
		t.value ? $.ajax({
			url:"users/verify/"+user_id,
			type:'POST',
			data:{
				_token: $("input[name=_token]").val()
			},
			success: function(data, status, xhr) {
				console.log(data)

				if(data == '1')
				{
					Swal.fire({
						text: "You have verified " + user_id + "!.",
						icon: "success",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn fw-bold btn-primary"
						}
					})
					btn.remove()
				}
				else
				{
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
		}) : "cancel" === t.dismiss && Swal.fire({
			text: user_id + " was not verified.",
			icon: "error",
			buttonsStyling: !1,
			confirmButtonText: "Ok, got it!",
			customClass: {
				confirmButton: "btn fw-bold btn-primary"
			}
		})
	}))
})
