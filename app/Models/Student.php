<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classroom;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'classroom_id',
        'email',
        'address',
        'gender',
        'birthday'
    ];

    protected $with = ['classroom'];

    public function classroom(){
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}