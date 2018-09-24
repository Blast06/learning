<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Goal
 *
 * @mixin \Eloquent
 */
class Goal extends Model
{
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
