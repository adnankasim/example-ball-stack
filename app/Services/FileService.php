<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileService{

    public static function getLatestLogo()
    {
        $logos = File::with('fileable')->where('original_name', 'like', 'logo_%')->latest('updated_at');

        return $logos;
    }

    public static function destroy($id)
    {
        $file = File::find($id);

        Storage::delete($file->path);

        $file->delete();

        return $file;
    }

}
