<div class="form-group row {{ $errors->has('nama') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Nama') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('nama', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('nama')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('jabatan') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Jabatan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('jabatan', null, [ 'class' => 'form-control form-control-sm ' ]) }}
        @error('jabatan')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('tanggal_mulai_jabatan') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Tgl. Mulai Jabatan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('tanggal_mulai_jabatan', null, [ 'class' => 'form-control form-control-sm datepicker1' ]) }}
        @error('tanggal_mulai_jabatan')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ ($errors->has('tanggal_akhir_jabatan') ? ' has-error' : '') }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Tgl. Akhir Jabatan') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::text('tanggal_akhir_jabatan', null, [ 'class' => 'form-control form-control-sm datepicker2' ]) }}
        @error('tanggal_akhir_jabatan')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row {{ $errors->has('aktif') ? ' has-error' : '' }}">
    <label class="col-sm-3 col-md-3 col-lg-2" for="inputName">{{ __('Aktif') }}</label>
    <div class="col-sm-9 col-md-9 col-lg-10">
        {{ Form::select('aktif', ['Tidak' => __('Tidak'), 'Ya' => __('Ya')], null, ['id' => 'select2', 'class' => 'form-control form-control-sm ' . ($errors->has('id_sub_bidang') ? ' is-invalid' : '')]) }}
        @error('aktif')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>