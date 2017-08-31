<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Exhibitors;

class ExhibitorsTest extends TestCase
{
    /**
     * A basic test example with add in exhibitors table.
     *
     * @return void
     */
    
    public function testExhibitorAdd()
    {
        
        $exhibitor = new Exhibitors;
        $exhibitor->exhibitorName = 'Miles';
        $exhibitor->eventId = 4;
        $exhibitor->save();
        
        
        $this->assertEquals('Miles', $exhibitor->exhibitorName); 
        
        
        
    }
    public function testExample()
    {
        $this->assertTrue(true);
    }
    
    
}
