<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> DMSGP | Track Parcel </title>
  <link href="{{ asset('website/img/logo.png')}}" rel="icon">


  <base href="{{ \URL::to('/') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
  <link href="{{ asset('assets/css/jquery.signature.css') }}" rel="stylesheet">
  <style>
    .kbw-signature { width: 98%; height: 80vh; }

  </style>

 
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

                  <div class="col-md-4 col-10 ml-auto mr-auto">
                    <form method="POST" action="{{route('TrackParcel')}}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="TrackingId" class="form-control rounded-0" placeholder="Enter Tracking Number">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-flat mb-2" style="background-color: #343a40; color: white;">Search</button>
                            </span>
                        </div>
                    </form>
                  </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card mt-2" style="border-radius: 0; box-shadow: none;">
                            <div class="card-body table-responsive" style="padding: 0;">
                            
                                <table class="table table-striped" style="overflow: scroll;">
                                    <thead class="text-white text-center" style="background-color: #343a40;">
                                        <tr>
                                            <th style="width: 70px;"> @lang('parcel.S/No') </th>
                                            <th> @lang('parcel.Tracking Id') </th>
                                            <th> @lang('parcel.Payment Status') </th>
                                            <th> @lang('parcel.Total amount') </th>
                                            <th> @lang('parcel.Status') </th>
                                            <th colspan="3"> @lang('parcel.Action')</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        
                                      <input type="hidden" id="UpdatePermission" value="{{ Auth()->user()->role->update_permission }}">

                                      @if($parcel == null)

                                      @else

                                        <tr class="text-center">
                                          <td> 1 </td>
                                          <td>{{ $parcel->TrackingId }}</td>
                                          <td>{{ $parcel->PaymentStatus }}</td>
                                          <td>{{ $parcel->TotalAmount }}</td>
                                          <td>
                                            <select class="form-control form-control-sm" id="ParcelStatus" style="width: auto;">
                                              @foreach ($statuses as $status)
                                                <option data-id="{{ $parcel->id }}" value="{{$status->id}}" @if ($status->id == $parcel->status->id) selected @endif>{{ $status->ParcelStatus }}</option>
                                              @endforeach
                                            </select>
                                          </td>
                                            {{-- <td><input type="text" id="ParcelId" value="{{$parcel->id}}"></td> --}}

                                          @if(Auth()->user()->role->view_permission == 1)
                                            <td style="padding-right: 0; text-align: right;">
                                              <button type="button" id="ViewParcel" data-toggle="modal" data-backdrop="static" 
                                                data-keyboard="false" class="btn btn-info btn-flat" data-id="{{ $parcel->id }}"
                                                data-route="{{ route('ParcelDetails', $parcel->id) }}">
                                                  <i class="fas fa-eye"></i>
                                              </button>
                                            </td>
                                          @endif

                                          @if(Auth()->user()->role->view_permission == 0)
                                            <td>
                                              <button type="button" id="ViewParcel" data-toggle="modal" data-backdrop="static" 
                                                data-keyboard="false" class="btn btn-info btn-flat" data-id="{{ $parcel->id }}"
                                                data-route="{{ route('ParcelDetails', $parcel->id) }}">
                                                  <i class="fas fa-eye"></i>
                                              </button>
                                            </td>
                                          @endif

                                          @if(Auth()->user()->role->view_permission == 1)
                                            <td style="padding-right: 0; padding-left: 0;">
                                              <a class="btn btn-primary btn-flat ">
                                                  <i class="fas fa-edit"></i>
                                              </a>
                                            </td>
                                            <td style="padding-left: 0; text-align: left;">
                                              <button type="button" class="btn btn-danger btn-flat" id="DeleteBtn"
                                                data-id="{{ $parcel->id }}" data-route="{{ route('DeleteParcel', $parcel->id) }}">
                                                <i class="fas fa-trash"></i>
                                              </button>
                                            </td>
                                          @endif
                                        </tr>

                                      @endif
                                       
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


