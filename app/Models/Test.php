<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'date_test',
        'type_test',
        'status_test',
        'report',
        'date_report',
        'report_validator'
    ];

    public function user_test()
    {
        return $this->hasMany(User::class);
    }

    public function detail_tests()
    {
        return $this->hasMany(DetailTest::class);
    }

}
