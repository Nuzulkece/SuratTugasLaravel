@if (session('success'))
	<div class="alert alert-success" align="center">
		{{ session('success') }}
	</div>
@endif

@if (session('info'))
	<div class="alert alert-info" align="center">
		{{ session('info') }}
	</div>
@endif

@if (session('danger'))
	<div class="alert alert-danger" align="center">
		{{ session('danger') }}
	</div>
@endif