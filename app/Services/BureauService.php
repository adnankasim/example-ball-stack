<?php

namespace App\Services;

use App\Models\Bureau;
use Illuminate\Support\Facades\Storage;

class BureauService {

    public static function getLatest($search)
    {
        $bureau = Bureau::where('name', 'like', '%' . $search . '%')
            ->orWhere('short_name', 'like', '%' . $search . '%')
            ->latest('updated_at');

        return $bureau;
    }

    public static function store($data, $logo = null)
    {
        $bureau = Bureau::create([
            'name' => $data['name'],
            'short_name' => $data['short_name'],
            'email' => $data['email'] ?? null,
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'] ?? null
        ]);

        if (!empty($logo)) {
            $bureau->file()->create([
                'storage' => 'local',
                'original_name' => 'logo_' . $logo->getClientOriginalName(),
                'size' => $logo->getSize(),
                'path' => $logo->store('public/file/' . date('Y/md')),
            ]);
        }

        return $bureau;
    }

    public static function update($id, $data, $logo = null)
    {
        $bureau = Bureau::find($id);

        $bureau->update([
            'name' => $data['name'],
            'short_name' => $data['short_name'],
            'address' => $data['address'] ?? null,
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null
        ]);

        if (!empty($logo)) {
            if(isset($bureau->file)){
                Storage::delete($bureau->file->path);
                $bureau->file()->update([
                    'storage' => 'local',
                    'original_name' => 'logo_' . $logo->getClientOriginalName(),
                    'size' => $logo->getSize(),
                    'path' => $logo->store('public/file/' . date('Y/md')),
                ]);
            }else{
                $bureau->file()->create([
                    'storage' => 'local',
                    'original_name' => 'logo_' . $logo->getClientOriginalName(),
                    'size' => $logo->getSize(),
                    'path' => $logo->store('public/file/' . date('Y/md')),
                ]);
            }
        }

        return $bureau;
    }

    public static function destroy($id)
    {
        $bureau = Bureau::find($id);
        $bureau->delete();
        if (isset($bureau->file)) {
            Storage::delete($bureau->file->path);
            $bureau->file()->delete();
        }

        return $bureau;
    }

}
