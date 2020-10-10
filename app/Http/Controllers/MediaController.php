<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Validator;
use App\Http\Models\{Media,Provider};

class MediaController extends Controller
{
    //show all files
    public function getProviders(){
        $medias = Media::all();
        $providers = Provider::all();
        return view('welcome', compact('medias','providers')); 
    }

    //upload all files
    public function upload(Request $request)
    {
        if( $request->hasFile('file') && $request->has('provider_id')) {
            $file = $request->file('file');
            $file_type = explode('/',$file->getMimeType())[0];
            $provider_id = $request->input('provider_id');
            $filevalidate = $this->validateFile($file_type,$provider_id);		
        }
        $this->validate($request, [
            'file' => $filevalidate,
            'name' => 'required|string',
            'provider_id' => 'required|exists:providers,id',
        ]);
        try{
            if(request()->hasFile('file')){
                $path = $request->file('file')->store('media');
                $data = ['name'=>$request->input('name'),'path'=>$path,'provider_id'=>$provider_id];
                Media::create($data);
                return response()->json(['status' => '200', 'path' => $path]);
            }
        }catch(\Exception $e){
            //todo:Rollback DB here
            //dd($e);
            return response()->json(['status' => '500', 'msg' => 'somthing went wrong']);
        }
    }
    //validate files
    public function validateFile($file_type,$provider_id){
        if($provider_id == 1){
                $filevalidate = 'required';
            if($file_type=='image'){
                $filevalidate = 'required|mimes:jpeg|max:2048|dimensions:ratio=4/3';
            }
            if($file_type=='video'){
                $filevalidate = 'required|mimes:mp4|file_length:60';  //custom file_length from boot method
            }
            if($file_type=='audio'){
                $filevalidate = 'required|mimes:mp3|max:5120|file_length:30';
            }
        }else{
            if($file_type=='image'){
                $filevalidate = 'required|mimes:jpeg,gif|max:5120|dimensions:ratio=16/9';
            }
            if($file_type=='video'){
                $filevalidate = 'required|mimes:mp4,mov,qt|max:51200|file_length:300';
            }
        }
        return $filevalidate;
    }
}