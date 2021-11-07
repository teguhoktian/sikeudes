@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Pelaksana Kegiatan') }} - {{ Auth::user()->desa->nama }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Pelaksana Kegiatan') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Pelaksana Kegiatan') }}
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

                {{ Form::model($pelaksanaKegiatan, [ 'route' => ['pelaksana-kegiatan.update', $pelaksanaKegiatan->id], 'autocomplete' => 'off', 'method' => 'PATCH', 'enctype' => 'multipart/form-data' ]) }}

                @include('pelaksana_kegiatan.form')
                <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save"></i> {{ __('Simpan') }}</button>
                <a href="{{ route('pelaksana-kegiatan.index') }}" class="btn-danger btn">{{ __('Kembali') }}</a>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->
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
</script>
@stop