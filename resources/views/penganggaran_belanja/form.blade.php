<div class="form-group row {{ $errors->has('id_penganggaran_kegiatan') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Sumber Dana') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_penganggaran_kegiatan', $kegiatan, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('id_penganggaran_kegiatan')
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

<div class="form-group row {{ $errors->has('id_rekening_objek') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Kode Rekening') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_rekening_objek', $rekening_objek, null, ['id' => 'select2', 'class' => 'form-control form-control-sm']) }}
        @error('id_rekening_objek')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('uraian') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Uraian') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('uraian', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('uraian')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('harga_satuan') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Harga Satuan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('harga_satuan', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('harga_satuan')
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