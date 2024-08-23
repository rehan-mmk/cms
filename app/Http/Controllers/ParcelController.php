<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Branch;
use App\Models\Parcel;
use App\Models\Status;
use App\Models\Item;
use App\Models\ParcelStatus;
use Illuminate\Support\Carbon;

 
class ParcelController extends Controller {

    public function AddParcel(Request $request) {

        $validator = \Validator::make($request->all(), [
            'SenderName' => 'required',
            'SenderContact' => 'required',
            'RecieverName' => 'required',
            'RecieverAddress' => 'required',
            'RecieverContact' => 'required',
            'PickupBranch'  => 'required',
            'ProcessedBranch' => 'required',
            'PaymentStatus' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'Status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        }

        if ($request->hasFile('ParcelImage')) {
            $image = $request->file('ParcelImage');
            $newname = rand() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images/ParcelImages'), $newname);
        } else {
            $newname = '';
        }

        $parcel = new Parcel();
        $parcel->TrackingId = $request->TrackingId;
        $parcel->status_id = 1;
        $parcel->SenderName = $request->SenderName;
        $parcel->SenderContact = $request->SenderContact;
        $parcel->RecieverName = $request->RecieverName;
        $parcel->RecieverAddress = $request->RecieverAddress;
        $parcel->RecieverContact = $request->RecieverContact;
        $parcel->PickupBranchId = $request->PickupBranch;
        $parcel->ProcessedBranchId = $request->ProcessedBranch;
        $parcel->PaymentStatus = $request->PaymentStatus;
        $parcel->ParcelImage = $newname;

        if ($parcel->save()) {
            $items = json_decode($request->Items, true);
            foreach ($items as $item) {
                $parcel->items()->create([
                    'item' => $item['item'],
                    'weight' => $item['weight'],
                    'cargo_type' => $item['cargo_type'],
                    'amount' => $item['amount'],
                    'additional_charges' => $item['additional_charges'] ?? 0,
                ]);
            }

            $PrintData = Parcel::where('TrackingId', '=', $request->TrackingId)->with('items')->first();
            $PickupBranch = Branch::findOrFail($request->PickupBranch);
            $DestBranch = Branch::findOrFail($request->ProcessedBranch);
            return response()->json([
                'Status' => 1,
                'message' => 'Parcel Added Successfully',
                'PrintData' => $PrintData,
                'PickupBranch' => $PickupBranch,
                'DestBranch' => $DestBranch,
            ]);
        } else {
            return response()->json([
                'Status' => 2,
                'message' => 'Something went wrong! Please try again'
            ]);
        }
    }


    public function UpdateParcel(Request $request, $id) {
        
        $parcel = Parcel::with('items')->find($id);
    
        if (!$parcel) {
            return response()->json([
                'Status' => 0,
                'message' => 'Parcel not found'
            ]);
        }
    
        // Validate the request data
        $validator = \Validator::make($request->all(), [
            'SenderName' => 'required',
            'SenderContact' => 'required',
            'RecieverName' => 'required',
            'RecieverAddress' => 'required',
            'RecieverContact' => 'required',
            'PickupBranch'  => 'required',
            'ProcessedBranch' => 'required',
            'PaymentStatus' => 'required',
        ]);
    
        if (!$validator->passes()) {
            return response()->json([
                'Status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        }
    
        // Handle file upload
        if ($request->hasFile('ParcelImage')) {
            // Delete old image if exists
            if ($parcel->ParcelImage && file_exists(public_path('images/ParcelImages/' . $parcel->ParcelImage))) {
                unlink(public_path('images/ParcelImages/' . $parcel->ParcelImage));
            }
    
            // Upload new image
            $image = $request->file('ParcelImage');
            $newname = rand() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images/ParcelImages'), $newname);
        } else {
            $newname = $parcel->ParcelImage;
        }
    
        // Update parcel attributes
        if (!is_null($request->TrackingId)) {
            $parcel->TrackingId = $request->TrackingId;
        }
        $parcel->status_id = $parcel->status_id;
        $parcel->SenderName = $request->SenderName;
        $parcel->SenderContact = $request->SenderContact;
        $parcel->RecieverName = $request->RecieverName;
        $parcel->RecieverAddress = $request->RecieverAddress;
        $parcel->RecieverContact = $request->RecieverContact;
        $parcel->PickupBranchId = $request->PickupBranch;
        $parcel->ProcessedBranchId = $request->ProcessedBranch;
        $parcel->PaymentStatus = $request->PaymentStatus;
        $parcel->ParcelImage = $newname;
    
        if ($parcel->save()) {
            // Delete existing items
            $parcel->items()->delete();
    
            // Add new items
            $items = json_decode($request->Items, true);
            foreach ($items as $item) {
                $parcel->items()->create([
                    'item' => $item['item'],
                    'weight' => $item['weight'],
                    'cargo_type' => $item['cargo_type'],
                    'amount' => $item['amount'],
                    'additional_charges' => $item['additional_charges'] ?? 0,
                ]);
            }
    
            // Prepare response data
            if (!is_null($request->TrackingId)) {
                $PrintData = Parcel::where('TrackingId', '=', $request->TrackingId)->with('items')->first();
            }
            else {
                $PrintData = Parcel::where('TrackingId', '=', $parcel->TrackingId)->with('items')->first();
            }
            
            $PickupBranch = Branch::findOrFail($request->PickupBranch);
            $DestBranch = Branch::findOrFail($request->ProcessedBranch);
    
            return response()->json([
                'Status' => 1,
                'message' => 'Parcel Updated Successfully',
                'PrintData' => $PrintData,
                'PickupBranch' => $PickupBranch,
                'DestBranch' => $DestBranch,
            ]);
        } else {
            return response()->json([
                'Status' => 2,
                'message' => 'Something went wrong! Please try again'
            ]);
        }
    }
    
    

    public function UpdateParcelStatus(Request $request) {

        $UserId = Auth::user()->id;
        $UpdatePermission = Auth::user()->role->update_permission;

        if ($request->has('signature_data')) {
            $signatureData = $request->input('signature_data');
            $encodedImage = explode(',', $signatureData)[1];
            $image = base64_decode($encodedImage);
     
            $filename = uniqid() . '.png';

            file_put_contents(public_path('images/signatures/' . $filename), $image);
        }

        
        if($UpdatePermission == 1) {

            $parcel = Parcel::findOrFail($request->parcel_id);
            $parcel->status_id = $request->status_id;
            if (!empty($filename)) {
                $parcel->RecieverSignature = $filename;
                $parcel->SignatureDate = now();
            }
            if($parcel->save()) {
                return response()->json(['status' => 'Success', 'message' => 'Status Updated Successfully']);
            }
        }


        if($UpdatePermission == 0) {

            $parcel = Parcel::findOrFail($request->parcel_id);
        
            $TrackingId = $parcel->TrackingId;
            $BranchId = Auth::user()->branch_id;
            $ParcelStatus = ParcelStatus::where('TrackingId', $TrackingId)->where('user_id', $UserId)->first();

            if($ParcelStatus) {
                return response()->json(['status' => 'Fail', 'message' => 'Failed to Update']);
            }
            if(!$ParcelStatus) {
                $AddStatus = new ParcelStatus();

                $AddStatus->TrackingId = $TrackingId;
                $AddStatus->user_id = $UserId;
                $AddStatus->save();

                $parcel->status_id = $request->status_id;
                if (!empty($filename)) {
                    $parcel->RecieverSignature = $filename;
                    $parcel->SignatureDate = now();
                }
                $parcel->save();
                
                return response()->json(['status' => 'Success', 'message' => 'Status Updated Successfully']);
            }
            else {
                return response()->json(['status' => 'Fail', 'message' => 'Something went wrong Please try again']);
            }
        }
        else {
            return response()->json(['status' => 'Fail', 'message' => 'Please Report Issue to Admin']);
        }
        
    }



    public function ParcelDetails($id) {
        $parceldetails = Parcel::with('items')->with('status')->findOrFail($id);
        $branch = Branch::findOrFail($parceldetails->PickupBranchId);

        if ($parceldetails){
            return response()->json(['status'=> 1, 'data' => $parceldetails, 'branch' => $branch]);
        }
        else {
            return response()->json(['status'=> 0,'message' => 'No parcel found plz try again']);
        }
    }









    public function TrackParcel(Request $request) {

        $trackingIdValue = $request->TrackingId;
        $statuses = Status::all();
        
        $parcel = Parcel::with('status')->where('TrackingId', $trackingIdValue)->first();
    
        if($parcel){
            return view('admin.parcel.track-parcel', compact('parcel', 'statuses')); 
        } 
        else {
            return back()->with('Fail', 'Please check tracking number then try again'); 
        }
    }



    public function DeleteParcel($id) {
        $parcel = Parcel::findOrFail($id);
        
        if($parcel->delete()) {
            return response()->json(['status' => 'Success', 'message' => 'Record deleted successfully']);
        } 
        else {
            return response()->json(['status' => 'Fail', 'message' => 'Failed to delete! Please try again later']);
        }
    }

    
}
