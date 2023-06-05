<?php

namespace App\Models;

use App\Models\Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function categoryQuestions()
    {
        return $this->hasMany(Question::class);
    }

    public function resultAns()
    {
        return $this->hasMany(Result::class);
    }

    public function score()
    {
        return $this->belongsTo(Result::class, 'category_id', 'id');
    }
}
