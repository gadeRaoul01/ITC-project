@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/advanced_modals.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/datetime/css/jquery.datetimepicker.css')}}">
{{--    <script src="{{asset('assets/css/loading-bar.css')}}" type="text/javascript"></script>--}}


@endsection

@section('sectionClassContent')
    {{__('p-l-r-15')}}
@endsection
@section('link-right')
    {{--    <div class="col-lg-6 col-lg-offset-4 col-md-8 col-sm-9 col-xs-6">--}}
        <SoldeComponent></SoldeComponent>
<btnaddcomponent></btnaddcomponent>


    {{--    </div>--}}
@endsection
@section('linkTitle')
    {{__('Investissement')}}
@endsection

@section('link')
    <li>
        <a href="{{route('home')}}">
            <i class="fa fa-fw ti-home"></i> Dashboard
        </a>
    </li>
    <li class="active">
        <a href="{{route('investissement')}}">
            Mes investissemennts
        </a>
    </li>
@endsection


@section('content')
  <systemeinformationcomponent></systemeinformationcomponent>
    <investissementlistecomponent ></investissementlistecomponent>

@endsection


@section('script')

@endsection
