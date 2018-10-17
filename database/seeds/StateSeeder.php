<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$country = DB::table('country')->where('name','India')->first();
       

        DB::table('state')->insert([
            [
            'name' => 'tamilnadu',
            'status' => 1,
            'country_id' => $country->id,
        ],
        [
            'name' => 'karnataka',
            'status' => 1,
            'country_id' => $country->id,
        ],
        [
            'name' => 'kerala',
            'status' => 1,
            'country_id' => $country->id,
        ],
        [
            'name' => 'gujarath',
            'status' => 1,
            'country_id' => $country->id,
        ],
        ]);
    }
}
