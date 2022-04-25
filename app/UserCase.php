<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCase extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'email', 'case_id', 'type_of_case', 
        'time_limit', 'amount', 'description', 'lawyer_id', 'status'];
}
