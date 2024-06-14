@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Khôi phục mật khẩu</div>
				<div class="card-body">
					<form method="post" action="{{ route('password.update') }}">
						@csrf
						<input type="hidden" name="token" value="{{ $token }}">
						
						<div class="mb-3">
							<label class="form-label" for="email">Địa chỉ email</label>
							<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $email ?? old('email') }}" required />
							@error('email')
								<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
							@enderror
						</div>
						
						<div class="mb-3">
							<label class="form-label" for="password">Mật khẩu mới</label>
							<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
							@error('password')
								<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
							@enderror
						</div>
						
						<div class="mb-3">
							<label class="form-label" for="password-confirm">Xác nhận mật khẩu mới</label>
							<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" required />
							@error('password_confirmation')
								<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
							@enderror
						</div>
						
						<div class="mb-0">
							<button type="submit" class="btn btn-primary"><i class="fa-light fa-key-skeleton"></i> Đổi mật khẩu</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection