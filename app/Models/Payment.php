<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_date',
        'payment_doc',
        'is_verified'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function test()
    {
        return $this->hasMany(Test::class);
    }
}
