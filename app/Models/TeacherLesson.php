<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherLesson extends Model
{
    use HasFactory;
    protected $table = 'teacher_lessons';
    protected $fillable = ['chapter', 'lesson_name', 'course', 'section', 'file'];
}
