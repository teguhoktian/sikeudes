@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Penganggaran Sub Bidang') }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Penganggaran Sub Bidang') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Penganggaran Sub Bidang') }}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b> {{ __('Tambah Data') }} </b></h4>

                {!! Form::open(['route' => ['penganggaran.subbidang.store', $bidang->id], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    <label>{{ __('Data Sub Bidang') }}</label>
                    <div>
                        @foreach($subbidangs as $subbidang)
                        <div class="checkbox checkbox-custom">
                            {{ Form::checkbox('id_sub_bidang[]', $subbidang->id, null, ['id' => "checkbox". $loop->iteration, 'data-parsley-multiple' => 'groups', 'data-parsley-multiple' => 'groups' ]) }}
                            <label for="checkbox{{ $loop->iteration }}">{{ $subbidang->full_name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save"></i> {{ __('Simpan') }}</button>
                <a href="{{ route('penganggaran.subbidang.index', ['bidang' => $bidang->id]) }}" class="btn-danger btn">{{ __('Kembali') }}</a>
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