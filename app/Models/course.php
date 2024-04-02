<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    
    protected $table = 'courses';

    protected $primaryKey = 'course_id';

    protected $fillable = 
    [
        'title',
        'tagline',
        'teacher_name',
        'start_time',
        'end_time',
        'description',
        'price',
        'content',
    ];

    public $timestamps = false;

    static public function header_courses(){
        return self::all();
    }

}


