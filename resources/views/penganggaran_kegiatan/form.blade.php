<div class="form-group row {{ $errors->has('id_kegiatan') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Kegiatan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_kegiatan', $kegiatans, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('id_kegiatan')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('id_pelaksana') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Pelaksana Kegiatan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_pelaksana', $pelaksanas, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('id_pelaksana')
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

<div class="form-group row {{ $errors->has('waktu_pelaksanaan') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Waktu Pelaks.') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('waktu_pelaksanaan', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('waktu_pelaksanaan')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('pagu') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Pagu') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('pagu', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('pagu')
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

<div class="form-group row {{ $errors->has('volume') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Volume') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('volume', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('volume')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('satuan') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Satuan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('satuan', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('satuan')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>