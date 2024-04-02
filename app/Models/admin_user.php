<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_user extends Model
{
    use HasFactory;

    protected $table = 'admin_users';

    protected $primaryKey = 'admin_id';

    protected $fillable = 
    [
        'name',
        'email',
        'phone',
        'gender',
        'birth_date',
        'pro_pic',
        'role_id',
        'status',
        'password',
    ];

    public $timestamps = false;

}
