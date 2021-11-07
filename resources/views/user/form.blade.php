<div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Nama') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('name', null, [ 'class' => 'form-control form-control-sm ' . ($errors->has('name') ? ' is-invalid' : '') ]) }}
        @error('name')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('email') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Email') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('email', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('email')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('password') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Password') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::password('password', [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('password')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('password_confirmation') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Konfirmasi Password') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::password('password_confirmation', [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('password_confirmation')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('id_desa') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Desa') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_desa', $desas, null, ['id' => 'select2', 'class' => 'form-control form-control-sm ']) }}
        @error('id_desa')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>