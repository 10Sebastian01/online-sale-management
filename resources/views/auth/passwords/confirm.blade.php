@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Xác nhận mật khẩu</div>
				<div class="card-body">
					Vui lòng xác nhận mật khẩu của bạn trước khi tiếp tục.
					
					<form method="post" action="{{ route('password.confirm') }}">
						@csrf
						
						<div class="mb-3">
							<label class="form-label" for="password">Mật khẩu</label>
							<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
							@error('password')
								<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
							@enderror
						</div>
						
						<div class="mb-0">
							<button type="submit" class="btn btn-info"><i class="fa-light fa-circle-check"></i> Xác nhận</button>
							@if (Route::has('password.request'))
								<a class="btn btn-link" href="{{ route('password.request') }}">Quên mật khẩu?</a>
							@endif
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
