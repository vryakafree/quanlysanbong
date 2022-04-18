<?php

namespace Database\Seeders;

use Encore\Admin\Auth\Database\Menu;
use Illuminate\Database\Seeder;

class AdminMenuSeeder extends Seeder
{
    public function run()
    {
        Menu::factory()->create([
            'parent_id' => '0',
            'order' => '1',
            'title' => 'Dashboard',
            'icon' => 'fa-bar-chart',
            'uri' => '/',
        ]);
    }
}
