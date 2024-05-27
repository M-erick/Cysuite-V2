<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([


                'name' => 'guest'


        ]);
        DB::table('roles')->insert([


            'name' => 'normal_admin'


    ]);
    DB::table('roles')->insert([


        'name' => 'supervisor_admin'


]);

    }
}
