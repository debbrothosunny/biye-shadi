@extends('backend.layouts.app')
@section('content')

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
                    <h6 class="preview-subject">Country</h6>
                    <p class="text-muted mb-0">Country</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header -->
<!--card Section -->
<div class="col-lg-12 grid-margin stretch-card ">
    <div class="card">
        <div class="card-body">
            <ul class="navbar-nav d-inline mb-3">
                <li class="nav-item col-lg-3 float-right mb-3 mt-2 d-none" style="padding-right: 4.3%;">
                    <a class="nav-link btn btn-info create-new-button px-3">Country</a>
                </li>
                <li class="breadcrumb-item p-2 col-lg-9 mb-3">

                    <a class="nav-link btn btn-success create-new-button px-3 addpage mr-1" data-bs-toggle="modal"
                        data-bs-target=".most_resent" id="sec1"> + create </a>
                </li>
            </ul>
            <div class="table-responsive">
                <table class="table table-hover ">
                    @if (Session::has('success'))
                    <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                    @endif
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($country as $postData)
                        <tr>
                            <td>{{ $postData->country }}</td>  
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
                                        data-bs-target="#most_resent{{ $postData->id }}">
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
                        <div class="modal fade " id="most_resent{{ $postData->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true"
                            style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
                            <div class="modal-dialog" style="max-width:1000px !important;">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                                            Add Modal
                                    </div>
                                    <div class="modal-body" style="color: #cab562;">
                                        <form class="forms-sample" action="{{ route('country.update', $postData->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                                            <div class="row ml-2">
                                                <div class="col-md-4 ">
                                                    <div class="form-group row">
                                                        <label style="color:#c6b6b6;">Country &nbsp; &nbsp;
                                                            &nbsp; </label>
                                                        <input style="width:90%;" type="text" class="form-control p-1"
                                                            name="country" value="{{ $postData->country }}"
                                                            placeholder="title...">
                                                        <span class="text-danger">
                                                            @error('country')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label style="color:#c6b6b6;">Status* &nbsp; &nbsp;
                                                            &nbsp; </label>
                                                        <select style="width: 87% !important; " class="form-control"
                                                            name="status">
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
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: #ac9f33;">Delete
                                            Data</h5>
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
                                            href="{{ route('country.delete', $postData->id) }}">Delete</a>
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


<!-- Add Modal Most Recent Bio Data -->
<div class="modal fade most_resent" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
    <div class="modal-dialog" style="max-width:1000px !important;">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                    Add Modal
            </div>
            <div class="modal-body" style="color: #cab562;">
                <form class="forms-sample" action="{{ route('country.create') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                    <div class="row ml-2">
                        <div class="col-md-4 ">
                            <div class="form-group row">
                                <label style="color:#c6b6b6;">Country &nbsp; &nbsp; &nbsp; </label>
                                <input style="width:90%;" type="text" class="form-control p-1" name="country"
                                    value="{{ old('country') }}" placeholder="Country">
                                <span class="text-danger">
                                    @error('country')
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

@endsection