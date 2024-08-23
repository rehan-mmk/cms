<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> DMSGP | Recover Password </title>
  <link href="{{ asset('public/website/img/logo.png')}}" rel="icon">

	<base href="{{ \URL::to('/') }}">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">

    @if($errors->any())
        @foreach($errors->all() as $error)
        <p class="text-danger"> {{$error}}</p>
        @endforeach
    @endif

    @if(Session::has('error'))
        <p class="text-danger"> {{ Session::get('error') }}</p>
    @endif

    @if(Session::has('success'))
        <p style="color:green;"> {{ Session::get('success') }}</p>
    @endif

	@if(session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
	@endif
	
    <div class="card">
    
        <div class="card-body login-card-body">
            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
            <form method="post" novalidate="" action="{{ route('ResetPassword') }}" id="resetpwd">

                <div class="input-group mt-3">
                    <input type="hidden" name="userid" value="{{ $user->id }}">
                    <input type="text" class="form-control" value="{{ $user->email}}" readonly>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mt-3">
                    <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <span class="text-danger error-text newpassword_error"></span>

                <div class="input-group mt-3">
                    <input type="password" name="cnewpassword" id="cnewpassword" class="form-control" placeholder="Confirm New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <span class="text-danger error-text cnewpassword_error"></span>
        
                <div class="row mt-5">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block"> Reset Password </button>
                    </div>
                </div>
      
            </form>
        </div>
    
    </div>
</div>






@include('admin.includes.scripts')


<script>
$(document).ready(function(){

	$.ajaxSetup({
		headers:{
		'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		}
	});

    $('#resetpwd').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend:function(){
                $(document).find('span.error-text').text('');
            },
            success: function(data) {
                if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                    });
                }
                else{
                    $('#resetpwd')[0].reset();
                    alert(data.msg);
					var loginUrl = "{{ route('LoginView') }}";
                	window.open(loginUrl,'_self');
                }
            },
        });
    });


});
</script>

</body>
</html>
