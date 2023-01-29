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
        // 'membership_type'=>'required',

        'membership_expiration'=>'required',
        'trainer_id'=>'required',
        'membership_id'=>'required'

        
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }

    public function membership() {
        return $this->belongsTo(Membership::class);
    }
}
