<?php

use Illuminate\Support\Facades\Route;
/////// Website Controllers
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\LocalizationController;








/////// Admin Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\ParcelViewController;












Route::controller(WebsiteController::class)->group(function () {
    Route::get('/about', 'about')->name('about');
    Route::get('/service', 'service')->name('service');
    Route::get('/price', 'price')->name('price');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/', 'TrackShipment')->name('TrackShipment');
    Route::get('/track/{id}', 'TrackShipmentView')->name('TrackShipmentView');
});
 


 
Route::middleware(['AuthCheck'])->group(function() {



    Route::group(['middleware'=>['PreventBack', 'Localization']], function(){

        Route::get('locale/{language}', [LocalizationController::class, 'SetLanguage']); 

        Route::controller(ViewController::class)->group(function() {
            Route::get('register', 'RegisterView')->name('RegisterView');
            Route::get('login', 'LoginView')->name('LoginView');
            Route::get('email', 'email')->name('EmailView');
            Route::get('reset-password', 'ResetView')->name('ResetView');
            Route::get('dashboard', 'index')->name('dashboard');
            Route::get('profile', 'profile')->name('profile');
            Route::get('branch/add-branch', 'AddBranchView')->name('AddBranchView');
            Route::get('branch/all-branches', 'BranchesList')->name('BranchesList');
            Route::get('branch/edit-branch/{id}', 'EditBranchView')->name('EditBranchView');
            Route::get('staff/add-staff', 'AddStaffView')->name('AddStaffView');
            Route::get('staff/staff-list', 'StaffList')->name('StaffList');
            Route::get('staff/edit-staff/{id}', 'EditStaffView')->name('EditStaffView');
        }); 
        
        
        Route::controller(AuthController::class)->group(function() {
            Route::post('register', 'register')->name('register');
            Route::post('login', 'login')->name('login');
            Route::post('email', 'EmailPassword')->name('EmailPassword');
            Route::post('reset-password', 'ResetPassword')->name('ResetPassword');
            Route::post('update-info', 'UpdateInfo')->name('UpdateInfo');
            Route::post('update-picture', 'UpdatePicture')->name('UpdatePicture');
            Route::post('change-password', 'UpdatePassword')->name('UpdatePassword');
            Route::get('logout', 'logout')->name('logout');
        });


        Route::controller(AdminStaffController::class)->group(function() {
            Route::post('staff/add-staff', 'AddStaff')->name('AddStaff');
            Route::delete('staff/delete-staff/{id}', 'DeleteStaff')->name('DeleteStaff');
            Route::put('staff/edit-staff/{id}', 'EditStaff')->name('EditStaff');
        });

        


        Route::controller(BranchController::class)->group(function() {
            Route::post('branch/add-branch', 'AddBranch')->name('AddBranch');
            Route::delete('branch/delete-branch/{id}', 'DeleteBranch')->name('DeleteBranch');
            Route::put('branch/edit-branch/{id}', 'EditBranch')->name('EditBranch');
        });


        Route::controller(ParcelViewController::class)->group(function() {
            Route::get('parcel/add-parcel', 'AddParcelView')->name('AddParcelView');
            Route::get('parcel/all-parcels', 'ParcelsList')->name('ParcelsList');
            Route::get('parcel/accepted-by-courier', 'AcceptedByCourier')->name('AcceptedByCourier');
            Route::get('parcel/ready-for-collection', 'ReadyForCollection')->name('ReadyForCollection');
            Route::get('parcel/parcels-collected', 'ParcelsCollected')->name('ParcelsCollected');
            Route::get('parcel/track-parcel', 'TrackParcelView')->name('TrackParcelView');

            Route::get('parcel/edit-parcel/{id}', 'EditParcelView')->name('EditParcelView');
        });


        Route::controller(ParcelController::class)->group(function() {
            Route::post('parcel/add-parcel', 'AddParcel')->name('AddParcel'); 
            Route::post('parcel/track-parcel', 'TrackParcel')->name('TrackParcel'); 
            Route::post('parcel/all-parcels/{id}', 'ParcelDetails')->name('ParcelDetails');
            Route::post('parcel/update-status', 'UpdateParcelStatus')->name('UpdateParcelStatus');
            Route::delete('parcel/delete-parcels/{id}', 'DeleteParcel')->name('DeleteParcel');

            Route::post('parcel/update-parcel/{id}', 'UpdateParcel')->name('UpdateParcel');
        });
   

        
    });

});









Route::get('/config', function() {
    Artisan::call('config:clear');
});

Route::get('/route', function() {
    Artisan::call('route:clear');
});

Route::get('/cache', function() {
    Artisan::call('cache:clear');
});


Route::get('/view', function() {
    Artisan::call('view:clear');
});



