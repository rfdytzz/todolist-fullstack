<?php

namespace Database\Seeders;

use App\Models\Todolist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todolist::create([
            'title' => 'Belajar Laravel',
            'description' => 'Mempelajari CRUD dasar Laravel',
            'status' => 'pending'
        ]);

        Todolist::create([
            'title' => 'Bikin UI ToDo List',
            'description' => 'Membuat tampilan dengan Tailwind',
            'status' => 'pending'
        ]);

        Todolist::create([
            'title' => 'Push ke GitHub',
            'description' => 'Upload project ke repository',
            'status' => 'pending'
        ]);
    }
}
