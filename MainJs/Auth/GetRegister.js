$(document).ready(function () {

   // form event
   $("#form_register").submit(function (event) {

      event.preventDefault();
      // create object to grab the data from inpust
      var dataform = {
         name: $("#name-input").val(),
         email: $("#email-input").val(),
         password: $("#create-password").val(),
         confirm_pass: $("#confirm-pass").val(),
      };

      // next is creat ajax request
      $.ajax({
         type: "POST",
         url: "../Auth/GetRegister.php",
         data: dataform,
         dataType: "json",
         encode: true,
         success: function (data) {
            // checking if the data.success is false then display all the error massage
            if (
               !data.success &&
               data.message !== "this email is already exist"
            ) {
               if (data.errors.name) {
                  $("#name-msg").html(data.errors.name);
                  $("#name-input").addClass("is-invalid");
               } else {
                  $("#name-input").removeClass("is-invalid");
               }
               if (data.errors.email) {
                  $("#email-msg").html(data.errors.email);
                  $("#email-input").addClass("is-invalid");
               } else {
                  $("#email-input").removeClass("is-invalid");
               }
               if (data.errors.password) {
                  $("#use-pass").html(data.errors.password);
                  $("#create-password").addClass("is-invalid");
               } else {
                  $("#create-password").removeClass("is-invalid");
               }
               if (data.errors.confirm_pass) {
                  $("#confirm-msg").html(data.errors.confirm_pass);
                  $("#confirm-pass").addClass("is-invalid");
               } else {
                  $("#confirm-pass").removeClass("is-invalid");
               }
            } else {
               // else display the alert success
               if (data.message.trim() === "this email is already exist") {
                  console.log(data.message);
                  $("body").html(
                     `<div class="col-lg-5">
                             <div class="alert alert-danger"> 
                              <i class="fa-solid fa-triangle-exclamation"></i>
                             ${data.message}
                             </div>
                             <a class="btn btn-danger" href="../View/Register.php">try again</a>
                          </div>
                          `
                  );
               } else {
                  $("body").html(
                     `<div class="col-lg-5">
                             <div class="alert alert-success"> 
                            <i class="fa-solid fa-circle-check"></i>
                             ${data.message}
                             </div>
                             <a class="btn btn-success" href="../View/Login.php">login your account</a>
                          </div>
                     `
                  );
               }
            }
         }
      });


   });
});
