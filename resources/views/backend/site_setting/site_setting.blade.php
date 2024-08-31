@extends('backend.layouts.app')
@section('content')
<div class="row">
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
                        <h6 class="preview-subject">Section (Site Setting)</h6>
                        <p class="text-muted mb-0">Site Setting</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">  
        <div class="card">
            <div class="card-body">
                <ul class="navbar-nav d-inline mb-3">
                    <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                        @if (count($site_setting) < 1) <a
                            class="nav-link btn btn-success create-new-button px-3 addpage mr-1" data-bs-toggle="modal"
                            data-bs-target=".site_setting" id=""> + create </a>
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
                                <th>CopyRight</th>
                                <th>Number</th>
                                <th>Alt Image</th>
                                <th>White Logo</th>
                                <th>Dark Logo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($site_setting as $postData )
                            <tr>
                                <td>{{ $postData->copy_right }}</td>
                                <td>{{ $postData->number }}</td>
                                <td>{!! Str::limit(strip_tags($postData->alt_img), 20, '...') !!}</td>
                                <td><img src="{!! asset('assets/img/uploaded/home/img/' . $postData->w_img ?? '') !!}">
                                <td><img src="{!! asset('assets/img/uploaded/home/img/' . $postData->d_img ?? '') !!}">
                                </td>

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
                                            data-bs-target="#site_setting{{ $postData->id }}">
                                            <i class="mdi mdi-grease-pencil"></i>
                                        </a>

                                        <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="{{ '#site_setting_delete' . $postData->id }}">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <!-- Update -->
                            <div class="modal fade " id="site_setting{{ $postData->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true"
                                style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
                                <div class="modal-dialog" style="max-width:1000px !important;">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                                                Edit Modal
                                        </div>
                                        <div class="modal-body" style="color: #cab562;">
                                            <form class="forms-sample"
                                                action="{{ route('site_setting.update', $postData->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                                                <div class="row ml-2">
                                                    <div class="col-md-4 hide10 image_hide">
                                                        <div class="form-group row">
                                                            <label style="color:#c6b6b6;">White Logo &nbsp; &nbsp;
                                                                &nbsp;</label>
                                                            <input style="width:90%;" type="file"
                                                                class="form-control p-1" name="w_img">
                                                            <span class="text-danger">
                                                                @error('w_img')
                                                                {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 hide10 image_hide">
                                                        <div class="form-group row">
                                                            <label style="color:#c6b6b6;">Dark Logo &nbsp; &nbsp;
                                                                &nbsp;</label>
                                                            <input style="width:90%;" type="file"
                                                                class="form-control p-1" name="d_img">
                                                            <span class="text-danger">
                                                                @error('d_img')
                                                                {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 hide10 image_hide">
                                                        <div class="form-group row">
                                                            <label style="color:#c6b6b6;">Alt Image</label>
                                                            <input style="width:90%; " type="text" maxlength="250"
                                                                class="form-control " name="alt_img"
                                                                id="exampleInputUsername1"
                                                                value="{{ $postData->alt_img }}"
                                                                placeholder=" Alt Image...">
                                                            <span class="text-danger">
                                                                @error('alt_img')
                                                                {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4  hide5">
                                                        <div class="form-group row">
                                                            <label style="color:#c6b6b6;">CopyRight &nbsp; &nbsp;
                                                                &nbsp;</label>
                                                            <input style="width:90%; " type="text" maxlength="250"
                                                                class="form-control " name="copy_right"
                                                                id="exampleInputUsername1"
                                                                value="{{ $postData->copy_right }}" placeholder="CopyRight">
                                                            <span class="text-danger">
                                                                @error('copy_right')
                                                                {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4  hide5">
                                                        <div class="form-group row">
                                                            <label style="color:#c6b6b6;">Number &nbsp; &nbsp;
                                                                &nbsp;</label>
                                                            <input style="width:90%; " type="text" maxlength="250"
                                                                class="form-control " name="number"
                                                                id="exampleInputUsername1"
                                                                value="{{ $postData->number }}" placeholder="Type Number">
                                                            <span class="text-danger">
                                                                @error('number')
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
                                                                <option {{ $postData->status == 0 ? 'selected' : '' }}
                                                                    value="0">Active
                                                                </option>
                                                                <option {{ $postData->status == 1 ? 'selected' : '' }}
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

                            {{-- Delete Modal --}}
                            <div class="modal fade" id="site_setting_delete{{ $postData->id }}" tabindex="-1"
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
                                                href="{{ route('site_setting.delete', $postData->id) }}">Delete</a>
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


{{------------Custom Add Modal Site Setting Start--------------------}}

<div class="modal fade site_setting" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
    <div class="modal-dialog" style="max-width:1000px !important;">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                    Add Modal
            </div>
            <div class="modal-body" style="color: #cab562;">
                <form class="forms-sample" action="{{ route('site_setting.create') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h4 class="ml-2 mb-3 display-5">Add Data</h4>

                    <div class="row ml-2">
                        <div class="col-md-4 hide10">
                            <div class="form-group row">
                                <label style="color:#c6b6b6;">White Logo &nbsp; &nbsp; &nbsp;</label>
                                <input style="width:90%;" type="file" class="form-control p-1" name="w_img">
                                <span class="text-danger">
                                    @error('w_img')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 hide10">
                            <div class="form-group row">
                                <label style="color:#c6b6b6;">Dark Logo &nbsp; &nbsp; &nbsp;</label>
                                <input style="width:90%;" type="file" class="form-control p-1" name="d_img">
                                <span class="text-danger">
                                    @error('d_img')
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
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label style="color:#c6b6b6;">CopyRight &nbsp; &nbsp;</label>
                                <input style="width:90%; " type="text" maxlength="250" class="form-control " name="copy_right"
                                    id="exampleInputUsername1" value="{{ old('copy_right') }}" placeholder="Type CopyRight">
                                <span class="text-danger">
                                    @error('copy_right')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label style="color:#c6b6b6;">Number &nbsp; &nbsp;</label>
                                <input style="width:90%; " type="text" maxlength="250" class="form-control " name="number"
                                    id="exampleInputUsername1" value="{{ old('number') }}" placeholder="Type Number">
                                <span class="text-danger">
                                    @error('number')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label style="color:#c6b6b6;">Status*</label>
                                <select style="width:90%; " class="form-control" name="status">
                                    <option value="0">Active</option>
                                    <option value="1">Deactive</option>
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
{{------------Custom Add Modal Site Setting End--------------------}}
@endsection