$(document).ready(() => {
  $(".btn-detail").on("click", function (event) {
    const customerId = this.getAttribute("data-id");
    window.location.href = "/customer/show/" + customerId;
  });

  $(".btn-back").on("click", function (event) {
    window.history.go(-1);
  });

  $(".btn-update").on("click", function (event) {
    $(".show-id").show();
    $("#id").prop("disabled", false);
    $("#id").prop("readonly", true);
    $("#id").val(this.getAttribute("data-id"));
    $("#name").val(this.getAttribute("data-name"));
    $("#phone").val(this.getAttribute("data-phone"));
    $("#address").val(this.getAttribute("data-address"));
    $("#email").val(this.getAttribute("data-email"));
    $("#modalLabel").text("Update Customer");
    $("#btn-submit").text("Update");
  });

  $(".btn-add").on("click", function (event) {
    $("#name").val("");
    $("#phone").val("");
    $("#address").val("");
    $("#email").val("");
    $("#modalLabel").text("Add Customer");
    $("#btn-submit").text("Add");
  });

  $(".btn-delete").on("click", function (event) {
    $("#idDelete").val(this.getAttribute("data-id"));
    $("#nameDelete").val(this.getAttribute("data-name"));
  });
});
