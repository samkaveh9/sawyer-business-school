<?php

namespace Modules\Teacher\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
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
        'salary',
        'position',
    ];
}
