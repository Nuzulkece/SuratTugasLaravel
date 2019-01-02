@extends('layouts.dashboard')

@section('judul')
<section class="content-header">
      <h1>
        Manajemen Tujuan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route ('st_surat.index')}}"><i class="fa fa-envelope"></i> Surat Tugas</a></li>
        <li class="active"><a href="{{ route('st_tujuan.index') }}"><i class="fa fa-location-arrow"></i> Tujuan</li>
      </ol>
    </section>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>List Tujuan Tugas <a class="btn btn-success btn-md pull-right" href="{{ route('st_tujuan.create') }}"><i class="fa fa-plus"></i>  Tambah Tujuan </a></h3>
					</div>

					<div class="panel-body">
						<table class="table" id="datatable">
							<thead>
								<tr>
									<th>Tujuan</th>
									<th><center>ACTION</center></th>
								</tr>
							</thead>
							<tbody>
								@foreach($tujuan as $tuju)
									<tr>
										<td>{{$tuju->tujuan}}</td>
										<td>
											<form class="inline "action="{{ route ('st_tujuan.destroy', $tuju) }}" method="post" >
					                            {{ csrf_field() }}
					                            {{ method_field('DELETE') }}
					                            <center>
					                            <a href="{{ route ('st_tujuan.edit', $tuju->id) }}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
					                        	<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></center>
					                        </form>
										</td>	 
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>


@endsection

@section('datatable')
	<script>
		$(document).ready( function(){
			$('#datatable').DataTable({
				columnDefs: [
		            {
		            	targets: 1,
		            	orderable: false,
		            },
		        ],
			});
		});
	</script>
@endsection