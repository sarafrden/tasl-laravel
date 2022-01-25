<?php
namespace App\Core\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class Utilities {

    public static function wrap($data)
    {
        return response()->json($data, 200);
    }

    public static function wrapStatus($data, int $httpCode)
    {
        return response()->json($data, $httpCode);
    }

    



    /**
     * uploading and storing photos and return its path
     * @param UploadedFile $file
     * @param $filePath
     * @return string
     */
    public static function upload($file, $filePath)
    {
        return (string)$file->store('uploads/'.$filePath);
    }

    /**
     * uploading multiple photos and store them then storing their paths to the database
     * @param $images
     * @param $filePath
     * @return Collection
     */
    public static function uploadMultiImages($images, $filePath)
    {
        $countOfImages = 0;
        $storedImages = collect();
        foreach ($images as $image)
        {
            $storedImages->push([
                'id' => $countOfImages++,
                'path' => ($path = Utilities::upload($image, $filePath)),
            ]);
        }
        return $storedImages;
    }


}
