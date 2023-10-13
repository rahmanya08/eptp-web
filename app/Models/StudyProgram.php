<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;

    protected $fillable = [
         'name_study'
    ];

    public function major()
    {
        return $this->hasMany(Major::class);
    }

}
