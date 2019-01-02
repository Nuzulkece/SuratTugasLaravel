@extends('layouts.dashboard')

@section('judul')
<section class="content-header">
      <h1>
        Surat Tugas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route ('st_surat.index')}}"><i class="fa fa-envelope"></i> Surat Tugas</a></li>
         <li class="active"><a href="{{ route ('st_surat.create')}}"><i class="fa fa-plus-square "></i> Tambah Surat Tugas</a></li>
      </ol>
    </section>
@endsection

@section('content')
	<div class="container">
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> Buat Surat Tugas </h3>
				</div>
				<div class="box-body">
				<form class="" action="{{ route ('st_surat.store')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group has-feedback {{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
						<label>Pegawai</label><br>
						<select class="selectpicker" data-live-search="true" multiple="multiple" name="pegawai_id[]" class="form-control">
							@foreach ($pegawai as $pegawaiku)
								<option value="{{ $pegawaiku->id }}"> {{ $pegawaiku->pegawai }}</option>
							@endforeach
						</select>
						@if ($errors->has('$pegawai_id'))
							<span class="help-block">
								<p>{{ $errors->first('pegawai_id') }}</p>
							</span>
						@endif
					</div>
					
					
					<div class="form-group has-feedback {{ $errors->has('jabatan') ? ' has-error' : '' }}">
						<label>Jabatan</label>
						<input type="text" class="form-control" name="jabatan" placeholder="isi jabatan" value="{{ old('jabatan')}}">
						@if ($errors->has('jabatan'))
							<span class="help-block">
								<p>{{ $errors->first('jabatan') }}</p>
							</span>
						@endif
					</div>

					<div class="form-group has-feedback {{ $errors->has('kegiatan') ? ' has-error' : '' }}">
						<label>Kegiatan</label>
						<input type="text" class="form-control" name="kegiatan" placeholder="isi kegiatan" value="{{ old('kegiatan')}}">
						@if ($errors->has('kegiatan'))
							<span class="help-block">
								<p>{{ $errors->first('kegiatan') }}</p>
							</span>
						@endif
					</div>

					<div class="form-group has-feedback {{ $errors->has('nomor_polisi') ? ' has-error' : '' }}">
						<label>Nomor Polisi</label>
						<input type="text" class="form-control" name="nomor_polisi" placeholder="isi nomor polisi" value="{{ old('nomor_polisi')}}">
						@if ($errors->has('nomor_polisi'))
							<span class="help-block">
								<p>{{ $errors->first('nomor_polisi') }}</p>
							</span>
						@endif
					</div>
					
					<div class="form-group has-feedback {{ $errors->has('tanggal_tugas') ? ' has-error' : '' }}">
						<label>Tanggal Tugas</label>
						<input type="date" class="form-control" name="tanggal_tugas">
						@if ($errors->has('tanggal_tugas'))
							<span class="help-block">
								<p>{{ $errors->first('tanggal_tugas') }}</p>
							</span>
						@endif
					</div>

					<div class="form-group has-feedback {{ $errors->has('tanggal_akhir') ? ' has-error' : '' }}">
						<label>Sampai dengan</label>
						<input type="date" class="form-control" name="tanggal_akhir">
						@if ($errors->has('tanggal_akhir'))
							<span class="help-block">
								<p>{{ $errors->first('tanggal_akhir') }}</p>
							</span>
						@endif
					</div>

					<div class="form-group has-feedback {{ $errors->has('tujuan_id') ? ' has-error' : '' }}">
						<label>Tujuan</label><br>
						<select class="selectpicker" data-live-search="true" multiple="multiple" name="tujuan_id[]" class="form-control">
							@foreach ($tujuan as $tujuanku)
								<option value="{{ $tujuanku->id }}"> {{ $tujuanku->tujuan }}</option>
							@endforeach
						</select>
						@if ($errors->has('$tujuan_id'))
							<span class="help-block">
								<p>{{ $errors->first('tujuan_id') }}</p>
							</span>
						@endif
					</div>
					
					<div class="form-group">
						<label>Tampilkan Kolom Tanda Tangan Customer ?</label><br>
						<select name="status_ttd" class="selectpicker">
								<option value="1">Iya</option>
								<option value="2">Tidak</option>
						</select>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				
						<a href="{{ route ('st_surat.index') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Batal</a>

					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
@endsection