<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> DMSGP | Add Parcel </title>
  <link href="{{ asset('website/img/logo.png')}}" rel="icon">


  <base href="{{ \URL::to('/') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/print.css') }}" media="print">


    <style>
    
        #PrintableContent {
            display: none;
        }

        #loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(44, 43, 43, 0.75);
            z-index: 10000;
        }

        #ItemsTable {
            display: none;
        }


        .qrcode img {
            width: 80px !important;
            height: 80px !important;
        }

        .bootstrap-select.form-control {
            border: 1px solid #ced4da;
        }

        .btn-light {
            background-color: #fff;
            border: none;
        }

        .form-control-sm {
            height: auto;
        }

        @media (max-width: 524px){
            body, html {
                overflow: auto!important;
                max-height: 100% !important;
            }
        }
   
    </style>

  
</head>
<body class="hold-transition sidebar-mini">

<div id="NotForPrint">
    <div id="loader">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <div class="spinner-border text-light" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
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
                            <form id="AddParcelForm" method="POST" action="{{route('AddParcel')}}" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <input type="hidden" name="TrackingId" id="TrackingId">

                                <div class="card mt-2">
                                    <div class="card-body">
                                        @lang('parcel.Sender Information')
                                        <div class="row mt-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label> @lang('parcel.Name') </label>
                                                    <input type="text" name="SenderName" value="{{ old('SenderName') }}" class="form-control form-control-sm" placeholder="@lang('parcel.Parcel sender name')">
                                                    <span class="text-danger error-text SenderName_error"></span>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-6 ml-0 ml-md-5">
                                                <div class="form-group pl-0 pl-md-5">
                                                    <label for> @lang('parcel.Contact') </label>
                                                    <input type="text" name="SenderContact" value="{{ old('SenderContact') }}" class="form-control form-control-sm" placeholder="@lang('parcel.Parcel sender contact number')">
                                                    <span class="text-danger error-text SenderContact_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.card -->



                                <div class="card mt-2">
                                    <div class="card-body">
                                        @lang('parcel.Receiver Information')
                                        <div class="row mt-3">
                                            <div class="col-md-5 form-group">
                                                <label> @lang('parcel.Name') </label>
                                                <input type="text" name="RecieverName" value="{{ old('RecieverName') }}" class="form-control form-control-sm" placeholder="@lang('parcel.Parcel receiver name')">
                                                <span class="text-danger error-text RecieverName_error"></span>
                                            </div>

                        
                                            <div class="col-md-6 ml-0 ml-md-5">
                                                <div class="form-group pl-0 pl-md-5">
                                                    <label for> @lang('parcel.Address') </label>
                                                    <input type="text" name="RecieverAddress" value="{{ old('RecieverAddress') }}" class="form-control form-control-sm" placeholder="@lang('parcel.Parcel receiver address')">
                                                    <span class="text-danger error-text RecieverAddress_error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-5 form-group">
                                                <label for> @lang('parcel.Contact') </label>
                                                <input type="text" name="RecieverContact" id="RecieverContact" value="{{ old('RecieverContact') }}" class="form-control form-control-sm" placeholder="@lang('parcel.Parcel receiver contact number')" required>
                                                <span class="text-danger error-text RecieverContact_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.card -->





                                <div class="card mt-2">
                                    <div class="card-body">
                                        @lang('parcel.Branch Details')
                                        <div class="row mt-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label> @lang('parcel.From') </label>
                                                    <select name="PickupBranch" id="PickupBranch" class="form-control form-control-sm input-sm" required>
                                                        <option value=""> @lang('parcel.Select parcel pickup branch') </option>
                                                        @foreach ($branches as $branch)
                                                            <option value="{{ $branch->id }}" {{ old('PickupBranch') == $branch->id ? 'selected' : '' }}>
                                                                {{ $branch->name.' | '.$branch->city.' | '.$branch->ZipCode.' | '.$branch->state.' | '.$branch->country}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text PickupBranch_error"></span>
                                                </div>
                                            </div>
                            
                                            <div class="col-md-6 ml-0 ml-md-5">
                                                <div class="form-group pl-0 pl-md-5">
                                                    <label> @lang('parcel.To') </label>
                                                    <select name="ProcessedBranch" id="ProcessedBranch" class="form-control form-control-sm input-sm">
                                                        <option value=""> @lang('parcel.Select parcel designate branch') </option>
                                                        @foreach ($branches as $branch)
                                                        <option value="{{ $branch->id }}" {{ old('ProcessedBranch') == $branch->id ? 'selected' : '' }}>
                                                        {{ $branch->name.' | '.$branch->city.' | '.$branch->ZipCode.' | '.$branch->state.' | '.$branch->country}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text ProcessedBranch_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.card -->





                                
                                <div class="card mt-2">
                                    <div class="card-body">
                                        @lang('parcel.Parcel Details')
                                        <div class="row mt-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label> @lang('parcel.Item in parcel') </label>
                                                    <select name="ItemInParcel" class="form-control form-control-sm input-sm" id="ItemInParcel">
                                                        <option value="">-- @lang('parcel.Select') --</option>
                                                        <option value="food" {{ old('ItemInParcel') == 'food' ? 'selected' : '' }}> @lang('parcel.Food') </option>
                                                        <option value="clothes" {{ old('ItemInParcel') == 'clothes' ? 'selected' : '' }}> @lang('parcel.Clothes') </option>
                                                        <option value="cosmetics" {{ old('ItemInParcel') == 'cosmetics' ? 'selected' : '' }}> @lang('parcel.Cosmetics') </option>
                                                        <option value="medicine" {{ old('ItemInParcel') == 'medicine' ? 'selected' : '' }}> @lang('parcel.Medicine') </option>
                                                        <option value="documents" {{ old('ItemInParcel') == 'documents' ? 'selected' : '' }}> @lang('parcel.Documents') </option>
                                                        <option value="ice for food" {{ old('ItemInParcel') == 'ice for food' ? 'selected' : '' }}> @lang('parcel.Ice for food') </option>
                                                        <option value="delivery fees" {{ old('ItemInParcel') == 'delivery fees' ? 'selected' : '' }}> @lang('parcel.Delivery fees') </option>
                                                        <option value="other" {{ old('ItemInParcel') == 'other' ? 'selected' : '' }}> @lang('parcel.Other') </option>
                                                    </select>
                                                    <span class="text-danger error-text ItemInParcel_error"></span>
                                                </div>
                                            </div>

                            
                                            <div class="col-md-6 ml-0 ml-md-5 other-item-container" style="display: none;">
                                                <div class="form-group pl-0 pl-md-5">
                                                    <label> @lang('parcel.Other Item') </label>
                                                    <input type="text" name="OtherItem" value="{{ old('OtherItem') }}" class="form-control form-control-sm" placeholder="@lang('parcel.Item in parcel')">
                                                    <span class="text-danger error-text OtherItem_error"></span>
                                                </div>
                                            </div>

                                        </div>




                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label> @lang('parcel.Parcel Weight (kg)') </label>
                                                    <input type="text" name="ParcelWeight" value="{{ old('ParcelWeight') }}" class="form-control form-control-sm" placeholder="@lang('parcel.Parcel weight in kg')">
                                                    <span class="text-danger error-text ParcelWeight_error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 ml-0 ml-md-5">
                                                <div class="form-group pl-0 pl-md-5">
                                                    <label> @lang('parcel.Cargo Type') </label>
                                                    <select name="CargoType" class="form-control form-control-sm" id="CargoType">
                                                        <option value=""> @lang('parcel.Select') </option>
                                                        <option value="Sea Cargo" {{ old('CargoType') == 'Sea Cargo' ? 'selected' : '' }}> @lang('parcel.Sea Cargo') </option>
                                                        <option value="Air Cargo" {{ old('CargoType') == 'Air Cargo' ? 'selected' : '' }}> @lang('parcel.Air Cargo') </option>
                                                    </select>
                                                    <span class="text-danger error-text CargoType_error"></span>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label> @lang('parcel.Amount') </label>
                                                    <input type="text" name="TotalAmount" value="{{ old('TotalAmount') }}" class="form-control form-control-sm" placeholder="@lang('parcel.Enter cargo per kg amount')">
                                                    <span class="text-danger error-text TotalAmount_error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 ml-0 ml-md-5">
                                                <div class="form-group pl-0 pl-md-5">
                                                    <label> @lang('parcel.Additional Charges') </label>
                                                    <input type="text" name="AdditionalCharges" value="{{ old('AdditionalCharges') }}" class="form-control form-control-sm" placeholder="@lang('parcel.Enter additional charges if any...')">
                                                    <span class="text-danger error-text AdditionalCharges_error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 ml-auto text-right">
                                                <button type="button" class="mr-5 btn btn-success AddItemsBtn" style="border-radius: 0;">
                                                    <i class="nav-icon fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        

                                        <div class="row mt-5">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="ItemsTable" style="overflow: scroll;">

                                                    <thead>
                                                        <tr>
                                                            <th> @lang('parcel.Item') </th>
                                                            <th> @lang('parcel.Weight')</th>
                                                            <th> @lang('parcel.Cargo Type') </th>
                                                            <th> @lang('parcel.Amount') </th>
                                                            <th> @lang('parcel.Additional Charges')  </th>
                                                            <th> @lang('parcel.Action')  </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>



                                        <div class="row mt-4">
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label> @lang('parcel.Amount') </label>
                                                        <div class="d-flex form-group">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="PaymentStatus" class="form-check-input" value="Paid" {{ old('PaymentStatus') == 'Paid' ? 'checked' : '' }}> @lang('parcel.Paid')
                                                                </label>
                                                            </div>
            
                                                            <div class="form-check ml-3">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="PaymentStatus" class="form-check-input" value="COD" {{ old('PaymentStatus') == 'COD' ? 'checked' : '' }}> @lang('parcel.Unpaid')
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger error-text PaymentStatus_error"></span>
                                                    </div>

                                                    <div class="col-2"></div>

                                                    <div class="col-sm-3 mt-1">
                                                        <div class="form-group">
                                                            <label> @lang('parcel.Parcel Image') </label><br>
                                                            <input type="file" name="ParcelImage" id="ParcelImage">
                                                        </div>
                                                    </div>

                                                </div>
                                            
                                            </div>

                                        </div>

                                    </div>
                                </div><!-- /.card -->

                                

                                <div class="form-group row mt-5">
                                    <div class=" col-4 col-sm-2 ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary"> @lang('parcel.Add Parcel') </button>
                                    </div>
                                </div>
                                

                            </form>
                            <!-- /.form -->
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
</div>






{{--------------------------------------- Print Page --------------------------------------}}


<div id="PrintableContent" style="padding: 20px; width: 1100px;">
    <div style="display: flex; justify-content: space-between; width: 100%; margin-left: 20px;">
        
        <div style="width: 66%; border: 1px solid black;">    
            <div style="display: flex; justify-content: space-between;">
                <div style="margin: 20px 0 0 20px;">
                    <img src="{{asset('website/img/logo.png')}}" style="width: 80px; height: 80px;">
                </div>

                <div style="text-align: center;">
                    <p style="font-size: 30px; margin-top: 10px;">ဒို့မြန်မာ</p>
                    <p style="font-size: 25px; color: rgb(245, 45, 45); font-weight: bold; margin-top: 10px;">ကုန်ပစ္စည်းပို့ဆောင်ရေး</p>
                </div>
                

                <div style="margin: 15px 10px 0 0; border-right: 0.2px solid black; height: 100%;">
                    <div style="padding: 5px 5px 5px 0;" class="qrcode"></div>
                </div>
                
            </div> 

            <div style="display: flex; justify-content: space-between; margin: 10px; margin-top: -5px;">

                <div style="margin-left: 5px; border-bottom: 1px solid #ccc; padding: 0 10px 0 10px;">
                    <div style="display: flex; justify-content: space-between;">
                        <div>Tracking Id</div>
                        <div style="margin: 0 10px 0 10px;">:</div>
                        <div class="tracking-id"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <div>Date</div>
                        <div style="margin: 0 10px 0 0;">:</div>
                        <div class="BookingDate"></div>
                    </div>
                </div>


                <div style="display: flex;">
                    <div style="font-size: 15px; margin-right: 10px; color: rgb(245, 45, 45);">
                        <p style="margin: 0; padding: 0; text-align: center;"> ဆက်သွယ် ရန် </p>
                        <p style="margin: 0; padding: 0;">စင်ကာပူ : +65 8649 0688</p>
                        <p style="margin: 0; padding: 0;">မြန်မာ: +95 9442358755</p>
                    </div>

                    <p style="font-size: 25px; padding: 0; margin: 0;">Scan me</p>
                </div>

                
            
            </div>

                

            <div style="display: flex; justify-content: space-between; margin-top: 30px; border-top: 1px solid; border-bottom: 1px solid;">

                <div style="width: 33%; border-right: 1px solid; padding-bottom: 20px;">
                    <p style="margin: 0; padding: 0; text-align: center;"><strong> Sender Details </strong></p>
                    <table style="border: 1px solid; border-left: none; border-right: none; border-collapse: collapse; 
                        width: 100%; text-align: center;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid; border-left: none;"> Name </th>
                                <th style="border: 1px solid; border-right: none;"> Contact </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid; border-left: none;" class="sender-name"></td>
                                <td style="border: 1px solid; border-right: none;" class="sender-contact"></td>
                            </tr>
                        </tbody>  
                    </table>
                </div>

                <div style="width: 66%; border-left: 1px solid; padding-bottom: 20px;">
                    <p style="margin: 0; padding: 0; text-align: center;"><strong> Receiver Details </strong></p>
                    <table style="width: 100%; border: 1px solid; border-left: none; border-right: none;
                            width: 100%; border-collapse: collapse; text-align: center;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid; border-left: none;">Name</th>
                                <th style="border: 1px solid;">Address</th>
                                <th style="border: 1px solid; border-right: none;">Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid; border-left: none;" class="reciever-name"></td>
                                <td style="border: 1px solid;" class="reciever-address"></td>
                                <td style="border: 1px solid; border-right: none;" class="reciever-contact"></td>
                            </tr>
                        </tbody>  
                    </table>
                </div>
                    

            </div>

            <table style="margin-top: 30px; text-align: center; width: 80%; border: 1px solid; border-collapse: collapse; margin-left: auto; margin-right: auto;">
                <thead>
                    <tr>
                        <th style="border: 1px solid; border-left: none;"> Item </th>
                        <th style="border: 1px solid;"> Weight </th>
                        <th style="border: 1px solid;"> Additional Charges </th>
                        <th style="border: 1px solid; border-right: none;"> Price </th>
                    </tr>
                </thead>
                <tbody class="ItemsInParcel">

                </tbody>  
            </table>


            <p style="width: 90%; margin-top: 40px; margin-left: auto; margin-right: auto;">
                ပစ္စည်းထုတ်ယူသွားပြီးနောက် ဖြစ်ပေါ်လာသော ပျက်စီးမူများ ရန်သူမျိုး(၅)ပါး ကြောင့် ပျက်စီးမူ့များအတွက် တာဝန်မယူပါ။ ပါဆယ်တွင်ပါဝင်သော ပစ္စည်းများနှင့်ပတ်သတ်၍ ပြဿနာတစ်စုံတစ်ရာ ပေါ်ပေါက်ပါက ပို့ဆောင်သူမီ တာဝန်ယူဖြေရှင်းပေးရမည် ။ ဥပဒေနှင့်မလွတ်ကင်းသေည ပစ္စည်းများ ၊ အကောက်ခွန်ဦးစီးဌာနမှ ခွင့်မပြုသော ပစ္စည်းများကို ပို့ဆောင်ပေးခြင်းမပြုပါ။ ပစ္စည်းရောက်ပြီး  ၂လ အတွင်းလာရောက်ထုတ်ယူခြင်းမရှိပါက တာဝန်မယူပါ။ ပါဆယ် ပျက်စီးပျောက်ဆုံးလျင် ပို့ဆောင်ခ၏၂ဆ ကိုသာ ပြန်လည်လျော်ပေးမည်။ မိမိပစ္စည်းများ၏ ရောက်ရှိနေသောနေရာကို <a href="www.dmsgp.com">www.dmsgp.com</a> တွင် ဝင်ရောက် စစ်နိုင်သည်။ သို့မဟုတ် အပေါ်မှ QR code ကို scan ဖတ်၍စစ်နိုင်သည်။
            </p>

        </div>







        <div style="width: 32%; border: 1px solid black;">   
            <div style="margin-top: 10px; text-align: center;">
                <div style="border-bottom: 1px solid #ccc; padding: 0 10px 0 10px;">

                    <div style="display: flex; justify-content: space-between;">
                        <div>Tracking Id</div>
                        <div style="margin: 0 10px 0 10px;">:</div>
                        <div class="tracking-id"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <div>Date</div>
                        <div style="margin: 0 10px 0 0;">:</div>
                        <div class="BookingDate"></div>
                    </div>
                    
                </div>
            </div>


            <div style="text-align: center; margin-top: 50px; margin-bottom: 5px;">
                <strong> Sender Details </strong>
            </div>
            <table style="text-align: center; width: 100%; border: 1px solid; border-left: none; border-right: none; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid; border-left: none;">Name</th>
                        <th style="border: 1px solid; border-right: none;"> Contact </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="sender-name" style="border: 1px solid; border-left: none;"></td>
                        <td class="sender-contact" style="border: 1px solid; border-right: none;"></td>
                    </tr>
                </tbody>  
            </table>



            <div style="text-align: center; margin-top: 50px; margin-bottom: 5px;">
                <strong> Receiver Details </strong>
            </div>
            <table style="text-align: center; width: 100%; border: 1px solid; border-left: none; border-right: none; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid; border-left: none;"> Name </th>
                        <th style="border: 1px solid;"> Address </th>
                        <th style="border: 1px solid; border-right: none;"> Contact </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="reciever-name" style="border: 1px solid; border-left: none;"></td>
                        <td class="reciever-address" style="border: 1px solid;"></td>
                        <td class="reciever-contact" style="border: 1px solid; border-right: none;"></td>
                    </tr>
                </tbody>  
            </table>


            <table style="margin-top: 30px; text-align: center; width: 100%; border: 1px solid; border-left: none; border-right: none; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid;  border-left: none;"> Item </th>
                        <th style="border: 1px solid;"> Weight </th>
                    </tr>
                </thead>
                <tbody class="ParcelItems">

                </tbody>  
            </table>




            <div style="text-align: center; margin-top: 30px; margin-bottom: 5px;">
                <strong> Other Details </strong>
            </div>
            <table style="width: 100%; border: 1px solid; border-left: none; border-right: none; border-collapse: collapse;">
                <tr>
                    <td style="border: 1px solid; border-left: none;"> From </td>
                    <td style="border: 1px solid; border-right: none;" class="pickup-branch"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid; border-left: none;"> To </td>
                    <td style="border: 1px solid; border-right: none;" class="processed-branch"></td>
                </tr>
                
            </table>

        </div>

    </div> {{-- row --}}

    <div id="ModalFooter" style="display: flex; justify-content: space-between; margin: 20px;">
        <button id="CloseBtn" type="button" class="btn btn-default">Close</button>
        <button id="PrintModalBtn" type="button" class="btn btn-primary">Print</button>
    </div>

</div>
{{----------------------------------- Print Page Ends -------------------------------------}}





<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="{{ asset('assets/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script> 

<script type="text/javascript">
$(document).ready(function() {


    $('#ItemInParcel').on('change', function() {
        if ($(this).val() === 'other') {
            $('.other-item-container').show();
        } else {
            $('.other-item-container').hide();
        }
    });
    $('#ItemInParcel').trigger('change');




    $(document).on('click', '#PrintModalBtn', function(){
        window.print();
    });

    $(document).on('click', '#CloseBtn', function(){
        $("#AddParcelForm")[0].reset();
        location.reload();
    });

    

    $(document).ready(function() {
        $('.AddItemsBtn').click(function() {
            // Get field values
            var itemInParcel = $('#ItemInParcel').val();
            var parcelWeight = $('input[name="ParcelWeight"]').val();
            var cargoType = $('#CargoType').val();
            var totalAmount = $('input[name="TotalAmount"]').val();
            var additionalCharges = $('input[name="AdditionalCharges"]').val();

            // Validate fields (basic validation)
            if (!itemInParcel || !parcelWeight || !cargoType || !totalAmount) {
                alert('Please fill in all the required fields.');
                return;
            }


            if(itemInParcel == 'other') {
                itemInParcel = $('input[name="OtherItem"]').val();
            }

            console.log(itemInParcel);

            // Show the table if hidden
            if ($('#ItemsTable').is(':hidden')) {
                $('#ItemsTable').show();
            }

            // Append new row to the table
            var newRow = '<tr>' +
                            '<td>' + itemInParcel + '</td>' +
                            '<td>' + parcelWeight + '</td>' +
                            '<td>' + cargoType + '</td>' +
                            '<td>' + totalAmount + '</td>' +
                            '<td>' + additionalCharges + '</td>' +
                            '<td><button class="btn btn-sm btn-danger removeBtn"> x </button></td>' +
                        '</tr>';
            $('#ItemsTable tbody').append(newRow);

            // Clear the form fields
            $('#ItemInParcel').val('');
            $('input[name="ParcelWeight"]').val('');
            $('#CargoType').val('');
            $('input[name="TotalAmount"]').val('');
            $('input[name="AdditionalCharges"]').val('');
            $('input[name="OtherItem"]').val('');
        });

        // Event delegation to handle click on dynamically added "Remove" buttons
        $('#ItemsTable').on('click', '.removeBtn', function() {
            $(this).closest('tr').remove();
        });
    });




    $(document).on('change', '#PickupBranch', function() {
        let text = $('#PickupBranch option:selected').text();
        var array = text.split("|");
        var BranchName = array[0].split(",")[0].trim();
        BranchName = BranchName.toLowerCase().replace(/\s+/g, '');
        var RandomValue = Math.floor(10000 + Math.random() * 90000);

        BranchName += RandomValue;
        $('input[name="TrackingId"]').val(BranchName);
    });








    $(document).on('submit', '#AddParcelForm', function(e){
        // Prevent the default form submission
        e.preventDefault();

        var spinner = $('#loader');
        spinner.show();

        var items = [];
        var isValid = true;
        $('#ItemsTable tbody tr').each(function() {
            var item = $(this).find('td:eq(0)').text();
            var weight = $(this).find('td:eq(1)').text();
            var cargo_type = $(this).find('td:eq(2)').text();
            var amount = $(this).find('td:eq(3)').text();
            var additional_charges = $(this).find('td:eq(4)').text();
            
            if (!item || !weight || !cargo_type || !amount) {
                isValid = false;
            }

            items.push({ item, weight, cargo_type, amount, additional_charges });
        });


        if (!isValid || items.length === 0) {
            alert('Please fill all the parcel details fields');
            spinner.hide();
            return;
        }

        var formData = new FormData(this);
        formData.append('Items', JSON.stringify(items));


        $.ajaxSetup({
            headers:{ 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') }
        });


        var messages = {!! json_encode(__('parcel')) !!};
        
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $(document).find('span.error-text').text('');
            },
            success: function(response) {
                if (response.Status == 0) {
                    spinner.hide();
                    $.each(response.error, function(prefix, val) {
                        $('span.' + prefix + '_error').text(messages[val[0]]);
                    });
                } 
                else if (response.Status == 2) {
                    spinner.hide();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: messages[response.message],
                        confirmButtonText: messages['OK'],
                        footer: '<a>Why do I have this issue?</a>'
                    });
                } 
                else {

                    // Update the modal with response data
                    $('.qrcode').html('');
                    let qrcode = new QRCode(document.querySelector(".qrcode"), {
                        text: "https://www.dmsgp.com/track/" + response.PrintData.TrackingId,
                        width: 80,
                        height: 80,
                        colorDark: "#000000",
                        colorLight: "#ffffff",
                        correctLevel: QRCode.CorrectLevel.H
                    });

                    $('.tracking-id').text(response.PrintData.TrackingId);
                    var formattedDate = formatDateTime(response.PrintData.created_at);
                    $('.BookingDate').html(formattedDate);

                    $('.sender-name').text(response.PrintData.SenderName);
                    $('.sender-contact').text(response.PrintData.SenderContact);
                    $('.reciever-name').text(response.PrintData.RecieverName);
                    $('.reciever-address').text(response.PrintData.RecieverAddress);
                    $('.reciever-contact').text(response.PrintData.RecieverContact);
                    $('.pickup-branch').text(response.PrintData.PickupBranch);
                    $('.processed-branch').text(response.PrintData.ProcessedBranch);
                    $('.payment-status').text(response.PrintData.PaymentStatus);
                    $('.pickup-branch').text(response.PickupBranch.name);
                    $('.processed-branch').text(response.DestBranch.name);

                    $('.ItemsInParcel').empty(); 
                    let TotalAmount = 0;
                    const eligibleItems = ['food', 'clothes', 'cosmetics', 'medicine', 'documents', 'ice for food', 'delivery fees'];

                    response.PrintData.items.forEach(item => {
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
                                <td style="border: 1px solid; border-left: none;">${item.item}</td>
                                <td style="border: 1px solid;">${item.weight} kg</td>
                                <td style="border: 1px solid;">${additionalCharges !== 0 ? additionalCharges + '$' : 'null'}</td>
                                <td style="border: 1px solid; border-right: none;">${item.amount}$</td>
                            </tr>
                        `);
                    });

                    $('.ItemsInParcel').append(`
                        <tr>
                            <td style="border: 1px solid; border-left: none;">${messages['Total']}</td>
                            <td style="border-bottom: 1px solid;"></td>
                            <td style="border-bottom: 1px solid;"></td>
                            <td style="border: 1px solid; border-right: none;">${TotalAmount.toFixed(2)}$</td>
                        </tr>
                    `);


                    $('.ItemsInParcel').append(`
                        <tr>
                            <td style="border: 1px solid; border-left: none;">${messages['Payment Status']}</td>
                            <td></td>
                            <td></td>
                            <td style="border: 1px solid; border-right: none;">${response.PrintData.PaymentStatus}</td>
                        </tr>
                    `);




                    $('.ParcelItems').empty();
                    response.PrintData.items.forEach(item => {
                        $('.ParcelItems').append(`
                            <tr>
                                <td style="border: 1px solid; border-left: none;">${item.item}</td>
                                <td style="border: 1px solid;">${item.weight} kg</td>
                            </tr>
                        `);
                    });

                    

                    $('.ParcelItems').append(`
                        <tr>
                            <td style="border: 1px solid; border-left: none;">${messages['Payment Status']}</td>
                            <td style="border: 1px solid; border-right: none;">${response.PrintData.PaymentStatus}</td>
                        </tr>
                    `);

                    



                    var $PrintData = $('#PrintableContent');
                    var $BodyElements = $('#NotForPrint');

                    $PrintData.css({
                        'display': 'block',
                    });

                    $BodyElements.css({
                        'display': 'none',
                    });

                    spinner.hide();

                                        
                }
            }
        });

    });






    function formatDateTime(dateTimeStr) {
        var date = new Date(dateTimeStr);

        var day = ('0' + date.getDate()).slice(-2);
        var month = ('0' + (date.getMonth() + 1)).slice(-2); // Months are zero-indexed
        var year = date.getFullYear();

        var hours = date.getHours();
        var minutes = ('0' + date.getMinutes()).slice(-2);
        var seconds = ('0' + date.getSeconds()).slice(-2);

        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; 
        hours = ('0' + hours).slice(-2);

        var formattedDate = `${day}-${month}-${year} ${hours}:${minutes}:${seconds} ${ampm}`;

        return formattedDate;
    }






});
</script>


</body>
</html>
