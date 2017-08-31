<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpositionStands extends Model
{
    //
         public  $timestamps = false;
        
        /**
	 * The database table used by the model.
	 *
	 * @var string 
	 */
    	protected $table = 'expositionstands';
        protected $primaryKey = 'expositonStandId'; 
        /**
        * The attributes that are mass assignable.
        *
        * @var array
        */
        protected $fillable = [
            'exhibitorId', 'eventId', 'standName','standStatus',
        ];

        /**
        * The attributes that should be hidden for arrays.
        *
        * @var array
        */
       protected $hidden = [
           'remember_token',
       ];
    
}
