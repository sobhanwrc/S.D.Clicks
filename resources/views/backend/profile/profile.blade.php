@extends('backend.dashboard.dashboard_layout')
<!-- end #header -->

<!-- begin #sidebar -->
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    @if(Session::has('profile-update'))
      <p class="login-box-msg" style="color: green;">{{ Session::get('profile-update') }}</p>
    @endif

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">Nina Mcintire</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="settings">
                <form class="form-horizontal" name="profile_form" id="profile_form" method="post" action="/admin/profile_submit">
                  {{csrf_field()}}

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label {{ $errors->has('name') ? 'has-error' : '' }}">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$details['name']}}">

                      @if ($errors->first('name'))<span class="input-group text-danger">{{ $errors->first('name') }}</span>@endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label {{ $errors->has('email') ? 'has-error' : '' }}">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$details['email']}}" disabled="">

                      @if ($errors->first('email'))<span class="input-group text-danger">{{ $errors->first('email') }}</span>@endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label {{ $errors->has('address') ? 'has-error' : '' }}">Address</label>

                    <div class="col-sm-10">
                      <textarea rows="" cols="" class="form-control" id="address" placeholder="Address" name="address">{{$details['address']}}</textarea>

                      @if ($errors->first('address'))<span class="input-group text-danger">{{ $errors->first('address') }}</span>@endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label {{ $errors->has('mobile_no') ? 'has-error' : '' }}">Mobile Number</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="mobile_no" placeholder="Mobile Number" name="mobile_no" value="{{$details['mobile_number']}}">

                      @if ($errors->first('mobile_no'))<span class="input-group text-danger">{{ $errors->first('mobile_no') }}</span>@endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label {{ $errors->has('fb_id') ? 'has-error' : '' }}">Facebook ID</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="fb_id" placeholder="Facebook ID" name="fb_id" value="{{$details['fb_id']}}">

                      @if ($errors->first('fb_id'))<span class="input-group text-danger">{{ $errors->first('fb_id') }}</span>@endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label {{ $errors->has('instagram_id') ? 'has-error' : '' }}">Instagram ID</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="instagram_id" placeholder="Instagram ID" name="instagram_id" value="{{$details['instagram_id']}}">

                      @if ($errors->first('instagram_id'))<span class="input-group text-danger">{{ $errors->first('instagram_id') }}</span>@endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label {{ $errors->has('about_me') ? 'has-error' : '' }}">About Me</label>

                    <div class="col-sm-10">
                      <textarea rows="" cols="" class="form-control" id="about_me" placeholder="About Me" name="about_me">{{$details['about_me']}}</textarea>

                      @if ($errors->first('about_me'))<span class="input-group text-danger">{{ $errors->first('about_me') }}</span>@endif
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection