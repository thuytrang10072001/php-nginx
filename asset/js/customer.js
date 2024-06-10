$(document).ready(() => {
  $(".btn-detail").on("click", function (event) {
    const customerId = this.getAttribute("data-id");
    window.location.href = "/customer/show/" + customerId;
  });

  $(".btn-back").on("click", function (event) {
    window.history.go(-1);
  });


  // $("#form").on("submit", function(event){
  //   let action;
  //   if($('#id').val()){
  //     action = 'update';
  //   }else{
  //     action = 'insert';
  //   }
  //   window.location.href = 'http://localhost:8080/customer/' + action;
  // })

  // async function sendData() {
  //   const data = {
  //       id: $('#id').val() ? $('#id').val() : '',
  //       name: $('#name').val(),
  //       phone: $('#phone').val(),
  //       address: $('#address').val(),
  //       email: $('#email').val()
  //   };

  //   try {
  //       const response = await fetch(data.id? '../update' : '../insert', {
  //           method: 'POST',
  //           headers: {
  //               'Content-Type': 'application/json'
  //           },
  //           body: JSON.stringify(data)
  //       });

  //       const result = await response.json();
  //       console.log(result);
  //       alert('Response from server: ' + result.message);
  //   } catch (error) {
  //       console.error('Error:', error);
  //   }
  // }

  $(".btn-update").on("click", function (event) {
    // $(".show-id").show();
    // $("#id").prop("disabled", false);
    // $("#id").prop("readonly", true);
    $("#id").val(this.getAttribute("data-id"));
    $("#nameUpdate").val(this.getAttribute("data-name"));
    $("#phoneUpdate").val(this.getAttribute("data-phone"));
    $("#addressUpdate").val(this.getAttribute("data-address"));
    $("#emailUpdate").val(this.getAttribute("data-email"));
    // $("#modalLabel").text("Update Customer");
    // $("#btn-submit").text("Update");
  });

  $(".btn-add").on("click", function (event) {
    $("#name").val("");
    $("#phone").val("");
    $("#address").val("");
    $("#email").val("");
    // $("#modalLabel").text("Add Customer");
    // $("#btn-submit").text("Add");
  });

  $(".btn-delete").on("click", function (event) {
    $("#idDelete").val(this.getAttribute("data-id"));
    $("#nameDelete").val(this.getAttribute("data-name"));
  });
});
