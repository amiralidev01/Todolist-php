<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login-Page</title>
    <!--    BootStrap cdn   -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4" style="margin-top: 70px">
            <form action="../login.php?action=login" method="post">

                <h2>Log-In</h2>
                <hr>
                <input type="email" name="email" placeholder="Email..." class="form-control">
                <br>
                <input type="password" name="password" placeholder="Password..." class="form-control">
                <br>
                <button class="btn btn-danger">Login</button>
                <hr>
                you don't have account?<a href="../register.php">register</a>
            </form>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
</body>
</html>