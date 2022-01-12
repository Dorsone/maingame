<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'image' => 'users//dbf7c2d83e03ce3f114b30fb6feeb5e6.jpeg',
            'description' => 'Мы ее ждали, и Hoodwink (Прохвостка) пришла! Этот милый ловкач попортит настроение большому количеству любителей погулять по лесам — как и у Treant Protector, некоторые ее способности завязаны на наличии деревьев поблизости. Ее AoE-корни могут серьезно напрячь оппонента, а ультимейт способен нанести большое количество урона издалека. Это новый партизан, который очень пригодится в качестве роумера.',
            'interests' => '[{"title":"GTA"},{"title":"\u041a\u0438\u043d\u043e"}]',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
