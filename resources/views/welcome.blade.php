<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>DMSG | Cargo and Freight Company</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Free HTML Templates" name="keywords">
<meta content="Free HTML Templates" name="description">

<!-- Favicon -->
<link href="{{ asset('website/img/logo.png')}}" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">


<!-- Customized Bootstrap Stylesheet -->
<link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
</head>

<body>
     

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
            <a href="{{ route('TrackShipment') }}">
                <div class="text-primary" style="margin-top: 10px; margin-bottom: 5px; display: flex;">
                    <p><i class="fa fa-truck mr-2" style="font-size: 45px; margin-top: 3px;"></i></p>
                    <p style="margin-left: 5px;">
                        <img src="{{ asset('website/img/logo.png')}}" alt="logo" style="width: 50px; height: 50px;">
                    </p>
                </div>
            </a>

            <div class="ml-auto text-black">
                <p><i class="fa fa-phone-alt mr-2"></i>+65 90588770</p>
                <p><i class="fa fa-envelope mr-2"></i>contact@dmsg.com</p>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
 
     


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5"> 
            <h1 class="text-primary mb-4">  ဒို့မြန်မာ </h1>
            <h5 class="text-white display-3 mb-5">Cargo and Freight Company</h5>
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <form action="{{route('TrackShipment')}}" method="GET">
                    <div class="input-group">
                        <input type="text" name="id" class="form-control border-light" style="padding: 25px;" placeholder="Tracking Number">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary px-3">Track Shipment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Header End -->






    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="col-md-5 pt-3 pb-3 bg-secondary">
                <h5 class="font-weight-bold">Shipment Booking Details</h5>
                <p class="text-muted">
                    Tracking Number: <br>
                    <span class="font-weight-bold" style="color: #00611f;">
                        
                    </span>
                </p>

                <h5 class="font-weight-bold mt-5">Shipment Details</h5>
                <table  style="width: 100%;">
                    <tr>
                        <td>Origin</td>
                        <td style="color: #000000;"> </td>
                    </tr>
                    <tr>
                        <td>Destination</td>
                        <td style="color: #000000;"></td>
                    </tr>
                    <tr>
                        <td>Booking Date</td>
                        <td style="color: #000000;"></td>

                    </tr>
                </table>
            </div>
 
           

            <div class="col-md-5 pt-3 pb-3 bg-secondary ml-auto mt-5 mt-md-0">
                <h5 class="font-weight-bold">Shipment Track Summary</h5>
                <p class="text-muted">
                    Current Status:
                    <span class="font-weight-bold ml-3" style="color: #00611f;">
                       
                    </span>
                </p>

            </div>
        </div>
    </div>




    <!-- Footer Start -->
    @include('website.includes.footer')
    <!-- Footer End -->

</body>

</html>