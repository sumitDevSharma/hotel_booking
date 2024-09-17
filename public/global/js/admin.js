jQuery(function ($) {
  jQuery.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content"),
    },
  });

  /* Action : ajax
   * used to: submit forms
   * Made by: Sumit Sharma
   * Instance of: Jquery vailidate libaray
   * @JSON
   **/
  $("#form").validate({
    errorPlacement: function (error, element) {
      return;
    },
    highlight: function (element) {
      $(element).addClass("is-invalid");
      $(element).parent().addClass("error");
    },
    unhighlight: function (element) {
      $(element).parent().removeClass("error");
      $(element).removeClass("is-invalid").addClass("is-valid");
    },
    submitHandler: function (form) {
      var formData = new FormData($("#form")[0]);
      $.ajax({
        beforeSend: function () {
          $("#form").find("button").attr("disabled", true);
          $("#form").find("button>i").show();
        },
        url: $("#form").attr("action"),
        data: formData,
        type: "POST",
        processData: false,
        contentType: false,
        success: function (response) {
          if (response.status == 200) {
            Notiflix.Notify.Success(response.message, "Success");
            if (response.reload != undefined) {
              location.reload();
            } else if (response.redirect_url != undefined) {
              setTimeout(function () {
                location.href = response.redirect_url;
              }, 1000);
            }
          } else {
          }
          $(".modal").modal("hide");
          $(".datatable").DataTable().ajax.reload();
        },
        complete: function () {
          $("#form").find("button").attr("disabled", false);
          $("#form").find("button>i").hide();
        },
        error: function (status, error) {
          var errors = JSON.parse(status.responseText);
          var msg_error = "";
          if (status.status == 401) {
            $("#form").find("button").attr("disabled", false);
            $("#form").find("button>i").hide();
            // check if error is object
            if (typeof errors.error == "object") {
              $.each(errors.error, function (i, v) {
                msg_error += v[0] + "!</br>";
                console.log(msg_error);
              });
            } else {
              console.log(errors);
              msg_error = errors.error;
            }
            Notiflix.Notify.Failure(msg_error, "Opps!");
          } else {
            Notiflix.Notify.Failure(errors.message, "Opps!");
          }
        },
      });
      return false;
    },
  });


});
