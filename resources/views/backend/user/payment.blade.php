@extends('backend.layouts.app')
@section('content')
<!-- Page map -->
<div class="page-header">
    <h3 class="page-title">
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pro User Information</button></a></li>
            <li class="breadcrumb-item active" aria-current="page">Pro User Information</li>
        </ol>
    </nav>
</div>
<div class="row">
    {{-- personal data --}}
    <!--personal data create.html-->
    <div class="col-12 mb-3">
        <div class="preview-list">
            <div class="preview-item border-bottom">
                <li class="nav-item col-lg-3 float-right mb-3" style="padding-right: 6.3%;  list-style: none;">
                    <form action="{{ route('payment') }}" style="display: flex;">
                        <input type="search" name="search" class="form-control" placeholder="Search By User ID">
                        <button type="submit" class="btn btn-primary">
                            <i class=" mdi mdi-flattr"></i>
                        </button>
                    </form>
                </li>
                <li class="nav-item col-lg-3 float-right mb-3" style="padding-right: 6.3%; list-style: none;">
                    <form action="" style="display: flex;">
                        <select style="width: 90% " class="form-control" name="status">
                            <option value="Paid">Paid</option>
                            <option value="Free">Free</option>
                        </select>
                        <button type="submit" class="btn btn-primary">
                            <i class=" mdi mdi-flattr"></i>
                        </button>
                    </form>
                </li>
            </div>
        </div>
    </div>
    <!-- Slider -->
    <div class="col-lg-12 grid-margin stretch-card ">
        <div class="card">
            <div class="card-body">
                <ul class="navbar-nav d-inline mb-3">

                </ul>
                <div class="table-responsive">
                    <table class="table table-hover ">
                        @if (Session::has('success'))
                        <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                        @endif
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>User ID</th>
                                <th>Bkash Number</th>
                                <th>Transaction Number</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payment as $postData)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$postData->user_id }}</td>
                                <td>{{ $postData->b_number }}</td>
                                <td>{{ $postData->trans_number }}</td>
                                <td>{{ $postData->amount }}</td>
                                <td>
                                @if( $postData->status == 'Free')
                                    <a href="{{ route('payment.accept', $postData->id) }}" class="btn btn-sm btn-primary mb-0">Accept</a>
                                    <a href="{{ route('payment.cancel', $postData->id) }}" class="btn btn-sm btn-success mb-0">Cancel</a>
                                @else
                                    <form action="{{ route('payment.cancel', $postData->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger mb-0">Revert</button>
                                    </form>
                                @endif
                                </td>     
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <div class="modal fade" id="user_delete{{ $postData->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="color: #ac9f33;">
                                                            Delete Page</h5>
                                                        <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                                class=" mdi mdi-close "></i></a>
                                                    </div>
                                                    <div class="modal-body" style="color: #cab562;">
                                                        Are you sure? Delete This Data.You Can't Revert This.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <a type="button" class="btn btn-danger"
                                                            href="{{ route('user_register.delete', $postData->id) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            {{-- Delete Modal --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- All modal Add  Page -->

<!-- Add Modal Your Personal Data 
@endsection