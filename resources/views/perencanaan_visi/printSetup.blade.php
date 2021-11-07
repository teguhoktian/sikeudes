@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Visi') }} - {{ Auth::user()->desa->nama }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Visi') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Visi') }}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b> {{ __('Setup Printer') }} </b></h4>

                {{ Form::model($visi, [ 'route' => ['visi.print.store', $visi->id], 'autocomplete' => 'off', 'method' => 'PATCH', 'enctype' => 'multipart/form-data' ]) }}

                <div class="form-group row {{ ($errors->has('tempat') ? ' has-error' : '') }}">
                    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Tempat Penetapan') }}</label>
                    <div class="col-sm-9 col-md-9 col-lg-10">
                        {{ Form::text('tempat', null, [ 'class' => 'form-control form-control-sm ' ]) }}
                        @error('tempat')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row {{ ($errors->has('tanggal_penetapan') ? ' has-error' : '') }}">
                    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Tgl. Penempatan') }}</label>
                    <div class="col-sm-9 col-md-9 col-lg-10">
                        {{ Form::text('tanggal_penetapan', null, [ 'class' => 'form-control form-control-sm datepicker1' ]) }}
                        @error('tanggal_penetapan')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('id_kepala_desa') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Kepala Desa') }}</label>
                    <div class="col-sm-9 col-md-9 col-lg-10">
                        {{ Form::select('id_kepala_desa', $kepala_desas, null, ['id' => 'select2', 'class' => 'form-control form-control-sm ']) }}
                        @error('id_kepala_desa')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('id_sekretaris_desa') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Sekretaris Desa') }}</label>
                    <div class="col-sm-9 col-md-9 col-lg-10">
                        {{ Form::select('id_sekretaris_desa', $sekretaris_desas, null, ['id' => 'select2', 'class' => 'form-control form-control-sm ']) }}
                        @error('id_sekretaris_desa')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save"></i> {{ __('Simpan') }}</button>
                <a class="btn-default btn" onclick="printPdf()"><i class="mdi mdi-printer"></i> {{ __('Cetak') }}</a>
                <a href="{{ route('visi.index') }}" class="btn-danger btn">{{ __('Kembali') }}</a>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->
    {{ Form::open(['route' => ['visi.print.download', 'visi' => $visi->id ], 'autocomplete' => 'off', 'id' => 'formDownload', 'enctype' => 'multipart/form-data']) }}
    {{ Form::close() }}
</div> <!-- container -->
@endsection

@section('styles')
<link href="template/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
@stop

@section('javascript')
<script src="template/plugins/moment/moment.js"></script>
<script src="template/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker1, .datepicker2, .datepicker3').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });
    })

    function printPdf() {
        $('#formDownload').submit();
    }
</script>
@stop