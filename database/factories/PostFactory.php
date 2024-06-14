<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // User::inRandomOrder()->first()->id
        // for($i=0;$i<15;$i++){
        //     Task::create([
        //         'user_id'=>User::inRandomOrder()->first()->id,
        //         'title'=>$facker->sentence(4),
        //         // 'body'=>$facker->paragraph(),
        //     ]);
        // }
    public function definition(): array
    {
    $facker=\Faker\Factory::create();

        return [
            'slug'=>Str::of(fake()->name().uniqid())->slug('-'),
            'path_photo'=>'posts\jOEdvDoNRNISzb627Nxwgthq47gt6i8RLDpd7aSk.png',
            'title'=>$facker->sentence(4),
            'short_description'=>$facker->sentence(15),
            'description'=>$facker->paragraph(),
            'user_id'=>User::inRandomOrder()->first()->id
        ];
    }
}
