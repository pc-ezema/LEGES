<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = "messages";

    public function sender()
    {
        return $this->belongsTo(User::class);
    }
}
