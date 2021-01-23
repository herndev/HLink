<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ShortLink;

class ShortLinkController extends Controller
{
    //
    public function generatelink(Request $request)
    {
        # code...
        $domain = "http://hlink.ml/l/";

        $validator = Validator::make($request->all(), [
            'link' => 'required|url',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $err = array(
                'link' => $errors->first('link'),
            );


            return view("results", [
                'message' => 'Cannot process request',
                'errors' => $err]);
        }

        $shortlink = new ShortLink;
        $shortlink->code = Str::random(6);
        $shortlink->link = $request->link;
        $shortlink->save();

        return view("results", ["shortlink" => $shortlink, "domain" => $domain]);
    }


    public function navigatelink($code)
    {
        $shortlink = ShortLink::where("code",$code)->first();
        return redirect($shortlink->link);
    }
}
