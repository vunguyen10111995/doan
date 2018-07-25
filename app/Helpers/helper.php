<?php

namespace App\Helpers;

class Helper
{
    public static function importFile($file, $path)
    {
        if (isset($file)) {
            $file_name = $file->hashName();
            $file->move($path, $file_name);
            return $file_name;
        }
    }
    public static function deleteFile($name, $path)
    {
        if (is_file($path . $name)) {
            unlink($path . $name);
        }
    }
    public static function messageException($error = false, $data = [], $message = [], $status = '200')
    {
        return [
            'error' => $error,
            'data' => $data,
            'message' => $message,
            'status' => $status,
        ];
    }

    public static function upload($file, $path)
    {
        try {
            if (!$file) {
                $filename = config('images/setting.defaultAvatar');
            } else {
                $filename = $file->getClientOriginalName();

                $file->move($path, $filename);
            }
            return $filename;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }
}
