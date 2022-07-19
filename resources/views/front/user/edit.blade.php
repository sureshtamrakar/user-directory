@extends('layouts.front')
@section('content')
<div class="row my-4 mx-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-white border-0">
                <h5 class="card-title">Edit Profile</h5>
            </div>
            <div class="card-body">
                <input type="hidden" id="state-code" value="{{@$user->state}}">
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter your name" value="{{@$user->name}}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" disabled placeholder="Enter your email" value="{{@$user->email}}">
                        </div>
                    </div>

                    <div class="row">

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Country</label>
                            <select id="country" name="country" class="form-control form-control-lg @error('country') is-invalid @enderror">
                                <option selected="">Choose...</option>
                                {!!getCountry($user->country)!!}
                            </select>
                            @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">State</label>
                            <select id="state" name="state" class="form-control form-control-lg">
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Address.</label>
                            <input class="form-control form-control-lg @error('address') is-invalid @enderror" type="text" name="address" placeholder="Enter your Mobile No. " value="{{@$user->address}}">
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Mobile No.</label>
                            <input class="form-control form-control-lg @error('mobile') is-invalid @enderror" type="text" name="mobile" placeholder="Enter your Mobile No. " value="{{@$user->mobile}}">
                            @error('mobile')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label"> Date of Birth</label>
                            <input class="form-control form-control-lg @error('dob') is-invalid @enderror" type="date" name="dob" placeholder="Date of Birth" value="{{@$user->dob}}">
                            @error('dob')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-control form-control-lg @error('gender') is-invalid @enderror">
                                <option value="1" @if($user->gender == 1) selected=selected @endif>Male</option>
                                <option value="0" @if($user->gender == 0) selected=selected @endif>Female</option>
                            </select>
                            @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-sm btn-danger mtype" data-mtype="radio" id="image-loadesr" onclick="loadMediaModel();">
                            Upload Profile Picture
                        </button>
                        <div class="profile-picture my-3">
                            <input type="hidden" name="image" value="{{$user->image}}">
                            {!!get_attachment($user->image)!!}

                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection