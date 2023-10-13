<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DetailTest extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'registration',
        'reg_date',
        'due_date',
        'participant_id',
        'test_id',
        'pay_url',
        'is_paid',
        'date_validation',
        'validator',
        'reg_status',
        'present',
        'skor',
        'sertif_url',
        'is_passed'
    ];


    public function detail_tests()
    {
        return $this->belongsTo(Test::class);
    }

}
