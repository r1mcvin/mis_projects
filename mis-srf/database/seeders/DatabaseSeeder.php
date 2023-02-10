<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('misr1mc'),
            'user_type' => 'admin'
        ]);

        $section = array(
            ['name' => 'Management Information Services', 'short_name' => 'MIS', 'department_id' => 1],
        );


        $divisions = array(
            ['name' => 'Hospital Operations and Patient Support Services', 'short_name' => 'HOPS'],
        );
    }
}
