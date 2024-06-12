<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected static function uploadImage($imageStoredLocation, $image)
    {
        $imageName =  uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($imageStoredLocation), $imageName);

        chmod(public_path($imageStoredLocation . $imageName), 0777);
        return $imageStoredLocation . $imageName;
    }
}
