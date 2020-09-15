<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // This means we are not guarding anything and we can submit whatever to the DB. NOT ADVISABLE
    // If this is not turned off as shown here then we get massException error when trying to submit our post form
    //Integrity constraint error mostly occurs when we try to submit a data without adding its foreign key
    protected $guarded = []; 
    //
    public function user() {
        return $this->belongsTo(User::class);
    }
}
