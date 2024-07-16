<!doctype html><html lang="en"><head>    <meta charset="UTF-8">    <meta name="viewport"          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    <meta http-equiv="X-UA-Compatible" content="ie=edge">    <link rel="stylesheet" href="./css/bootstrap.min.css">    <script src="/js/bootstrap.bundle.min.js"></script>    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>l<!--    for icon-->    <script src="https://kit.fontawesome.com/d4532539ca.js" crossorigin="anonymous"></script>    <title>Login</title></head><style>    body{        display: flex;        justify-content: center;        align-items: center;        background-color: rgba(32, 41, 64, 1);        height: 100vh;    }</style><body class="flex-column"><div class="text-danger  p-4 " id="errorMessage"></div><div class="d-flex flex-column gap-2 shadow-sm p-5 rounded-3 bg-light col-lg-3">    <div>        <h3>Sign In</h3>    </div>    <div>        <label for="UserName">Email Address</label>        <input class="form-control" type="email" id="UserName" placeholder="Example@gmail.com">        <div id="useEmails" class="invalid-feedback">        </div>    </div>    <div>        <label for="Password">Password</label>        <input class="form-control" type="password" id="Password" placeholder="Password">        <div id="usePassword" class="invalid-feedback">        </div>    </div>    <button style="background-color: #20c997" id="btn_login" class="btn">        Login    </button>    <div class="d-flex gap-1 ">        <p>Don't hove an account</p>        <a href="./Register.php">Create account</a>    </div></div><script src="./MainJs/Auth/GetLogin.js"></script></body></html>