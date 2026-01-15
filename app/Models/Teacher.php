<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Teacher extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'subject_id',
        'email',
        'address',
        'phone'
    ];

    protected $with = ['subject'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}