<?php

namespace App\Services;

use App\Models\Citizen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CitizenService {

    public static function getLatest($name, $is_active, $is_validated)
    {
        $citizens = Citizen::where('full_name', 'like', '%' . $name . '%')
        ->whereHas('user', function ($query) use ($is_active, $is_validated) {
            if ($is_active === 'ya') $query->where('is_active', true);
            elseif ($is_active === 'tidak') $query->where('is_active', false);

            if ($is_validated === 'ya') $query->whereNotNull('validated_at');
            elseif ($is_validated === 'tidak') $query->whereNull('validated_at');
        })
        ->latest('updated_at');

        return $citizens;
    }

    public static function store($data, $photo = null, $ktp = null, $photo_with_ktp = null)
    {
        $citizen = Citizen::create([
            'id' => $data['nik'],
            'kk_number' => $data['kk_number'],
            'full_name' => $data['name'],
            'birth_place' => $data['birth_place'],
            'birth_date' => $data['birth_date'],
            'sex' => $data['sex'],
            'citizenship' => $data['citizenship'],
        ]);

        $citizen->user()->create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
        ]);

        if (!empty($photo)) {
            $citizen->files()->create([
                'storage' => 'local',
                'original_name' => 'photo_profile_' . $photo->getClientOriginalName(),
                'size' => $photo->getSize(),
                'path' => $photo->store('public/file/' . date('Y/md')),
            ]);
        }
        if (!empty($ktp)) {
            $citizen->files()->create([
                'storage' => 'local',
                'original_name' => 'ktp_' . $ktp->getClientOriginalName(),
                'size' => $ktp->getSize(),
                'path' => $ktp->store('public/file/' . date('Y/md')),
            ]);
        }
        if (!empty($photo_with_ktp)) {
            $citizen->files()->create([
                'storage' => 'local',
                'original_name' => 'photo_with_ktp_' . $photo_with_ktp->getClientOriginalName(),
                'size' => $photo_with_ktp->getSize(),
                'path' => $photo_with_ktp->store('public/file/' . date('Y/md')),
            ]);
        }

        return $citizen;
    }

    public static function update($data, $photo = null, $ktp = null, $photo_with_ktp = null)
    {
        $citizen = Citizen::findOrFail($data['id']);
        $citizen->update([
            'kk_number' => $data['kk_number'],
            'full_name' => $data['name'],
            'birth_place' => $data['birth_place'],
            'birth_date' => $data['birth_date'],
            'sex' => $data['sex'],
            'citizenship' => $data['citizenship'],
        ]);

        $citizen->user()->update([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        if(!empty($data['password'])){
            $citizen->user()->update(['password' => Hash::make($data['password'])]);
        }

        if (!empty($photo)) {
            $a = $citizen->files->filter(function ($q) {
                return Str::startsWith($q['original_name'], 'photo_profile_');
            })->first();
            if(isset($a)){
                Storage::delete($a->path);
                $a->update([
                    'storage' => 'local',
                    'original_name' => 'photo_profile_' . $photo->getClientOriginalName(),
                    'size' => $photo->getSize(),
                    'path' => $photo->store('public/file/' . date('Y/md')),
                ]);
            }else{
                $citizen->files()->create([
                    'storage' => 'local',
                    'original_name' => 'photo_profile_' . $photo->getClientOriginalName(),
                    'size' => $photo->getSize(),
                    'path' => $photo->store('public/file/' . date('Y/md')),
                ]);
            }
        }
        if (!empty($ktp)) {
            $b = $citizen->files->filter(function ($q) {
                return Str::startsWith($q['original_name'], 'ktp_');
            })->first();
            if (isset($b)) {
                Storage::delete($b->path);
                $b->update([
                    'storage' => 'local',
                    'original_name' => 'ktp_' . $ktp->getClientOriginalName(),
                    'size' => $ktp->getSize(),
                    'path' => $ktp->store('public/file/' . date('Y/md')),
                ]);
            } else {
                $citizen->files()->create([
                    'storage' => 'local',
                    'original_name' => 'ktp_' . $ktp->getClientOriginalName(),
                    'size' => $ktp->getSize(),
                    'path' => $ktp->store('public/file/' . date('Y/md')),
                ]);
            }
        }
        if (!empty($photo_with_ktp)) {
            $c = $citizen->files->filter(function ($q) {
                return Str::startsWith($q['original_name'], 'photo_with_ktp_');
            })->first();
            if (isset($c)) {
                Storage::delete($c->path);
                $c->update([
                    'storage' => 'local',
                    'original_name' => 'photo_with_ktp_' . $photo_with_ktp->getClientOriginalName(),
                    'size' => $photo_with_ktp->getSize(),
                    'path' => $photo_with_ktp->store('public/file/' . date('Y/md')),
                ]);
            } else {
                $citizen->files()->create([
                    'storage' => 'local',
                    'original_name' => 'photo_with_ktp_' . $photo_with_ktp->getClientOriginalName(),
                    'size' => $photo_with_ktp->getSize(),
                    'path' => $photo_with_ktp->store('public/file/' . date('Y/md')),
                ]);
            }
        }

        return $citizen;
    }

    public static function destroy($id)
    {
        $citizen = Citizen::find($id);
        $citizen->delete();
        if (isset($citizen->files)) {
            foreach ($citizen->files as $key) {
                Storage::delete($key->path);
            }
            $citizen->files()->delete();
        }

        return $citizen;
    }

    public static function validation($id)
    {
        $citizen = Citizen::find($id);
        $citizen->user()->update([
            'validated_at' => now()
        ]);

        return $citizen;
    }

    public static function activation($id)
    {
        $citizen = Citizen::find($id);
        if($citizen->user->is_active){
            $citizen->user()->update([
                'is_active' => false
            ]);
        }else{
            $citizen->user()->update([
                'is_active' => true
            ]);
        }

        return $citizen;
    }

}
