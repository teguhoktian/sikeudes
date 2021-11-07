<div class="form-group row {{ $errors->has('tahun') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Tahun Anggaran') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('tahun', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('tahun')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

