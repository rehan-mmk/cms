<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> DMSGP | Staff List </title>
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
    <div class="content mt-4">
      {{-- <div class="col-sm-2 mb-2 ml-auto">
        <select name="roleid" class="form-control input-sm">
          <option value="">All</option>
          @foreach ($roles as $role)
          <option value="{{ $role->id }}" {{ old('roleid') == $role->id ? 'selected' : '' }}>
            {{ $role->RoleName}}
          </option>
          @endforeach
        </select>
        <span class="text-danger">@error('roleid') {{$message}} @enderror</span>
      </div> --}}

      <div class="container-fluid">
        <div class="row mb-5 pb-5">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card mt-2" style="border-radius: 0; box-shadow: none;">
              <div class="card-body table-responsive" style="padding: 0;">
                
                <table class="table table-striped" style="overflow: scroll;">
                  <thead class="text-white text-center" style="background-color: #343a40;">
                    <tr>
                      <th style="width: 70px;"> @lang('staff.S/No')</th>
                      <th> @lang('staff.Full Name') </th>
                      <th> @lang('staff.Email') </th> 
                      <th> @lang('staff.Role') </th>
                      <th> @lang('staff.Branch') </th>
                      <th> @lang('staff.Picture') </th>
                      <th> @lang('staff.Edit') </th>
                      <th> @lang('staff.Delete') </th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($allstaff as $staff)
                      <tr class="text-center">
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $staff->fullname }}</td> 
                          <td>{{ $staff->email }}</td>
                          <td>{{ $staff->role->RoleName }}</td>
                          <td>{{ $staff->branch->name ?? 'Null' }}</td>
                          <td>
                            <img src="{{ asset('images/ProfileImages/' . $staff->picture) }}" alt="image" style="width: 50px; height: 50px;">
                          </td>

                          <td>
                            <a href="{{ route('EditStaffView', $staff->id) }}">
                              <button type="button" class="btn btn-block btn-outline-success btn-flat" style="padding: 4px 1px;">
                                @lang('staff.Edit')
                              </button>
                            </a>
                          </td>
                          <td>
                            <button type="button" class="btn btn-block btn-outline-danger btn-flat" id="DeleteBtn" style="padding: 4px 1px;"
                              data-id="{{ $staff->id }}" data-route="{{ route('DeleteStaff', $staff->id) }}">
                              @lang('staff.Delete')
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

    var message = {!! json_encode(__('branch')) !!};

    Swal.fire({
      title: message['Are you sure?'],
      text: message['You will not be able to revert this!'],
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: message['Yes, delete it!'],
      cancelButtonText: message['Cancel'],
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
            if(response.status === 'Fail') {
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: response.message,
                footer: '<a>Why do I have this issue?</a>'
              });
            }

            if(response.status === 'Success') {
              Swal.fire({
                title: message['Deleted!'],
                text: message[response.message],
                icon: "success",
                confirmButtonText: message['OK']
              })
              .then((result) => {
                location.reload();
              });
            }
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
