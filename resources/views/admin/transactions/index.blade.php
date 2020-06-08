@extends('layouts.admin.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/advanced_modals.css')}}">

{{--    <link rel="stylesheet" href="{{asset('assets/vendors/datetime/css/jquery.datetimepicker.css')}}">--}}


@endsection

@section('sectionClassContent')
    {{__('p-l-r-15')}}
@endsection

@section('linkTitle')
    {{__('Transactions')}}
@endsection

@section('link')
    <li>
        <a href="{{route('home')}}">
            <i class="fa fa-fw ti-home"></i> Dashboard
        </a>
    </li>
    <li class="active">
        <a href="{{route('transactions')}}">
            Transactions
        </a>
    </li>
@endsection
@section('content')

    @endsection
