<div class="form-group row {{ ($errors->has('kode') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Kode') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('kode', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('kode')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('tahun_awal') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Tahun Awal') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('tahun_awal', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('tahun_awal')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('tahun_akhir') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Tahun Akhir') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('tahun_akhir', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('tahun_akhir')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('uraian') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Uraian') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('uraian', null, [ 'class' => 'form-control form-control-sm ' . ($errors->has('uraian') ? ' is-invalid' : '') ]) }}
        @error('uraian')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>