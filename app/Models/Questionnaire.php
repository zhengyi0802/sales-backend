<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
    ];

    public function member() {
        $this->belongsTo(Member::class, 'member_id');
    }

}

