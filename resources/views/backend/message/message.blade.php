@extends('backend.layouts.app')
@section('content')
<!-- Page map -->
{{-- Table --}}
<div class="row">
    {{-- Content With Image --}}
    <!-- Section 1 -->
    
    <!-- Slider -->
    {{--Custom Message Sectio Start--}}

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
                        <h6 class="preview-subject">Message</h6>
                        <p class="text-muted mb-0">Message</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card ">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        @if (Session::has('success'))
                        <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                        @endif
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Gender</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Message as $postData )
                            <tr>
                                <td>{{ $postData->name}}</td>
                                <td>{{ $postData->email}}</td>
                                <td>{{ $postData->number}}</td>
                                <td>{{ $postData->gender}}</td>
                                <td>{!! Str::limit(strip_tags($postData->message), 50, '...') !!}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="{{ '#Message_delete' . $postData->id }}">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            {{-- Delete Modal --}}
                            <div class="modal fade" id="Message_delete{{ $postData->id }}" tabindex="-1"
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
                                                href="{{ route('Message.delete', $postData->id) }}">Delete</a>
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

@endsection