<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;
    protected $table = 'student_answers';
    protected $fillable = ['assignment_name', 'class', 'answer', 'user_id', 'assignment_id', 'student'];
}
