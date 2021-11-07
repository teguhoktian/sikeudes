<div class="form-group row {{ $errors->has('id_rpjmd_tahun_kegiatan') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Tahun Kegiatan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_rpjmd_tahun_kegiatan', $tahun_kegiatans, null, ['id' => 'tahun_ke', 'class' => 'form-control form-control-sm', 'placeholder' => __('Pilih Tahun')]) }}
        @error('id_rpjmd_tahun_kegiatan')
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

<div class="form-group row {{ $errors->has('id_pelaksana_kegiatan') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Pelaksana') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_pelaksana_kegiatan', $pelaksana, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('id_pelaksana_kegiatan')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('id_sumber_dana') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Sumber Dana') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_sumber_dana', $sumber_dana, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('id_sumber_dana')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('biaya') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Biaya') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('biaya', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('biaya')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('waktu') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Waktu') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('waktu', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('waktu')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('mulai') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Tgl. Mulai') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('mulai', null, [ 'class' => 'form-control form-control-sm datepicker1' ]) }}
        @error('mulai')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('selesai') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Tgl. Selesai') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('selesai', null, [ 'class' => 'form-control form-control-sm datepicker2' ]) }}
        @error('selesai')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('pola') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Pola') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('pola', $pola_kegiatan, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('pola')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>