<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StReceive extends Model
{
    use HasFactory;
    protected $fillable = [
        'buysafeno',
        'userno',
        'td',
        'mn',
        'note1',
        'note2',
        'sendtype',
        'barcode_a',
        'barcode_b',
        'barcode_c',
        'post_barcode_a',
        'post_barcode_b',
        'post_barcode_c',
        'entity_atm',
        'bank_code',
        'bank_name',
        'approve_code',
        'card_no',
        'err_code',
        'err_msg',
        'card_type',
        'store_type',
        'store_message',
        'chk_value',
        'confirm',
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'td');
    }

}
