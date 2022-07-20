@extends('layouts.front')
@section('content')
<div class="row my-5">
    <div class="col-md-10 offset-md-1">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hello there!</strong> {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-md-4 my-auto">
                <div class="card mb-3 border-0">
                    <div class="card-body text-center user-detail">
                        {!!get_attachment($user->image)!!}
                        <h5 class="card-title mb-0">{{$user->name}}</h5>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="card-body h-100">
                        <ul class="list-group list-group-flush">
                            @if(isset($user->email)) <li class="list-group-item"><strong>Email : </strong> {{$user->email}} </li> @endif
                            @if(isset($user->country)) <li class="list-group-item"><strong>Country : </strong> {{$user->country}} </li> @endif
                            @if(isset($user->state)) <li class="list-group-item"><strong>State : </strong> {{$user->state}} </li> @endif
                            @if(isset($user->address)) <li class="list-group-item"><strong>Address : </strong> {{$user->address}} </li> @endif
                            @if(isset($user->mobile)) <li class="list-group-item"><strong>Mobile : </strong> {{$user->mobile}} </li> @endif
                            @if(isset($user->gender)) <li class="list-group-item"><strong>Gender : </strong> @if($user->gender == 1) Male @else Female @endif </li> @endif
                            @if(isset($user->dob)) <li class="list-group-item"><strong>DOB : </strong> {{$user->dob}} </li> @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection