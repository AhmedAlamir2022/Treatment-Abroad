<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'email',
        'short_desc',
        'long_desc',
        'contact',
        'address',
        'country',
        'city',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];
}
