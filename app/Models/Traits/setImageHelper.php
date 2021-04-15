<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 10.09.2020 16:47
 */

namespace App\Models\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

trait setImageHelper
{
    /**
     * Сохраняем фото в модели из base64
     *
     * @param $attribute_name
     * @param $destination_path
     * @param $value
     */
    protected function setImage($attribute_name, $destination_path, $value)
    {

        $disk = config('backpack.base.root_disk_name');

        if ($value == null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (Str::startsWith($value, 'data:image')) {

            $image = Image::make($value);

            $ext = Str::between($value, 'data:image/', ';');
            $filename = md5($value.time().uniqid()).'.'.$ext;

            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            \Storage::disk($disk)->delete($this->{$attribute_name});

            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        } elseif (file_exists(public_path($value))) {
            $this->attributes[$attribute_name] = $value;
        }

    }
}
