@extends('layouts.zircos')

@section('content')
<div class="container">


    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Dahsboard') }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="active">
                        {{ __('Home') }}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->



</div> <!-- container -->
@endsection