<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibitors extends Model
{
        public  $timestamps = false;
        
        /**
	 * The database table used by the model.
	 *
	 * @var string 
	 */
    	protected $table = 'exhibitors';
        protected $primaryKey = 'exhibitorID'; 
        /**
        * The attributes that are mass assignable.
        *
        * @var array
        */
        protected $fillable = [
            'exhibitorName', 'exhibitorAddress', 'exhibitorWeb','exhibitorEmail',
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
