<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $tableName = 'students';
    protected $fillable = ['course', 'section', 'id_number', 'firstname', 'lastname', 'status', 'email'];
}
