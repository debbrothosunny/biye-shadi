@extends('backend.layouts.app')
@section('content')
    <!-- Page map -->
    <div class="page-header">
        <h3 class="page-title">
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</button></a></li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>
    </div>

    {{-- Table  --}}
    <div class="row">
        {{-- Image and Video  --}}
        <!-- Section 1 Find Your Perfect Life Partner And Create Your Haven Life-->
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
                            <h6 class="preview-subject">Hero Section</h6>
                            <p class="text-muted mb-0">banner section</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                                   <a class="nav-link btn btn-success create-new-button px-3 addpage mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_image" id="sec1"> + create </a>
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
                                    {{-- <th>Sub Title</th> --}}
                                    <th>Button name One</th>
                                    <th>Button Name Two</th>
                                    <th>Description</th>
                                    <th>Alt Image</th>
                                    <th>Image</th>
                                    <th>Video</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_img->where('sec', 'home_sec_1') as $postData)
                                    <tr>
                                        <td>{{ $postData->title }}</td>
                                        {{-- <td>{{ $postData->sub_title }}</td> --}}
                                        <td>{{ $postData->button_name_one }}</td>
                                        <td>{{ $postData->button_name_two }}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des), 20, '...') !!}</td>
                                        <td>{{ $postData->alt_img }}</td>
                                        <td><img src="{!! asset('assets/img/uploaded/home/img/' . $postData->img ?? '') !!}"></td>
                                        <td>{!! Str::limit(strip_tags($postData->video), 10, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-primary subhide"
                                                    data-bs-toggle="modal" data-bs-target="#cw_edit_img{{ $postData->id }}"
                                                    id="">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>

                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_img_1' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Delete Modal  --}}
                                    <div class="modal fade" id="home_sec_img_1{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel" style="color: #ac9f33;">
                                                        Delete Page</h5>
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
                                                        href="{{ route('cw_image.delete', $postData->id) }}">Delete</a>
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

        {{-- Content All Title --}}
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
                            <h6 class="preview-subject">Sec 3 Most Recent Bio Data </h6>
                            <p class="text-muted mb-0">Most Recent Bio Data</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="nav-item col-lg-3 float-right mb-3 mt-2" style="padding-right: 4.3%;">
                        </li>
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($all_title->where('sec', 'home_sec_3')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 hide_sec6 mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_icon" id="sec3"> + create </a>
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
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_title->where('sec', 'home_sec_3') as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->title), 50, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-primary hide_sec6"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_icon{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_icon_6' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="home_sec_icon_6{{ $postData->id }}" tabindex="-1"
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
                                                        href="{{ route('cw_title.delete', $postData->id) }}">Delete</a>
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

        {{-- Image and Video  --}}
        <!-- Section 4 About Us-->
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
                            <h6 class="preview-subject"> Section four About Us</h6>
                            <p class="text-muted mb-0">About Us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                           
                                <a class="nav-link btn btn-success create-new-button px-3 addpage mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_image" id="sec4"> + create </a>

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
                                    <th>Sub Title</th>
                                    <th>Button Name One</th>
                                    <th>Description</th>
                                    <th>Alt Image</th>
                                    <th>Image</th>
                                    {{-- <th>Video</th> --}}
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_img->where('sec', 'home_sec_4') as $postData)
                                    <tr>
                                        <td>{{ $postData->title }}</td>
                                        <td>{{ $postData->sub_title }}</td>
                                        <td>{{ $postData->button_name_one }}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des), 20, '...') !!}</td>
                                        <td>{{ $postData->alt_img }}</td>
                                        <td><img src="{!! asset('assets/img/uploaded/home/img/' . $postData->img ?? '') !!}"></td>
                                        {{-- <td>{!! Str::limit(strip_tags($postData->video), 10, '...') !!}</td> --}}
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                
                                                <a type="button" class="btn btn-outline-primary subhide"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_img{{ $postData->id }}" id="edithide">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>

                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_img_1' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Delete Modal  --}}
                                    <div class="modal fade" id="home_sec_img_1{{ $postData->id }}" tabindex="-1"
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
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_image.delete', $postData->id) }}">Delete</a>
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

        {{-- This is how Sylheti Biye Shadi.com works  --}}
        <!-- Section 5 -->
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
                            <h6 class="preview-subject">Section 5 This is how Sylheti Biye Shadi</h6>
                            <p class="text-muted mb-0">This is how Sylheti Biye Shadi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            
                                <a class="nav-link btn btn-success create-new-button px-3 addpage mr-1"
                                    data-bs-toggle="modal" data-bs-target=".Sylheti_Biye" id=""> + create </a>
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
                                    <th>Title One</th>
                                    <th>Icon One</th>
                                    <th>Description One</th>
                                    <th>Title Two</th>
                                    <th>Icon Two</th>
                                    <th>Description Two</th>
                                    <th>Title Three</th>
                                    <th>Icon Three</th>
                                    <th>Description Three</th>
                                    <th>Image</th>
                                    <th>Alt Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($SylhetiBiye as $postData)
                                    <tr>
                                        <td>{{ $postData->title }}</td>
                                        <td>{{ $postData->title_1 }}</td>
                                        <td>{{ $postData->icon_1 }}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des_1), 20, '...') !!}</td>
                                        <td>{{ $postData->title_2 }}</td>
                                        <td>{{ $postData->icon_2 }}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des_2), 20, '...') !!}</td>
                                        <td>{{ $postData->title_3 }}</td>
                                        <td>{{ $postData->icon_3 }}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des_3), 20, '...') !!}</td>
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
                                                <a type="button" class="btn btn-outline-primary subhide"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#SylhetiBiye_edit{{ $postData->id }}" id="">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>

                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_img_1' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- update modal --}}
                                    <div class="modal fade " id="SylhetiBiye_edit{{ $postData->id }}" tabindex="-1"
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
                                                        action="{{ route('Sylheti_Biye.update', $postData->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                                                        <div class="row ml-2">
                                                            <div class="col-md-4 ">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Title &nbsp; &nbsp;
                                                                        &nbsp; </label>
                                                                    <input style="width:90%;" type="text"
                                                                        class="form-control p-1" name="title"
                                                                        value="{{ $postData->title }}"
                                                                        placeholder="title">
                                                                    <span class="text-danger">
                                                                        @error('video')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Title One &nbsp; &nbsp;
                                                                        &nbsp; </label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="title_1" id="exampleInputUsername1"
                                                                        value="{{ $postData->title_1 }}"
                                                                        placeholder="Title One">
                                                                    <span class="text-danger">
                                                                        @error('title_1')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Icon One &nbsp; &nbsp;
                                                                        &nbsp; </label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="icon_1" id="exampleInputUsername1"
                                                                        value="{{ $postData->icon_1 }}"
                                                                        placeholder="Icon One">
                                                                    <span class="text-danger">
                                                                        @error('icon_1')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Description One &nbsp;
                                                                        &nbsp; &nbsp; </label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="des_1" id="exampleInputUsername1"
                                                                        value="{{ $postData->des_1 }}"
                                                                        placeholder="Description One">
                                                                    <span class="text-danger">
                                                                        @error('des_1')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
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
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Alt Image &nbsp; &nbsp;
                                                                        &nbsp; </label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="alt_img" id="exampleInputUsername1"
                                                                        value="{{ $postData->alt_img }}"
                                                                        placeholder="alt_img">
                                                                    <span class="text-danger">
                                                                        @error('alt_img')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Title Two &nbsp; &nbsp;
                                                                        &nbsp;</label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="title_2" id="exampleInputUsername1"
                                                                        value="{{ $postData->title_2 }}"
                                                                        placeholder="Title Two">
                                                                    <span class="text-danger">
                                                                        @error('title_2')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Icon Two &nbsp; &nbsp;
                                                                        &nbsp; </label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="icon_2" id="exampleInputUsername1"
                                                                        value="{{ $postData->icon_2 }}"
                                                                        placeholder="Icon Two">
                                                                    <span class="text-danger">
                                                                        @error('icon_2')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Descripton Two &nbsp;
                                                                        &nbsp; &nbsp; </label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="des_2" id="exampleInputUsername1"
                                                                        value="{{ $postData->des_2 }}"
                                                                        placeholder="Descripton Two">
                                                                    <span class="text-danger">
                                                                        @error('des_2')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Title Three &nbsp; &nbsp;
                                                                        &nbsp; </label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="title_3" id="exampleInputUsername1"
                                                                        value="{{ $postData->title_3 }}"
                                                                        placeholder="Title Three">
                                                                    <span class="text-danger">
                                                                        @error('title_3')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Icon Three &nbsp; &nbsp;
                                                                        &nbsp; </label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="icon_3" id="exampleInputUsername1"
                                                                        value="{{ $postData->icon_3 }}"
                                                                        placeholder="Icon Three">
                                                                    <span class="text-danger">
                                                                        @error('icon_3')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Descripton Three &nbsp;
                                                                        &nbsp; &nbsp; </label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="des_3" id="exampleInputUsername1"
                                                                        value="{{ $postData->des_3 }}"
                                                                        placeholder="Descripton Three">
                                                                    <span class="text-danger">
                                                                        @error('des_3')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Status* &nbsp; &nbsp;
                                                                        &nbsp; </label>
                                                                    <select style="width: 87% !important; "
                                                                        class="form-control" name="status">
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
                                    {{-- Delete Modal  --}}
                                    <div class="modal fade" id="home_sec_img_1{{ $postData->id }}" tabindex="-1"
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
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('Sylheti_Biye.delete', $postData->id) }}">Delete</a>
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

        {{-- Our Client Review --}}
        {{-- section 6 --}}
        <div class="col-5 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Our Client Review</h6>
                            <p class="text-muted mb-0">Our Client Review</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Our Client Review(content)</h6>
                            <p class="text-muted mb-0">Our Client Review(content)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header -->
        <div class="col-lg-5 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="nav-item col-lg-3 float-right mb-3 mt-2" style="padding-right: 4.3%;">
                        </li>
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            
                                <a class="nav-link btn btn-success create-new-button px-3 hide_sec6 mr-1"
                                    data-bs-toggle="modal" data-bs-target=".title_revirw" id="sec3"> + create </a>
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
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($OurClientReview as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->title), 50, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des), 50, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-primary hide_sec6"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#title_review{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_icon_6' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- update modal --}}
                                    <div class="modal fade " id="title_review{{ $postData->id }}" tabindex="-1"
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
                                                        action="{{ route('review_title.update', $postData->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                                                        <div class="row ml-2">
                                                            <div class="col-md-6">
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
                                                            <div class="col-md-6 ">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Status*</label>
                                                                    <select style="width:90%; " class="form-control"
                                                                        name="status">
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

                                                        <h4 class="ml-2 mb-3 mt-3 display-5 ">Description</h4>

                                                        <div class="row ml-2 ">
                                                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                                                <div class="form-group  ">
                                                                    <label for="exampleInputUsername1"
                                                                        style="color:#c6b6b6;">Description </label>
                                                                    <textarea onkeyup="md(this)" style="width:96.8% !important;" rows="7" maxlength="3500" type="text"
                                                                        name="des" class="form-control summernote" placeholder="Meta Description">{{ $postData->des }}</textarea>
                                                                    <span class="text-danger">
                                                                        @error('des')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                                <div class="md"
                                                                    style="float: right;margin-right: 23px;margin-top: -12px;color: #8c9095;font-size: 12px;">
                                                                </div>
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
                                    <div class="modal fade" id="home_sec_icon_6{{ $postData->id }}" tabindex="-1"
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
                                                        href="{{ route('review_title.delete', $postData->id) }}">Delete</a>
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
        <!-- card -->
        <div class="col-lg-7 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="nav-item col-lg-3 float-right mb-3 mt-2 d-none" style="padding-right: 4.3%;">
                            <a class="nav-link btn btn-info create-new-button px-3">Section 7</a>
                        </li>
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            
                                <a class="nav-link btn btn-success create-new-button px-3 mr-1" data-bs-toggle="modal"
                                    data-bs-target=".review_card" id="sec6"> + create </a>
                            
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
                                    <th>Date</th>
                                    <th>Thumbnail</th>
                                    <th>Alt image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clint_review->where('sec', 'home_sec_6') as $postData)
                                    <tr>
                                        <td>{{ $postData->title }}</td>
                                        <td>{{ $postData->date }}</td>
                                        <td><img src="{!! asset('assets/img/uploaded/home/img/' . $postData->thumb ?? '') !!}"></td>
                                        <td>{{ $postData->alt_img }}</td>
                                        <!-- <td>{!! Str::limit(strip_tags($postData->video), 20, '...') !!}</td> -->
                                        <td>
                                            @if ($postData->status == 0)
                                            <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-primary video" data-bs-toggle="modal"
                                                    data-bs-target="#cw_clint_review{{ $postData->id }}">
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
                                    <div class="modal fade " id="cw_clint_review{{ $postData->id }}" tabindex="-1"
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
                                                        action="{{ route('cw_video.update', $postData->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                                                        <div class="row ml-2  d-none">
                                                            <div class="form-group row">
                                                                <input style="width:90%; " type="text" maxlength="250"
                                                                    class="form-control " name="page"
                                                                    id="exampleInputUsername1"
                                                                    value="{{ $postData->page }}"
                                                                    placeholder=" Page...">
                                                                <span class="text-danger">
                                                                    @error('page')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>
                                                                <input style="width:90%; " type="text" maxlength="250"
                                                                    class="form-control " name="sec"
                                                                    value="{{ $postData->sec }}"
                                                                    placeholder=" Section...">
                                                                <span class="text-danger">
                                                                    @error('sec')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row ml-2">
                                                            <div class="col-md-4 videohide">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Video &nbsp; &nbsp;
                                                                        &nbsp; </label>
                                                                    <input style="width:90%;" type="file"
                                                                        class="form-control p-1" name="video">
                                                                    <span class="text-danger">
                                                                        @error('video')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Video Link </label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="video_link" id="exampleInputUsername1"
                                                                        value="{{ $postData->video }}"
                                                                        placeholder="Video Link...">
                                                                    <span class="text-danger">
                                                                        @error('video_link')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 ">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Thumbnail &nbsp; &nbsp;
                                                                        &nbsp;</label>
                                                                    <input style="width:90%;" type="file"
                                                                        class="form-control p-1" name="thumb">
                                                                    <span class="text-danger">
                                                                        @error('thumb')
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
                                                                        placeholder="alt img...">
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
                                                                    <label style="color:#c6b6b6;">Date &nbsp; &nbsp;
                                                                        &nbsp;</label>
                                                                    <input style="width:90%; " type="text"
                                                                        maxlength="250" class="form-control "
                                                                        name="date" id="exampleInputUsername1"
                                                                        value="{{ $postData->date }}"
                                                                        placeholder="date...">
                                                                    <span class="text-danger">
                                                                        @error('date')
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
                                                        href="{{ route('cw_video.delete', $postData->id) }}">Delete</a>
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

        {{-- SEO --}}
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
                            <h6 class="preview-subject">SEO</h6>
                            <p class="text-muted mb-0">SEO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SEO -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="nav-item col-lg-3 float-right mb-3 mt-2 d-none" style="padding-right: 4.3%;">
                            <a class="nav-link btn btn-info create-new-button px-3">SEO</a>
                        </li>
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($seo) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 hide_sec10 mr-1"
                                    data-bs-toggle="modal" data-bs-target=".seo"> + create </a>
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
                                    <th>Meta Title</th>
                                    <th>Meta Description</th>
                                    <th>Meta Keyword</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seo as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->meta_title), 30, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->meta_description), 50, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->meta_keyword), 50, '...') !!}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="{{ '#seo_e' . $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="{{ '#seo_d' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Delete -->
                                    <div class="modal fade" id="seo_d{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete SEO</h5>
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
                                                        href="{{ route('seo.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit -->
                                    <div class="modal fade seo" id="seo_e{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true"
                                        style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
                                        <div class="modal-dialog" style="max-width:1000px !important;">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title ml-2" id="exampleModalLabel"
                                                        style="font-size:24px;">
                                                        SEO Edit
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    <form class="forms-sample"
                                                        action="{{ route('seo.update', $postData->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h4 class="ml-2 mb-3 display-5">SEO Section</h4>
                                                        <!-- Page Name -->
                                                        <input class="d-none" name="page" type="text"
                                                            value="home">
                                                        <div class="row ml-2 ">
                                                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                                                <div class="form-group  ">
                                                                    <label for="exampleInputUsername1"
                                                                        style="color:#c6b6b6;">Meta Title </label>
                                                                    <textarea type="text" style="width:100% !important;" name="meta_title" row="3" class="form-control"
                                                                        placeholder="Meta Title">{{ $postData->meta_title }}</textarea>
                                                                    <span class="text-danger">
                                                                        @error('meta_title')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row ml-2 ">
                                                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                                                <div class="form-group  ">
                                                                    <label for="exampleInputUsername1"
                                                                        style="color:#c6b6b6;">Meta Description </label>
                                                                    <textarea type="text" name="meta_description" class="form-control summernote" placeholder="Meta description">{{ $postData->meta_description }}</textarea>
                                                                    <span class="text-danger">
                                                                        @error('meta_description')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row ml-2 ">
                                                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                                                <div class="form-group  ">
                                                                    <label for="exampleInputUsername1"
                                                                        style="color:#c6b6b6;">Meta Keyword</label>
                                                                    <textarea type="text" name="meta_keyword" class="form-control summernote" placeholder="meta_keyword">{{ $postData->meta_keyword }}</textarea>
                                                                    <span class="text-danger">
                                                                        @error('meta_keyword')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- All modal Add  Page -->

    <!-- Add Modal Image and Video -->
    <div class="modal fade cw_image" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1000px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        Add Modal
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('cw_image.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                        <div class="row ml-2 d-none">
                            <div class="form-group row">
                                <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                    name="page" id="exampleInputUsername1" value="home" placeholder=" Page..."
                                    required>
                                <span class="text-danger">
                                    @error('page')
                                        {{ $message }}
                                    @enderror
                                </span>

                                <input style="width:90%; " type="text" maxlength="250" class="form-control"
                                    name="sec" id="sec" placeholder="Section..." required>
                                <span class="text-danger">
                                    @error('sec')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-4 hide10">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Image &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%;" type="file" class="form-control p-1"
                                        name="img">
                                    <span class="text-danger">
                                        @error('img')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 hide10">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Alt Image</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="alt_img" id="exampleInputUsername1" value="{{ old('alt_img') }}"
                                        placeholder=" Alt Image...">
                                    <span class="text-danger">
                                        @error('alt_img')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 videohide">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Video &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%;" type="file" class="form-control p-1"
                                        name="video">
                                    <span class="text-danger">
                                        @error('video')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 videohide">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Video Link </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="video_link" id="exampleInputUsername1" value="{{ old('video_link') }}"
                                        placeholder="Video Link...">
                                    <span class="text-danger">
                                        @error('video_link')
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
                                        placeholder="Title">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4 subtitle_hide">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Sub Title &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="sub_title" id="exampleInputUsername1" value="{{ old('sub_title') }}"
                                        placeholder="Sub Title">
                                    <span class="text-danger">
                                        @error('sub_title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Button name one</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="button_name_one" id="exampleInputUsername1"
                                        value="{{ old('button_name_one') }}" placeholder="Button Name One...">
                                    <span class="text-danger">
                                        @error('button_name_one')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4 btn_hide">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Button name Two</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="button_name_two" id="exampleInputUsername1"
                                        value="{{ old('button_name_two') }}" placeholder="Button Name Two...">
                                    <span class="text-danger">
                                        @error('button_name_two')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Status*</label>
                                    <select style="width:90%; " class="form-control" name="status">
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

                        <h4 class="ml-2 mb-3 mt-3 display-5 ">Description</h4>

                        <div class="row ml-2 ">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Description </label>
                                    <textarea onkeyup="md(this)" style="width:96.8% !important;" rows="7" maxlength="3500" type="text"
                                        name="des" class="form-control summernote" placeholder="Meta Description">{{ old('des') }}</textarea>
                                    <span class="text-danger">
                                        @error('des')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="md"
                                    style="float: right;margin-right: 23px;margin-top: -12px;color: #8c9095;font-size: 12px;">
                                </div>
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

    <!-- Add Modal All Title  -->
    <div class="modal fade cw_icon" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1000px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        Add Modal
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('cw_title.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                        <div class="row ml-2  d-none">
                            <div class="form-group row">
                                <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                    name="page" id="exampleInputUsername1" value="home" placeholder=" Page..."
                                    required>
                                <span class="text-danger">
                                    @error('page')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                    name="sec" id="sec_icon" placeholder=" Section..." required>
                                <span class="text-danger">
                                    @error('sec')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-4  hide5">
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
                                    <select style="width: 90% " class="form-control" name="status">
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
                                    class="btn btn-md btn-danger float-right mr-2 show">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Add Modal Sylheti Biye Shadi.com works -->
    <div class="modal fade Sylheti_Biye" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1000px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        Add Modal
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('Sylheti_Biye.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                        <div class="row ml-2">
                            <div class="col-md-4 ">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Title &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%;" type="text" class="form-control p-1" name="title"
                                        value="{{ old('title') }}" placeholder="title">
                                    <span class="text-danger">
                                        @error('video')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Title One &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="title_1" id="exampleInputUsername1" value="{{ old('title_1') }}"
                                        placeholder="Title One">
                                    <span class="text-danger">
                                        @error('title_1')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Icon One &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="icon_1" id="exampleInputUsername1" value="{{ old('icon_1') }}"
                                        placeholder="Icon One">
                                    <span class="text-danger">
                                        @error('icon_1')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Description One &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="des_1" id="exampleInputUsername1" value="{{ old('des_1') }}"
                                        placeholder="Description One">
                                    <span class="text-danger">
                                        @error('des_1')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Image &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%;" type="file" class="form-control p-1"
                                        name="img">
                                    <span class="text-danger">
                                        @error('img')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Alt Image &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="alt_img" id="exampleInputUsername1" value="{{ old('alt_img') }}"
                                        placeholder="alt_img">
                                    <span class="text-danger">
                                        @error('alt_img')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Title Two &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="title_2" id="exampleInputUsername1" value="{{ old('title_2') }}"
                                        placeholder="Title Two">
                                    <span class="text-danger">
                                        @error('title_2')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Icon Two &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="icon_2" id="exampleInputUsername1" value="{{ old('icon_2') }}"
                                        placeholder="Icon Two">
                                    <span class="text-danger">
                                        @error('icon_2')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Descripton Two &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="des_2" id="exampleInputUsername1" value="{{ old('des_2') }}"
                                        placeholder="Descripton Two">
                                    <span class="text-danger">
                                        @error('des_2')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Title Three &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="title_3" id="exampleInputUsername1" value="{{ old('title_3') }}"
                                        placeholder="Title Three">
                                    <span class="text-danger">
                                        @error('title_3')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Icon Three &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="icon_3" id="exampleInputUsername1" value="{{ old('icon_3') }}"
                                        placeholder="Icon Three">
                                    <span class="text-danger">
                                        @error('icon_3')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Descripton Three &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="des_3" id="exampleInputUsername1" value="{{ old('des_3') }}"
                                        placeholder="Descripton Three">
                                    <span class="text-danger">
                                        @error('des_3')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Status* &nbsp; &nbsp; &nbsp; </label>
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

    <!-- Add Modal Review title -->
    <div class="modal fade title_revirw" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1000px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        Add Modal
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('review_title.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                        <div class="row ml-2">
                            <div class="col-md-6">
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
                            <div class="col-md-6 ">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Status*</label>
                                    <select style="width:90%; " class="form-control" name="status">
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

                        <h4 class="ml-2 mb-3 mt-3 display-5 ">Description</h4>

                        <div class="row ml-2 ">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Description </label>
                                    <textarea onkeyup="md(this)" style="width:96.8% !important;" rows="7" maxlength="3500" type="text"
                                        name="des" class="form-control summernote" placeholder="Meta Description">{{ old('des') }}</textarea>
                                    <span class="text-danger">
                                        @error('des')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="md"
                                    style="float: right;margin-right: 23px;margin-top: -12px;color: #8c9095;font-size: 12px;">
                                </div>
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

    <!-- Add Modal clint review  -->
    <div class="modal fade review_card" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1000px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        Add Modal
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('cw_video.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                        <div class="row ml-2  d-none">
                            <div class="form-group row">
                                <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                    name="page" id="exampleInputUsername1" value="home" placeholder=" Page...">
                                <span class="text-danger">
                                    @error('page')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                    name="sec" id="sec_video" placeholder=" Section...">
                                <span class="text-danger">
                                    @error('sec')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-4 videohide">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Video &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%;" type="file" class="form-control p-1"
                                        name="video">
                                    <span class="text-danger">
                                        @error('video')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Video Link </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="video_link" id="exampleInputUsername1" value="{{ old('video_link') }}"
                                        placeholder="Video Link...">
                                    <span class="text-danger">
                                        @error('video_link')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Thumbnail &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%;" type="file" class="form-control p-1"
                                        name="thumb">
                                    <span class="text-danger">
                                        @error('thumb')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Alt Image &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%;" type="text" class="form-control p-1" name="alt_img"
                                        placeholder="alt img...">
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
                                    <label style="color:#c6b6b6;">Date &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="date" id="exampleInputUsername1" value="{{ old('date') }}"
                                        placeholder="date...">
                                    <span class="text-danger">
                                        @error('date')
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

                        <h4 class="ml-2 mb-3 mt-3 display-5 ">Description</h4>

                        <div class="row ml-2 ">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Description </label>
                                    <textarea onkeyup="md(this)" style="width:96.8% !important;" rows="7" maxlength="3500" type="text"
                                        name="des" class="form-control summernote" placeholder="Meta Description">{{ old('des') }}</textarea>
                                    <span class="text-danger">
                                        @error('des')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="md"
                                    style="float: right;margin-right: 23px;margin-top: -12px;color: #8c9095;font-size: 12px;">
                                </div>
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

    <!-- Add Modal SEO -->
    <div class="modal fade seo" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1100px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        SEO ADD
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('seo.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">SEO Section</h4>
                        <input class="d-none" type="text" name="page" value="home">
                        <div class="row ml-2 ">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Meta Title </label>
                                    <textarea type="text" style="width:100% !important;" name="meta_title" row="3" class="form-control"
                                        placeholder="Meta Title">{{ old('meta_title') }}</textarea>
                                    <span class="text-danger">
                                        @error('meta_title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2 ">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Meta Description </label>
                                    <textarea type="text" name="meta_description" class="form-control summernote" placeholder="Meta description">{{ old('meta_description') }}</textarea>
                                    <span class="text-danger">
                                        @error('meta_description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2 ">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Meta Keyword</label>
                                    <textarea type="text" name="meta_keyword" class="form-control summernote" placeholder="meta_keyword">{{ old('meta_keyword') }}</textarea>
                                    <span class="text-danger">
                                        @error('meta_keyword')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                <a data-bs-dismiss="modal" aria-label="Close"
                                    class="btn btn-md btn-danger float-right mr-2 show">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Update Modal --}}

    <!-- Edit Modal Image and Video -->
    @foreach ($cw_img as $postData)
        <div class="modal fade " id="cw_edit_img{{ $postData->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
            <div class="modal-dialog" style="max-width:1000px !important;">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                            Edit Modal
                    </div>
                    <div class="modal-body" style="color: #cab562;">
                        <form class="forms-sample" action="{{ route('cw_image.update', $postData->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                            <div class="row ml-2 d-none">
                                <div class="form-group row">
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="page" id="exampleInputUsername1" value="{{ $postData->page }}"
                                        placeholder=" Page..." required>
                                    <span class="text-danger">
                                        @error('page')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="sec" value="{{ $postData->sec }}" placeholder=" Section..."
                                        required>
                                    <span class="text-danger">
                                        @error('sec')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row ml-2">
                                <div class="col-md-4 hide10">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Image &nbsp; &nbsp; &nbsp;</label>
                                        <input style="width:90%;" type="file" class="form-control p-1"
                                            name="img">
                                        <span class="text-danger">
                                            @error('img')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 hide10">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Alt Image</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="alt_img" id="exampleInputUsername1"
                                            value="{{ $postData->alt_img }}" placeholder=" Alt Image...">
                                        <span class="text-danger">
                                            @error('alt_img')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 videohide">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Video &nbsp; &nbsp; &nbsp; </label>
                                        <input style="width:90%;" type="file" class="form-control p-1"
                                            name="video">
                                        <span class="text-danger">
                                            @error('video')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 videohide">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Video Link </label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="video_link" id="exampleInputUsername1"
                                            value="{{ $postData->video }}" placeholder="Video Link...">
                                        <span class="text-danger">
                                            @error('video_link')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Title &nbsp; &nbsp; &nbsp;</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="title" id="exampleInputUsername1"
                                            value="{{ $postData->title }}" placeholder="title...">
                                        <span class="text-danger">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4 subtitle_hide">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Sub Title &nbsp; &nbsp; &nbsp;</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="sub_title" id="exampleInputUsername1"
                                            value="{{ $postData->sub_title }}" placeholder="sub title...">
                                        <span class="text-danger">
                                            @error('sub_title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Button name one</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="button_name_one" id="exampleInputUsername1"
                                            value="{{ $postData->button_name_one }}" placeholder="Button Name One...">
                                        <span class="text-danger">
                                            @error('button_name_one')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 videohide">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Button name Two</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="button_name_two" id="exampleInputUsername1"
                                            value="{{ $postData->button_name_two }}" placeholder="Button Name Two...">
                                        <span class="text-danger">
                                            @error('button_name_two')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Status*</label>
                                        <select style="width:90%; " class="form-control" name="status">
                                            <option {{ $postData->status == 0 ? 'selected' : '' }} value="0">Active
                                            </option>
                                            <option {{ $postData->status == 1 ? 'selected' : '' }} value="1">
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

                            <h4 class="ml-2 mb-3 mt-3 display-5 ">Description</h4>

                            <div class="row ml-2 ">
                                <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                    <div class="form-group  ">
                                        <label for="exampleInputUsername1" style="color:#c6b6b6;">Description </label>
                                        <textarea onkeyup="md(this)" style="width:96.8% !important;" rows="7" maxlength="3500" type="text"
                                            name="des" class="form-control summernote" placeholder="Meta Description">{{ $postData->des }}</textarea>
                                        <span class="text-danger">
                                            @error('des')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="md"
                                        style="float: right;margin-right: 23px;margin-top: -12px;color: #8c9095;font-size: 12px;">
                                    </div>
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
    @endforeach

    <!-- Edit Modal All Title -->
    @foreach ($all_title as $postData)
        <div class="modal fade " id="cw_edit_icon{{ $postData->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
            <div class="modal-dialog" style="max-width:1000px !important;">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                            Edit Modal
                    </div>
                    <div class="modal-body" style="color: #cab562;">
                        <form class="forms-sample" action="{{ route('cw_title.update', $postData->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                            <div class="row ml-2  d-none">
                                <div class="form-group row">
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="page" id="exampleInputUsername1" value="{{ $postData->page }}"
                                        placeholder=" Page..." required>
                                    <span class="text-danger">
                                        @error('page')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="sec" value="{{ $postData->sec }}" placeholder=" Section..."
                                        required>
                                    <span class="text-danger">
                                        @error('sec')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row ml-2">
                                <div class="col-md-4  hide5">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Title &nbsp; &nbsp; &nbsp;</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="title" id="exampleInputUsername1"
                                            value="{{ $postData->title }}" placeholder="title...">
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
                                        <select style="width: 90% " class="form-control" name="status">
                                            <option {{ $postData->status == 0 ? 'selected' : '' }} value="0">Active
                                            </option>
                                            <option {{ $postData->status == 1 ? 'selected' : '' }} value="1">
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
                                        class="btn btn-md btn-danger float-right mr-2 show">Back</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        $(document).ready(function() {
            // section 1
            // Image and Video
            $('#sec1').click(function() {
                $("#sec").val('home_sec_1');
            });
            $('#sec1').click(function() {
                $(".videohide").hide();
                $(".subtitle_hide").hide();
            });
            
            $('.subhide').click(function() {
                $(".subtitle_hide").hide();
            });
            //end  section 1

            // Video
            $('#sec2').click(function() {
                $("#sec_video").val('home_sec_2');
            });

            // section 4
            // Image and Video
            $('#sec4').click(function() {
                $("#sec").val('home_sec_4');
            });

            // video hide
            $('#sec4').click(function() {
                $(".videohide").hide();
                $(".btn_hide").hide();
            });

            $('#edithide').click(function() {
                $(".videohide").hide();
                $(".subtitle_hide").show();
            });

            //clint review 
            $('#sec6').click(function() {
                $("#sec_video").val('home_sec_6');
                $(".videohide").hide();
            });

            //clint review Edit
            $('.video').click(function() {
                $(".videohide").hide();
            });

            // Icon
            $('#sec3').click(function() {
                $("#sec_icon").val('home_sec_3');
            });
        });
    </script>
@endsection
