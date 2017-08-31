<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    use DatabaseTransactions;
    public function testEvents()
    {
        $this->visit('/')
         ->see('Events');
    }
    
     public function testGetEvents()
    {
        $crawler = $this->action('GET', 'EventsController@getEvents');
    }
    
    public function testBooking()
    {
        $this->visit('/booking/6')
         ->see('Exposition Map');
    }
    
}
