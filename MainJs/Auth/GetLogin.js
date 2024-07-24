$(document).ready(function () {
   // event for login form
   $("#form-login").submit(function (event) {

      event.preventDefault(); // peevent to refresh the page

      // crate object to grab the data from input
      var forData = {
         userEmail: $("#user-email").val(),
         pass: $("#password").val(),
      };

      // then make an ajax request
      $.ajax({
         type: "POST",
         url: "../Auth/GetLogin.php",
         data: forData,
         dataType: "json",
         encode: true,
         success: function (data) {

           if(data.message === 'your account is not found in our database!'){
              $('#message_con').html(
                  `
                    <span class="alert alert-danger">${data.message}</span>
                  `
              );
           }
            if (data.message == "success fully logged") {
                // create loader
                $('#btn_login').html(
                    `
                           <div class="spinner-border fs-1" role="status">
                                   <span class="visually-hidden">Loading...</span>
                               </div>
                         `
                );
                setTimeout(() =>{
                    location.href = "../View/homepage.php";
                },2000)

            }
         },
      });


   });
});
