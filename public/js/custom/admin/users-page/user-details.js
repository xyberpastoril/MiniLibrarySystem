var kt_form_user_details = document.getElementById("kt_form_user_details"),
  btn_group = document.getElementById("btn_group"),
  btn_delete = document.getElementById("btn_delete"),
  btn_discard = document.getElementById("btn_discard");

kt_form_user_details.addEventListener("input", function () {
  btn_group.classList.remove("visually-hidden");
  btn_delete.classList.add("visually-hidden");
});

btn_discard.addEventListener("click", function () {
  btn_group.classList.add("visually-hidden");
  btn_delete.classList.remove("visually-hidden");
});
