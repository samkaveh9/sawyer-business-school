<?php

namespace Modules\Lesson\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Teacher\Models\Teacher;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'id_number',
        'grade',
        'theoretic_unit',
        'practical_unit',
        'prerequisites',
        'need',
        'teacher_id',
        'exam_date'
    ];


    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

}
