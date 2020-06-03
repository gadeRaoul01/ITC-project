<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>I.T.C | Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <!-- global css -->
    <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
    <!-- end of global css -->
    <!--page level css -->
    <link type="text/css" href="{{asset('assets/vendors/themify/css/themify-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendors/iCheck/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/passtrength/passtrength.css')}}">
    <link href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/login.css')}}" rel="stylesheet">
    <!--end of page level css-->
</head>

<body id="sign-up">
<div class="preloader">
    <div class="loader_img"><img src="{{asset('assets/img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 login-form">
            <div class="panel-header">
                <h2 class="text-center">
                    <img src="{{asset('assets/img/pages/clear_black.png')}}" alt="Logo">
                </h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="{{ route('register') }}" id="form-validation" method="post" class="signup_validator">
                        @csrf

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom" class="sr-only">Nom</label>
                                <input type="text" class="form-control  form-control-lg" id="nom" name="nom"
                                       placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prenom" class="sr-only">Prénoms</label>
                                <input type="text" class="form-control  form-control-lg" id="prenom" name="prenom"
                                       placeholder="Prénoms">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sexe" class="sr-only">Sexe</label>
                                <select id="sexe" name="sexe" class="form-control">
                                    <option value="">
                                        Sexe
                                    </option>
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dateNaissance" class="sr-only">Date de naissance</label>
                                <input type="date" class="form-control  form-control-lg" id="dateNaissance" name="dateNaissance"
                                       placeholder="Date de naissance">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="sr-only"> E-mail</label>
                                <input type="text" class="form-control  form-control-lg" id="email" name="email"
                                       placeholder="E-mail">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="contact" class="sr-only"> Contact</label>
                                <input type="text" class="form-control  form-control-lg" id="contact" name="contact"
                                       placeholder="Contact">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="sr-only"> Adresse</label>
                                <textarea type="text" class="form-control  form-control-lg" id="adresse" name="adresse"
                                          placeholder="Adresse"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirm-password" class="sr-only">Password</label>
                                <input type="password" class="form-control form-control-lg " id="password"
                                       name="password" placeholder="Mots de passe">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirm-password" class="sr-only">Password</label>
                                <input type="password" class="form-control form-control-lg " id="confirm_password"
                                       name="password_confirm" placeholder="Confirmer le mots de passe">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group checkbox">
                                <label for="terms">
                                    <input type="checkbox" name="terms" id="terms">&nbsp; J'accepte les <a href="javascript:void(0)">termes &amp; Conditions</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="S'inscrire" class="btn btn-primary btn-block"/>
                            </div>
                            <span class="sign-in">Vous avez déjà un compte ? <a href="{{route('login')}}">Connectez-vous</a></span>
                        </div>
                    </form>
                </div>
                <div class="row text-center social">
                    <div class="col-xs-12">
                        <p class="alter">Connectez-vous avec</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="col-xs-4">
                                <a href="javascript:void(0)" class="btn btn-lg btn-facebook">
                                    <i class="ti-facebook"></i>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="javascript:void(0)" class="btn btn-lg btn-google">
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
<!-- begining of page level js -->

<script type="text/javascript" src="{{asset('assets/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/vendors/select2/js/select2.js')}}"></script>
<script src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>
<script src="{{asset('assets/js/passtrength/passtrength.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/custom_js/register.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('assets/js/custom_js/form_validations.js')}}"></script>--}}

<!-- end of page level js -->
</body>

</html>
