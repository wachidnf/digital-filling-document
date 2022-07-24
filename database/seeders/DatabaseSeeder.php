<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => "admin@admin.com",
            'email' => "admin@admin.com",
            'password' => Hash::make('admin123'),
        ]);

        DB::table('storages')->insert([
            'name' => "Gudang 1",
            'code' => "G1",
            'description' => "Gudang 1",
        ]);

        DB::table('storages')->insert([
            'name' => "Gudang 2",
            'code' => "G2",
            'description' => "Gudang 2",
        ]);

        DB::table('departments')->insert([
            'name' => "CD",
            'code' => "CD",
        ]);

        DB::table('departments')->insert([
            'name' => "MKT",
            'code' => "MKT",
        ]);
    }
}
