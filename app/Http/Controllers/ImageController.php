<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function thumbnail(Request $request, $name, $extension)
    {
        if (! Storage::exists('public/'.$name.'.'.$extension)) {
            abort(404);
        }

        // If thumbnail doesn't exist, generate it
        if (! Storage::exists('public/'.$name.'.thumbnail.'.$extension)) {
            $image = Image::make(Storage::get('public/'.$name.'.'.$extension))
                ->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode($extension);

            Storage::put('public/'.$name.'.thumbnail.'.$extension, $image);
        }

        return Storage::download('public/'.$name.'.thumbnail.'.$extension);
    }

    public function webp(Request $request, $name, $extension)
    {
        if (! Storage::exists('public/'.$name.'.'.$extension)) {
            abort(404);
        }

        // If thumbnail doesn't exist, generate it
        if (! Storage::exists('public/'.$name.'.thumbnail.'.$extension.'.webp')) {
            $image = Image::make(Storage::get('public/'.$name.'.'.$extension))
                ->encode('webp');

            Storage::put('public/'.$name.'.thumbnail.'.$extension.'.webp', $image);
        }

        return Storage::download('public/'.$name.'.thumbnail.'.$extension.'.webp');
    }
}
