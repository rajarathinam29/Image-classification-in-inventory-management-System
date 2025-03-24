<?php

namespace App\Http\Controllers\Admin\Disposed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DisposedType;

class DisposedTypeController extends Controller
{
    public function index(){
        return view('admin.disposed.disposed-type-list', ['title'=> 'Disposed Types']);
    }

    public function getDisposedTypes(Request $request){
        $disposedType = DisposedType::where(['company_id'=>$request->companyId, 'branch_id'=>$request->branchId])->get();

        if(!is_null($disposedType)){
            $log = '{"title":"View all Disposed types.", "body":"View all disposed types"}';
            $data = [
                'moduleName'=> 'disposed_type',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'disposedTypeData' => $disposedType]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Disposed type not found.']);
    }

    public function addDisposedType(Request $request){
        $validator = Validator::make($request->all(), [
            'disposedTypeName' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }  

        $disposedType = new DisposedType;
        $disposedType->type_name = $request->disposedTypeName;
        $disposedType->company_id = $request->companyId;
        $disposedType->branch_id = $request->branchId;
        $disposedType->created_by = $request->loginId;
        if($disposedType->save()){ 
            $log = '{"title":"Disposed type Created.", "body":"Disposed type name '.$disposedType->type_name.' Created."}';
            $data = [
                'moduleName'=> 'disposed_type',
                'moduleId'=> $disposedType->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Disposed type successfully added.', 'insertId' => $disposedType->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'MDisposed type not added.']);
        }
    }

    public function updateDisposedType(Request $request){
        $validator = Validator::make($request->all(), [
            'disposedTypeName' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 

        $disposedType = DisposedType::find($request->disposedTypeId);
        $prevData = $disposedType->getOriginal();
        $disposedType->type_name = $request->disposedTypeName;
        $disposedType->save();
        if($disposedType->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $disposedType->getChanges());
            $log = '{"title":"Disposed type Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'disposed_type',
                'moduleId'=> $disposedType->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Disposed type successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'No changes found.']);
        }
    }

    public function deleteDisposedType(Request $request){
        $disposedType = DisposedType::find($request->disposedTypeId);
        if($disposedType->delete()){
            $log = '{"title":"Disposed type Deleted.", "body":"Disposed type name'.$disposedType->type_name.' Deleted."}';
            $data = [
                'moduleName'=> 'disposed_type',
                'moduleId'=> $disposedType->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Disposed type successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Disposed type not deleted.']);
        }
    }
}
