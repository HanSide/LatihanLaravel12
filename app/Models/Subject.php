<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Teacher;
class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;
    
        protected $fillable = [
        'name',
    ];
    
    public function teacher(){
        return $this->hasMany(teacher::class, 'subject_id',);
    }
}