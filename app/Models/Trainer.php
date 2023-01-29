<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $table = 'trainers';

    protected $fillable = [
        'name'=>'required',
        'email'=>'required',
        'specialization'=>'required',
        'phone'=>'required',
    ];

    public function members() {
        return $this->hasMany(Member::class);
    }
}
