<!DOCTYPE html>
<html>

<head>
    <title>::Admin Login::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <!-- Bootstrap -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- end of bootstrap -->
    <!--page level css -->
    <link type="text/css" href="{{asset('assets/vendors/themify/css/themify-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendors/iCheck/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/login.css')}}" rel="stylesheet">
    <!--end page level css-->
</head>

<body id="sign-in">

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 login-form">
            <div class="panel-header">
                <h2 class="text-center">
                    <img src="{{asset('assets/img/pages/clear_black.png')}}" alt="Logo">
                </h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <form action="{{route('login')}}" id="authentication" method="post" class="">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="sr-only"> E-mail</label>
                                <input type="text" class="form-control  form-control-lg" id="email" name="email"
                                       placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Mots de passe</label>
                                <input type="password" class="form-control form-control-lg" id="password"
                                       name="password" placeholder="Password">
                            </div>
                            <div class="form-group checkbox">
                                <label for="remember">
                                    <input type="checkbox" name="remember" id="remember">&nbsp; Se souvenir de moi
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Sign In" class="btn btn-primary btn-block"/>
                            </div>
                            <a href="forgot_password.html" id="forgot" class="forgot "> Mots de passe oubliée ? </a>

                            <span class="pull-right sign-up "><a href="register.html">Inscrivez-vous</a></span>
                        </form>
                    </div>
                </div>
                <div class="row text-center social">
                    <div class="col-xs-12">
                        <p class="alter">Connectez-vous avec</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="col-xs-6">
                                <a href="#" class="btn btn-lg btn-facebook">
                                    <i class="ti-facebook"></i>
                                </a>
                            </div>

                            <div class="col-xs-6">
                                <a href="#" class="btn btn-lg btn-google">
                                    <i class="ti-google"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- end of global js -->
<!-- page level js -->
<script type="text/javascript" src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/login.js')}}"></script>
<!-- end of page level js -->
</body>

</html>
