@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Profile Page</h4>
        <form action="{{route('store.profile')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="name" value="{{$adminData->name}}" id="example-text-input">
            </div>
          </div>
          <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">userName</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="username" value="{{$adminData->username}}" id="example-text-input">
            </div>
          </div>
          <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Email Id</label>
            <div class="col-sm-10">
              <input class="form-control" type="email" name="email" value="{{$adminData->email}}" id="example-text-input">
            </div>
          </div>
          <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
            <div class="col-sm-7">
              <input class="form-control" type="file" name="profile_image" value="{{$adminData->name}}" id="profile_image">
            </div>
            <div class="col-sm-3">
              <img id="showImage" class="rounded avatar-lg" src="{{(!empty($adminData->profile_image))?url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg')}}" alt="Card image cap">
            </div>
          </div>
          <!-- end row -->

          <button type="submit" class="btn btn-info waves-effect waves-light">
            Update Profile <i class="ri-arrow-right-line align-middle ms-2"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#profile_image').change(function(e) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>
@endsection