<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class FileHostingController extends Controller
{
    //
    public function uploadfile(Request $request)
    {
        // APP URL
        $appUrl = env("APP_URL", "127.0.0.1:8000");

        // Store file
        $requestFile = $request->file('file_to_upload'); 
        Storage::disk('google')->put($requestFile->getClientOriginalName().'', fopen($requestFile, 'r+'));
        $url = Storage::disk('google')->url($requestFile->getClientOriginalName().'');

        $data = [
            "filename" => $request->file("file_to_upload")->getClientOriginalName(),
            "link" => $url,
            "key" => $request->fh_key,
            "message" => $request->message,
            // "rootname" => $request->file("file_to_upload")->store("", "google"),
        ];

        
        try {
            // Push data to database
            $file = new File;
            $file->link = $data['link'];
            $file->filename = $data['filename'];
            $file->key = $data['key'];
            $file->message = $data['message'];
            $file->save();
            
            $pushId = $file->id;
            $data['temp_link'] = $appUrl."/dl/".$pushId;
            $data['temp_del_link'] = $appUrl."/rm/".$pushId;

            return $data;
        } catch (\Exception $e) {
            // do task when error
            return $e->getMessage();   // insert query
        }
    }


    public function downloadFile($code)
    {
        # code...
        // APP URL
        $appUrl = env("APP_URL", "127.0.0.1:8000");

        $file = File::where(["id" => $code, "active" => 0])->first();
        if ($file == NULL) {
            return view("result", ["header" => "Something went wrong", "message" => "File not found !!"]);
        }

        $data = [
            "filename" => $file->filename,
            "downloads" => $file->downloads,
            "link" => $file->link,
            "created_at" => $file->created_at,
            "message" => $file->message,
            "downloadable" => $file->key === null ? true : false,
            "url" => "http://" . $appUrl .  "/dl/" . $file->id,
            "dld_url" => "http://" . $appUrl .  "/dld/" . $file->id,
        ];

        return view('download', $data);
    }


    public function downloadSecuredFile($code, $key)
    {
        # code...
        // APP URL
        $appUrl = env("APP_URL", "127.0.0.1:8000");

        $file = File::where(["id" => $code, "active" => 0])->first();
        if ($file == NULL) {
            return view("result", ["header" => "Something went wrong", "message" => "File not found !!"]);
        }

        $data = [
            "filename" => $file->filename,
            "downloads" => $file->downloads,
            "link" => $file->link,
            "created_at" => $file->created_at,
            "message" => $file->message,
            "downloadable" => $file->key === $key ? true : false,
            "url" => "http://" . $appUrl .  "/dl/" . $file->id,
            "dld_url" => "http://" . $appUrl .  "/dld/" . $file->id,
        ];

        return view('download', $data);
    }


    public function downloadedFile($code)
    {
        # code...
        $file = File::where(["id" => $code, "active" => 0])->first();
        if ($file == NULL) {
            return view("result", ["header" => "Something went wrong", "message" => "File not found !!"]);
        }

        $file->downloads += 1;
        $file->save();
    }


    public function removeFile($code)
    {
        # code...
        $file = File::where(["id" => $code, "active" => 0])->first();
        if ($file == NULL) {
            return view("result", ["header" => "Something went wrong", "message" => "File not found !!"]);
        }

        $file->active = 1;
        $file->save();
        return view("result", ["header" => $file->filename, "message" => "File deleted successfully !!"]);
    }
}
