@extends('layouts.frontend')

@section('content')
	<div class="card">
		<div class="card-header">Trang chủ</div>
		<div class="card-body">
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
			Trang dành cho khách hàng.
		</div>
	</div>
@endsection