<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index()
    {
        $disk = Storage::disk(config('Health_Cheacker_for_db.backup.destination.disks'));
        //dd($disk->size($f));
        $files = $disk->files('/laravel/');
        $backups = [];
        foreach ($files as $k => $f) {
            if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace(config('Health_Cheacker_for_db.backup.name') . 'laravel/', '', $f),
                    'file_size' => $disk->size($f),
                    'last_modified' => $disk->lastModified($f),
                ];
            }
        }
        $backups = array_reverse($backups);
        return view("backup.backups")->with(compact('backups'));
    }

    public static function humanFileSize($size, $unit = "")
    {
        if ((!$unit && $size >= 1 << 30) || $unit == "GB")
            return number_format($size / (1 << 30), 2) . "GB";
        if ((!$unit && $size >= 1 << 20) || $unit == "MB")
            return number_format($size / (1 << 20), 2) . "MB";
        if ((!$unit && $size >= 1 << 10) || $unit == "KB")
            return number_format($size / (1 << 10), 2) . "KB";
        return number_format($size) . " bytes";
    }

    public function create()
    {
        dispatch(function () {
            Artisan::call('backup:run --only-db');
        });
        session()->flash('success', ' Backpack\BackupManager -- new backup started');
        return redirect()->back();
    }

    public function download($file_name)
    {
        $file = storage_path('app/laravel/' . $file_name);
        return response()->file($file);
    }

    public function delete($file_name)
    {
        $disk = Storage::disk(config('Health_Cheacker_for_db.backup.destination.disks'));
        if ($disk->exists(config('Health_Cheacker_for_db.backup.name') . '/laravel/' . $file_name)) {
            $disk->delete(config('Health_Cheacker_for_db.backup.name') . '/laravel/' . $file_name);
            session()->flash('delete', 'Successfully deleted backup!');
            return redirect()->back();
        } else {
            abort(404, "Backup file doesn't exist.");
        }
    }

}
