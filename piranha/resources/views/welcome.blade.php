<!DOCTYPE html>
<html lang="en">
<!-- Visit codeastro.com for more projects -->

<head>
    <title>Gym System Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('login/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('login/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('login/css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('login/css/matrix-login.css')}}" />
    <link href="{{asset('login/font-awesome/css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('login/font-awesome/css/all.css')}}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <div id="loginbox">
        <form id="loginform" method="POST" class="form-vertical" action="#">
            <div class="control-group normal_text">
                <h3><img src="{{asset('login/img/icontest3.png')}}" alt="Logo" /></h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="fas fa-user-circle"></i></span><input type="text" name="user" placeholder="Username" required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="fas fa-lock"></i></span><input type="password" name="pass" placeholder="Password" required />
                    </div>
                </div>
            </div>
            <div class="form-actions center">
                <!-- <span class="pull-right"><a type="submit" href="index.html" class="btn btn-success" /> Login</a></span> -->
                <!-- <input type="submit" class="button" title="Log In" name="login" value="Admin Login"></input> -->
                <button type="submit" class="btn btn-block btn-large btn-info" title="Log In" name="login" value="Admin Login"> Login</button>
            </div>
        </form>

        <div class="pull-left">
            <a href="customer/index.php">
                <h6>Customer Login</h6>
            </a>
        </div>
    </div>

    <script src="{{asset('login/js/jquery.min.js')}}"></script>
    <script src="{{asset('login/js/matrix.login.js')}}"></script>
    <script src="{{asset('login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login/js/matrix.js')}}"></script>
</body>
<!-- Visit codeastro.com for more projects -->

</html>