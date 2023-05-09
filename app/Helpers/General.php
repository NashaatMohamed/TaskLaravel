<?php

// save images
use Illuminate\Support\Facades\URL;

function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = URL::to('/') .'/img/' . $folder . '/' . $filename;
    return $path;
}





