<div class="form-group row {{ $errors->has('nama_paket') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Nama Paket') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('nama_paket', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('nama_paket')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('nilai_paket') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Nilai (Rp.)') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('nilai_paket', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('nilai_paket')
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

<div class="form-group row {{ $errors->has('pola_kegiatan') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Pola Kegiatan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('pola_kegiatan', $pola_kegiatan, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('pola_kegiatan')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('sifat_kegiatan') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Sifat Kegiatan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('sifat_kegiatan', $sifat_kegiatan, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('sifat_kegiatan')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('volume_paket') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Volume') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('volume_paket', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('volume_paket')
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



<div class="form-group row {{ $errors->has('lokasi_paket') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Lokasi') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('lokasi_paket', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('lokasi_paket')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>