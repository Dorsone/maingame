<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SummernoteImageController extends Controller
{
    const SAVE_DIR = 'uploads/articles/';

    public function upload(Request $request)
    {
        if ($request->hasFile('files')) {
            $uploadFiles = $request->file('files');

            $result = array('url' => array());
            foreach ($uploadFiles as $index => $uploadFile) {
                if (!file_exists(public_path(self::SAVE_DIR))) {
                    mkdir(public_path(self::SAVE_DIR));
                }

                $path = self::SAVE_DIR.uniqid().".".$uploadFile->getClientOriginalExtension();

                $img = Image::make($uploadFile->getRealPath());
                $img->save(public_path($path))->destroy();
                $result['url'][] = asset($path);
            }

            return response()->json($result);

        }


        return response()->json([
            'uploaded' => false,
            'error' => array(
                'message' => 'Ошибка загрузки файла'
            )
        ]);
    }

    public function delete(Request $request)
    {
        $file = $request->input('file');
        if ($file) {
            $filePatch = public_path(str_replace(asset(''), '', $file));
            if (unlink($filePatch)) {
                return response()->json([
                    'status' => 'success'
                ]);
            }
        }

        return response()->json([
            'status' => 'error'
        ]);

    }
}
