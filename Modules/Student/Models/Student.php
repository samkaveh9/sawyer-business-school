<?php

namespace Modules\Student\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'father_name',
        'national_code',
        'birthday_date',
        'lastـdegree',
        'averageـofـtheـlastـdegree',
        'gender',
        'military_service_status',
        'marital_status',
        'id_number',
        'phone_number',
        'image',
        'tuition',
    ];
}
