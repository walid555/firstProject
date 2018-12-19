<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use DB;
use App\FileData;
use Session;
session_start();

class fileController extends Controller
{
    public function saveFile(Request $request)
    {
    
        $fileData=new FileData();
        $fileData->fileName=$request->fileName;
        $image=$request->file('fileImage');
        $video=$request->file('fileVideo');
        if($image && $video){
        $imgExt=$image->getClientOriginalExtension();
        Storage::disk('public')->put($image->getFilename(). '.' .$imgExt , File::get($image));
        $fileData->fileImage=$image->getFilename(). '.' .$imgExt;
        $ext=$video->getClientOriginalExtension();
        Storage::disk('public')->put($video->getFilename(). '.' .$ext , File::get($video));
        $fileData->fileVideo=$video->getFilename(). '.' .$ext; 
        $fileData->save();
        /////////////////////////////////////// json data ///////////////////////////////////////
        /*$data=[
        'fileName'=>$request->fileName,
        'fileImage'=>$image->getFilename(). '.' .$imgExt,
        'fileVideo'=>$video->getFilename(). '.' .$ext
        ];
        $response=[
        'msg'=>'File Created',
        'data'=>$data
        ];
        return response()->json($response);*/
        Session::put('message','File inserted successfully');
        return Redirect::to('adminHome');
        }
        elseif($image)
        {
        $imgExt=$image->getClientOriginalExtension();
        Storage::disk('public')->put($image->getFilename(). '.' .$imgExt , File::get($image));
        $imageName=$image->getFilename(). '.' .$imgExt;
        $fileData->fileImage=$image->getFilename(). '.' .$imgExt;
        $fileData->save();
        $data=[
        'fileName'=>$request->fileName,
        'fileImage'=>$image->getFilename(). '.' .$imgExt
        ];
        $response=[
        'msg'=>'File Created',
        'data'=>$data
        ];
        return response()->json($response);
        Session::put('message','File inserted successfully');
        return Redirect::to('adminHome');
        }
        elseif ($video) {
        $extVideo=$video->getClientOriginalExtension();
        Storage::disk('public')->put($video->getFilename(). '.' .$extVideo , File::get($video));
        $fileData->fileVideo=$video->getFilename(). '.' .$extVideo;
        $fileData->save();
        $data=[
        'fileName'=>$request->fileName,
        'fileVideo'=>$video->getFilename(). '.' .$extVideo
        ];
        $response=[
        'msg'=>'File Created',
        'data'=>$data
        ];
        return response()->json($response);
    	Session::put('message','File inserted successfully');
        return Redirect::to('adminHome');
        }
        
    }
    public function deleteFile($fileId)
    {
        FileData::where('fileId',$fileId)->delete();
        Session::put('message','File deleted successfully');
        return Redirect::to('adminHome');
    }
}
