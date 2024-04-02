<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    
    protected $table = 'students';

    protected $primaryKey = 'student_id';

    protected $fillable = 
    [
        'name',
        'phone',
        'email',
        'father_name',
        'serial_no',
        'roll_no',
        'certificate_serial',
        'regi_no',
        'grade',
        'gender',
        'course_id',
        'document',
        'address',
        'role_id',
        'status',
        'password',
    ];

    public $timestamps = false;

}
