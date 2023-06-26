<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration',
        'participant_id',
        'test_id',
        'pay_url',
        'is_paid',
        'date_validation',
        'skor',
        'sertif_url',
        'is_passed'
    ];


    public function detail_tests()
    {
        return $this->belongsTo(Test::class);
    }

}
