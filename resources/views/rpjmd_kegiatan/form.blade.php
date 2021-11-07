<div class="form-group row {{ $errors->has('id_kegiatan') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Kegiatan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_kegiatan', $kegiatans, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('id_kegiatan')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('id_sasaran') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Sasaran Renstra') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_sasaran', $sasarans, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('id_sasaran')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('lokasi') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Lokasi') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('lokasi', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('lokasi')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('keluaran') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Keluaran') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('keluaran', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('keluaran')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('sasaran_manfaat') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Sasaran Manfaat') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('sasaran_manfaat', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('sasaran_manfaat')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Pelaksanaan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        @for($i=1; $i<=6; $i++) <div class="checkbox checkbox-primary">
            @if(Route::is('rpjmd.kegiatan.create'))
            <input id="checkbox{{$i}}" value="{{ $i }}" type="checkbox" name="tahun[]">
            @else
            <input id="checkbox{{$i}}" value="{{ $i }}" type="checkbox" name="tahun[]" {{ (in_array($i, $rpjmd_kegiatan->tahuns()->pluck('tahun_ke')->toArray())) ? 'checked' : '' }}>
            @endif
            <label for="checkbox{{$i}}">
                {{ __('Tahun Ke ') }} {{ $i }}
            </label>
    </div>
    @endfor
</div>
</div>


<div class="form-group row {{ $errors->has('pola') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Kegiatan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('pola', $pola_kegiatan, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('pola')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>