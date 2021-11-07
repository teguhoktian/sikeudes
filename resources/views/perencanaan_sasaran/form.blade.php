<div class="form-group row {{ ($errors->has('kode') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Kode') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('kode', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('kode')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('uraian') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Uraian') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::textarea('uraian', null, [ 'class' => 'form-control form-control-sm ']) }}
        @error('uraian')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>