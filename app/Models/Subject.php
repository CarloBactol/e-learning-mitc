<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $tableName = 'subjects';
    protected $fillable = ['subject_code', 'subject_name', 'number_of_units', 'semester', 'status', 'description'];
}
