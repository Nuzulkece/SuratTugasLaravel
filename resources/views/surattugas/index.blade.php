@extends('layouts.dashboard')

@section('judul')
<section class="content-header">
      <h1>
        Surat Tugas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ route ('st_surat.index')}}"><i class="fa fa-envelope"></i> Surat Tugas</a></li>
      </ol>
    </section>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-11">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>List Surat Tugas <a class="btn btn-success btn-md pull-right" href="{{ route ('st_surat.create')}}"><i class="fa fa-plus"></i>  Buat Surat Tugas </a></h3>
					</div>

					<div class="panel-body">
						<table class="table" id="datatable">
							<thead>
								<tr>
									<th>Nomor Surat</th>
									<th>Nama Pegawai</th>
									<th>Jabatan</th>
									<th>Kegiatan</th>
									<th>Tujuan</th>
									<th>Nopol</th>
									<th>Tgl Tugas</th>
									<th>Tgl Surat</th>
									<th><center>ACTION</center></th>
								</tr>
							</thead>
							<tbody>
								@foreach($surattugas as $surat)
									<tr>
										<td>07.{{$surat->nomor_surat}}</td>
										<td><ul>@foreach ($surat->pegawais as $pegawai)
					                           	<li>{{ $pegawai->pegawai }}</li>
					                        @endforeach</ul>
					                    </td>
										<td>
											@if($surat->jabatan != null)
												{{$surat->jabatan}}
											@else
												<center>-</center>
											@endif
										</td>
										<td>{{$surat->kegiatan}}</td>
										<td><ul>@foreach ($surat->tujuans as $tujuan)
					                            <li>{{ $tujuan->tujuan }}</li>
					                        @endforeach</ul>
					                    </td>
					                    <td>
					                    	@if($surat->nomor_polisi != null)
					                    		{{$surat->nomor_polisi}}
											@else
												<center>-</center>
											@endif
					                    </td>
										<td>
											@if($surat->tanggal_tugas == $surat->tanggal_akhir)
												{{$surat->tanggal_tugas}}
											@else
												{{$surat->tanggal_tugas}} s/d {{$surat->tanggal_akhir}}
											@endif
										</td>
										<td>{{$surat->created_at}}</td>
										<td>
											
											<form class="inline "action="{{ route ('st_surat.destroy', $surat) }}" method="post" >
					                            {{ csrf_field() }}
					                            {{ method_field('DELETE') }}
					                        	<center>                        
					                            <a href="{{ route('st_surat.cetak', $surat->id)}}" class="btn btn-sm btn-success"><i class="fa fa-print"></i></a>
					                        													
					                            <a href="{{ route ('st_surat.edit', $surat->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
					                        	
					                        	<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
					                        	</center>  
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
			"order": [[ 7, "desc" ]],
			dom: 'Bfrtip',
			    columnDefs: [
		            //untuk menghilangkan order
		            {
		            	targets: 8,
		            	orderable: false,
		            },
		            { "width": "12%", "targets": 8 }
		        ],
			    
			    //button export
			    buttons: [
	            // 'csv',
	            {
	                extend: 'excelHtml5',
	                exportOptions: {
	                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
	                }
	            },
	            {
	                extend: 'pdfHtml5',
	                exportOptions: {
	                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
	                }
	            },
	            'colvis'
	        	],

	        	// rowReorder: {
		        //     selector: 'td:nth-child(2)'
		        // },
        		// responsive: true ,
			});
		});
	</script>
@endsection