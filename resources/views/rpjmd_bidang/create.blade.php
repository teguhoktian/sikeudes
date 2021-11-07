@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Bidang') }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Bidang') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Bidang') }}
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

                {!! Form::open(['route' => ['rpjmd.bidang.store', ['visi' => $visi->id]], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    <label>{{ __('Data Bidang') }}</label>
                    <div>
                        @foreach($bidangs as $bidang)
                        <div class="checkbox checkbox-custom">
                            {{ Form::checkbox('id_bidang[]', $bidang->id, null, ['id' => "checkbox". $loop->iteration, 'data-parsley-multiple' => 'groups', 'data-parsley-multiple' => 'groups' ]) }}
                            <label for="checkbox{{ $loop->iteration }}">{{ $bidang->full_name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save"></i> {{ __('Simpan') }}</button>
                <a href="{{ route('rpjmd.bidang.index', ['visi' => $visi->id]) }}" class="btn-danger btn">{{ __('Kembali') }}</a>
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