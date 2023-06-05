<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $tableName = 'teachers';
    protected $fillable = ['department', 'firstname', 'lastname', 'status', 'email', 'role_as'];
}
