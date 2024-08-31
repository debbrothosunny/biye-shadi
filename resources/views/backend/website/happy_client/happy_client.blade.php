@extends('backend.layouts.app')
@section('content')
    <!-- Page map -->
    <div class="page-header">
        <h3 class="page-title">
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</button></a></li>
                <li class="breadcrumb-item active" aria-current="page">Happy Client</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        {{-- section 6 --}}
        <div class="col-12 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Our Client </h6>
                            <p class="text-muted mb-0">Happy Client banner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="nav-item col-lg-3 float-right mb-3 mt-2 d-none" style="padding-right: 4.3%;">
                            <a class="nav-link btn btn-info create-new-button px-3">Section 7</a>
                        </li>
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($CommonBanner->where('sec', 'Happy_Client_sec_1')) < 2)
                                <a class="nav-link btn btn-success create-new-button px-3 mr-1" data-bs-toggle="modal"
                                    data-bs-target=".review_card" id="sec1"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Alt image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($CommonBanner->where('sec', 'Happy_Client_sec_1') as $postData)
                                    <tr>
                                        <td>{{ $postData->title }}</td>
                                        <td><img src="{!! asset('assets/img/uploaded/home/img/' . $postData->img ?? '') !!}"></td>
                                        <td>{{ $postData->alt_img }}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#common_banner{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_video_7' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- update modal --}}
                                    <div class="modal fade " id="common_banner{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true"
                                        style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
                                        <div class="modal-dialog" style="max-width:1000px !important;">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title ml-2" id="exampleModalLabel"
                                                        style="font-size:24px;">
                                                        Edit Modal
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    <form class="forms-sample"
                                                        action="{{ route('common_banner.update', $postData->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                                                        <div class="row ml-2  d-none">
                                                            <div class="form-group row">
                                                                <input style="width:90%; " type="text" maxlength="250"
                                                                    class="form-control " name="page"
                                                                    id="exampleInputUsername1" value="{{ $postData->page }}"
                                                                    placeholder=" Page...">
                                                                <span class="text-danger">
                                                                    @error('page')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>
                                                                <input style="width:90%; " type="text" maxlength="250"
                                                                    class="form-control " name="sec"
                                                                    value="{{ $postData->sec }}" placeholder=" Section...">
                                                                <span class="text-danger">
                                                                    @error('sec')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row ml-2">
                                                            <div class="col-md-4 ">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Image &nbsp; &nbsp;
                                                                        &nbsp;</label>
                                                                    <input style="width:90%;" type="file"
                                                                        class="form-control p-1" name="img">
                                                                    <span class="text-danger">
                                                                        @error('img')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 ">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Alt Image &nbsp; &nbsp;
                                                                        &nbsp;</label>
                                                                    <input style="width:90%;" type="text"
                                                                        class="form-control p-1" name="alt_img"
                                                                        value="{{ $postData->alt_img }}"
                                                                        placeholder="alt img">
                                                                    <span class="text-danger">
                                                                        @error('alt_img')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Title &nbsp; &nbsp;
                                                                        &nbsp;</label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="title" id="exampleInputUsername1"
                                                                        value="{{ $postData->title }}"
                                                                        placeholder="title...">
                                                                    <span class="text-danger">
                                                                        @error('title')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Status*</label>
                                                                    <select style="width: 87% !important; "
                                                                        class="form-control" name="status">
                                                                        <option
                                                                            {{ $postData->status == 0 ? 'selected' : '' }}
                                                                            value="0">Active
                                                                        </option>
                                                                        <option
                                                                            {{ $postData->status == 1 ? 'selected' : '' }}
                                                                            value="1">
                                                                            Dactive
                                                                        </option>
                                                                    </select>
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
                                                                    class="btn btn-md btn-danger float-right mr-2">Back</a>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- delate modal --}}
                                    <div class="modal fade" id="home_sec_video_7{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete Data</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('common_banner.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add all modal --}}
    <!-- Add Modal banner   -->
    <div class="modal fade review_card" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1000px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        Add Modal
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('common_banner.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                        <div class="row ml-2  d-none">
                            <div class="form-group row">
                                <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                    name="page" id="exampleInputUsername1" value="happy_client" placeholder=" Page...">
                                <span class="text-danger">
                                    @error('page')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                    name="sec" id="sec_banner" placeholder=" Section...">
                                <span class="text-danger">
                                    @error('sec')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-4 ">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Image &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%;" type="file" class="form-control p-1" name="img">
                                    <span class="text-danger">
                                        @error('img')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Alt Image &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%;" type="text" class="form-control p-1" name="alt_img"
                                        placeholder="alt img">
                                    <span class="text-danger">
                                        @error('alt_img')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Title &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="title" id="exampleInputUsername1" value="{{ old('title') }}"
                                        placeholder="title...">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Status*</label>
                                    <select style="width: 87% !important; " class="form-control" name="status">
                                        <option value="0">Active</option>
                                        <option value="1">Dactive</option>
                                    </select>
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
                                <button type="submit" class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                <a data-bs-dismiss="modal" aria-label="Close"
                                    class="btn btn-md btn-danger float-right mr-2">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // section 1
            // common banner
            $('#sec1').click(function() {
                $("#sec_banner").val('Happy_Client_sec_1');
            });
        });
    </script>
@endsection
