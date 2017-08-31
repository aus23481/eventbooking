<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
        
     
       public  $timestamps = false;
        
        /**
	 * The database table used by the model.
	 *
	 * @var string 
	 */
    	protected $table = 'events';
        protected $primaryKey = 'eventId'; 
        /**
        * The attributes that are mass assignable.
        *
        * @var array
        */
        protected $fillable = [
            'eventName', 'eventStartDate', 'eventEndDate',
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
