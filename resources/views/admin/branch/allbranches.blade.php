<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> DMSGP | All Branches </title>
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

    .table thead th {
      border-bottom: none;
    }

    .table tr:first-child td {
      border-top: 0;
    }

    .table tr td {
      border-top: 0;
    }

    .table tr:nth-child(1) td {
        border-top: 0;
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
        <div class="row mt-5">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card mt-2" style="border-radius: 0; box-shadow: none;">
              <div class="card-body table-responsive" style="padding: 0;">
                
                <table class="table table-striped">
                  <thead class="text-white text-center" style="background-color: #343a40;">
                    <tr>
                      <th style="width: 70px;">@lang('branch.S/No')</th>
                      <th> @lang('branch.Name') </th>
                      <th> @lang('branch.City') </th>
                      <th> @lang('branch.State') </th>
                      <th> @lang('branch.Street') </th>
                      <th> @lang('branch.Postal Code') </th>
                      <th> @lang('branch.Country') </th>
                      <th> @lang('branch.Contact') </th>
                      <th> @lang('branch.Edit') </th>
                      <th> @lang('branch.Delete') </th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($allbranches as $branch)
                      <tr class="text-center">
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $branch->name }}</td>
                          <td>{{ $branch->city }}</td>
                          <td>{{ $branch->state }}</td>
                          <td>{{ $branch->street }}</td>
                          <td>{{ $branch->ZipCode }}</td>
                          <td>{{ $branch->country }}</td>
                          <td>{{ $branch->contact }}</td>
                          <td>
                            <a href="{{ route('EditBranchView', $branch->id) }}">
                              <button type="button" class="btn btn-block btn-outline-success btn-flat" style="padding: 4px 1px;">
                                @lang('branch.Edit')
                              </button>
                            </a> 
                          </td>
                          <td>
                            <button type="button" class="btn btn-block btn-outline-danger btn-flat" id="DeleteBtn" style="padding: 4px 1px;"
                              data-id="{{ $branch->id }}" data-route="{{ route('DeleteBranch', $branch->id) }}">
                              @lang('branch.Delete')
                            </button>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              
              
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
  $(document).on('click', '#DeleteBtn', function(e){
    e.preventDefault();

    var id = $(this).data('id');
    var route = $(this).data('route');

    var errorMessages = {!! json_encode(__('branch')) !!};

    Swal.fire({
      title: errorMessages['Are you sure?'],
      text: errorMessages['You will not be able to revert this!'],
      icon: "warning",
      showCancelButton: true, 
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: errorMessages['Yes, delete it!'],
      cancelButtonText: errorMessages['Cancel'],
    })
    .then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            url: route,
            type: 'DELETE',
            data: {
              "_token": "{{ csrf_token() }}"
            },
            success: function (response) {
              Swal.fire({
                title: errorMessages['Deleted!'],
                text: errorMessages['Record Deleted Successfully'],
                icon: "success",
                confirmButtonText: errorMessages['OK']
              })
              .then((result) => {
                location.reload();
              });
            },
            error: function (xhr, status, error) {
              console.error(xhr.responseText);
            }
        });
      }
    });
  });
</script>


</body>
</html>
