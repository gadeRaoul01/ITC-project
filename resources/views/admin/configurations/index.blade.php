@extends('layouts.admin.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/advanced_modals.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/datetime/css/jquery.datetimepicker.css')}}">


@endsection

@section('sectionClassContent')
    {{__('p-l-r-15')}}
@endsection

@section('linkTitle')
    {{__('Configurations')}}
@endsection

@section('link')
    <li>
        <a href="{{route('home')}}">
            <i class="fa fa-fw ti-home"></i> Dashboard
        </a>
    </li>
    <li class="active">
        <a href="{{route('configurations')}}">
            Configurations
        </a>
    </li>
@endsection


@section('content')


    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-settings"></i> Taux d'investissement
                </h3>
                <span class="pull-right">
                <a type="button" class="btn btn-primary btn-sm" id="addTaux"><i class=" ti-plus"></i>
                        </a>
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>

                            </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered " id="tauxTable">
                                <thead>
                                <tr class="filters">
                                    <th>N°</th>
                                    <th>Taux</th>
                                    <th>Etat</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-settings"></i> Nombre d'investissement simultané
                </h3>
                <span class="pull-right">
                      <a type="button" class="btn btn-primary btn-sm" id="addNbInvest"><i class=" ti-plus"></i>
                        </a>
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered " id="nbInvest">
                                <thead>
                                <tr class="filters">
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Etat</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-settings"></i> Nombre de jour d'investissement
                </h3>
                <span class="pull-right">
                      <a type="button" class="btn btn-primary btn-sm" id="addNb_jr"><i class=" ti-plus"></i>
                        </a>
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered " id="nb_jr">
                                <thead>
                                <tr class="filters">
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Etat</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-settings"></i> Intervalle d'investissemnt
                </h3>
                <span class="pull-right">
                      <a type="button" class="btn btn-primary btn-sm" id="addIntervalle_invest"><i class=" ti-plus"></i>
                        </a>
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered " id="intervalle_invest">
                                <thead>
                                <tr class="filters">
                                    <th>N°</th>
                                    <th>Min</th>
                                    <th>Max</th>
                                    <th>Etat</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-settings"></i> Nombre de recuperation
                </h3>
                <span class="pull-right">
                      <a type="button" class="btn btn-primary btn-sm" id="addNb_recup"><i class=" ti-plus"></i>
                        </a>
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered " id="nb_recup">
                                <thead>
                                <tr class="filters">
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Etat</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('admin.configurations.modals')
@endsection


@section('script')

    <!-- begining of page level js -->
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/custom_js/advanced_modals.js')}}"></script>
    <!-- end of page level js -->
    <script src="{{asset('assets/vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/datetime/js/jquery.datetimepicker.full.min.js')}} "
            type="text/javascript"></script>
    <script src="{{asset('assets/js/custom_js/config/config.js')}}" type="text/javascript"></script>

@endsection
