<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseRequest extends Model
{
    //
    protected $fillable = [
        'user_id', 'case_id', 'first_name', 'last_name', 'email', 'status'];
}
