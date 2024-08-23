<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Branch;
use App\Models\Parcel;
use App\Models\Status;
use App\Models\Role;
use App\Models\Admin\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ViewController extends Controller {

    public function LoginView() { return view('admin.login'); }

    public function index() { 
        
        $ViewPermission = Auth::user()->role->view_permission;
        if($ViewPermission == 1) {
            $branches = Branch::all();
            $TotalBranches = $branches->count();
    
            $users = User::all();
            $TotalUsers = $users->count();

            $parcels = Parcel::all();
            $TotalParcels = $parcels->count();

            $TotalEarning = $parcels->sum('TotalAmount');


            $accepted = Parcel::whereHas('status', function ($query) {
                $query->where('ParcelStatus', 'Item Accepted by Courier');
            })->get();
            $Totalaccepted = $accepted->count();

            $ready = Parcel::whereHas('status', function ($query) {
                $query->where('ParcelStatus', 'Ready for collection');
            })->get();
            $TotalReady = $ready->count();

            $collected = Parcel::whereHas('status', function ($query) {
                $query->where('ParcelStatus', 'Collected');
            })->get();
            $TotalCollected = $collected->count();
        }

        if($ViewPermission == 0) {
            $BranchId = Auth::user()->branch_id;
            $parcels = Parcel::where('PickupBranchId', $BranchId)->get();
            $TotalParcels = $parcels->count();

            $TotalEarning = $parcels->sum('TotalAmount');

            $accepted = Parcel::where('PickupBranchId', $BranchId)
            ->whereHas('status', function ($query) {
                $query->where('ParcelStatus', 'Item Accepted by Courier');
            })->get();
            $Totalaccepted = $accepted->count();

            $ready = Parcel::where('PickupBranchId', $BranchId)
            ->whereHas('status', function ($query) {
                $query->where('ParcelStatus', 'Ready for collection');
            })->get();
            $TotalReady = $ready->count();

            $collected = Parcel::where('PickupBranchId', $BranchId)
            ->whereHas('status', function ($query) {
                $query->where('ParcelStatus', 'Collected');
            })->get();
            $TotalCollected = $collected->count();

            $branches = Branch::all();
            $TotalBranches = $branches->count();
    
            $users = User::all();
            $TotalUsers = $users->count();

        }
        

        return view('admin.index', compact('TotalBranches', 'TotalUsers', 'TotalParcels','Totalaccepted', 'TotalCollected', 'TotalEarning', 'TotalReady'));
    }

    public function RegisterView() { return view('admin.register'); }

    public function profile() { return view('admin.profile'); }

    public function email() { return view('admin.passwords.email'); }



    public function ResetView(Request $request){

        $ResetData = DB::table('password_reset_tokens')->where('token', $request->token)->first();
    
        if ($ResetData !== null) {
            $user = User::where('email', $ResetData->email)->first();
            return view('admin.passwords.reset', compact('user'));
        }
    
        return view('404');
    }
    


    
    

    public function AddBranchView() { return view('admin.branch.branch'); }

    
    public function BranchesList() { 
        $allbranches = Branch::all();
        return view('admin.branch.allbranches', compact('allbranches')); 
    }

    public function EditBranchView($id) { 
        $branch =  Branch::find($id);
        if($branch) {
            return view('admin.branch.editbranch', compact('branch')); 
        }
        else {
            return back()->with('error', 'Record Not Found');
        }
        
    }
    

    



    public function AddStaffView() { 
        $branches = Branch::all();
        $roles = Role::all();
        return view('admin.staff.staff', compact('branches', 'roles')); 
    }

    
    public function StaffList() { 
        $allstaff = User::with('branch')->with('role')->get();
        $roles = Role::all();
        return view('admin.staff.stafflist', compact('allstaff', 'roles')); 
    }

    
    public function EditStaffView($id) {  
        $staff =  User::with('branch')->with('role')->find($id);
        $branches = Branch::all();
        $roles = Role::all();
        if($staff) {
            return view('admin.staff.editstaff', compact('staff', 'branches', 'roles')); 
        }
        else {
            return back()->with('error', 'Record Not Found');
        }
        
    }

    
}
