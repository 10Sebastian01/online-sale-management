@extends('layouts.frontend') <!-- đăng nhập chỉ là 1 phần của frontend -->

@section('content')
<div class="container py-4 my-4">
	<div class="row">
		<div class="col-md-6">
			<div class="card border-0 shadow">
				<div class="card-body">
					<h2 class="h4 mb-1">Đăng nhập</h2>
					<div class="py-3">
						<h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">Đăng nhập với:</h3>
						<div class="d-inline-block align-middle">
							<a class="btn-social bs-google me-2 mb-2" href="{{ route('google.login') }}" data-bs-toggle="tooltip" title="Đăng nhập với Google">
								<i class="ci-google"></i>
							</a>
							<a class="btn-social bs-facebook me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Đăng nhập với Facebook">
								<i class="ci-facebook"></i>
							</a>
							<a class="btn-social bs-twitter me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Đăng nhập với Twitter">
								<i class="ci-twitter"></i>
							</a>
						</div>
					</div>
					<hr>
					<h3 class="fs-base pt-4 pb-2">Hoặc sử dụng thông tin đã có</h3>

					<form action=" {{ route('login') }}" method="post" class="needs-validation" novalidate>
						@csrf <!-- Để bên trong thẻ form, thuộc tính này bắt buộc -->

						@if($errors->has('email') || $errors->has('username'))
						<div class="alert alert-danger fs-base" role="alert">
							<i class="ci-close-circle me-2"></i>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}
						</div>
						@enderror
						<div class="input-group mb-3">
							<i class="ci-user position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
							<input type="text" class="form-control rounded-start {{ ($errors->has('email') || $errors->has('username')) ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Điện thoại, Email hoặc Tên đăng nhập" required />
						</div>
						<div class="input-group mb-3">
							<i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
							<div class="password-toggle w-100">
								<input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Mật khẩu" required />
								<label class="password-toggle-btn" aria-label="Show/hide password">
									<input class="password-toggle-check" type="checkbox" />
									<span class="password-toggle-indicator"></span>
								</label>
							</div>
						</div>
						<div class="d-flex flex-wrap justify-content-between">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" checked id="remember" name="remember"/>
								<label class="form-check-label" for="remember_me">Ghi nhớ đăng nhập</label>
							</div>
							<a class="nav-link-inline fs-sm" href="#">Quên mật khẩu?</a>
						</div>
						<hr class="mt-4">
						<div class="text-end pt-4">
							<button class="btn btn-primary" type="submit"><i class="ci-sign-in me-2 ms-n21"></i>Đăng nhập</button>
						</div>
					</form>

				</div>
			</div>
		</div>
		<div class="col-md-6 pt-4 mt-3 mt-md-0">
			<h2 class="h4 mb-3">Chưa có tài khoản? Đăng ký</h2>
			<p class="fs-sm text-muted mb-4">Việc đăng ký chỉ mất chưa đầy một phút nhưng mang lại cho bạn toàn quyền kiểm soát đơn hàng của mình.</p>
			<form method="post" action="{{ route('register') }}" class="needs-validation" novalidate>
				@csrf
				<div class="row gx-4 gy-3">
					<div class="col-sm-6">
						<label class="form-label" for="name">Họ và tên</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required />
						@error('name')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>

					<div class="col-sm-6">

						<label class="form-label" for="email">Địa chỉ email</label>
						<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
						@error('email')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>

					<div class="col-12">

						<label class="form-label" for="password">Mật khẩu</label>
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
						@error('password')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>

					<div class="col-12">

						<label class="form-label" for="password-confirm">Xác nhận mật khẩu</label>
						<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" required />
						@error('password_confirmation')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>

					<div class="col-12 text-end">

						<button class="btn btn-primary" type="submit"><i class="ci-user me-2 ms-n1"></i>Đăng ký</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection