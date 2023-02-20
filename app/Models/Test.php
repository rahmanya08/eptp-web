<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'test_date'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function certificate()
    {
        return $this->hasMany(Test::class);
    }
}
