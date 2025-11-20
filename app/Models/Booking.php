<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id','name','email','phone','dob','education','nid_no',
        'permanent_address','profession','photo','package',
        'package_amount','trx_id','send_money_number','payment_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
