<?php


use App\Models\Setting;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function uploadFile($file, $path, $width, $height)
{
    $extension = $file->getClientOriginalExtension();
    $name = uniqid().".".$extension;

    $folder = 'upload/images/'.$path;
    $finalPath = $folder.'/'.$name;
    $file->move($folder, $name);

    Image::load($finalPath)->fit(Manipulations::FIT_CROP, $width, $height)->save(public_path($finalPath));
    return $finalPath;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function settings($key)
{
    return Setting::get($key);
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function authName()
{
    $auth = session('api_token');
    if(isset($auth['FirstName'])){
        $f_name = $auth['FirstName'];
    }else{
        $f_name = $auth['firstName'];
    }

    if(isset($auth['LastName'])){
        $l_name = $auth['LastName'];
    }else{
        $l_name = $auth['lastName'];
    }
    return $f_name .' '. $l_name;
}
