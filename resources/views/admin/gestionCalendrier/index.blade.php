@extends('layouts.admin.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.print.css')}}" rel="stylesheet" media='print'
          type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/advanced_modals.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/datetime/css/jquery.datetimepicker.css')}}">

    <link href="{{asset('assets/css/calendar_custom.css')}}" rel="stylesheet" type="text/css"/>


@endsection

@section('sectionClassContent')
    {{__('p-l-r-15')}}
@endsection

@section('linkTitle')
    {{__('Gestion des calendrier')}}
@endsection

@section('link')
    <li>
        <a href="{{route('home')}}">
            <i class="fa fa-fw ti-home"></i> Dashboard
        </a>
    </li>

    <li class="active">
        <a href="{{route('getCalendar')}}">
            calendriers
        </a>
    </li>
@endsection

@section('content')
    <div class="row">

        <div class="col-lg-12" id="showAdmin" style="display: none">
            <div class="panel filterable">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left m-t-6">
                        <i class="ti-list"> </i> Détails
                    </h3>
                    <div class="pull-right">
                        <button type="button" onclick="document.getElementById('showAdmin').style.display = 'none'"
                                class="btn btn-danger btn-sm" id="addButton"><i class=" ti-close"></i>
                        </button>

                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-2 col-sm-12 col-xs-12 invoice_bg">
                        <h4><img src="{{asset('assets/img/users/default.png')}}" id="sImage" alt="logo de microF+"/>
                        </h4>

                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 invoice_bg">

                        <h4><strong>Information de <span id="title-info"></span> :</strong></h4>
                        <address>
                            <strong>Nom & prénoms :</strong> <span id="sNom"></span> <br/>
                            <strong>Sexe :</strong> <span id="sSexe"></span> <br/>
                            <strong>Email :</strong> <span id="sEmail"></span> <br/>
                            <strong>Username :</strong> <span id="sUsername"></span> <br/>

                        </address>
                    </div>

                    <div class="col-md-5 col-sm-12 col-xs-12 invoice_bg text-left">
                        <div>
                            <h4 class="text-right"><strong>#678956 / 25 Sep 2016</strong></h4>
                            <address>
                                <strong>Contact :</strong> <span id="sContact"></span> <br/>
                                <strong>Adresse :</strong> <span id="sAdresse"></span> <br/>
                                <strong>Crée le :</strong> <span id="sCreatedAt"></span> <br/>
                                <strong>Mise à jour le :</strong> <span id="sUpdatedAt"></span> <br/>
                                <strong>Profil :</strong> <span id="sProfil"></span> <br/>

                            </address>
                            <span></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12" id="showAdmin">
            <div class="panel filterable">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left m-t-6">
                        <i class="ti-calendar "></i> Calendrier de l'année : <b id="annee"></b>
                    </h3>
                    <div class="pull-right">
                        <a type="button" class="btn btn-primary btn-sm" id="addJourFerie"><i class=" ti-plus"></i> ajouter un jour férié
                        </a>
                        <a type="button" href="{{route('getAnnee')}}" class="btn btn-primary  btn-sm" id="addButton"><i class=" ti-calendar"></i> Gestion des années
                        </a>
                        <a type="text"  class="btn btn-default btn-sm">
                            <select id="anneeSelect" name="anneeSelect" class="form-control col-lg-2">
                                <option value="" disabled="" selected="">
                                    Selectionnez une année
                                </option>
                                @foreach($annees as $annee)
                                    <option value="{{$annee->id}}">{{$annee->libelle}}</option>
                                @endforeach
                            </select>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>

        </div>
    </div>

    @include('admin.gestionCalendrier.modals')
@endsection


@section('script')

    <!-- begining of page level js -->
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/custom_js/users/users.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/custom_js/advanced_modals.js')}}"></script>



    <!-- end of page level js -->
    <script src="{{asset('assets/vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>
    <script src="{{asset('assets/vendors/datetime/js/jquery.datetimepicker.full.min.js')}} " type="text/javascript"></script>
    <script src="{{asset('assets/js/custom_js/calendar_custom.js')}}" type="text/javascript"></script>

@endsection
