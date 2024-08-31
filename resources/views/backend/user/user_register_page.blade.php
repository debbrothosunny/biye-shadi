@extends('backend.layouts.app')
@section('content')
<!-- Page map -->
<div class="page-header">
    <h3 class="page-title">
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Users Information </button></a></li>
        </ol>
    </nav>
</div>
<div class="row">
    {{-- personal data --}}
    <!--personal data create.html-->
    <div class="col-12 mb-3">
        <div class="preview-list">
            <div class="preview-item border-bottom">
                <li class="nav-item col-lg-3 float-right mb-3" style="padding-right: 6.3%; list-style: none;6"> 
                    <form action="" style="display: flex;">
                        <input type="search" name="search" class="form-control" placeholder="Search By User ID">
                        <button type="submit" class="btn btn-primary">
                            <i class=" mdi mdi-flattr"></i>
                        </button>
                    </form>
                </li>
                
                <li class="nav-item col-lg-3 float-right mb-3" style="padding-right: 6.3%; list-style: none;">
                    <form action="" style="display: flex;">
                        <select style="width: 90% " class="form-control" name="status">
                            <option value="0">Paid</option>
                            <option value="1">Free</option>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reg_user as $postData)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $postData->user_id }}</td>
                                <td>{{ $postData->name }}</td>
                                <td>{{ $postData->email }}</td>
                                <td>{{ $postData->number }}</td>
                                <td>{{ $postData->show_password }}</td>
                                <td>
                                @if ($postData->status == 0)
                                    <p class="btn btn-sm btn-primary mb-0">Paid</p>
                                @else
                                    <p class="btn btn-sm btn-success mb-0">Free</p>
                                @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <a type="button" class="btn btn-outline-primary subhide" data-bs-toggle="modal"
                                            data-bs-target="#user_edit{{ $postData->id }}" id="">
                                            <i class="mdi mdi-grease-pencil"></i>
                                        </a>

                                        <a type="button" class="btn btn-info"
                                            href="{{ route('user_dashboard', $postData->id) }}" target="blank">
                                            <i class="mdi mdi-eye "></i>
                                        </a>
                                        <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="{{ '#user_delete' . $postData->id }}">
                                            <i class="mdi mdi-delete"></i>
                                        </a>

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
                            <div class="d-felx justify-content-center">

                                {{ $reg_user->links('pagination::bootstrap-5') }}

                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



 <!-- Edit Modal All Title -->
 @foreach ($reg_user as $postData)
        <div class="modal fade " id="user_edit{{ $postData->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
            <div class="modal-dialog" style="max-width:1000px !important;">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                            Edit Modal
                    </div>
                    <div class="modal-body" style="color: #cab562;">
                        <form class="forms-sample" action="{{ route('user_register_page_update.update', $postData->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                            <div class="row ml-2">
                                <div class="col-md-4  hide5">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Name &nbsp; &nbsp; &nbsp;</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="name" id="exampleInputUsername1"
                                            value="{{ $postData->name }}" placeholder="">
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4  hide5">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Change Email {{ $postData->email }}</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="email" id="exampleInputUsername1"
                                           placeholder="Change Email">
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4  hide5">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Number &nbsp; &nbsp; &nbsp;</label>
                                        <input style="width:90%; " type="number" maxlength="250"
                                            class="form-control " name="number" id="exampleInputUsername1"
                                            value="{{ $postData->number }}" placeholder="">
                                        <span class="text-danger">
                                            @error('number')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4  hide5">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Password &nbsp; &nbsp; &nbsp;</label>
                                        <input style="width:90%; " type="password" maxlength="250"
                                            class="form-control " name="password" id="exampleInputUsername1"
                                            value="{{ $postData->show_password }}" placeholder="">
                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                            <label style="color:#c6b6b6;">Status*</label>
                                                <select style="width: 90%" class="form-control" name="status" onchange="this.form.submit()">
                                                    <option {{ $postData->status == 0 ? 'selected' : '' }} value="0">Paid</option>
                                                    <option {{ $postData->status == 1 ? 'selected' : '' }} value="1">Free</option>
                                                </select>
                                            </form>
                                        </div>
                                        <span class="text-danger">
                                            @error('status')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                            <div class="row mt-4">
                                <div class="col-md-12 ">
                                    <button type="submit"
                                        class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                    <a data-bs-dismiss="modal" aria-label="Close"
                                        class="btn btn-md btn-danger float-right mr-2 show">Back</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

<!-- All modal Add  Page -->

<!-- Add Modal Your Personal Data 
@endsection