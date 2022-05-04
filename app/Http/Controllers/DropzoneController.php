<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    function index()
    {
     return view('dropzone');
    }

    function upload(Request $request)
    {
     $image = $request->file('file');

     $imageName = time() . '.' . $image->extension();

     $image->move(public_path('uploads'), $imageName);

     return response()->json(['success' => $imageName]);
    }

    function fetch()
    {
     $uploads = \File::allFiles(public_path('uploads'));
     $output = '<div class="row">';
     foreach($uploads as $image)
     {
      $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="'.asset('uploads/'.$image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                <button style="background:red;" type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
            </div>
      ';
     }
     $output .= '</div>';
     echo $output;
    }

    function delete(Request $request)
    {
     if($request->get('name'))
     {
      \File::delete(public_path('uploads/' . $request->get('name')));
     }
    }
}
