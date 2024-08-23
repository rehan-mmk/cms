<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> DMSGP | Add Branches </title>
  <link href="{{ asset('website/img/logo.png')}}" rel="icon">


  <base href="{{ \URL::to('/') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <style>
    .swal2-title {
      line-height: 2.1;
    }
  </style>
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
    
    <!-- Main content -->
    <div class="content">

      <div class="container-fluid">
        <div class="row mt-4">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <form method="POST" action="{{route('AddBranch')}}" class="form-horizontal">
                  @csrf

                  <div class="form-group row">
                    <div class="col-sm-5 mt-2">
                      <label> @lang('branch.Branch Name') </label>
                      <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="@lang('branch.Enter branch name')">
                      <span class="text-danger">@error('name') @lang('branch.'.$message) @enderror</span>
                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-5 mt-2">
                        <label> @lang('branch.City') </label>
                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="@lang('branch.Enter branch city')">
                        <span class="text-danger">@error('city') @lang('branch.'.$message) @enderror</span>
                    </div>
                  </div>




                  <div class="form-group row">
                    <div class="col-sm-5 mt-2">
                      <label> @lang('branch.State') </label>
                      <input type="text" name="state" value="{{ old('state') }}" class="form-control" placeholder="@lang('branch.Enter Branch State')">
                      <span class="text-danger">@error('state') @lang('branch.'.$message) @enderror</span>
                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-5 mt-2">
                      <label for> @lang('branch.Postal Code') </label>
                      <input type="text" name="ZipCode" value="{{ old('ZipCode') }}" class="form-control" placeholder="@lang('branch.Enter Branch Postal Code')">
                      <span class="text-danger">@error('ZipCode') @lang('branch.'.$message) @enderror</span>
                    </div>
                  </div>






                  <div class="form-group row">
                    <div class="col-sm-5 mt-2">
                      <label> @lang('branch.Country') </label>
                      <input type="text" name="country" value="{{ old('country') }}" class="form-control" placeholder="@lang('branch.Enter Branch Country')">
                      <span class="text-danger">@error('country') @lang('branch.'.$message) @enderror</span>
                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-5 mt-2">
                      <label> @lang('branch.Contact') </label>
                      <input type="text" name="contact" value="{{ old('contact') }}" class="form-control" placeholder="@lang('branch.Enter Branch Contact Number')">
                      <span class="text-danger">@error('contact') @lang('branch.'.$message) @enderror</span>
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-sm-5 mt-2 mr-auto ml-auto">
                      <label> @lang('branch.Building Address') </label>
                      <textarea name="street" class="form-control" placeholder="@lang('branch.Branch Street / Building Address')">{{ old('street') }}</textarea>
                      <span class="text-danger">@error('street') @lang('branch.'.$message) @enderror</span>
                    </div>
                  </div>

                  <div class="form-group row mt-3">
                    <div class=" col-sm-2 ml-auto mr-auto text-center">
                      <button type="submit" class="btn btn-primary"> @lang('branch.Add Branch') </button>
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


  {{-- @include('admin.includes.footer') --}}
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
  $(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        customClass: {
            popup: 'textcenter'
        }
    });

    var errorMessages = {!! json_encode(__('branch')) !!};

    @if(Session::has('Success'))
      Toast.fire({
        icon: 'success',
        title: errorMessages['{{ Session::get('Success') }}'],
      });
    @endif

    @if(Session::has('Fail'))
      Toast.fire({
        icon: 'error',
        title: errorMessages['{{ Session::get('Fail') }}'],
      });
    @endif

  });
</script>



</body>
</html>
