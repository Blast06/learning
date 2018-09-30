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

    //esto es para que se pueda usar el slug en la url, asi como se usa  el id
//    public function getRouteKeyName()
//    {
//     return 'slug';
//    }

    /**
     * @return mixed
     */
    public function relatedCourses(){
        //retornar un curso con los reviews y que tambien retorne cursos en la misma categoria
        //que el curso que el usuario esta viendo.
        return Course::with('reviews')->whereCategoryId($this->category->id)
            ->where('id', '!=' ,$this->id)
            ->latest()
            ->limit(6)
            ->get();

    }

    protected $withCount = ['reviews', 'students'];

    public function getRatingAttribute(){
        return $this->reviews()->avg('rating');
}
    public function pathAttachment(){
        return "/images/courses/" . $this->picture;
    }
    public function category()
    {
        return $this->belongsTo(Category::class)->select('id','name');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class)->select('id','course_id','goal');
    }

    public function level()
    {
        return $this->belongsTo(Level::class)->select('id','name');

    }

    public function reviews(){
        return $this->hasMany(Review::class)->select('id','user_id','course_id','rating','comment','created_at');
    }

    //un curso tiene muchos requisitos
    public function requirements(){
        return $this->hasMany(Requirement::class)->select('id','course_id','requirement');
    }

//    un curso tiene muchos estudiantes y muchos estudiantes tienen uno o varios cursos
    public function students(){
        return $this->belongsToMany(Student::class);
    }

    //un curso tiene un solo teacher
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }


}