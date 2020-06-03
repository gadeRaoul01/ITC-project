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
    {{__('Gestion des années')}}
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
    <li class="active">
        <a href="{{route('getAnnee')}}">
            années
        </a>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left m-t-6">
                        <i class="ti-user"></i> Liste des jours férirés
                    </h4>

                    <div class="pull-right">


                        <a type="button" class="btn btn-primary btn-sm " id="addJourFerie"><i class=" ti-plus"></i>
                            ajouter un jour férié
                        </a>
                        <a type="button" class="btn btn-primary  btn-sm" id="addAnnee"><i class=" ti-plus"></i> Ajouter
                            une année
                        </a>
                        <a type="text" class="btn btn-default btn-sm">
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
                    <div class="table-responsive">
                        <table class="table table-bordered " id="jfTable">
                            <thead>
                            <tr class="filters">
                                <th>N°</th>
                                <th>Date</th>
                                <th>Motif</th>
                                <th>crée le</th>
                                <th>Modifié le</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- /.modal-dialog -->
        </div>
    </div>

    @include('admin.annee.modal')
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
    <script src="{{asset('assets/js/custom_js/annee/annee.js')}}" type="text/javascript"></script>

@endsection
