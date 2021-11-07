@extends('layouts.zircos')

@section('content')
<div class="container">


    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Starter Page </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Zircos</a>
                    </li>
                    <li>
                        <a href="#">Pages </a>
                    </li>
                    <li class="active">
                        Blank Page
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
        {{ Auth::user()->village->budget_periods }}
    </div>
    <!-- end row -->



</div> <!-- container -->
@endsection