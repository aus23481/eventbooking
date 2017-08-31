<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('events')->insert([
            'eventName' => "ITC Asia Fair",
            'eventStartDate' =>date("Y-m-d H:i:s",time()) ,
            'eventEndDate' => date("Y-m-d H:i:s",time()+(3*60*60*24)),
            'eventAddress' => "BB International Convention Center",
            
            'eventContactMail' => str_random(10).'@gmail.com',
            'eventPhone' => str_random(10),
            'eventSponsoredBy' => "BB Int.",
            'eventOrganizedBy' => "CB Care Ltd.",
            
            'eventLocationLat' => "23.768913",
            'eventLocationLong' => "90.382450",
            'seatsQuantity' => str_random(2)
         ]);
        
        
        
         DB::table('events')->insert([
            'eventName' => "Soft Expo2016",
            'eventStartDate' =>date("Y-m-d H:i:s",time()) ,
            'eventEndDate' => date("Y-m-d H:i:s",time()+(3*60*60*24)),
            'eventAddress' => "BBI Novo Theatre",
            
            'eventContactMail' => str_random(10).'@gmail.com',
            'eventPhone' => str_random(10),
            'eventSponsoredBy' => "BB Int.",
            'eventOrganizedBy' => "CB Care Ltd.",
            
            'eventLocationLat' => "23.763719",
            'eventLocationLong' => "90.387503",
            'seatsQuantity' => str_random(2)
         ]);
         
         
         
         DB::table('events')->insert([
            'eventName' => "BCIC Fair",
            'eventStartDate' =>date("Y-m-d H:i:s",time()) ,
            'eventEndDate' => date("Y-m-d H:i:s",time()+(3*60*60*24)),
            'eventAddress' => "Bashundhara City Shopping Complex,7th Floor",
            
            'eventContactMail' => str_random(10).'@gmail.com',
            'eventPhone' => str_random(10),
            'eventSponsoredBy' => "BB Int.",
            'eventOrganizedBy' => "CB Care Ltd.",
            
            'eventLocationLat' => "23.751169",
            'eventLocationLong' => "90.390700",
            'seatsQuantity' => str_random(2)
         ]);
       
         
         DB::table('events')->insert([
            'eventName' => "MobGame Expo",
            'eventStartDate' =>date("Y-m-d H:i:s",time()) ,
            'eventEndDate' => date("Y-m-d H:i:s",time()+(3*60*60*24)),
            'eventAddress' => "Panpacific Sonargaon Hotel,BallRoom",
            
            'eventContactMail' => str_random(10).'@gmail.com',
            'eventPhone' => str_random(10),
            'eventSponsoredBy' => "BB Int.",
            'eventOrganizedBy' => "CB Care Ltd.",
            
            'eventLocationLat' => "23.749530",
            'eventLocationLong' => "90.394547",
            'seatsQuantity' => str_random(2)
         ]);
         
          
         DB::table('events')->insert([
            'eventName' => "Robotics Expo",
            'eventStartDate' =>date("Y-m-d H:i:s",time()) ,
            'eventEndDate' => date("Y-m-d H:i:s",time()+(3*60*60*24)),
            'eventAddress' => "Hotel Intercontinental,SouthB Room",
            
            'eventContactMail' => str_random(10).'@gmail.com',
            'eventPhone' => str_random(10),
            'eventSponsoredBy' => "BB Int.",
            'eventOrganizedBy' => "CB Care Ltd.",
            
            'eventLocationLat' => "23.740980",
            'eventLocationLong' => "90.396473",
            'seatsQuantity' => str_random(2)
         ]);
         

        
    }
}
