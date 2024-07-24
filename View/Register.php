<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d4532539ca.js" crossorigin="anonymous"></script>
    <!--    ajax cdn-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../MainJs/Auth/GetRegister.js"></script>
    <title>Register</title>
</head>
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(32, 41, 64, 1);
        height: 100vh;
        color: #f2f2f2;
    }
    input{
        outline: none;
    }
</style>
<body class="flex-column">

<form id="form_register" method="POST" action="../Auth/GetRegister.php" class="d-flex flex-column gap-2  col-lg-3">
    <div>
        <h3>Sign Up</h3>
    </div>

    <div>
        <label for="name-input">Name</label>
        <input class="form-control border-2" type="text" name="name-input" id="name-input" placeholder="Full Name" autocomplete="neme">
     <div id="name-msg" class="invalid-feedback">
     </div>
    </div>

    <div>
        <label for="email-input">Email Address</label>
        <input  class="form-control" name="email-input" type="email" id="email-input" placeholder="Example@gmail.com" autocomplete="new-emai">
        <div id="email-msg" class="invalid-feedback">
        </div>
    </div>

    <div>
        <label for="create_password">Create Password</label>
        <input  class="form-control" type="password" name="create_password" id="create-password" placeholder="Create Password" autocomplete="new-password">
        <div id="use-pass" class="invalid-feedback">
        </div>
    </div>

    <div>
        <label for="confirm-pass">Confirm Password</label>
        <input  class="form-control" type="password" name="confirm_pass" id="confirm-pass" placeholder="Confirm Password" autocomplete="new-password">
        <div id="confirm-msg" class="invalid-feedback">
        </div>
    </div>

    <button id="btn_sub" style="background-color: #20c997" type="submit" class="btn">Register</button>
    <div class="d-flex gap-1 ">
        <p>Already hove an account</p>
        <a href="Login.php">Login</a>
    </div>
</form>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>