<?php

use Illuminate\Database\Seeder;

class ExpositionStandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('expositionstands')->insert([
            'eventId' => 3,
            'standName' =>'AB1'.str_random(10) ,
            'standStatus' => '0',
            'standPrice' => str_random(3),
            'standType' => "Single"
           
         ]);
        
        
    }
}
