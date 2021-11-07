@if(Route::is('kegiatan.edit'))
<div class="form-group row {{ $errors->has('id_sub_bidang') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Bidang') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('id_sub_bidang', $subBidangs, null, ['id' => 'select2', 'class' => 'form-control form-control-sm ' . ($errors->has('id_sub_bidang') ? ' is-invalid' : '')]) }}
        @error('id_bidang')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>
@endif

<div class="form-group row {{ $errors->has('nama') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Nama') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('nama', null, [ 'class' => 'form-control form-control-sm ' . ($errors->has('nama') ? ' is-invalid' : '') ]) }}
        @error('nama')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('kode') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Kode') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('kode', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('kode')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>