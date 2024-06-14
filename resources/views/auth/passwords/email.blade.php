@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Khôi phục mật khẩu</div>
				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif
					<form method="post" action="{{ route('password.email') }}">
						@csrf
						
						<div class="mb-3">
							<label class="form-label" for="email">Địa chỉ email</label>
							<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
							@error('email')
								<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
							@enderror
						</div>
						
						<div class="mb-0">
							<button type="submit" class="btn btn-primary"><i class="fa-light fa-paper-plane"></i> Gởi liên kết khôi phục mật khẩu</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection