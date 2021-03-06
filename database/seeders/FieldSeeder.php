<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('fields')->insert([
            [
                'field_name' => 'Sân A',
                'cost' => '3000',
                'type_id' => '1',
            ],
            [
                'field_name' => 'Sân B',
                'cost' => '5000',
                'type_id' => '2',
            ],
            [
                'field_name' => 'Sân C',
                'cost' => '7000',
                'type_id' => '3',
            ],
            [
                'field_name' => 'Sân D',
                'cost' => '3000',
                'type_id' => '1',
            ],
            [
                'field_name' => 'Sân E',
                'cost' => '5000',
                'type_id' => '2',
            ],
            [
                'field_name' => 'Sân F',
                'cost' => '7000',
                'type_id' => '3',
            ],
            [
                'field_name' => 'Sân G',
                'cost' => '3000',
                'type_id' => '1',
            ],
            [
                'field_name' => 'Sân H',
                'cost' => '7000',
                'type_id' => '3',
            ],
        ]);
    }
}
