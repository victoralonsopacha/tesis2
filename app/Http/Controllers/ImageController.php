<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function index()
    {
        return view('image');
    }

    public function dropZone(Request $request)
    {
        $file = $request->file('file');
        $fileName = time() . '.' . $image->extension();
        $file->move(public_path('images'), $fileName);
        return response()->json(['success' => $fileName]);
    }
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');

        $imageName = time().'.'.$image->extension();

        $image->move(public_path('file'),$imageName);

        return response()->json(['success'=>$imageName]);
    }

}
