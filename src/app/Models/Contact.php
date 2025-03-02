<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'category_id',
        'gender',
        'tel',//'tel2','tel3',
        'email',
        'address',
        'building',
        'detail'
    ];
}
