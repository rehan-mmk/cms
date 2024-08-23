<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> DMSG | Profile </title>
  <link href="{{ asset('website/img/logo.png')}}" rel="icon">


  <base href="{{ \URL::to('/') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/ijaboCropTool/ijaboCropTool.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="position: fixed; top: 0; left: 0; right: 0;">
    @include('admin.includes.navbar')
  </nav>



  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; bottom: 0; left: 0; top: 0;">
    @include('admin.includes.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-5 pt-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> @lang('index.Admin') </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> @lang('index.Home')</a></li>
              <li class="breadcrumb-item active"> @lang('index.Admin Profile') </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

      <div class="container-fluid">
        <div class="row"> 
          <div class="col-md-3"> 

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle admin_picture" 
                    src="{{ asset('images/ProfileImages/' . Auth::user()->picture)  }}" alt="Admin profile picture">
                </div>
                <h3 class="profile-username text-center admin_name"> {{ Auth::user()->name }} </h3>
                <p class="text-muted text-center"> {{ __( 'index.' . Auth::user()->role->RoleName ) }} </p>

                <input type="file" name="AdminImage" id="AdminImage" style="opacity: 0;height:1px;display:none">
                <a href="javascript:void(0)" class="btn btn-primary btn-block" id="ChangePictureBtn"><b> @lang('index.Change Picture') </b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a class="nav-link active" href="#PersonalInfo" data-toggle="tab">
                      @lang('index.Personal Information')
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#ChangePassword" data-toggle="tab">
                       @lang('index.Change Password')
                    </a>
                  </li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="PersonalInfo">
                    <form method="POST" action="{{route('UpdateInfo')}}" id="AdminInfoForm" class="form-horizontal">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">@lang('index.Full Name')</label>
                        <div class="col-sm-10">
                          <input type="text" name="fullname" value="{{ Auth::user()->fullname }}" class="form-control">
                          <span class="text-danger error-text fullname_error"></span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">@lang('index.Email')</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                          <span class="text-danger error-text email_error"></span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">@lang('index.Save Changes')</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="ChangePassword">
                    <form action="{{ route('UpdatePassword') }}" method="POST" id="ChangeAdminPasswordForm" class="form-horizontal">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">@lang('index.Old Password')</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="OldPassword" 
                            name="oldpassword" placeholder="@lang('index.Enter Current Password')">
                            <span class="text-danger error-text oldpassword_error"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">@lang('index.New Password')</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="NewPassword" 
                            name="newpassword" placeholder="@lang('index.Enter New Password')">
                            <span class="text-danger error-text newpassword_error"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">@lang('index.Confirm New Password')</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="ConfirmNewPassword" 
                            name="cnewpassword" placeholder="@lang('index.Re-Enter New Password')">
                            <span class="text-danger error-text cnewpassword_error"></span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger"> @lang('index.Update Password')</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->




@include('admin.includes.scripts')


<script>

$.ajaxSetup({
  headers:{ 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') }
});
  



$(function(){

  var messages = {!! json_encode(__('index')) !!};

  $('#AdminInfoForm').on('submit', function(e){
    e.preventDefault();

    $.ajax({
      url: $(this).attr('action'),
      method: $(this).attr('method'),
      data: new FormData(this),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function(){
        $(document).find('span.error-text').text('');
      },
      success: function(data){
        if(data.status == 0){
          $.each(data.error, function(prefix, val){
            $('span.' + prefix + '_error').text(messages[val[0]]);
          });
        }
        else{
          $('.admin_name').each(function(){
            $(this).html( $('#AdminInfoForm').find( $('input[name="fullname"]') ).val() );
          });
          alert(messages[data.message]);
        }
      }
    });

  });








  $(document).on('click','#ChangePictureBtn', function(){
    $('#AdminImage').click();
  });


  $('#AdminImage').ijaboCropTool({
    preview : '.admin_picture',
    setRatio:1,
    allowedExtensions: ['jpg', 'jpeg','png'],
    buttonsText:['CROP','QUIT'],
    buttonsColor:['#30bf7d','#ee5155', -15],
    processUrl:'{{ route("UpdatePicture") }}',
    withCSRF:['_token','{{ csrf_token() }}'],
    onSuccess:function(message, element, status){
      alert(messages[message]);
    },
    onError:function(message, element, status){
      alert(messages[message]);
    }
  });


  $('#ChangeAdminPasswordForm').on('submit', function(e){
    e.preventDefault();

    $.ajax({
      url:$(this).attr('action'),
      method:$(this).attr('method'),
      data:new FormData(this),
      processData:false,
      dataType:'json',
      contentType:false,
      beforeSend:function(){
        $(document).find('span.error-text').text('');
      },
      success:function(data){
        if(data.status == 0){
          $.each(data.error, function(prefix, val){
            $('span.' + prefix + '_error').text(messages[val[0]]);
          });
        }else{
          $('#ChangeAdminPasswordForm')[0].reset();
          alert(messages[data.msg]);
        }
      }
    });
  });


    
});

</script>

</body>
</html>
