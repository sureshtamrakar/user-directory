@extends('layouts.auth')
@section('content')
<div class="row vh-100">
	<div class="col-md-8 mx-auto d-table h-100">
		<div class="d-table-cell align-middle">
			<div class="text-center mt-4">
				<h1 class="h2">Get started</h1>
				<p class="lead">
					Register Your Account
				</p>
			</div>
			<div class="card border-0">
				<div class="card-header p-0"></div>
				<div class="card-body">
					<div class="m-sm-4">
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="row">
								<div class="mb-3 col-md-6">
									<label class="form-label">Name</label>
									<input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}">
									@error('name')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="mb-3 col-md-6">
									<label class="form-label">Email</label>
									<input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email">
									@error('email')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="row">
								<div class="mb-3 col-md-6">
									<label class="form-label">Country</label>
									<select id="country" name="country" class="form-control form-control-lg @error('country') is-invalid @enderror">
										<option selected="">Choose...</option>
										{!!getCountry()!!}
									</select>
									@error('country')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="mb-3 col-md-6 d-none">
									<label class="form-label">State</label>
									<select id="state" name="state" class="form-control form-control-lg">
									</select>
								</div>
							</div>
							<div class="row">
								<div class="mb-3 col-md-12">
									<label class="form-label">Address.</label>
									<input class="form-control form-control-lg @error('address') is-invalid @enderror" type="text" name="address" placeholder="Enter your Mobile No. ">
									@error('address')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="row">
								<div class="mb-3 col-md-4">
									<label class="form-label">Mobile No.</label>
									<input class="form-control form-control-lg @error('mobile') is-invalid @enderror" type="text" name="mobile" placeholder="Enter your Mobile No. ">
									@error('mobile')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="mb-3 col-md-4">
									<label class="form-label"> Date of Birth</label>
									<input class="form-control form-control-lg @error('dob') is-invalid @enderror" type="date" name="dob" placeholder="Date of Birth">
									@error('dob')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="mb-3 col-md-4">
									<label class="form-label">Gender</label>
									<select name="gender" class="form-control form-control-lg @error('gender') is-invalid @enderror">
										<option>Choose...</option>
										<option value="1">Male</option>
										<option value="0">Female</option>
									</select>
									@error('gender')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="row">
								<div class="mb-3 col-md-6">
									<label class="form-label">Password</label>
									<input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your password">
									@error('password')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="mb-3 col-md-6">
									<label class="form-label">Confirm Password</label>
									<input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Confirm password">
								</div>
							</div>
							<div class="mb-3">
								<button type="button" class="btn btn-sm btn-danger mtype" data-mtype="radio" id="image-loadesr" onclick="loadMediaModel();">
									Upload Profile Picture
								</button>
								<div class="profile-picture my-3">
								</div>
							</div>
							<div class="text-center mt-3">
								<input type="submit" class="btn btn-primary" value="Register">
							</div>
						</form>
					</div>
				</div> <!-- End card body -->
			</div>
		</div>
	</div>
</div>
@endsection