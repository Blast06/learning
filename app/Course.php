<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Course
 *
 * @mixin \Eloquent
 */
class Course extends Model
{
    const PUBLISHED = 1;
    const PENDING   = 2;
    const REJECTED  = 3;

}