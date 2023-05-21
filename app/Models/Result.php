<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'skor',
        'sertif_url',
        'result_status'
    ];


    public function user_result()
    {
        return $this->belongsTo(User::class);
    }

}
