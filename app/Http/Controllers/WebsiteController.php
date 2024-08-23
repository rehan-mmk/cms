<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parcel;
use App\Models\Branch; 

class WebsiteController extends Controller {
    
    public function index(){
        return view('welcome');
    }
    
    public function about(){
        return view('website.about');
    }

    public function service(){
        return view('website.service');
    }

    public function price(){
        return view('website.price');
    }
 

    public function contact(){
        return view('website.contact');
    }
 

    public function TrackShipment(Request $request) {
        if ($request->has('id')) {
            return redirect()->route('TrackShipmentView', ['id' => $request->id]);
        } else {
            return view('welcome');
        }
    }
    

  
    


    public function TrackShipmentView(Request $request) {
        
        $ParcelDetails = Parcel::with('status')->where('TrackingId', $request->id)->first();

        if($ParcelDetails) {
            $PickupBranch = Branch::findOrFail($ParcelDetails->PickupBranchId);
            $ProcessedBranch = Branch::findOrFail($ParcelDetails->ProcessedBranchId);
            
            return view('website.track', compact('ParcelDetails', 'PickupBranch', 'ProcessedBranch'));
        } else {
            return back()->with('Fail', 'Parcel not found');
        }
    }

}
