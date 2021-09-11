<?php

namespace Database\Seeders;

use App\Models\TodoModel;
use Database\Factories\TodoFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TodoModel::factory()
            ->count(30)
            ->create();
    }
}
