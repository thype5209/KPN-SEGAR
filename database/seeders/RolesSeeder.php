<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use mysqli;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $posts = [
            [
                'id' => "1",
                'roles' => "pengurus",
            ],
            [
                'id' => "2",
                'roles' => "Pengguna",
            ],
            [
                'id' => "3",
                'roles' => "bendahara",
            ],

        ];
        DB::table('roles')->insert($posts);
    }
}
