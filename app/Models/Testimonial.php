<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'testimonial',
        'status',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
