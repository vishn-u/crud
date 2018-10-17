<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country')->insert([
        [
            'name' => 'india',
            'status' => 1,
        ],
        [
            'name' => 'malasiya',
            'status' => 1,
        ],
         [
            'name' => 'singapure',
            'status' => 1,
        ],
         [
            'name' => 'dubai',
            'status' => 1,
        ]
        ]);
    }
}
