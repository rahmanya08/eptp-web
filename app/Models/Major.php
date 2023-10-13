<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_study',
        'major'
    ];

    public function major_study()
    {
        return $this->belongsTo(StudyProgram::class);
    }
}
