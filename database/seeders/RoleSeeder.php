<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            array('name' => 'user', 'permission' => 6),
            array('name' => 'staff', 'permission' => 7),
            array('name' => 'admin', 'permission' => 8)
        );

        DB::table('roles')->insert($roles);
    }
}
