<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('types')->insert([
            ['field_member' => '5 người'],
            ['field_member' => '7 người'],
            ['field_member' => '11 người'],
        ]);
    }
}
