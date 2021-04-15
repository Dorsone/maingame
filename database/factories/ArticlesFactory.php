<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 15.04.2021 13:58
 */

namespace Database\Factories;

use App\Models\Articles;
use App\Models\ArticlesCategories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ArticlesFactory extends Factory
{
    protected $model = Articles::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tmpImage = $this->faker->image();
        $path = "uploads/articles/".basename($tmpImage);
        $img = Image::make($tmpImage);
        $img->save(public_path($path))->destroy();

        return [
            'active' => true,
            'title' => $this->faker->company,
            'slug' => $this->faker->slug,
            'content_preview' => $this->faker->word,
            'content' => $this->faker->realText(2000),
            'image' => $path,
            'date' => Carbon::now()->subDays(rand(0, 60)),
            'time_read' => $this->faker->randomNumber(),
        ];
    }


}
