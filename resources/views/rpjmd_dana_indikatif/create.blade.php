@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('RPJMD Dana Indikatif') }} - {{ Auth::user()->desa->nama }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('RPJMD Dana Indikatif') }} </a>
                    </li>
                    <li class="active">
                        {{ __('RPJMD Dana Indikatif') }}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>{{ __('Tambah Data') }}</b></h4>
                <p class="text-muted m-b-30 font-13">
                    {{ __('Tambah Data Dana Indikatif') }}
                </p>

                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['route' => ['rpjmd.dana.indikatif.store', 'kegiatan' => $kegiatan->id], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}
                        @include('rpjmd_dana_indikatif.form')
                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save"></i> {{ __('Simpan') }}</button>
                        <a href="{{ route('rpjmd.dana.indikatif.index', ['kegiatan' => $kegiatan->id]) }}" class="btn-danger btn">{{ __('Kembali') }}</a>
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

<link href="template/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

@stop

@section('javascript')
<script src="template/plugins/moment/moment.js"></script>
<script src="template/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //console.log($("#tahun_ke option:selected").text())
        $('.datepicker1, .datepicker2, .datepicker3').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true,
        });

        $('#tahun_ke').change(function() {
            console.log($('#tahun_ke option:selected').text().slice(-1));
        });
    })
</script>
@stop