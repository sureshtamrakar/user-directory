@extends('layouts.auth')
@section('content')
<div class="row vh-100">
	<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
		<div class="d-table-cell align-middle">
			<div class="text-center mt-4">
				<h1 class="h2">Get started</h1>
				<p class="lead">
					Login to your account
				</p>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="m-sm-4">
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="mb-3">
								<label class="form-label">Email</label>
								<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email">
							</div>
							<div class="mb-3">
								<label class="form-label">Password</label>
								<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password">
							</div>
							<div>
								<label class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" checked="">
									<span class="form-check-label">
										Remember me next time
									</span>
								</label>
							</div>
							<div>
								Don't have account?
								<a href="{{ route('register') }}">Register</a>
							</div>
							<div class="text-center mt-3">
								<input type="submit" class="btn btn-primary" value="Login">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection