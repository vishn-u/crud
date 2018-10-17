<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         
    	$state = DB::table('state')->where('name','TamilNadu')->first();

        DB::table('city')->insert([
            [
            'name' => 'chennai',
            'status' => 1,
            'state_id'=> $state->id,
        ],
        [ 
         'name' => 'madurai',
            'status' => 1,
            'state_id'=> $state->id,
        ],
         [ 
         'name' => 'trichy',
            'status' => 1,
            'state_id'=> $state->id,
        ],
         [ 
         'name' => 'karaikudi',
            'status' => 1,
            'state_id'=> $state->id,
        ]
        ]);
    }
}
