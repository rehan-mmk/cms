<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\PasswordReset;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Mail;

class BranchController extends Controller {

    public function AddBranch(Request $request) { 
        $request->validate([
            'name' => 'required|string|unique:branches',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'ZipCode' => 'required',
            'country' => 'required',
            'contact' => 'required',
        ], [
            'branchname.required' => 'The branch name field is required.',
            'street.required' => 'The Street / Building field is required.',
            'city.required' => 'The City field is required.',
            'city.string' => 'The City must be a string.',
            'city.unique' => 'The City has already been taken.',
            'state.required' => 'The State field is required.',
            'ZipCode.required' => 'The Zip Code / Postal Code field is required.',
            'country.required' => 'The Country field is required.',
            'contact.required' => 'The Contact field is required.',
        ]);


        $branch = new Branch();
        $branch->name = $request->name;
        $branch->street = $request->street;
        $branch->city = $request->city;
        $branch->state = $request->state;
        $branch->ZipCode = $request->ZipCode;
        $branch->country = $request->country;
        $branch->contact = $request->contact;

        if($branch->save()) {
            return back()->with('Success', 'Branch Added Successfully');
        }
        else {
            return back()->with('Fail', 'Something Went Wrong');
        }
        
    }



 

    public function EditBranch(Request $request, $id) {
        $branch = Branch::find($id);

        $branch->name = $request->branchname;
        $branch->street = $request->street;
        $branch->city = $request->city;
        $branch->state = $request->state;
        $branch->ZipCode = $request->ZipCode;
        $branch->country = $request->country;
        $branch->contact = $request->contact;

        if($branch->save()) {
            return back()->with('Success', 'Data has been saved successfully');
        }
        else {
            return back()->with('Fail', 'Something Went Wrong');
        }
        
    }




    public function DeleteBranch($id) {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return response()->json(['message' => 'Record deleted successfully']);
    }


}
