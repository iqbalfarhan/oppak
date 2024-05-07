<?php

namespace App\Traits;
use Intervention\Image\Facades\Image;

trait ImageManipulateTrait
{
    public function manipulate($photo, Int $size)
    {
        $image = Image::make($photo)->resize($size, $size, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        return $image;
    }
}
