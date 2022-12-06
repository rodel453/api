<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class Analytics extends Controller
{
    public function website_upload(Request $request){

        $file = $request->file('website_file');
        $fileName = $_FILES['test']['name'];
        // $fileName = $file->getClientOriginalName();
        $path = Storage::putFileAs('google', $_FILES['test']['tmp_name'], $fileName);

        return response()->json(['message'=> 'upload sucessfully']);

    }

    public function website_user_list(){

        $user_website = User::find(auth()->user()->id)->websites()->get();
        return $user_website;

    }


}