<div class="modal fade" id="ViewParcelModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      
      <div class="modal-header">
        <h5 class="modal-title"> @lang('parcel.Parcel Details') </h5>
      </div>
      
      <div class="modal-body">
        <div class="container-fluid">
         
          <div class="callout callout-info">
            <div class="row">
              <div class="col-md-6"><p> @lang('parcel.Tracking Number') </p></div>
              <div class="col-md-6 text-md-right"><h4><b id="TrackingId"> </b></h4></div>
            </div>
          </div>
        
          
          <div class="row">

            <div class="col-md-6">
              <div class="callout callout-info">
                <b class="border-bottom border-primary"> @lang('parcel.Sender Information') </b>
                <div class="row">

                  <div class="col-md-6">
                    <dl>
                      <dt>@lang('parcel.Name'):</dt>
                      <dd id="SenderName"></dd>
    
                      <dt> @lang('parcel.Contact'): </dt>
                      <dd id="SenderContact"></dd>
                      
                      <dt> @lang('parcel.Date'):</dt>
                      <dd id="BookingDate"></dd>
    
                    </dl>
                  </div>
                  
                  <div class="col-md-6">
                    <dl>
                      <dt> @lang('parcel.Parcel Image') </dt>
                      <dd id="ParcelImage"></dd>
                    </dl>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="callout callout-info">
                <b class="border-bottom border-primary"> @lang('parcel.Receiver Information') </b>
                <div class="row">

                  <div class="col-md-6">
                    <dl>
                      <dt> @lang('parcel.Name'): </dt>
                      <dd id="RecieverName"></dd>
    
                      <dt> @lang('parcel.Address'): </dt>
                      <dd id="RecieverAddress"></dd>
                      
                      <dt>@lang('parcel.Contact'): </dt>
                      <dd id="RecieverContact"></dd>

                      <dt> @lang('parcel.Signature Date'): </dt>
                      <dd id="SignatureDate"></dd>
    
                    </dl>
                  </div>

                  
                  
                  <div class="col-md-6">
                    <dl>
                      <dt> @lang('parcel.Receiver Signature') </dt>
                      <dd id="RecieverSignature"></dd>
                    </dl>
                  </div>

                </div>
              </div>
            </div>

          </div>


          <div class="row">
            <div class="col-12">
              <div class="callout callout-info">
                <b class="border-bottom border-primary"> @lang('parcel.Parcel Details') </b>

                <div class="row">
                  <div class="col-12 mt-3">
                    <table style="text-align: center; width: 100%;">
                      <thead>
                          <tr>
                              <th> @lang('parcel.Item') </th>
                              <th> @lang('parcel.Weight') </th>
                              <th> @lang('parcel.Additional Charges') </th>
                              <th> @lang('parcel.Amount') </th>
                          </tr>
                      </thead>
                      <tbody class="ItemsInParcel">
  
                      </tbody>  
                  </table>
                  </div>
                </div>

              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="callout callout-info">
                <dl>
                  <dt> @lang('parcel.Branch Accepted the Parcel'): </dt>
                  <dd id="ProcessedBranch"></dd>

                  <dt> @lang('parcel.Status'): </dt>
                  <dd>
                    <span class="badge badge-pill badge-info"  id="ParcleStatus"> </span>
                  </dd>
                </dl>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
      
      

    </div>
  </div>
</div>






<div class="modal fade" id="SignatureModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="margin-top: 0;">
    <div class="modal-content">
      <div class="modal-body p-1 text-center">
        <div id="sig"></div>
        <p style="clear: both;">
          <button id="clear" type="button" class="btn btn-default mt-2">Clear</button> 
        </p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary signature" id="SaveSignatureBtn">Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>


{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('assets/js/jquery.signature.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.ui.touch-punch.js') }}"></script>


