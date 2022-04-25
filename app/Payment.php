<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'user_id', 'email', 'amount', 'transaction_id', 'ref_id', 'paid_at', 
        'channel', 'ip_address', 'status'];
}
