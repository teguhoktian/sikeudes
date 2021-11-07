@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Rekening Akun') }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Rekening Akun') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Rekening Akun') }}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b> {{ __('Edit Data') }} </b></h4>

                {{ Form::model($rekeningAkun, [ 'route' => ['rekening-akun.update', $rekeningAkun->id], 'autocomplete' => 'off', 'method' => 'PATCH', 'enctype' => 'multipart/form-data' ]) }}

                @include('rekening_akun.form')
                <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save"></i> {{ __('Simpan') }}</button>
                <a href="{{ route('rekening-akun.index') }}" class="btn-danger btn">{{ __('Kembali') }}</a>
                </form>
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