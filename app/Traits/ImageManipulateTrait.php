<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageManipulateTrait
{
    public function manipulate($photo, $folder = "", Int $size = 500,)
    {
        $path = $photo->hashName($folder);
        $image = Image::make($photo)->resize($size, $size, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        Storage::put($path, (string) $image->encode());

        return $path;
    }
}
