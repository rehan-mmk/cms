<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> DMSG | Dashborad </title>
  <link href="{{ asset('website/img/logo.png')}}" rel="icon">
  
  <base href="{{ \URL::to('/') }}">
 
   
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
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

  <div class="content-wrapper mt-5 pt-2">

    <!-- Main content -->
    

    <div class="content">
      <div class="container-fluid">
        <div class="row mt-5"> 

          @if(Auth()->user()->role->view_permission == 1)
            <div class="col-12 col-sm-6 col-md-4">
              <div class="small-box bg-white shadow-sm border">
                <div class="inner">
                  <h3>{{ $TotalBranches }}</h3>

                  <p>@lang('index.Total Branches')</p>
                </div>
                <div class="icon">
                  <i class="fa fa-building"></i>
                </div>
              </div>
            </div> 

            <div class="col-12 col-sm-6 col-md-4">
              <div class="small-box bg-white shadow-sm border">
                <div class="inner">
                  <h3>{{ $TotalUsers }}</h3>
  
                  <p>@lang('index.Total Staff')</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
              </div>
            </div>


          @endif
          
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-white shadow-sm border">
              <div class="inner">
                <h3>{{ $TotalParcels }}</h3>

                <p>@lang('index.Total Parcels')</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-white shadow-sm border">
              <div class="inner">
                <h3>{{ $Totalaccepted }}</h3>

                <p>@lang('index.Parcel Accepted by Courier')</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>


          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-white shadow-sm border">
              <div class="inner">
                <h3>{{ $TotalReady }}</h3>

                <p>@lang('index.Ready for Collection')</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>

 
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-white shadow-sm border">
              <div class="inner">
                <h3>{{ $TotalCollected }}</h3>

                <p>@lang('index.Collected')</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>


        

        </div>
        <!-- /.row -->



        <div class="row mt-5">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-white shadow-sm border">
              <div class="inner">
                <h3>{{ $TotalEarning}}</h3>

                <p>@lang('index.Total Earning')</p>
              </div>
              <div class="icon">
                <i class="fa fa-dollar-sign"></i>
              </div>
            </div>
          </div>
        </div>
      
      </div><!-- /.container-fluid -->

    </div>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- end wrapper -->



@include('admin.includes.scripts')

</body>
</html>
