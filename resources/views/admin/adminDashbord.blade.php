@extends('layouts.adminLayout')
@section('title', 'Dashbord')
@section('content')
    <br><br>
    <div style="width:80%; margin:0 auto;">
        <h3>Restaurant aproval list</h3>
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($needApproval))
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p class="fw-normal mb-1">No approval request.</p></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                @else
                    @foreach ($needAproval as $r)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($r->logo) }}" class="rounded-circle" alt=""
                                        style="width: 45px; height: 45px" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{ $r->name }}</p>
                                        <p class="text-muted mb-0">{{ $r->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $r->address }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $r->contact_number }}</p>
                            </td>
                            <td>
                                <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                            </td>
                            <td>
                                <a href="{{ route('approve', ['add' => $r->id]) }}">
                                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold"
                                        data-mdb-ripple-color="dark">
                                        Accept
                                    </button></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table><br>
        <h3>Restaurants</h3>
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Total foods</th>
                    <th>Total orders</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!isset($all))
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p class="fw-normal mb-1">No Restaurants.</p></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                @else
                    @foreach ($all as $r)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($r->logo) }}" class="rounded-circle" alt=""
                                        style="width: 45px; height: 45px" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{ $r->name }}</p>
                                        <p class="text-muted mb-0">{{ $r->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $r->address }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $r->contact_number }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ count($r->Foods) }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ count($r->Orders) }}</p>
                            </td>
                            <td>
                                @if($r->status == 1)
                                <span class="badge badge-success rounded-pill d-inline">Active</span>
                                @else
                                <span class="badge badge-danger rounded-pill d-inline">Blocked</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('approve', ['add' => $r->id]) }}">
                                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold"
                                        data-mdb-ripple-color="dark">
                                        Accept
                                    </button></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table><br>
    </div>
@endsection
