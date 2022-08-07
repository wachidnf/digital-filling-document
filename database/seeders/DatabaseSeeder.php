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
            'username' => "admin@admin.com",
            'name' => "admin@admin.com",
            'email' => "admin@admin.com",
            'password' => Hash::make('admin123'),
            'level' => "admin",
        ]);

        DB::table('m_storages')->insert([
            'name' => "Gudang 1",
            'code' => "G1",
            'level' => 2,
            'description' => "Gudang 1",
        ]);

        DB::table('m_storages')->insert([
            'name' => "Gudang 2",
            'code' => "G2",
            'level' => 1,
            'description' => "Gudang 2",
        ]);

        DB::table('departments')->insert([
            'name' => "CONSTRUCTION & DEVELOPMENT",
            'code' => "CD",
        ]);

        DB::table('departments')->insert([
            'name' => "MARKETING",
            'code' => "MKT",
        ]);

        DB::table('departments')->insert([
            'name' => "HUMAN CAPITAL MANAGEMENT",
            'code' => "HCM",
        ]);

        DB::table('level_storages')->insert([
            'name' => "Odner",
        ]);

        DB::table('level_storages')->insert([
            'name' => "Rak",
        ]);

        DB::table('level_storages')->insert([
            'name' => "Lemari",
        ]);

        DB::table('projects')->insert([
            'name' => "CitraGran Cibubur",
            'code' => "CGC",
            'project_id' => "9",
        ]);

        DB::table('pts')->insert([
            'name' => "PT. CIPUTRA SPIRIT",
            'code' => "H01",
            'pt_id' => "58",
        ]);

        DB::table('pts')->insert([
            'name' => "PT. SINAR BAHANA MULYA",
            'code' => "SBM",
            'pt_id' => "62",
        ]);

        DB::table('pts')->insert([
            'name' => "PT. CIPTAULUNG ARTAJAYA",
            'code' => "CUAJ",
            'pt_id' => "63",
        ]);

        DB::table('pts')->insert([
            'name' => "PT. TUMBUHSEMANGAT NIAGACEMERLANG",
            'code' => "TSNC",
            'pt_id' => "5233",
        ]);


    }
}
