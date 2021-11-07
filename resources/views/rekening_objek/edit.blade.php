@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Rekening Objek') }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Rekening Objek') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Rekening Objek') }}
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
                    {{ __('Update Data Rekening Objek') }}
                </p>

                <div class="row">
                    <div class="col-md-12">
                        {{ Form::model($rekeningObjek, [ 'route' => ['rekening-objek.update', $rekeningObjek->id], 'autocomplete' => 'off', 'method' => 'PATCH', 'enctype' => 'multipart/form-data' ]) }}

                        @include('rekening_objek.form')
                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save"></i> {{ __('Simpan') }}</button>
                        <a href="{{ route('rekening-objek.index', ['rekening_jenis' => $rekeningObjek->jenis->id]) }}" class="btn-danger btn">{{ __('Kembali') }}</a>
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