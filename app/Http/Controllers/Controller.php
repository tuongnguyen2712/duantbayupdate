<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    const TRANGTHAI_SANPHAM = 1;//HIỆN
    const URL_IMG = 'uploads/';
    const PATH_UPLOADS = 'public';
    const BASE_URL_UPLOAD_STAFF = 'uploads/';

    public function uploadMultipleImg($path, $photos)
    {
        $paths = [];
        foreach ($photos as $photo) {
            $extension = $photo->getClientOriginalName();
            $filename = $extension;
            $paths[] = $filename;
            // Storage::disk($path)->put($filename, file_get_contents($photo));
        }
        return json_encode($paths);
    }

    public function checkImg($extension, $img)
    {
            $allowedfileExtension = ['jpg', 'png', 'gif', 'JPG', 'PNG', 'jpeg', 'JPEG'];
            $check = in_array($extension, $allowedfileExtension);
            if (!$check) {
                return false;
            } else {
                $img->move(self::BASE_URL_UPLOAD_STAFF, $img->getClientOriginalName());
                return true;
            }
    }
    public function handleError($error)
    {
        return Redirect::back()->withErrors($error);
    }

    public function handleErrorInput($error)
    {
        return back()->withError($error)->withInput();
    }

}



