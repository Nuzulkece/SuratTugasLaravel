@extends('layouts.dashboard')

@section('judul')
<section class="content-header">
      <h1>
        Manajemen Tujuan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route ('st_surat.index')}}"><i class="fa fa-envelope"></i> Surat Tugas</a></li>
        <li><a href="{{ route ('st_tujuan.index')}}"><i class="fa fa-location-arrow"></i> Tujuan</a></li>
        <li class="active"><a href="{{ route ('st_tujuan.edit', $tujuan->id)}}"><i class="fa fa-edit"></i> Edit Tujuan</a></li>
      </ol>
      </ol>
    </section>
@endsection

@section('content')
	<div class="container">
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> Edit Tujuan </h3>
				</div>
				<div class="box-body">
				<form class="" action="{{ route ('st_tujuan.update', $tujuan)}}" method="post" enctype="multipart/form-data">
					
					{{ csrf_field() }}
					{{ method_field('patch') }}
					
					<div class="form-group has-feedback {{ $errors->has('tujuan') ? ' has-error' : '' }} ">
						<label>Tujuan</label>
						<input type="text" class="form-control" name="tujuan" placeholder="isi tujuan" value="{{ $tujuan->tujuan}}">
						@if ($errors->has('tujuan'))
							<span class="help-block">
								<p>{{ $errors->first('tujuan') }}</p>
							</span>
						@endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
						<a href="{{ route ('st_tujuan.index') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Batal</a>

					</div>
					
				</form>
				</div>
			</div>
		</div>
	</div>
@endsection