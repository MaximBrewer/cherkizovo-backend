<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeds\RolesTableSeeder;
use Database\Seeds\UsersTableSeeder;
use TCG\Voyager\Traits\Seedable;

class DatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__.'/../seeds/';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('RolesTableSeeder');
        $this->seed('UsersTableSeeder');
    }
}
