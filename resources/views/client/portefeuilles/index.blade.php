@extends('layouts.app')
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
    {{__('Portefeuille')}}
@endsection

@section('link')
    <li>
        <a href="{{route('home')}}">
            <i class="fa fa-fw ti-home"></i> Dashboard
        </a>
    </li>
    <li class="active">
        <a href="{{route('portefeuille')}}">
            Mon Portefeuille
        </a>
    </li>
@endsection

@section('link-right')
{{--    <div class="col-lg-6 col-lg-offset-4 col-md-8 col-sm-9 col-xs-6">--}}
                        <SoldeComponent ></SoldeComponent>

{{--    </div>--}}
@endsection
@section('content')
    <transactiontablecomponent></transactiontablecomponent>
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

    @endsection
