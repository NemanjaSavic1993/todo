<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("tasks")->insert([
            [
                "name" => 'task 1',
                "description" => 'Ovo je opis taska 1',
                "status" => 'Pause',
                "user_id" => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "name" => 'task 2',
                "description" => 'Ovo je opis taska 2',
                "status" => 'Waiting',
                "user_id" => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "name" => 'task 3',
                "description" => 'Ovo je opis taska 3',
                "status" => 'Waiting',
                "user_id" => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "name" => 'task 4',
                "description" => 'Ovo je opis taska 4',
                "status" => 'Started',
                "user_id" => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "name" => 'task 5',
                "description" => 'Ovo je opis taska 5',
                "status" => 'In Proccess',
                "user_id" => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
