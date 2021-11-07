@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Rekening Kelompok') }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Rekening Kelompok') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Rekening Kelompok') }}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>{{ __('Update Data') }}</b></h4>
                <p class="text-muted m-b-30 font-13">
                    {{ __('Update Data Rekening Kelompok') }}
                </p>

                <div class="row">
                    <div class="col-md-12">
                        {{ Form::model($rekeningKelompok, [ 'route' => ['rekening-kelompok.update', $rekeningKelompok->id], 'autocomplete' => 'off', 'method' => 'PATCH', 'enctype' => 'multipart/form-data' ]) }}

                        @include('rekening_kelompok.form')
                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save"></i> {{ __('Simpan') }}</button>
                        <a href="{{ route('rekening-kelompok.index', ['rekening_akun' => $rekeningKelompok->akun->id]) }}" class="btn-danger btn">{{ __('Kembali') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div> <!-- container -->
@endsection

@section('styles')
@stop

@section('javascript')
@stop