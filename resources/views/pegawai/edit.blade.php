@extends('layouts.dashboard')

@section('judul')
<section class="content-header">
      <h1>
        Manajemen Pegawai
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route ('st_surat.index')}}"><i class="fa fa-envelope"></i> Surat Tugas</a></li>
        <li><a href="{{ route ('st_pegawai.index')}}"><i class="fa fa-male"></i> Pegawai</a></li>
        <li class="active"><a href="{{ route ('st_pegawai.edit', $pegawai->id)}}"><i class="fa fa-edit"></i> Edit Pegawai</a></li>
      </ol>
      </ol>
    </section>
@endsection

@section('content')
	<div class="container">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="" action="{{ route ('st_pegawai.update', $pegawai)}}" method="post" enctype="multipart/form-data">
						
						{{ csrf_field() }}
						{{ method_field('patch') }}
						
						<div class="form-group has-feedback {{ $errors->has('pegawai') ? ' has-error' : '' }} ">
							<label>Edit Nama Pegawai</label>
							<input type="text" class="form-control" name="pegawai" placeholder="nama pegawai" value="{{ $pegawai->pegawai}}">
							@if ($errors->has('pegawai'))
								<span class="help-block">
									<p>{{ $errors->first('pegawai') }}</p>
								</span>
							@endif
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
							<a href="{{ route ('st_pegawai.index') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Batal</a>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection