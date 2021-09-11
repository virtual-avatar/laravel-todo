<?php

namespace Database\Factories;

use App\Models\TodoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TodoModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ru_RU');
        $status = ['Не срочная','Обычная','Срочная','Очень срочная'];
        return [
            'title' => $faker->realText(100),
            'author' => $faker->lastName() . " " . $faker->firstName(),
            'status' => $status[array_rand(['Не срочная','Обычная','Срочная','Очень срочная'], 1)],
        ];
    }
}
