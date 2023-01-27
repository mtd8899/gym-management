<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';

    protected $fillable = [
        'name'=>'required',
        'email'=>'required',
        'membership_type'=>'required',
        'membership_expiration'=>'required',
        'membership_expiration'=>'required',
        
    ];
}
