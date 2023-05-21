<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_test',
        'type_test',
        'status_test'
    ];

    
    public function schedule()
    {
        return $this->hasMany(Payment::class);
    }

}
