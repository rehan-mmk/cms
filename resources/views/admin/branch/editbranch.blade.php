<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> DMSGP | Update Branch </title>
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
  <div class="content-wrapper mt-5">

    <!-- Main content -->
    <div class="content">

      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card mt-5">
              <div class="card-body">
                <form method="POST" action="{{route('EditBranch', $branch->id) }}" class="form-horizontal">
                    @csrf
                    @method('PUT')
                  <div class="form-group row">
                    <div class="col-sm-5 mt-2">
                      <label> @lang('branch.Branch Name') </label>
                      <input type="text" name="branchname" value="{{ $branch->name }}" class="form-control form-control-sm" placeholder="Enter branch name">
                      <span class="text-danger">@error('branchname') {{$message}} @enderror</span>
                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-5 mt-2">
                        <label> @lang('branch.City') </label>
                        <input type="text" name="city" value="{{ $branch->city }}" class="form-control form-control-sm" placeholder="Enter Branch City">
                    </div>
                  </div>




                  <div class="form-group row">
                    <div class="col-sm-5 mt-3">
                      <label> @lang('branch.State') </label>
                      <input type="text" name="state" value="{{ $branch->state }}" class="form-control form-control-sm" placeholder="Enter Branch State">
                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-5 mt-2">
                      <label for> @lang('branch.Postal Code') </label>
                      <input type="text" name="ZipCode" value="{{ $branch->ZipCode }}" class="form-control form-control-sm" placeholder="Enter Branch Zip Code">
                    </div>
                  </div>






                  <div class="form-group row">
                    <div class="col-sm-5 mt-3">
                      <label> @lang('branch.Country') </label>
                      <input type="text" name="country" value="{{ $branch->country }}" class="form-control form-control-sm" placeholder="Enter Branch City">
                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-5 mt-3">
                      <label> @lang('branch.Contact') </label>
                      <input type="text" name="contact" value="{{ $branch->contact }}" class="form-control form-control-sm" placeholder="Enter Branch Contact Number">
                      <span class="text-danger">@error('contact') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-5 mt-4 mr-auto ml-auto">
                      <label> @lang('branch.Building Address') </label>
                      <textarea name="street" class="form-control" placeholder="Branch Street/Building Address">
                        {{ $branch->street }}
                      </textarea>
                      <span class="text-danger">@error('street') {{$message}} @enderror</span>
                    </div>
                  </div>

                  

                  <div class="form-group row mt-5">
                    <div class=" col-sm-2 ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary"> @lang('branch.Update Branch') </button>
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
  $(function() {

    var messages = {!! json_encode(__('branch')) !!};

    @if(Session::has('Success'))
        Swal.fire({
            title: messages['Updated!'],
            text: messages['Your Data Has Been Saved!'],
            icon: "success",
            confirmButtonText: messages['OK']
        })
        .then((result) => {
            window.location.href = "{{ route('BranchesList') }}";
        });
    @endif


    @if(Session::has('Fail'))
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
            footer: '<a>Why do I have this issue?</a>'
        })
        .then((result) => {
            location.reload();
        });
    @endif

  });
</script>


</body>
</html>
