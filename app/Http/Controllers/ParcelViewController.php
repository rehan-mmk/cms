<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Branch;
use App\Models\Parcel;
use App\Models\Status;

class ParcelViewController extends Controller {

    public function AddParcelView() { 
        $branches = Branch::all();
        return view('admin.parcel.parcel', compact('branches')); 
    }


    public function ParcelsList() {
        $statuses = Status::all();
    
        $ViewPermission = Auth()->user()->role->view_permission;
        $BranchId = Auth()->user()->branch_id;
    
        if ($ViewPermission == 0) {
            $parcels = Parcel::with('status')
                ->orderBy('id', 'desc')
                ->where(function ($query) use ($BranchId) {
                    $query->where('PickupBranchId', $BranchId)
                          ->orWhere('ProcessedBranchId', $BranchId);
                })
                ->paginate(10); // Use paginate instead of get
        } else {
            $parcels = Parcel::with('status')
                ->orderBy('id', 'desc')
                ->paginate(10); // Use paginate instead of get
        }
    
        return view('admin.parcel.allparcels', compact('parcels', 'statuses'));
    }
    


    public function AcceptedByCourier() {
        $statuses = Status::all();
        $BranchId = Auth::user()->branch_id;
        
        $parcels = Parcel::with('status')
        ->where(function ($query) use ($BranchId) {
            $query->where('PickupBranchId', $BranchId);
        })
        ->whereHas('status', function ($query) {
            $query->where('ParcelStatus', 'Item Accepted by Courier');
        })
        ->paginate(10);
    
        return view('admin.parcel.accepted-by-courier', compact('parcels', 'statuses')); 
    }




    
    public function ReadyForCollection() {
        $statuses = Status::all();
        $BranchId = Auth::user()->branch_id;
    
        $parcels = Parcel::with('status')
            ->where(function ($query) use ($BranchId) {
                $query->where('ProcessedBranchId', $BranchId);
            })
            ->whereHas('status', function ($query) {
                $query->where('ParcelStatus', 'Ready for collection');
            })
            ->paginate(10);
    
        return view('admin.parcel.ready-for-collection', compact('parcels', 'statuses')); 
    }
    
    




    public function ParcelsCollected() {
        $statuses = Status::all();
        $BranchId = Auth()->user()->branch_id;
    
        $parcels = Parcel::with('status')
            ->where('ProcessedBranchId', $BranchId)
            ->whereHas('status', function ($query) {
                $query->where('ParcelStatus', 'Collected');
            })
            ->paginate(10);
    
        return view('admin.parcel.parcels-collected', compact('parcels', 'statuses')); 
    }





    public function TrackParcelView() {
        $parcel = null;
        return view('admin.parcel.track-parcel', compact('parcel')); 
    }
    


    public function EditParcelView($id) {
        $parcel = Parcel::with('items')->find($id); 
        $branches = Branch::all();
        $PickupBranch = Branch::find($parcel->PickupBranchId);
        $ProcessedBranch = Branch::find($parcel->ProcessedBranchId);
        
        if ($parcel) {
            return view('admin.parcel.edit', compact('parcel', 'branches', 'PickupBranch', 'ProcessedBranch'));
        } else {
            return back()->with('error', 'Record Not Found');
        }
    }
    

  
    
}
