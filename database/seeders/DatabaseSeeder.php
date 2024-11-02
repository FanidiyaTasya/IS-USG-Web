<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\InitialAssessment;
use App\Models\Sheep;
use App\Models\User;
use App\Models\VitalSign;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Fanidiya Tasya',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'Admin'
        ]);

        User::create([
            'name' => 'Karyawan User',
            'email' => 'karyawan1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Karyawan'
        ]);

        Sheep::factory()->count(5)->create();
        InitialAssessment::factory()->count(5)->create();
        VitalSign::factory()->count(5)->create();
    }
}
