<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MakeModel;

class MakeModelController extends Controller
{
    public function index(){
        return view('admin.make-model.make-model-list', ['title'=> 'Make & Model']);
    }

    public function getMakeModels(Request $request){
        $makemodels = MakeModel::where(['company_id'=>$request->companyId])->get();

        if(!is_null($makemodels)){
            $log = '{"title":"View all make models.", "body":"View all make models"}';
            $data = [
                'moduleName'=> 'make_model',
                'moduleId'=> null,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'makeModelsData' => $makemodels]);
        }
        return response()->json(['status' => FALSE, 'msg' => 'Make & model not found.']);
    }

    public function addMakeModel(Request $request){
        $validator = Validator::make($request->all(), [
            'makeModelName' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        }  

        $makeModel = new MakeModel;
        $makeModel->make_model_name = $request->makeModelName;
        $makeModel->company_id = $request->companyId;
        $makeModel->branch_id = $request->branchId;
        $makeModel->created_by = $request->loginId;
        if($makeModel->save()){ 
            $log = '{"title":"Make & Model Created.", "body":"Make & Model name '.$makeModel->make_model_name.' Created."}';
            $data = [
                'moduleName'=> 'make_model',
                'moduleId'=> $makeModel->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Make & Model successfully added.', 'insertId' => $makeModel->id]); 
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Make & Model not added.']);
        }
    }

    public function updateMakeModel(Request $request){
        $validator = Validator::make($request->all(), [
            'makeModelName' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => FALSE, 'msg'=>'fields are required', 'errors'=>$validator->errors()]);
        } 

        $makeModel = MakeModel::find($request->makeModelId);
        $prevData = $makeModel->getOriginal();
        $makeModel->make_model_name = $request->makeModelName;
        $makeModel->save();
        if($makeModel->wasChanged()){
            $body = $this->ValidateUpdated($prevData, $makeModel->getChanges());
            $log = '{"title":"Make Model Updated.", "body":"'.$body.'"}';
            $data = [
                'moduleName'=> 'make_model',
                'moduleId'=> $makeModel->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Make & Model details successfully updated.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'No changes found.']);
        }
    }

    public function deleteMakeModel(Request $request){
        $makeModel = MakeModel::find($request->makeModelId);
        if($makeModel->delete()){
            $log = '{"title":"Make model Deleted.", "body":"Make & Model name'.$makeModel->make_model_name.' Deleted."}';
            $data = [
                'moduleName'=> 'make_model',
                'moduleId'=> $makeModel->id,
                'log'=> $log,
                'userId'=> $request->loginId,
                'companyId'=> $request->companyId,
                'branchId'=> $request->branchId,
            ];
            $this->addActivityLog($data);
            return response()->json(['status' => TRUE, 'msg' => 'Make & Model successfully deleted.']);
        }else{
            return response()->json(['status' => FALSE, 'msg' => 'Make & Model not deleted.']);
        }
    }
}
