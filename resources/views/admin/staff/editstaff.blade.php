<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> DMSGP | Update Staff </title>
  <link href="{{ asset('website/img/logo.png')}}" rel="icon">

  <base href="{{ \URL::to('/') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
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
            <h1 class="m-0"> @lang('staff.Update Staff') </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('AddStaffView') }}"> @lang('staff.Home') </a></li>
              <li class="breadcrumb-item active"> @lang('staff.Update Staff') </li>
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
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card mt-2">
              <div class="card-body">
                <form method="POST" action="{{route('EditStaff', $staff->id)}}" class="form-horizontal">
                  @csrf
                  @method('PUT')

                  <div class="for-group row">
                    <div class="col-sm-5 mt-3">
                      <label> @lang('staff.Full Name') </label>
                      <input type="text" name="fullname" value="{{ old('fullname', $staff->fullname) }}" class="form-control" placeholder="Enter Staff Full Name">
                      <span class="text-danger">@error('fullname') {{$message}} @enderror</span>
                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-5 mt-4">
                      <label for> @lang('staff.Email') </label>
                      <input type="email" name="email" value="{{ old('email', $staff->email) }}" class="form-control" placeholder="Enter Staff Email">
                      <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                  </div>




                  <div class="for-group row">
                    <div class="col-sm-5 mt-4">
                      <label> @lang('staff.Branch') </label>
                      <select name="branchid" class="form-control input-sm">
                        <option value="{{$staff->branch->id ?? 'Null'}}">{{$staff->branch->name ?? 'Null'}}</option>
                        @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}" {{ old('branchid') == $branch->id ? 'selected' : '' }}>
                          {{ $branch->name.' | '.$branch->city.' | '.$branch->ZipCode.' | '.$branch->state.' | '.$branch->country}}
                        </option>
                        @endforeach
                      </select>
                      <span class="text-danger">@error('branchid') {{$message}} @enderror</span>
                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-5 mt-4">
                      <label> @lang('staff.Role') </label>
                      <select name="roleid" class="form-control input-sm">
                        <option value="{{$staff->role->id ?? 'Null'}}">{{ __('staff.' . $staff->role->RoleName) ?? 'Null'}}</option>
                        @foreach ($roles as $role)
                          <option value="{{ $role->id }}" {{ old('roleid') == $role->id ? 'selected' : '' }}>
                            {{ __('staff.' . $role->RoleName) }}
                          </option>
                        @endforeach
                      </select>
                      <span class="text-danger">@error('roleid') {{$message}} @enderror</span>
                    </div>
                  </div>


                  <div class="form-group row mt-5">
                    <div class=" col-sm-10">
                      <button type="submit" class="btn btn-primary"> @lang('staff.Update') </button>
                    </div>
                  </div>
                </form>
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







<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>


<script>

  var message = {!! json_encode(__('staff')) !!};

  @if(Session::has('Success'))
    Swal.fire({
        title: message['Updated'],
        text: message['{{ Session::get('Success') }}'],
        icon: "success",
        confirmButtonText: message['OK']
    })
    .then((result) => {
        window.location.href = "{{ route('StaffList') }}";
    });
  @endif


  @if(Session::has('Fail'))
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{ Session::has('Fail') }}",
        footer: '<a>Why do I have this issue?</a>'
    });
  @endif

</script>


</body>
</html>