<script>

  $(function() {
    var sig = $('#sig').signature();
    $('#disable').click(function() {
      var disable = $(this).text() === 'Disable';
      $(this).text(disable ? 'Enable' : 'Disable');
      sig.signature(disable ? 'disable' : 'enable');
    });
    $('#clear').click(function() {
      sig.signature('clear');
    });
  });
  </script>


<script>

$(document).ready(function() {



  $(document).on('click', '#ViewParcel', function(e){

    var messages = {!! json_encode(__('parcel')) !!};

    e.preventDefault();

    var id = $(this).data('id');
    var route = $(this).data('route');
    $.ajaxSetup({
      headers:{ 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') }
    });

    $.ajax({
      type: 'POST',
      url: route,
      success: function(response) {

        if(response.status == 0){
          alert(response.message);
        }
        if(response.status == 1){
          $('#TrackingId').html(response.data.TrackingId);
          $('#SenderName').html(response.data.SenderName);
          $('#SenderContact').html(response.data.SenderContact);

          var formattedDate = formatDateTime(response.data.created_at);
          $('#BookingDate').html(formattedDate);

          $('#RecieverName').html(response.data.RecieverName);
          $('#RecieverAddress').html(response.data.RecieverAddress);
          $('#RecieverContact').html(response.data.RecieverContact);
          $('#ParcleStatus').html(response.data.status.ParcelStatus);    

          $('#ProcessedBranch').html(response.branch.name + ', ' + response.branch.city + ', ' + response.branch.ZipCode + ', ' + response.branch.country);

          if (response.data.RecieverSignature) {
            $('#RecieverSignature').html('<img src="{{ asset("images/signatures") }}/' + response.data.RecieverSignature + '" width="250px" height="250px" alt="Receiver Signature">');
          } 
          else {
              $('#RecieverSignature').html('Not recieved parcel');
          }

          if (response.data.ParcelImage) {
            $('#ParcelImage').html('<img src="{{ asset("images/ParcelImages") }}/' + response.data.ParcelImage + '" width="250px" height="250px" alt="Parcel Image">');
          } 
          else {
            $('#ParcelImage').html('image');
          }

          if (response.data.SignatureDate) {
            var SignatureDate = formatDateTime(response.data.SignatureDate);
            $('#SignatureDate').html(SignatureDate);
          } 
          else {
              $('#SignatureDate').html('');
          }



          $('.ItemsInParcel').empty();
          let TotalAmount = 0;
          const eligibleItems = ['food', 'clothes', 'cosmetics', 'medicine', 'documents', 'ice for food', 'delivery fees'];

          if (Array.isArray(response.data.items)) {
              response.data.items.forEach(item => {
                let weight = parseFloat(item.weight) || 0;
                let amount = parseFloat(item.amount) || 0;
                let additionalCharges = parseFloat(item.additional_charges) || 0;

                if (eligibleItems.includes(item.item)) {
                    TotalAmount += weight * amount + additionalCharges;
                } else {
                    TotalAmount += amount + additionalCharges;
                }

                
                $('.ItemsInParcel').append(`
                    <tr>
                        <td>${item.item}</td>
                        <td>${item.weight} kg</td>
                        <td>${item.additional_charges}$</td>
                        <td>${item.amount}$</td>
                    </tr>
                `);
              });

              $('.ItemsInParcel').append(`
                  <tr style="border-top: 1px solid black;">
                      <td>${messages['Total']}</td>
                      <td></td>
                      <td></td>
                      <td>${TotalAmount.toFixed(2)}$</td>
                  </tr>
              `);

              $('.ItemsInParcel').append(`
                  <tr style="border-top: 1px solid black;">
                      <td>${messages['Payment Status']}</td>
                      <td></td>
                      <td></td>
                      <td>${response.data.PaymentStatus}</td>
                  </tr>
              `);
            } 
            else {
                console.error('response.data.items is not an array');
            }
          
          $('#ViewParcelModal').modal('show');
        }
        else{
            alert('Something went wrong');
        }
      },
    });

  });


  function formatDateTime(dateTimeStr) {
      // Parse the date string to a Date object
      var date = new Date(dateTimeStr);

      // Extract date components
      var day = ('0' + date.getDate()).slice(-2);
      var month = ('0' + (date.getMonth() + 1)).slice(-2); // Months are zero-indexed
      var year = date.getFullYear();

      // Extract time components
      var hours = date.getHours();
      var minutes = ('0' + date.getMinutes()).slice(-2);
      var seconds = ('0' + date.getSeconds()).slice(-2);

      // Determine AM/PM
      var ampm = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      hours = ('0' + hours).slice(-2);

      // Construct the formatted date string
      var formattedDate = `${day}-${month}-${year} ${hours}:${minutes}:${seconds} ${ampm}`;

      return formattedDate;
  }




















    





  $(document).on('click', '#DeleteBtn', function(e){
    e.preventDefault();

    var id = $(this).data('id');
    var route = $(this).data('route');

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
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
                title: "Deleted",
                text: response.message,
                icon: "success"
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




































  
  function UpdateParcelStatus(UpdatePermission, StatusId, ParcelId, SignatureData = null) {

    var requestData = {
      parcel_id: ParcelId,
      status_id: StatusId,
      _token: "{{ csrf_token() }}"
    };


    if (SignatureData !== null) {
      requestData.signature_data = SignatureData;
    }

    console.log(requestData);

    if(UpdatePermission == 0) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to Update again!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, update it!"
      })
      .then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "{{ route('UpdateParcelStatus') }}",
            method: "POST",
            data: requestData,
            // data: {
            //   parcel_id: ParcelId,
            //   status_id: StatusId,
            //   signature_data: SignatureData,
            //   _token: "{{ csrf_token() }}"
            // },
            success: function(response) {
              if(response.status === 'Fail') {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: response.message,
                  footer: '<a>Why do I have this issue?</a>'
                })
                .then((result) => {
                  location.reload();
                });
              }

              if(response.status === 'Success') {
                Swal.fire({
                  title: "Updated",
                  text: response.message,
                  icon: "success"
                })
                .then((result) => {
                  location.reload();
                });
              }
            },
            error: function(xhr, status, error) {
              
            }
          });
        }
        else {
          location.reload();
        }
      });
    }





    if(UpdatePermission == 1) {
      $.ajax({
        url: "{{ route('UpdateParcelStatus') }}",
        method: "POST",
        data: requestData,
        success: function(response) {
          if(response.status === 'Fail') {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: response.message,
              footer: '<a>Why do I have this issue?</a>'
            })
            .then((result) => {
              location.reload();
            });
          }

          if(response.status === 'Success') {
            Swal.fire({
              title: "Updated",
              text: response.message,
              icon: "success"
            })
            .then((result) => {
              location.reload();
            });
          }
        },
        error: function(xhr, status, error) {
          
        }
      });
    }
  }

  $(document).on('change', '#ParcelStatus', function(e){
    e.preventDefault();

    var UpdatePermission = $('#UpdatePermission').val();
    var StatusId = $(this).val();
    var ParcelId = $('option:selected', this).data('id');
    var SelectedText = $(this).find('option:selected').text();
    // console.log(selectedText);
    // var ParcelId = $(this).closest('td').find('#ParcelId').val();
    // var ParcelId = $(this).closest('td').next().find('#ParcelId').val();

    if (SelectedText == 'Collected' || SelectedText == 'ပစ္စည်းများထုတ်ယူပြီး') {

      $('#SignatureModal').modal('show');

      $('#SaveSignatureBtn').on('click', function() {

        var sig = $('#sig').signature();
        // var SignatureData = sig.signature('toDataURL', 'image/png');
        var SignatureData = sig.signature('toDataURL');

        UpdateParcelStatus(UpdatePermission, StatusId, ParcelId, SignatureData);
        
        $('#SignatureModal').modal('hide');
      });
    }
    else {
      UpdateParcelStatus(UpdatePermission, StatusId, ParcelId);
    }
    
  });

  

});
</script>

</body>
</html>

