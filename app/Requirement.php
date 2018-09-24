<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Requirement
 *
 * @mixin \Eloquent
 */
class Requirement extends Model
{
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
