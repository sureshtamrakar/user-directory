@extends('layouts.dashboard')
@section('content')
<div class="my-3">
    <h1 class="h3 h3 d-inline align-middle pl-3">
        User List
    </h1>
</div>
<div class="col-12">
    <div class="card">

        <div class="card-body">
            <div id="datatables-reponsive_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" aria-describedby="datatables-reponsive_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody id="tablecontents">
                                @foreach($users as $user)
                                <tr class="row1">
                                    <td>{!!$loop->iteration!!}</td>
                                    <td>{!!$user->name!!}</td>
                                    <td>{!!$user->email!!}</td>
                                    <td>{!!$user->mobile!!}</td>
                                    <td>{!!$user->country!!} , {!!$user->state!!},{!!$user->address!!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection