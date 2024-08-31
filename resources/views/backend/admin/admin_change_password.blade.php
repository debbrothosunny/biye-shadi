@extends('backend.layouts.app')
@section('content')


<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center">Update Your Password</h4>
            <form method="POST" action="{{ route('Update.Password') }}" class=" forms-sample"
                enctype="multipart/form-data pt-5">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Old Password</label>
                    <input type="password" name="old_password"
                        class="form-control @error('old_password') is-invaild @enderror" id="exampleInputEmail1" placeholder=" Type Old Password">
                    @error('old_password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">New Password</label>
                    <input type="password" name="new_password"
                        class="form-control @error('new_password') is-invaild @enderror" id="exampleInputEmail1"placeholder="Type New Password">
                    @error('new_password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control"
                        id="exampleInputEmail1" placeholder="Confirm Your Password">
                </div>
                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection